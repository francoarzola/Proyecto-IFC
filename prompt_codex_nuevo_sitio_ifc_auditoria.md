# Prompt exportable para Codex — Nuevo sitio IFC basado en auditoría legacy cPanel

## 1. Rol que debe asumir Codex

Actúa como un arquitecto de software senior, desarrollador full-stack especializado en sitios corporativos livianos para hosting compartido cPanel, auditor de seguridad web y especialista en remediación de sitios legacy PHP/HTML.

Tu tarea es reconstruir/mejorar un sitio web corporativo antiguo de IFC, manteniendo compatibilidad con cPanel, PHP y hosting compartido, pero aplicando buenas prácticas actuales de seguridad, mantenibilidad, SEO técnico básico y rendimiento.

No propongas Docker, Kubernetes, CI/CD complejo, Node obligatorio, cloud, contenedores ni infraestructura sobredimensionada. El objetivo es una solución profesional, segura y simple para cPanel.

---

## 2. Contexto del proyecto actual

El sitio actual fue descargado desde cPanel como ZIP completo. Es un sitio legacy, probablemente desarrollado a partir de una plantilla antigua HTML/PHP.

Tecnologías y características detectadas:

- PHP procedural simple.
- HTML estático.
- CSS manual.
- JavaScript antiguo.
- jQuery 1.6.3.
- Librerías antiguas de compatibilidad con Internet Explorer: Cufón, PIE.htc, html5.js.
- Formulario de contacto usando `mail()` nativo de PHP.
- Sin base de datos detectada.
- Sin framework moderno.
- Sin WordPress.
- Sin Laravel.
- Sin Composer detectado.
- Sin Node/React/Vite en el sitio actual.
- Estructura típica de `public_html` en hosting compartido cPanel.

El sitio debe seguir siendo compatible con cPanel y debe poder subirse por FTP/File Manager sin procesos complejos de build, salvo que se justifique muy claramente.

---

## 3. Incidente histórico de seguridad que debe considerarse

Hace algunos años el hosting recibió un ataque por parte de un atacante extranjero. Según el dueño del sitio, probablemente el atacante pudo haber modificado permisos, ubicado archivos en lugares no esperados o dejado elementos residuales dentro del hosting.

El propietario eliminó manualmente todo lo que pensó que podía ser malicioso, pero no realizó una revisión formal de permisos de archivos/carpetas ni una auditoría exhaustiva posterior.

Por lo tanto, al reconstruir o limpiar el sitio se debe asumir lo siguiente:

1. Puede haber archivos residuales no necesarios.
2. Puede haber permisos inseguros heredados.
3. Puede haber archivos ubicados fuera de lugar.
4. Puede haber copias antiguas, mailers de prueba, logs, respaldos o scripts no utilizados.
5. No se debe confiar ciegamente en la estructura actual del hosting.
6. Debe proponerse una estructura limpia y mínima.
7. Deben indicarse permisos recomendados para cPanel.
8. Deben bloquearse archivos sensibles mediante `.htaccess`.
9. Debe evitarse dejar archivos fuente, PSD, logs, backups o pruebas dentro de `public_html`.
10. Debe incluirse un checklist de saneamiento posterior a ataque.

Permisos recomendados para cPanel:

- Carpetas: `755`.
- Archivos públicos: `644`.
- Archivos de configuración privados, si existen fuera de `public_html`: `600` o `640` según compatibilidad del hosting.
- Evitar `777` salvo casos excepcionales y temporales.
- Revisar propietario/grupo desde cPanel o soporte del hosting si hay sospecha de permisos alterados.

---

## 4. Estructura detectada del proyecto legacy

Estructura resumida del ZIP:

