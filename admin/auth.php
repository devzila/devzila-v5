<?php
declare(strict_types=1);

require_once __DIR__ . '/../lib/db.php';

/**
 * HTTP Basic Authentication for the admin panel.
 * Credentials are read from config.php ('admin' => ['user','pass']).
 */

// Safe to include multiple times; only authenticate once per request.
if (defined('ADMIN_AUTHENTICATED')) {
    return;
}

// Some FastCGI/FPM setups don't populate PHP_AUTH_* — recover from the
// Authorization header (passed through via .htaccess) when needed.
if (!isset($_SERVER['PHP_AUTH_USER'])) {
    $header = $_SERVER['HTTP_AUTHORIZATION'] ?? $_SERVER['REDIRECT_HTTP_AUTHORIZATION'] ?? '';
    if (stripos($header, 'basic ') === 0) {
        $decoded = base64_decode(substr($header, 6), true);
        if ($decoded !== false && str_contains($decoded, ':')) {
            [$u, $p] = explode(':', $decoded, 2);
            $_SERVER['PHP_AUTH_USER'] = $u;
            $_SERVER['PHP_AUTH_PW']   = $p;
        }
    }
}

$admin = app_config()['admin'] ?? ['user' => 'admin', 'pass' => 'admin'];
$user  = $_SERVER['PHP_AUTH_USER'] ?? '';
$pass  = $_SERVER['PHP_AUTH_PW']   ?? '';

$authOk = hash_equals((string) $admin['user'], (string) $user)
       && hash_equals((string) $admin['pass'], (string) $pass);

if (!$authOk) {
    header('WWW-Authenticate: Basic realm="DevZila Admin"');
    header('HTTP/1.1 401 Unauthorized');
    echo '<h1>401 Unauthorized</h1><p>Valid admin credentials are required.</p>';
    exit;
}

define('ADMIN_AUTHENTICATED', true);
