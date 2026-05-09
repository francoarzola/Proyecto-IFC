<?php
if (session_status() !== PHP_SESSION_ACTIVE) { session_start(); }

define('SITE_NAME', 'IFC Soluciones');
define('BASE_URL', 'https://www.ifcsoluciones.cl'); // Reemplazar por [DOMINIO_FINAL]
define('MAIL_TO', 'contacto@ifcsoluciones.cl'); // [Completar dato real]
define('MAIL_FROM', 'no-reply@ifcsoluciones.cl'); // Debe existir en el dominio

define('SMTP_HOST', 'smtp.[DOMINIO_FINAL]');
define('SMTP_USER', 'usuario_smtp@[DOMINIO_FINAL]');
define('SMTP_PASS', '[COMPLETAR_SMTP_PASS]');
define('SMTP_PORT', 587);
define('SMTP_SECURE', 'tls');

define('ENABLE_TURNSTILE', false);
define('TURNSTILE_SECRET', '[COMPLETAR_TURNSTILE_SECRET]');

define('CONTACT_PHONE', '+56 9 [Completar dato real]');
define('CONTACT_EMAIL', '[Completar correo comercial]');
define('CONTACT_ADDRESS', '[Completar dirección comercial, Chile]');