```text
Proyecto IFC/
├── .ftpquota
├── .htaccess
├── .well-known/
├── 404.php
├── accion.php
├── cabeza.php
├── cargador1.php
├── cargador2.php
├── cgi-bin/
├── cinturon.php
├── clientes/
├── contacto.php
├── css/
│   ├── accion.php
│   ├── ie.css
│   ├── layout.css
│   ├── reset.css
│   └── style.css
├── cuello.php
├── error_log
├── googlec652fefc3fc8b45c.html
├── ifcst2600.cl/
├── images/
├── index.htm
├── index.html
├── index.php
├── js/
│   ├── cufon-replace.js
│   ├── cufon-yui.js
│   ├── easyTooltip.js
│   ├── FF-cash.js
│   ├── html5.js
│   ├── jquery-1.6.3.min.js
│   ├── jquery.easing.1.3.js
│   ├── jquery.equalheights.js
│   ├── NewsGoth_BT_400.font.js
│   ├── PIE.htc
│   ├── PIE.php
│   ├── script.js
│   ├── tms-0.3.js
│   └── tms_presets.js
├── kit.php
├── lampara.php
├── mail1.php
├── mail2.php
├── mail3.php
├── material/
│   ├── contacts.psd
│   ├── faq.psd
│   ├── home.psd
│   ├── prices.psd
│   ├── services.psd
│   └── staff.psd
├── msgerr.php
├── msgok.php
├── nuestrosclientes.html
├── productos/
├── productos.php
├── quienessomos.html
├── rack1.php
├── rack2.php
├── robots.txt
├── signature/
│   ├── htaccess
│   ├── LogoIFC.png
│   ├── LogoIFC150.png
│   ├── LogoIFC200.png
│   ├── LogoIFC250.png
│   └── LogoIFC320.png
├── sitemap.xml
├── style.css
├── sujetadora.php
├── tecnologia.PNG
└── tecnologia.html
```

---

## 5. Clasificación preliminar de archivos legacy

### Archivos públicos normales

- `index.php`
- `quienessomos.html`
- `productos.php`
- `tecnologia.html`
- `nuestrosclientes.html`
- `contacto.php`
- `404.php`
- `msgok.php`
- `msgerr.php`
- Páginas individuales de productos: `cabeza.php`, `cuello.php`, `cinturon.php`, `sujetadora.php`, `kit.php`, `lampara.php`, `rack1.php`, `rack2.php`, `cargador1.php`, `cargador2.php`
- `css/`
- `js/`
- `images/`
- `productos/`
- `clientes/`
- `sitemap.xml`
- `robots.txt`

### Archivos privados, sensibles o que no deberían quedar públicos

- `.ftpquota`
- `error_log`
- `material/*.psd`
- `mail1.php`
- `mail2.php`
- `mail3.php`
- `css/accion.php`
- `signature/htaccess`, porque no es `.htaccess` real.

### Archivos duplicados o sospechosos

- `index.php`, `index.html`, `index.htm`: múltiples entradas.
- `style.css` en raíz y `css/style.css`: posible duplicado.
- `tecnologia.PNG` y `images/tecnologia.png`: posible duplicado.
- `accion.php` y `css/accion.php`: duplicado muy sospechoso.
- `mail1.php`, `mail2.php`, `mail3.php`: versiones antiguas o pruebas del mailer.

---

## 6. Hallazgos de seguridad de la auditoría

### Crítico: formulario inseguro

El formulario actual usa:

```php
$_POST['nempresa'];
$_POST['ncliente'];
$_POST['corrcliente'];
$_POST['telcliente'];
$_POST['rutempresa'];
$_POST['mensajecliente'];
```

Y envía correo con:

```php
mail($para, $titulo, $msjcorreo, $header);
```

Problemas:

- No valida método HTTP.
- No valida correctamente campos obligatorios.
- No valida formato de email de forma robusta.
- No sanitiza entradas.
- No limita longitud de campos.
- No tiene CSRF token.
- No tiene honeypot.
- No tiene CAPTCHA/Turnstile/hCaptcha.
- No tiene rate limiting.
- Usa `mail()` nativo en vez de SMTP autenticado.
- Construye cabeceras con datos del usuario, riesgo de header injection.
- Puede ser invocado directamente por bots.

Requerimiento para el nuevo sitio:

- Rehacer completamente el formulario de contacto.
- Usar validación server-side obligatoria.
- Usar sanitización y límites de longitud.
- Usar `filter_var($email, FILTER_VALIDATE_EMAIL)`.
- Implementar honeypot.
- Implementar CSRF token.
- Usar SMTP autenticado con PHPMailer o alternativa compatible con cPanel.
- Evaluar Cloudflare Turnstile como CAPTCHA recomendado si el sitio recibe spam.
- No dejar datos de SMTP hardcodeados dentro de archivos públicos.
- Si hay configuración sensible, ubicarla fuera de `public_html` cuando el hosting lo permita.

---

### Alto: `error_log` público

El archivo `error_log` está en la raíz pública. Puede exponer:

- Rutas internas del servidor.
- Nombres de usuario del hosting.
- Archivos PHP existentes.
- Warnings/notices útiles para atacantes.

Requerimiento:

- No incluir `error_log` en el nuevo sitio.
- Bloquearlo por `.htaccess` si aparece.
- Guardar logs fuera de `public_html` si se implementa logging.

