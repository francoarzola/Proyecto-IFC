<?php
declare(strict_types=1);

function e(string $value): string { return htmlspecialchars($value, ENT_QUOTES, 'UTF-8'); }

function csrf_token(): string {
    if (empty($_SESSION['csrf_token'])) {
        $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
    }
    return $_SESSION['csrf_token'];
}

function verify_csrf(?string $token): bool {
    return isset($_SESSION['csrf_token']) && is_string($token) && hash_equals($_SESSION['csrf_token'], $token);
}

function old(string $key): string {
    return isset($_SESSION['old'][$key]) ? e((string)$_SESSION['old'][$key]) : '';
}

function flash(string $key): ?string {
    if (!isset($_SESSION['flash'][$key])) return null;
    $msg = (string)$_SESSION['flash'][$key];
    unset($_SESSION['flash'][$key]);
    return $msg;
}
