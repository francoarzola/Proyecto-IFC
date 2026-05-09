# Copia de imágenes legacy (evitar binarios en Git)

Para evitar el error **"Los archivos binarios no son compatibles"** en PRs, este repositorio no incluye imágenes binarias dentro de `public_html/assets/img/`.

## Copiar desde el proyecto legacy local

Desde la raíz del proyecto, ejecutar:

```bash
mkdir -p public_html/assets/img
cp images/logo.png public_html/assets/img/
cp images/icono.ico public_html/assets/img/
cp images/fondoweb.jpg public_html/assets/img/
cp images/{mineria1.jpg,quienes.jpg,tecnologia.png,tecnologia1.png,tecnologia2.png,tecnologia3.png,tecnologia4.png,brigada.jpg,brigada2.jpg,fototunel2.jpg,hidroelectricas.jpg,electrico.jpg,explor.jpg,codelcotne.jpg,obrasv.jpg} public_html/assets/img/
cp clientes/{codelco1.png,codelco2.png,codelco3.png,codelco4.jpg,codelco5.jpg,codelco6.jpg,schneider.png,cementation.png,Mas-Errazuriz.jpg} public_html/assets/img/
```

> No copiar `productos/`, `material/`, `mail1.php`, `mail2.php`, `mail3.php`, `error_log`, `.ftpquota`, backups ni archivos sospechosos.

## Checklist rápido

- Verificar que `public_html/assets/img/logo.png` exista.
- Verificar que el hero cargue `public_html/assets/img/fondoweb.jpg`.
- Verificar que sección "Confianza" renderice logos/imágenes.
