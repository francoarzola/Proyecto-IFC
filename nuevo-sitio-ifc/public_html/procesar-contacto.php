<?php
require __DIR__ . '/includes/config.php';
require __DIR__ . '/includes/helpers.php';
if ($_SERVER['REQUEST_METHOD'] !== 'POST') { http_response_code(405); exit('Método no permitido'); }
if (!verify_csrf($_POST['csrf_token'] ?? null)) { http_response_code(400); exit('Solicitud inválida'); }
if (!empty($_POST['website'] ?? '')) { header('Location: /gracias.php'); exit; }
$nombre = clean_input($_POST['nombre'] ?? '', 120);
$empresa = clean_input($_POST['empresa'] ?? '', 120);
$email = clean_input($_POST['email'] ?? '', 180);
$telefono = clean_input($_POST['telefono'] ?? '', 40);
$asunto = clean_input($_POST['asunto'] ?? '', 150);
$mensaje = clean_input($_POST['mensaje'] ?? '', 2500);
if (!$nombre || !$empresa || !$asunto || !$mensaje || !filter_var($email, FILTER_VALIDATE_EMAIL)) { header('Location: /contacto.php?e=1'); exit; }
$body = "Nuevo contacto IFC\n\nNombre: $nombre\nEmpresa: $empresa\nEmail: $email\nTeléfono: $telefono\nAsunto: $asunto\nMensaje:\n$mensaje\n";
$sent=false;
if (file_exists(__DIR__.'/vendor/phpmailer/phpmailer/src/PHPMailer.php')) {
  require __DIR__.'/vendor/phpmailer/phpmailer/src/Exception.php'; require __DIR__.'/vendor/phpmailer/phpmailer/src/PHPMailer.php'; require __DIR__.'/vendor/phpmailer/phpmailer/src/SMTP.php';
  $mail = new PHPMailer\PHPMailer\PHPMailer(true);
  try { $mail->isSMTP(); $mail->Host=SMTP_HOST; $mail->SMTPAuth=true; $mail->Username=SMTP_USER; $mail->Password=SMTP_PASS; $mail->Port=SMTP_PORT; $mail->SMTPSecure=SMTP_SECURE; $mail->setFrom(MAIL_FROM,'IFC Web'); $mail->addAddress(MAIL_TO); $mail->addReplyTo($email,$nombre); $mail->Subject='Contacto web IFC: '.$asunto; $mail->Body=$body; $sent=$mail->send(); } catch (Throwable $e) { $sent=false; }
} else {
  $headers = ['From: IFC Web <'.MAIL_FROM.'>','Reply-To: '.$email,'Content-Type: text/plain; charset=UTF-8'];
  $sent = @mail(MAIL_TO, 'Contacto web IFC: '.$asunto, $body, implode("\r\n",$headers));
}
header('Location: '.($sent?'/gracias.php':'/contacto.php?e=2')); exit;
