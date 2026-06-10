<?php
/**
 * Configuration for the "Hire Us" form handler.
 *
 * Copy this file to `config.php` and fill in your real credentials.
 * `config.php` should NOT be committed to version control.
 */

return [
    // ── Database (MySQL / MariaDB) ──
    'db' => [
        'host'    => '127.0.0.1',
        'port'    => 3306,
        'name'    => 'devzila',
        'user'    => 'db_user',
        'pass'    => 'db_password',
        'charset' => 'utf8mb4',
    ],

    // ── Email notification ──
    'mail' => [
        // Where new submissions are sent (your inbox).
        'to'        => 'hello@devzila.com',
        // "From" address — should be on your own domain for good deliverability.
        'from'      => 'no-reply@devzila.com',
        'from_name' => 'DevZila Website',
        'subject'   => 'New Hire Us request from {name}',
    ],
];
