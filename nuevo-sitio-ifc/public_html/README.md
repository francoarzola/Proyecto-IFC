# IFC Soluciones - Migración controlada cPanel
## Inventario reutilizado
- Páginas detectadas: `contacto.php`, `cuello.php`, `404.php`, `index.htm` (mantención).
- Contacto real: +56 9 6340 7332.
- Mapa real Google Maps: Camilo Ortúzar 4030, Macul.
- Redes: Facebook `fb.com/ifcst2600` (mantenida como referencia histórica).
- Imágenes usadas: `/images/logo.png`, `/images/icono.ico`, `/images/quienes.jpg`, `/images/tecnologia*.png`, `/images/slider-img*.{jpg,png}`, `//*.jpg`, `/clientes/*`.

## Ejecución local
```bash
cd public_html
php -S localhost:8000
```
Abrir: `http://localhost:8000/`.

## cPanel
1. Subir el contenido de `public_html/` a `public_html` real.
2. Copiar `includes/config.example.php` a `includes/config.php` o usar `/home/usuario/private/config.php`.
3. Ajustar SMTP y Turnstile.
4. Permisos: carpetas 755, archivos 644, config sensible 600/640.

## Formulario
- POST + CSRF + honeypot + rate limit sesión.
- `procesar-contacto.php` rechaza GET (405).
- SMTP PHPMailer preferente; fallback `mail()` opcional desactivado por defecto.

## Saneamiento recomendado del hosting antes de subir a producción
- Revisar permisos, propietarios y archivos 777.
- Buscar PHP sospechoso en `images/`, `css/`, `js/`, uploads.
- Revisar `.htaccess` en raíz y subcarpetas.
- Revisar cron jobs, FTP, correos/forwarders desconocidos.
- Revisar `error_log` y archivos ofuscados.
- Subir sobre carpeta limpia.
- Cambiar claves cPanel/FTP/correo.
- Activar 2FA en cPanel.
- Mantener backup previo.

## Archivos legacy descartados por seguridad
`mail1.php`, `mail2.php`, `mail3.php`, `css/accion.php`, `error_log`, `.ftpquota`, `material/*.psd`, respaldos `.zip/.sql/.bak/.old/.tar.gz`, `jquery-1.6.3.min.js`, `cufon*`, `PIE.*`, `html5.js`.
