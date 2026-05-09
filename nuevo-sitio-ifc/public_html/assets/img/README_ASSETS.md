# Assets no binarios
Este branch elimina binarios para evitar el error "Los archivos binarios no son compatibles" al actualizar.

Copiar manualmente desde el sitio legacy local:
- `images/logo.png` -> `assets/img/logo/logo.png`
- `images/icono.ico` -> `assets/img/logo/icono.ico`
- `images/quienes.jpg` -> `assets/img/institucional/quienes.jpg`
- `images/tecnologia*.png` -> `assets/img/institucional/`
- `images/slider-img1.jpg`, `images/slider-img1.png`, `images/slider-img2.png`, `images/slider-img3.png` -> `assets/img/slider/`
- `clientes/*` -> `assets/img/clientes/`

Si faltan imágenes, las páginas seguirán operativas pero sin render de esos recursos.