---

### Alto: archivos de prueba o mailers antiguos expuestos

Archivos detectados:

- `mail1.php`
- `mail2.php`
- `mail3.php`
- `css/accion.php`

Riesgo:

- Pueden ser invocados por bots.
- Pueden contener errores, pruebas, correos antiguos o código incompleto.
- Pueden facilitar spam o exposición de información.

Requerimiento:

- No migrar estos archivos al nuevo sitio.
- Si se mantiene copia legacy, bloquearlos expresamente con `.htaccess`.

---

### Alto: `.htaccess` incompleto o incorrecto

Problemas:

- Falta bloqueo de archivos sensibles.
- Falta bloqueo de extensiones de backup.
- Falta protección explícita de logs.
- Falta política clara de HTTPS.
- Faltan headers de seguridad.
- Hotlink protection probablemente está invertida.

Requerimiento:

Crear un `.htaccess` nuevo, probado y compatible con cPanel, que incluya:

- `Options -Indexes`.
- Forzar HTTPS si SSL está activo.
- Bloquear archivos sensibles.
- Bloquear backups y dumps.
- Bloquear logs.
- Bloquear acceso a carpetas privadas.
- Headers básicos de seguridad.
- Hotlink protection solo si realmente se necesita y sin romper firmas de correo.

---

### Medio/Alto: librerías JavaScript antiguas

Detectado:

- `jquery-1.6.3.min.js`.
- `cufon-yui.js`.
- `PIE.htc`.
- `PIE.php`.
- `html5.js`.
- `tms-0.3.js`.

Requerimiento:

- No reutilizar jQuery 1.6.3.
- Evitar dependencias antiguas de Internet Explorer.
- Usar JavaScript moderno mínimo, preferentemente vanilla JS.
- Si se necesita librería, usar versión actual y justificada.

---

### Medio: PSDs y archivos fuente dentro del sitio público

Detectado:

- `material/contacts.psd`
- `material/faq.psd`
- `material/home.psd`
- `material/prices.psd`
- `material/services.psd`
- `material/staff.psd`

Requerimiento:

- No incluir archivos fuente de diseño en `public_html`.
- Guardarlos en respaldo privado fuera del sitio público.
- Bloquear `/material/` si se mantiene temporalmente.

---

## 7. Hallazgos SEO técnicos

Problemas detectados:

- Títulos repetidos o genéricos.
- Falta de meta descriptions únicas.
- Mal uso de H1.
- Imágenes sin `alt` descriptivo.
- Sitemap apunta al dominio antiguo `ifcst2600.cl`.
- `robots.txt` bloquea páginas importantes.
- `robots.txt` bloquea CSS, JS e imágenes.
- `robots.txt` y `sitemap.xml` se contradicen.
- No se detectaron canonical tags.
- No se detectó Open Graph básico.
- URLs mezclan `.php`, `.html`, `.htm`.
- Hay URLs absolutas `http://`.
- Potenciales enlaces rotos.

Requerimientos SEO para el nuevo sitio:

- Cada página debe tener `<title>` único.
- Cada página debe tener `meta description` única.
- Cada página debe tener un único H1 semántico.
- Usar H2/H3 ordenados.
- Agregar `alt` descriptivo en imágenes relevantes.
- Crear `sitemap.xml` actualizado con el dominio final.
- Crear `robots.txt` limpio.
- Agregar canonical por página.
- Agregar Open Graph básico.
- Usar HTTPS y dominio canónico claro.
- Evitar bloquear CSS, JS e imágenes en robots.

---

## 8. Hallazgos de performance

Problemas detectados:

- Imágenes pesadas.
- PSDs dentro del sitio público.
- JavaScript antiguo e innecesario.
- Scripts cargados en el `<head>`.
- CSS duplicado.
- Falta de lazy loading.
- Posible CLS por imágenes sin dimensiones claras.
- Diseño antiguo probablemente poco responsive.
- Uso de recursos HTTP que pueden generar mixed content.

Requerimientos performance:

- Optimizar imágenes.
- Usar WebP cuando corresponda.
- Usar `loading="lazy"` en imágenes no críticas.
- Mantener CSS y JS mínimos.
- Evitar librerías innecesarias.
- Cargar JS al final o con `defer`.
- Estructurar layout responsive mobile-first.
- Revisar Core Web Vitals básicos: LCP, INP, CLS.

---

## 9. Requerimientos funcionales del nuevo sitio

El nuevo sitio debe incluir, como mínimo:

