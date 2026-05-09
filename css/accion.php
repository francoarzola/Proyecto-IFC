<?php
$nombreempresa = $_POST['nempresa'];
$nombre = $_POST['ncliente'];
$email = $_POST['corrcliente'];
$telefono = $_POST['telcliente'];
$msg = $_POST['mensajecliente'];
$para = "nmunoz@ifcst2600.cl,arzola.franco@gmail.com";
$header = "Desde: ".$email;
$titulo = "Te contactaron mediante tu pagina";
$msjcorreo = "Empresa: $nombreempresa\n Nombre: $nombre\n E-mail: $email\n Telefono: $telefono\n Mensaje del cliente: $msg\n.";
if (isset($_POST['nempresa']) and ($_POST['ncliente']) and ($_POST['corrcliente']) and ($_POST['telcliente']) and ($_POST['mensajecliente']))
{
mail($para, $titulo, $msjcorreo, $header);
header('Location: http://www.ifcst2600.cl/msgok.php');
}else{
header('Location: http://www.ifcst2600.cl/msgerr.php');
}
?>
