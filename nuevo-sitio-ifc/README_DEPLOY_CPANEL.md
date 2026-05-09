# Deploy cPanel - Nuevo sitio IFC
1) Subir `nuevo-sitio-ifc/public_html/*` a `public_html/` por File Manager o FTP.
2) No subir archivos legacy sospechosos: `mail1.php`, `mail2.php`, `mail3.php`, `css/accion.php`, `error_log`, `.ftpquota`, `material/*.psd`, backups `.zip/.sql/.bak/.old/.tar.gz`.
3) Configurar dominio final en `includes/config.php` (`BASE_URL`, correos y datos de contacto).
4) SMTP recomendado: instalar PHPMailer manualmente en `public_html/vendor/phpmailer/phpmailer/src/` o vía Composer local y subir carpeta `vendor`.
5) Nunca dejar credenciales reales en repositorio. En cPanel usar archivo privado `/home/usuario/private/mail-config.php` y `require` desde `config.php`.
6) Permisos: carpetas 755, archivos 644, configuración privada 600/640. Nunca 777.
7) Probar HTTPS activo antes de forzar redirección; si no hay SSL válido, comentar temporalmente bloque HTTPS.
8) Pruebas formulario: envío válido, validación email, CSRF inválido, honeypot lleno, método GET (debe bloquear).
9) Revisar exposición: intentar acceder a `/includes/config.php`, backups y logs (debe denegar).
10) Reemplazar placeholders: teléfono, correo, dirección, logos en `assets/img/`, textos `[Completar dato real]`.

## Checklist post-incidente
- Revisar archivos nuevos/no reconocidos en `public_html`.
- Eliminar respaldos públicos y logs.
- Verificar permisos y propietario.
- Regenerar contraseñas SMTP/cPanel/FTP.
- Mantener backups fuera de `public_html`.
