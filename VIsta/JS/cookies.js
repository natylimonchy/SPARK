/* ═══════════════════════════════════════════
   SPARK · cookies.js
   Lógica del banner de consentimiento
═══════════════════════════════════════════ */

/**
 * Guarda una cookie en el navegador
 * @param {string} nombre
 * @param {string} valor
 * @param {number} dias
 */
function setCookie(nombre, valor, dias) {
  const fecha = new Date();
  fecha.setTime(fecha.getTime() + dias * 24 * 60 * 60 * 1000);
  document.cookie = `${nombre}=${valor};expires=${fecha.toUTCString()};path=/;SameSite=Lax`;
}

/**
 * Cierra el banner con animación
 */
function cerrarBanner() {
  const banner  = document.getElementById('cookieBanner');
  const overlay = document.getElementById('cookieOverlay');

  if (banner) {
    banner.style.animation  = 'slideDown .3s ease forwards';
  }
  if (overlay) {
    overlay.style.animation = 'fadeOut .3s ease forwards';
  }

  setTimeout(() => {
    banner?.remove();
    overlay?.remove();
  }, 300);
}

/**
 * ACEPTAR TODAS
 */
function cookiesAceptarTodas() {
  setCookie('spark_cookies',    'todas',    365);
  setCookie('spark_analitica',  'true',     365);
  setCookie('spark_marketing',  'true',     365);
  cerrarBanner();
}

/**
 * SOLO ESENCIALES
 */
function cookiesSoloEsenciales() {
  setCookie('spark_cookies',    'esenciales', 365);
  setCookie('spark_analitica',  'false',      365);
  setCookie('spark_marketing',  'false',      365);
  cerrarBanner();
}

/**
 * GUARDAR PERSONALIZACIÓN
 * Lee el estado de los toggles y guarda según elección
 */
function cookiesPersonalizar() {
  const analitica = document.getElementById('chkAnalitica')?.checked ?? false;
  const marketing = document.getElementById('chkMarketing')?.checked ?? false;

  setCookie('spark_cookies',   'personalizado', 365);
  setCookie('spark_analitica', analitica ? 'true' : 'false', 365);
  setCookie('spark_marketing', marketing ? 'true' : 'false', 365);
  cerrarBanner();
}

/* ── Animaciones de salida (añadidas dinámicamente) ── */
const style = document.createElement('style');
style.textContent = `
  @keyframes slideDown {
    from { opacity: 1; transform: translateX(-50%) translateY(0); }
    to   { opacity: 0; transform: translateX(-50%) translateY(40px); }
  }
  @keyframes fadeOut {
    from { opacity: 1; }
    to   { opacity: 0; }
  }
`;
document.head.appendChild(style);
