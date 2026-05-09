<?php
function e(string $v): string { return htmlspecialchars($v, ENT_QUOTES, 'UTF-8'); }
function page_url(string $path): string { return rtrim(BASE_URL,'/') . '/' . ltrim($path,'/'); }
function csrf_token(): string {
  if (empty($_SESSION['csrf_token'])) $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
  return $_SESSION['csrf_token'];
}
function verify_csrf(?string $token): bool { return isset($_SESSION['csrf_token']) && hash_equals($_SESSION['csrf_token'], (string)$token); }
function clean_input(string $v, int $max=2500): string {
  $v = trim(str_replace(["\r","\n","%0a","%0d"], ' ', $v));
  $v = strip_tags($v);
  return mb_substr($v,0,$max);
}
function render_header(string $title, string $desc, string $canonical): void { include __DIR__ . '/header.php'; }
