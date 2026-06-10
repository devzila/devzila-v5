<?php
/**
 * Handles "Hire Us" form submissions.
 *
 *  1. Validates the incoming POST data.
 *  2. Stores the submission in the `hire_requests` table.
 *  3. Sends a notification email to the team.
 *
 * Responds with JSON: { "success": bool, "message": string }
 */

declare(strict_types=1);

header('Content-Type: application/json; charset=utf-8');

/** Send a JSON response and stop. */
function respond(bool $success, string $message, int $status = 200): void
{
    http_response_code($status);
    echo json_encode(['success' => $success, 'message' => $message]);
    exit;
}

/**
 * Minimal, dependency-free SMTP mailer.
 * Supports STARTTLS (port 587), implicit SSL (port 465) and AUTH LOGIN.
 *
 * @throws RuntimeException on any protocol/connection failure.
 */
function send_via_smtp(array $smtp, string $fromEmail, string $fromName, string $to, string $replyName, string $replyEmail, string $subject, string $body): void
{
    $timeout    = (int)($smtp['timeout'] ?? 15);
    $encryption = strtolower((string)($smtp['encryption'] ?? 'tls'));
    $host       = $smtp['host'];
    $port       = (int)$smtp['port'];

    $transport = ($encryption === 'ssl') ? "ssl://{$host}" : $host;

    $errno = 0; $errstr = '';
    $fp = @stream_socket_client(
        "{$transport}:{$port}",
        $errno,
        $errstr,
        $timeout,
        STREAM_CLIENT_CONNECT
    );
    if (!$fp) {
        throw new RuntimeException("SMTP connect failed: {$errstr} ({$errno})");
    }
    stream_set_timeout($fp, $timeout);

    // Read a (possibly multi-line) SMTP reply and assert the expected code.
    $read = static function () use ($fp): string {
        $data = '';
        while (($line = fgets($fp, 515)) !== false) {
            $data .= $line;
            // Lines like "250-..." continue; "250 ..." ends the reply.
            if (isset($line[3]) && $line[3] === ' ') {
                break;
            }
        }
        return $data;
    };
    $expect = static function (string $reply, string $code) {
        if (strncmp($reply, $code, strlen($code)) !== 0) {
            throw new RuntimeException('Unexpected SMTP reply: ' . trim($reply));
        }
    };
    $write = static function (string $cmd) use ($fp): void {
        fwrite($fp, $cmd . "\r\n");
    };

    $expect($read(), '220');

    $hostname = $_SERVER['SERVER_NAME'] ?? gethostname() ?: 'localhost';

    $write('EHLO ' . $hostname);
    $expect($read(), '250');

    if ($encryption === 'tls') {
        $write('STARTTLS');
        $expect($read(), '220');
        if (!stream_socket_enable_crypto($fp, true, STREAM_CRYPTO_METHOD_TLS_CLIENT)) {
            throw new RuntimeException('Failed to enable TLS encryption.');
        }
        $write('EHLO ' . $hostname);
        $expect($read(), '250');
    }

    if (!empty($smtp['username'])) {
        $write('AUTH LOGIN');
        $expect($read(), '334');
        $write(base64_encode((string)$smtp['username']));
        $expect($read(), '334');
        $write(base64_encode((string)($smtp['password'] ?? '')));
        $expect($read(), '235');
    }

    $write('MAIL FROM:<' . $fromEmail . '>');
    $expect($read(), '250');
    $write('RCPT TO:<' . $to . '>');
    $expect($read(), '25'); // 250 or 251
    $write('DATA');
    $expect($read(), '354');

    $headers = [
        'Date: ' . date('r'),
        'From: ' . sprintf('%s <%s>', $fromName, $fromEmail),
        'To: ' . $to,
        'Reply-To: ' . sprintf('%s <%s>', $replyName, $replyEmail),
        'Subject: ' . $subject,
        'MIME-Version: 1.0',
        'Content-Type: text/plain; charset=utf-8',
        'Content-Transfer-Encoding: 8bit',
    ];

    // Dot-stuffing: lines starting with "." must be escaped.
    $safeBody = preg_replace('/^\./m', '..', str_replace(["\r\n", "\r", "\n"], "\r\n", $body));

    $write(implode("\r\n", $headers) . "\r\n\r\n" . $safeBody . "\r\n.");
    $expect($read(), '250');

    $write('QUIT');
    fclose($fp);
}

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    respond(false, 'Method not allowed.', 405);
}

