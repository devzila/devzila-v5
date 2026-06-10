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

    $headers   = [];
    $headers[] = 'From: ' . sprintf('%s <%s>', $mail['from_name'], $mail['from']);
    $headers[] = 'Reply-To: ' . sprintf('%s <%s>', $name, $email);
    $headers[] = 'Content-Type: text/plain; charset=utf-8';
    $headers[] = 'MIME-Version: 1.0';

    // Failure to email should not fail the request (data is already saved).
    @mail($mail['to'], $subject, $body, implode("\r\n", $headers));
} catch (Throwable $e) {
    error_log('[hire-us] Mail error: ' . $e->getMessage());
}

respond(true, "Thanks, {$name}! Your request has been received. We'll be in touch within 24 hours.");
