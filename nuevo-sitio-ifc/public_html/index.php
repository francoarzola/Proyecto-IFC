<?php $title='IFC Iluminación Minera | Inicio';$description='Landing corporativa IFC Soluciones para minería e industria.';$canonical='index.php';require __DIR__.'/includes/header.php'; ?>
<section class="hero"><h1>IFC Soluciones para minería e industria</h1><p>Presentación corporativa, tecnología aplicada y soporte comercial para continuidad operacional.</p></section>
<section class="slider"><?php foreach(['slider-img1.jpg','slider-img2.png','slider-img3.png'] as $s): ?><img src="/assets/img/slider/<?=$s?>" alt="Operación minera e industrial" width="360" height="220" loading="lazy"><?php endforeach; ?></section>
<section class="cards"><a href="/quienes-somos.php">Trayectoria y enfoque</a><a href="/tecnologia.php">Tecnología aplicada</a><a href="/clientes.php">Clientes corporativos</a><a href="/contacto.php">Contacto comercial</a></section>
<?php require __DIR__.'/includes/footer.php'; ?>
