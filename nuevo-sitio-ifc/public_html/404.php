<?php http_response_code(404); $title='404 | IFC'; $desc='Página no encontrada.'; $canonical='404.php'; require __DIR__.'/includes/header.php'; ?>
<h1>Página no encontrada</h1><p>La ruta solicitada no está disponible o fue movida.</p><p><a class="btn" href="/index.php">Ir al inicio</a> <a class="btn btn-secondary" href="/contacto.php">Contacto</a></p>
<?php require __DIR__.'/includes/footer.php'; ?>
