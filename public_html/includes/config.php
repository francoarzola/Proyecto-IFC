<?php
declare(strict_types=1);

if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}

const SITE_NAME = 'IFC Soluciones';
const SITE_URL = 'https://www.ifcsoluciones.cl';
const CONTACT_PHONE = '+56 9 6340 7332';
const CONTACT_EMAIL = 'contacto@ifcsoluciones.cl'; // Reemplazar con correo real del sitio legacy si corresponde.
const CONTACT_ADDRESS = 'Camilo Ortúzar 4030, Macul, Región Metropolitana, Chile';
const MAIL_TO = 'contacto@ifcsoluciones.cl'; // Destino de formularios.
const MAIL_FROM = 'no-reply@ifcsoluciones.cl';
const MAP_IFRAME = 'https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3326.822695062209!2d-70.59048144537728!3d-33.505989862706464!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x9662d046b233327f%3A0x9469ba4500c2eafc!2sCamilo+Ort%C3%BAzar+4030%2C+Macul%2C+Regi%C3%B3n+Metropolitana!5e0!3m2!1ses!2scl!4v1410632756732';
