<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Cookie consent demo</title>
</head>
<body>

<!-- ══════════════════════════════════════════
     COOKIE CONSENT BANNER
     Incluir en TODAS las páginas antes de </body>
     Requiere: cookies.css + cookies.js
══════════════════════════════════════════ -->
<?php
// Si ya tomó decisión no mostramos el banner
$mostrar_banner = !isset($_COOKIE['spark_cookies']);
?>

<?php if ($mostrar_banner): ?>
<div class="cookie-overlay" id="cookieOverlay"></div>

<div class="cookie-banner" id="cookieBanner" role="dialog" aria-label="Configuración de cookies">

  <div class="cookie-header">
    <span class="cookie-logo">SP<em>▲</em>RK</span>
    <span class="cookie-badge">🍪 Cookies</span>
  </div>

  <h2 class="cookie-title">Tu privacidad, tu elección</h2>
  <p class="cookie-desc">
    Usamos cookies para que SPARK funcione correctamente y para mejorar tu experiencia.
    Puedes aceptarlas todas, solo las esenciales, o personalizar tu elección.
  </p>

  <!-- Tipos de cookies -->
  <div class="cookie-types">

    <div class="cookie-type">
      <div class="cookie-type-info">
        <strong>Esenciales</strong>
        <span>Necesarias para que la web funcione. Sesión, seguridad, preferencias básicas.</span>
      </div>
      <div class="cookie-toggle cookie-toggle--locked" title="Siempre activas">
        <span class="toggle-dot"></span>
      </div>
    </div>

    <div class="cookie-type">
      <div class="cookie-type-info">
        <strong>Analíticas</strong>
        <span>Nos ayudan a entender cómo usas SPARK para mejorar la plataforma.</span>
      </div>
      <label class="cookie-toggle" id="toggleAnalitica">
        <input type="checkbox" id="chkAnalitica" checked>
        <span class="toggle-dot"></span>
      </label>
    </div>

    <div class="cookie-type">
      <div class="cookie-type-info">
        <strong>Marketing</strong>
        <span>Permiten mostrarte eventos y contenido relevante para ti.</span>
      </div>
      <label class="cookie-toggle" id="toggleMarketing">
        <input type="checkbox" id="chkMarketing" checked>
        <span class="toggle-dot"></span>
      </label>
    </div>

  </div>

  <!-- Botones -->
  <div class="cookie-actions">
    <button class="cookie-btn cookie-btn--outline" onclick="cookiesSoloEsenciales()">
      Solo esenciales
    </button>
    <button class="cookie-btn cookie-btn--outline" onclick="cookiesPersonalizar()">
      Personalizar
    </button>
    <button class="cookie-btn cookie-btn--primary" onclick="cookiesAceptarTodas()">
      Aceptar todas
    </button>
  </div>

  <p class="cookie-legal">
    Consulta nuestra <a href="#">Política de cookies</a> y <a href="#">Política de privacidad</a>.
  </p>

</div>
<?php endif; ?>

</body>
</html>
