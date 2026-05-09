<?php $title='Contacto comercial | IFC'; $desc='Formulario de contacto para cotizaciones y requerimientos técnicos mineros e industriales.'; $canonical='contacto.php'; require __DIR__.'/includes/header.php'; $token=csrf_token(); ?>
<h1>Contacto comercial</h1><p>Envíenos su solicitud de cotización, requerimiento técnico o consulta comercial.</p>
<form method="post" action="/procesar-contacto.php" novalidate>
<input type="hidden" name="csrf_token" value="<?= e($token) ?>"><input type="text" name="website" class="hp" tabindex="-1" autocomplete="off">
<label>Nombre*<input name="nombre" maxlength="120" required></label>
<label>Empresa*<input name="empresa" maxlength="120" required></label>
<label>Email*<input type="email" name="email" maxlength="180" required></label>
<label>Teléfono<input name="telefono" maxlength="40"></label>
<label>Asunto*<input name="asunto" maxlength="150" required></label>
<label>Mensaje*<textarea name="mensaje" maxlength="2500" required></textarea></label>
<button class="btn" type="submit">Enviar solicitud</button>
</form>
<?php require __DIR__.'/includes/footer.php'; ?>
