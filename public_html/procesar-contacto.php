<?php
declare(strict_types=1);
require_once __DIR__.'/includes/config.php';
require_once __DIR__.'/includes/helpers.php';
if ($_SERVER['REQUEST_METHOD'] !== 'POST') { http_response_code(405); exit('Método no permitido.'); }
if (!verify_csrf($_POST['csrf_token'] ?? null)) { $_SESSION['flash']['error']='No se pudo validar el formulario.'; header('Location: index.php#contacto'); exit; }
if (!empty($_POST['website'] ?? '')) { $_SESSION['flash']['ok']='Gracias por contactarnos.'; header('Location: index.php#contacto'); exit; }
$fields=['nombre'=>80,'empresa'=>120,'rut'=>20,'correo'=>120,'telefono'=>30,'mensaje'=>1500]; $data=[];
foreach($fields as $k=>$max){$v=trim((string)($_POST[$k]??'')); if(mb_strlen($v)>$max){$_SESSION['flash']['error']='Uno o más campos exceden el largo permitido.';$_SESSION['old']=$_POST;header('Location: index.php#contacto');exit;} $data[$k]=strip_tags($v);} 
if ($data['nombre']===''||$data['empresa']===''||$data['correo']===''||$data['telefono']===''||$data['mensaje']===''){$_SESSION['flash']['error']='Completa los campos obligatorios.';$_SESSION['old']=$_POST;header('Location: index.php#contacto');exit;}
if (!filter_var($data['correo'], FILTER_VALIDATE_EMAIL)){$_SESSION['flash']['error']='Correo inválido.';$_SESSION['old']=$_POST;header('Location: index.php#contacto');exit;}
$body="Nombre: {$data['nombre']}\nEmpresa: {$data['empresa']}\nRUT: {$data['rut']}\nCorreo: {$data['correo']}\nTeléfono: {$data['telefono']}\n\nMensaje:\n{$data['mensaje']}";
$headers = [
    'MIME-Version: 1.0',
    'Content-Type: text/plain; charset=UTF-8',
    'From: IFC Soluciones <'.MAIL_FROM.'>',
    'Reply-To: '.$data['correo'],
    'X-Mailer: PHP/' . phpversion()
];
$ok = mail(MAIL_TO, 'Nuevo contacto web - IFC Soluciones', $body, implode("\r\n", $headers));
unset($_SESSION['old']);
$_SESSION['flash'][$ok?'ok':'error']=$ok?'Gracias, tu mensaje fue enviado correctamente.':'No fue posible enviar el mensaje en este momento.';
header('Location: index.php#contacto');
