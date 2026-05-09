<?php require_once __DIR__.'/includes/header.php'; ?>
<?php include __DIR__.'/includes/nav.php'; ?>
<main>
<section id="inicio" class="hero text-white d-flex align-items-center">
  <div class="hero-overlay"></div>
  <div class="container hero-content py-5 position-relative">
    <div class="row align-items-center g-4">
      <div class="col-lg-7">
        <p class="eyebrow mb-2">Minería · Industria · Tecnología</p>
        <h1>Soluciones corporativas confiables para continuidad operacional</h1>
        <p class="lead">En IFC Soluciones apoyamos operaciones mineras, industriales y empresariales con respuesta oportuna, enfoque técnico y abastecimiento eficiente.</p>
        <div class="d-flex flex-wrap gap-2 mt-4">
          <a href="#contacto" class="btn btn-accent btn-lg px-4">Solicitar contacto</a>
          <a href="#soluciones" class="btn btn-outline-light btn-lg px-4">Ver soluciones</a>
        </div>
        <div class="trust-pills mt-4">
          <span>Minería</span><span>Industria</span><span>Tecnología</span><span>Abastecimiento</span>
        </div>
      </div>
      <div class="col-lg-5 d-none d-lg-block">
        <div class="hero-side-card">
          <img src="assets/img/mineria1.jpg" alt="Operación minera e industrial" class="img-fluid rounded-3" loading="eager">
        </div>
      </div>
    </div>
  </div>
</section>

<section id="quienes" class="py-5 section-pad"><div class="container"><h2>Quiénes somos</h2><p>IFC Soluciones es una empresa orientada a entregar soluciones para clientes del sector minero, industrial y corporativo. Trabajamos con enfoque técnico y comercial, priorizando confiabilidad, cumplimiento y una relación de largo plazo.</p><div class="row g-4 mt-1"><div class="col-md-6"><div class="card h-100 modern-card"><div class="card-body"><h3 class="h5">Misión</h3><p>Entregar soluciones seguras, confiables y oportunas que respondan a requerimientos operacionales reales de nuestros clientes.</p></div></div></div><div class="col-md-6"><div class="card h-100 modern-card"><div class="card-body"><h3 class="h5">Visión</h3><p>Consolidarnos como proveedor de confianza para empresas mineras, industriales y corporativas que requieren continuidad operacional y soporte permanente.</p></div></div></div></div></div></section>

<section id="soluciones" class="py-5 bg-light section-pad"><div class="container"><h2>Soluciones y servicios</h2><div class="row g-3 mt-1"><div class="col-md-4"><div class="card h-100 modern-card"><div class="card-body"><div class="icon-badge">⚙️</div><h3 class="h6">Minería e industria</h3><p>Atención de requerimientos técnicos y operacionales para faenas, plantas y áreas de soporte.</p></div></div></div><div class="col-md-4"><div class="card h-100 modern-card"><div class="card-body"><div class="icon-badge">🛠️</div><h3 class="h6">Equipamiento y soporte</h3><p>Abastecimiento y soporte tecnológico orientado a continuidad y eficiencia operacional.</p></div></div></div><div class="col-md-4"><div class="card h-100 modern-card"><div class="card-body"><div class="icon-badge">📈</div><h3 class="h6">Atención comercial</h3><p>Asesoría y respuesta ágil para requerimientos corporativos, compras y planificación.</p></div></div></div></div></div></section>

<section id="tecnologia" class="py-5 section-pad"><div class="container"><h2>Tecnología y enfoque técnico</h2><p>Integramos soluciones técnicas con enfoque preventivo y operativo, adaptándonos a los estándares de seguridad, tiempos de respuesta y exigencias del cliente.</p></div></section>

<section id="confianza" class="py-5 bg-light section-pad"><div class="container"><h2>Confianza y experiencia</h2><p>Participamos en proyectos y requerimientos que demandan coordinación, trazabilidad y cumplimiento técnico-comercial.</p><div class="row g-3 mt-1"><?php foreach(['codelco1.png','codelco2.png','codelco3.png','codelco4.jpg','codelco5.jpg','codelco6.jpg','schneider.png','cementation.png'] as $img): ?><div class="col-6 col-md-3"><img src="assets/img/<?= e($img) ?>" class="img-fluid trust" alt="Referencia visual de experiencia IFC" loading="lazy"></div><?php endforeach; ?></div></div></section>

<section id="contacto" class="py-5 section-pad"><div class="container"><h2>Contacto</h2><?php if($m=flash('ok')): ?><div class="alert alert-success"><?=e($m)?></div><?php endif; ?><?php if($e=flash('error')): ?><div class="alert alert-danger"><?=e($e)?></div><?php endif; ?><div class="row g-4"><div class="col-lg-6"><form method="post" action="procesar-contacto.php" novalidate><input type="hidden" name="csrf_token" value="<?= e(csrf_token()) ?>"><input type="text" name="website" class="d-none" tabindex="-1" autocomplete="off"><div class="mb-3"><label class="form-label">Nombre</label><input name="nombre" required maxlength="80" class="form-control" value="<?= old('nombre') ?>"></div><div class="mb-3"><label class="form-label">Empresa</label><input name="empresa" required maxlength="120" class="form-control" value="<?= old('empresa') ?>"></div><div class="mb-3"><label class="form-label">RUT Empresa (opcional)</label><input name="rut" maxlength="20" class="form-control" value="<?= old('rut') ?>"></div><div class="mb-3"><label class="form-label">Correo</label><input type="email" name="correo" required maxlength="120" class="form-control" value="<?= old('correo') ?>"></div><div class="mb-3"><label class="form-label">Teléfono</label><input name="telefono" required maxlength="30" class="form-control" value="<?= old('telefono') ?>"></div><div class="mb-3"><label class="form-label">Mensaje</label><textarea name="mensaje" required maxlength="1500" rows="5" class="form-control"><?= old('mensaje') ?></textarea></div><button class="btn btn-primary">Enviar consulta</button><p class="small mt-2">Este formulario está preparado para integrar Cloudflare Turnstile en caso de aumento de spam.</p></form></div><div class="col-lg-6"><div class="contact-panel"><p><strong>Teléfono:</strong> <?= e(CONTACT_PHONE) ?><br><strong>Email:</strong> <?= e(CONTACT_EMAIL) ?><br><strong>Dirección:</strong> <?= e(CONTACT_ADDRESS) ?></p><div class="ratio ratio-4x3"><iframe src="<?= e(MAP_IFRAME) ?>" style="border:0" loading="lazy" referrerpolicy="no-referrer-when-downgrade" allowfullscreen title="Ubicación IFC Soluciones"></iframe></div></div></div></div></div></section>
</main>
<?php include __DIR__.'/includes/footer.php'; ?>
