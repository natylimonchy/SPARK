<?php session_start(); ?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Evento · SPARK</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="evento.css">
</head>
<body>
 
<!-- ── NAV ──────────────────────────────────────── -->
<nav class="nav" id="nav">
  <a href="home.php" class="nav-logo">
    <img src="recursos/logo.png" alt="SPARK">
  </a>
  <ul class="nav-links">
    <li><a href="home.php">Home</a></li>
    <li><a href="https://www.google.com/maps" target="_blank">Mapa</a></li>
    <li><a href="foro.php">Foro</a></li>
  </ul>
  <div class="nav-actions">
    <?php if (isset($_SESSION['user_id'])): ?>
      <a href="perfil.php" class="nav-btn-ghost">Perfil</a>
      <a href="logout.php" class="nav-btn-pill">Cerrar sesión</a>
    <?php else: ?>
      <a href="login.php" class="nav-btn-pill">Log in / Sign up</a>
    <?php endif; ?>
    <select class="lang-sel">
      <option>Español</option>
      <option>English</option>
      <option>Català</option>
    </select>
  </div>
</nav>
 
<!-- ── HERO ─────────────────────────────────────── -->
<section class="ev-hero">
  <img class="ev-hero__img" src="recursos/popUp.jpg" alt="Foto del evento">
  <div class="ev-hero__overlay"></div>
  <div class="ev-hero__grain"></div>
  <div class="ev-hero__inner">
    <div class="ev-hero__top">
      <span class="ev-cat">Nightlife</span>
      <span class="ev-price">€18</span>
    </div>
    <h1 class="ev-hero__title">NOMBRE DEL EVENTO</h1>
    <div class="ev-hero__meta">
      <span>📅 Vie, 24 oct</span>
      <span>⏰ 23:00 — 06:00</span>
      <span>📍 Paral·lel, Barcelona</span>
    </div>
  </div>
</section>
 
<!-- ── LAYOUT ────────────────────────────────────── -->
<div class="ev-layout">
 
  <!-- COLUMNA PRINCIPAL -->
  <div class="ev-main">
 
    <div class="ev-desc">
      <h2 class="ev-desc__title">Sobre el evento</h2>
      <p class="ev-desc__text">
        Descripción corta del evento para enganchar al usuario. Una noche que no querrás perderte.
      </p>
      <p class="ev-desc__text">
        Aquí va una descripción más larga donde se explica qué se hará, a quién va dirigido
        y qué pueden esperar los asistentes. Barcelona no para — tú tampoco deberías.
      </p>
    </div>
 
    <!-- Botón reserva solo en mobile -->
    <a href="#" class="ev-reserve-btn ev-reserve-btn--mobile">Reservar plaza →</a>
 
  </div>
 
  <!-- SIDEBAR -->
  <aside class="ev-sidebar">
 
    <!-- Reserva -->
    <div class="ev-sidebar__card ev-sidebar__reserve">
      <div class="ev-reserve__price">€18</div>
      <p class="ev-reserve__label">por persona</p>
      <a href="#" class="ev-reserve-btn">Reservar plaza →</a>
      <p class="ev-reserve__note">Sin comisiones ocultas</p>
    </div>
 
    <!-- Organizador -->
    <div class="ev-sidebar__card">
      <div class="ev-org">
        <div class="ev-org__avatar">U</div>
        <div>
          <p class="ev-org__name">usuariospark</p>
          <p class="ev-org__role">Organizador verificado ✓</p>
        </div>
      </div>
      <div class="ev-org__stats">
        <div><strong>10</strong><span>Seguidores</span></div>
        <div><strong>20</strong><span>Eventos</span></div>
      </div>
      <a href="#" class="ev-contact-btn">Contactar</a>
    </div>
 
    <!-- Detalles -->
    <div class="ev-sidebar__card">
      <ul class="ev-details">
        <li><span>Fecha</span><strong>Vie, 24 oct</strong></li>
        <li><span>Horario</span><strong>23:00 — 06:00</strong></li>
        <li><span>Lugar</span><strong>Sala Apolo</strong></li>
        <li><span>Barrio</span><strong>Paral·lel</strong></li>
        <li><span>Precio</span><strong>€18</strong></li>
      </ul>
    </div>
 
  </aside>
</div>
 
<!-- ── FOOTER ────────────────────────────────────── -->
<footer class="footer">
  <div class="footer-inner">
    <a href="home.php" class="footer-logo">SP<span>▲</span>RK</a>
    <p class="footer-tagline">Barcelona, siempre.</p>
    <nav class="footer-nav">
      <a href="home.php">Home</a>
      <a href="foro.php">Foro</a>
      <a href="perfil.php">Perfil</a>
    </nav>
    <p class="footer-copy">© <?= date('Y') ?> SPARK · Todos los derechos reservados</p>
  </div>
</footer>
 
<!-- ── MOBILE NAV ────────────────────────────────── -->
<nav class="mobile-nav">
  <a href="home.php"><span>🏠</span></a>
  <a href="https://www.google.com/maps"><span>📍</span></a>
  <a href="foro.php"><span>💬</span></a>
  <a href="perfil.php"><span>👤</span></a>
</nav>
 
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script>
$(function() {
  $(window).on('scroll', function() {
    $('#nav').toggleClass('nav--scrolled', $(this).scrollTop() > 60);
  });
});
</script>
</body>
</html>