1. Página de inicio.
2. Página Quiénes somos.
3. Página Productos/Servicios.
4. Página Tecnología o Soluciones.
5. Página Clientes.
6. Página Contacto.
7. Página 404 personalizada.
8. Formulario de contacto seguro.
9. Sitemap.
10. Robots.txt.
11. `.htaccess` seguro para cPanel.

Debe mantener el enfoque corporativo de IFC:

- Iluminación minera.
- Tecnología.
- Productos para minería/industria.
- Clientes corporativos.
- Contacto comercial.

No inventar contenido comercial nuevo excesivo si no hay información original. Si falta contenido, dejar placeholders claros y ordenados para que el dueño los complete.

---

## 10. Requerimientos técnicos del nuevo sitio

### Opción preferida

Sitio estático/semiestático compatible con cPanel:

- HTML5.
- CSS moderno.
- JavaScript vanilla mínimo.
- PHP solo para includes y formulario.
- Sin base de datos si no es necesaria.
- Sin framework pesado.
- Sin build obligatorio.

### Estructura objetivo sugerida

```text
public_html/
├── index.php
├── quienes-somos.php
├── productos.php
├── tecnologia.php
├── clientes.php
├── contacto.php
├── procesar-contacto.php
├── 404.php
├── assets/
│   ├── css/
│   │   └── main.css
│   ├── js/
│   │   └── main.js
│   ├── img/
│   └── productos/
├── includes/
│   ├── config.php          # solo si no contiene secretos o si cPanel no permite fuera de public_html
│   ├── header.php
│   ├── nav.php
│   ├── footer.php
│   └── helpers.php
├── robots.txt
├── sitemap.xml
└── .htaccess
```

Ideal si cPanel lo permite:

```text
/home/usuario/
├── private/
│   ├── mail-config.php
│   └── logs/
└── public_html/
```

### Restricciones

- No dejar claves SMTP en archivos descargables.
- No dejar `.env` público.
- No dejar logs públicos.
- No dejar backups `.zip`, `.sql`, `.bak`, `.old`, `.tar.gz` en `public_html`.
- No dejar PSDs ni material fuente dentro de la web pública.
- No usar permisos `777`.

---

## 11. Requerimientos de seguridad del formulario

El nuevo formulario debe cumplir:

- Método POST.
- Validación HTML básica para UX.
- Validación PHP obligatoria del lado servidor.
- Sanitización de texto.
- Validación real de email.
- Límite de longitud por campo.
- Honeypot oculto.
- CSRF token con sesión PHP.
- Verificación de método `POST`.
- Respuesta segura si se invoca directo.
- Mensajes de error no verbosos.
- Logging interno seguro opcional, fuera de `public_html`.
- Envío con SMTP autenticado preferentemente usando PHPMailer.
- `From` fijo del dominio, por ejemplo `no-reply@ifcsoluciones.cl`.
- `Reply-To` con email validado del usuario.
- No concatenar input sin limpiar en headers.
- No permitir adjuntos salvo que se diseñe validación específica.
- Agregar Cloudflare Turnstile si se requiere protección anti-bot adicional.

---

## 12. `.htaccess` requerido

Generar un `.htaccess` compatible con Apache/cPanel que incluya:

```apache
Options -Indexes

<IfModule mod_rewrite.c>
RewriteEngine On

# Forzar HTTPS, solo si SSL está activo
RewriteCond %{HTTPS} !=on
RewriteRule ^ https://%{HTTP_HOST}%{REQUEST_URI} [L,R=301]

# Bloquear archivos sensibles
RewriteRule (^|/)\.ftpquota$ - [F,L]
RewriteRule (^|/)error_log$ - [F,L]
RewriteRule (^|/)(composer\.(json|lock)|package(-lock)?\.json|\.env|\.git|\.svn) - [F,L]

# Bloquear backups, dumps, temporales y logs
RewriteRule \.(bak|backup|old|orig|save|swp|sql|zip|tar|gz|7z|rar|log|ini|conf|env)$ - [F,L,NC]

# Bloquear material fuente si existiera
RewriteRule ^material/ - [F,L]

# Bloquear mailers legacy si existieran
RewriteRule ^(mail1|mail2|mail3)\.php$ - [F,L]
RewriteRule ^css/accion\.php$ - [F,L]
</IfModule>

<IfModule mod_headers.c>
Header always set X-Content-Type-Options "nosniff"
Header always set X-Frame-Options "SAMEORIGIN"
Header always set Referrer-Policy "strict-origin-when-cross-origin"
Header always set Permissions-Policy "geolocation=(), microphone=(), camera=()"
Header always set Strict-Transport-Security "max-age=31536000; includeSubDomains"
Header always set Content-Security-Policy "default-src 'self'; img-src 'self' data: https:; script-src 'self'; style-src 'self' 'unsafe-inline'; frame-src https://www.google.com https://www.google.cl; object-src 'none'; base-uri 'self'; frame-ancestors 'self'; form-action 'self'"
</IfModule>
```