// ── Load configuration ──
$configFile = __DIR__ . '/config.php';
if (!is_file($configFile)) {
    $configFile = __DIR__ . '/config.sample.php';
}
$config = require $configFile;

// ── Honeypot: bots tend to fill hidden fields ──
if (!empty($_POST['website'])) {
    // Pretend success so the bot doesn't retry.
    respond(true, "Thanks! Your request has been received.");
}

// ── Collect & sanitise input ──
$name    = trim((string)($_POST['name']    ?? ''));
$email   = trim((string)($_POST['email']   ?? ''));
$phone   = trim((string)($_POST['phone']   ?? ''));
$message = trim((string)($_POST['message'] ?? ''));
$budget  = trim((string)($_POST['budget']  ?? ''));
$source  = trim((string)($_POST['source']  ?? ''));

// ── Validate ──
$errors = [];
if ($name === '' || mb_strlen($name) > 150) {
    $errors[] = 'a valid name';
}
if ($email === '' || !filter_var($email, FILTER_VALIDATE_EMAIL) || mb_strlen($email) > 200) {
    $errors[] = 'a valid email address';
}
if ($message === '') {
    $errors[] = 'a message describing your needs';
}
if (!empty($errors)) {
    respond(false, 'Please provide ' . implode(', ', $errors) . '.', 422);
}

$ip        = $_SERVER['REMOTE_ADDR'] ?? null;
$userAgent = isset($_SERVER['HTTP_USER_AGENT'])
    ? mb_substr($_SERVER['HTTP_USER_AGENT'], 0, 255)
    : null;

// ── Persist to the database ──
try {
    $db  = $config['db'];
    $dsn = sprintf(
        'mysql:host=%s;port=%d;dbname=%s;charset=%s',
        $db['host'],
        $db['port'],
        $db['name'],
        $db['charset']
    );

    $pdo = new PDO($dsn, $db['user'], $db['pass'], [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES   => false,
    ]);

    $stmt = $pdo->prepare(
        'INSERT INTO hire_requests
            (name, email, phone, message, budget, source, ip_address, user_agent)
         VALUES
            (:name, :email, :phone, :message, :budget, :source, :ip, :ua)'
    );

    $stmt->execute([
        ':name'    => $name,
        ':email'   => $email,
        ':phone'   => $phone !== '' ? $phone : null,
        ':message' => $message,
        ':budget'  => $budget !== '' ? $budget : null,
        ':source'  => $source !== '' ? $source : null,
        ':ip'      => $ip,
        ':ua'      => $userAgent,
    ]);
} catch (Throwable $e) {
    error_log('[hire-us] DB error: ' . $e->getMessage());
    respond(false, 'We could not save your request right now. Please email hello@devzila.com.', 500);
}

// ── Send notification email ──
try {
    $mail    = $config['mail'];
    $subject = str_replace('{name}', $name, $mail['subject']);

    $bodyLines = [
        'New "Hire Us" submission from the DevZila website:',
        '',
        'Name:    ' . $name,
        'Email:   ' . $email,
        'Phone:   ' . ($phone !== '' ? $phone : '—'),
        'Budget:  ' . ($budget !== '' ? $budget : '—'),
        'Source:  ' . ($source !== '' ? $source : '—'),
        '',
        'Message:',
        $message,
        '',
        '----',
        'IP: ' . ($ip ?? '—'),
        'Submitted: ' . date('Y-m-d H:i:s'),
    ];
    $body = implode("\r\n", $bodyLines);

    $smtp = $config['smtp'] ?? ['enabled' => false];

    if (!empty($smtp['enabled'])) {
        // Send through the configured SMTP server.
        send_via_smtp(
            $smtp,
            $mail['from'],
            $mail['from_name'],
            $mail['to'],
            $name,
            $email,
            $subject,
            $body
        );
    } else {
        // Fall back to PHP's built-in mail().
        $headers   = [];
        $headers[] = 'From: ' . sprintf('%s <%s>', $mail['from_name'], $mail['from']);
        $headers[] = 'Reply-To: ' . sprintf('%s <%s>', $name, $email);
        $headers[] = 'Content-Type: text/plain; charset=utf-8';
        $headers[] = 'MIME-Version: 1.0';
        @mail($mail['to'], $subject, $body, implode("\r\n", $headers));
    }
} catch (Throwable $e) {
    // Failure to email should not fail the request (data is already saved).
    error_log('[hire-us] Mail error: ' . $e->getMessage());
}

respond(true, "Thanks, {$name}! Your request has been received. We'll be in touch within 24 hours.");