Importante:

- Probar CSP porque puede bloquear scripts/iframes si se usan servicios externos.
- Activar HSTS solo cuando HTTPS esté confirmado.
- No romper validaciones SSL de `.well-known`.
- Mantener intacta la sección generada por cPanel si existe.

---

## 13. Checklist de saneamiento posterior a ataque

Antes de subir el nuevo sitio o dejarlo productivo:

1. Descargar respaldo completo.
2. Revisar archivos ocultos en `public_html`.
3. Buscar extensiones sospechosas:
   - `.php` en carpetas de imágenes, css o uploads.
   - `.bak`, `.old`, `.zip`, `.sql`, `.tar.gz`, `.rar`.
   - archivos con nombres aleatorios.
   - shells PHP o scripts ofuscados.
4. Revisar carpetas con permisos `777`.
5. Revisar archivos PHP desconocidos.
6. Revisar fechas de modificación extrañas.
7. Revisar `.htaccess` en raíz y subcarpetas.
8. Revisar cron jobs en cPanel.
9. Revisar cuentas FTP creadas.
10. Revisar cuentas de correo sospechosas.
11. Cambiar claves de cPanel, FTP, correos y base de datos si existiera.
12. Activar 2FA si el proveedor lo permite.
13. Confirmar que no existan backups públicos.
14. Confirmar que no quede `error_log` expuesto.
15. Confirmar permisos:
    - carpetas `755`.
    - archivos `644`.
    - configuración privada `600/640` si aplica.
16. Revisar que el sitio no permita listado de directorios.
17. Probar formulario sin permitir abuso.
18. Probar en navegador incógnito y móvil.
19. Ejecutar revisión de malware del hosting si cPanel lo ofrece.
20. Pedir al soporte del hosting revisión de propietario/permisos si hay sospecha.

---

## 14. Entregables que debe generar Codex

Genera el nuevo sitio o una propuesta de implementación con:

1. Estructura final de carpetas.
2. Código completo de las páginas principales.
3. Código completo del formulario seguro.
4. Código de configuración SMTP seguro o instrucciones para ubicarlo fuera de `public_html`.
5. `.htaccess` final.
6. `robots.txt` final.
7. `sitemap.xml` final.
8. CSS responsive moderno.
9. JavaScript mínimo.
10. Checklist de despliegue en cPanel.
11. Checklist de pruebas posterior a despliegue.
12. Lista de archivos legacy que NO deben migrarse.

---

## 15. Criterios de aceptación

El resultado se considera correcto si cumple:

- Funciona en hosting compartido cPanel.
- No requiere Node ni proceso de build obligatorio.
- No deja logs ni backups públicos.
- No usa jQuery 1.6.3 ni librerías IE antiguas.
- No migra `mail1.php`, `mail2.php`, `mail3.php` ni `css/accion.php`.
- No deja PSDs en `public_html`.
- Tiene formulario con validación server-side.
- Tiene honeypot y CSRF token.
- Usa SMTP autenticado o deja claramente preparada la migración a SMTP.
- Tiene `.htaccess` con bloqueo de archivos sensibles.
- Tiene HTTPS forzado si SSL está activo.
- Tiene headers básicos de seguridad.
- Tiene SEO técnico básico correcto.
- Tiene estructura mantenible.
- Tiene diseño responsive.
- Puede subirse por FTP/File Manager de cPanel.
- Incluye instrucciones claras para desplegar.

---

## 16. Solicitud concreta para Codex

Con toda la información anterior, genera una versión nueva y limpia del sitio IFC, compatible con cPanel, corrigiendo los problemas de seguridad, SEO, performance y mantenibilidad detectados en la auditoría del sitio legacy.

Prioriza una solución simple, profesional y robusta. No sobredimensiones. No uses tecnologías que compliquen el despliegue en hosting compartido. El objetivo es entregar un sitio corporativo moderno, seguro, mantenible y fácil de administrar.

Si falta contenido textual o imágenes definitivas, deja placeholders claros y documenta dónde deben reemplazarse.
