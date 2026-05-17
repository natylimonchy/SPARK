<?php
session_start();

$page_title = 'SPARK · Home';
$page_css   = 'home.css';
include 'layout-top.php';
?>



<div class="hero-banner">

  <div class="slider">
    <img src="recursos/banner.png" alt="" class="slide active">
    <img src="recursos/banner2.png" alt="" class="slide">
    <img src="recursos/banner3.png" alt="" class="slide">
  </div>

  <header class="topbar">
    <a href="home.php" class="nav-logo">
    <img src="recursos/logo.png" alt="SPARK">
  </a>
    <nav class="menu">
      <a href="home.php">Home</a>
      <a href="https://www.google.com/maps">Mapa</a>
      <a href="foro.php">Foro</a>
    </nav>
    <div class="actions">
      <?php if (isset($_SESSION['user_id'])): ?>
        <a href="perfil.php" class="login">Perfil</a>
        <a href="logout.php" class="login">Cerrar sesión</a>
      <?php else: ?>
        <a href="login.php" class="login">Log in / Sign up</a>
      <?php endif; ?>
      <select id="español">
        <option>Español</option>
        <option>Ingles</option>
        <option>Catalan</option>
      </select>
    </div>
    <div class="lang-mobile">
      <input type="checkbox" id="toggleLang">
      <label for="toggleLang" class="icon">🌐</label>
      <ul class="menu-idioma">
        <li>English</li>
        <li>Català</li>
        <li>Español</li>
      </ul>
    </div>
  </header>

  

</div>



    <!-- BANNER -->
    

    <!-- <section class="search">
        <input type="search" placeholder="Buscar eventos...">
    </section> -->

    <!-- <div class="layout">
        <div class="logo">...</div>
        <aside class="filters">...</aside>
    </div> -->

    <!-- ESTO va fuera del layout → BIEN -->
    <!-- <section class="section-events" id="eventos">
        ...
    </section> -->

    <!-- FILTROS
        <aside class="filters">
            <h3>Filtros</h3>

            <label for="categoria">Categoría</label>
            <select id="categoria" name="categoria">
                <option value="">Todas</option>
                <option value="deporte">Deporte</option>
                <option value="gastronomico">Gastronómico</option>
                <option value="social">Social</option>
                <option value="aventura">Aventura</option>
                <option value="relax">Relax</option>
            </select>

            <label for="zona">Zona</label>
            <input type="text" id="zona" name="zona" placeholder="Ej: Centro">

            <label for="precio">Precio</label>
            <select id="precio" name="precio">
                <option value="">Cualquiera</option>
                <option value="gratis">Gratis</option>
                <option value="0-10">0€ – 10€</option>
                <option value="10-25">10€ – 25€</option>
                <option value="25+">Más de 25€</option>
            </select>
        </aside> -->
<!--MARQUEE-->
        <div class="marquee-strip">
  <div class="marquee-track">
    <span>Música ✦</span><span>Nightlife ✦</span><span>Rooftop ✦</span><span>Arte ✦</span>
    <span>Pop-up ✦</span><span>Gastronomía ✦</span><span>Deporte ✦</span><span>Social ✦</span>
    <span>Música ✦</span><span>Nightlife ✦</span><span>Rooftop ✦</span><span>Arte ✦</span>
    <span>Pop-up ✦</span><span>Gastronomía ✦</span><span>Deporte ✦</span><span>Social ✦</span>
    <span>Música ✦</span><span>Nightlife ✦</span><span>Rooftop ✦</span><span>Arte ✦</span>
    <span>Pop-up ✦</span><span>Gastronomía ✦</span><span>Deporte ✦</span><span>Social ✦</span>
  </div>
</div>
    <!-- ── EVENTOS DESTACADOS ──────────────────────────── -->
    <section class="section-events" id="eventos">
        <div class="section-header">
            <div>
                <p class="section-label">Esta semana</p>
                <h2 class="section-title">DESTACADOS</h2>
            </div>
            <a href="#todos" class="see-all">Ver todos →</a>
        </div>

        <div class="events-grid">
            <article class="ev-card ev-card--big ev-g1">
                <div class="ev-overlay"></div>
                <div class="ev-body">
                    <div class="ev-meta-top">
                        <span class="ev-cat">Nightlife</span>
                        <span class="ev-price">€18</span>
                    </div>
                    <h3 class="ev-title">Noche Electrónica</h3>
                    <div class="ev-meta-bottom">
                        <span class="ev-venue">📍 Paral·lel</span>
                        <span class="ev-date">Vie, May 10 · 23:00</span>
                    </div>
                    <a href="evento.php" class="ev-btn">Reservar</a>
                </div>
            </article>

            <article class="ev-card ev-g2">
                <div class="ev-overlay"></div>
                <div class="ev-body">
                    <div class="ev-meta-top">
                        <span class="ev-cat">Pop-up</span>
                        <span class="ev-price">€35</span>
                    </div>
                    <h3 class="ev-title">Pop-up Raval</h3>
                    <div class="ev-meta-bottom">
                        <span class="ev-venue">📍 Raval</span>
                        <span class="ev-date">Sáb, May 11 · 13:00</span>
                    </div>
                    <a href="evento.php" class="ev-btn">Reservar</a>
                </div>
            </article>

            <article class="ev-card ev-g3">
                <div class="ev-overlay"></div>
                <div class="ev-body">
                    <div class="ev-meta-top">
                        <span class="ev-cat">Rooftop</span>
                        <span class="ev-price">€22</span>
                    </div>
                    <h3 class="ev-title">Sunset Barceloneta</h3>
                    <div class="ev-meta-bottom">
                        <span class="ev-venue">📍 Barceloneta</span>
                        <span class="ev-date">Sáb, May 11 · 19:30</span>
                    </div>
                    <a href="evento.php" class="ev-btn">Reservar</a>
                </div>
            </article>

            <article class="ev-card ev-g4">
                <div class="ev-overlay"></div>
                <div class="ev-body">
                    <div class="ev-meta-top">
                        <span class="ev-cat">Arte</span>
                        <span class="ev-price free">Gratis</span>
                    </div>
                    <h3 class="ev-title">Galería Nuit</h3>
                    <div class="ev-meta-bottom">
                        <span class="ev-venue">📍 Eixample</span>
                        <span class="ev-date">Dom, May 12 · 19:00</span>
                    </div>
                    <a href="evento.php" class="ev-btn">Reservar</a>
                </div>
            </article>
        </div>
    </section>


   <!-- ── BÚSQUEDA + FILTROS ──────────────────────────── -->
<section class="section-search" id="todos">
  <div class="search-inner">
    <h2 class="search-title">¿QUÉ PLAN TIENES?</h2>
    <div class="search-bar-wrap">
      <input type="search" class="search-input" placeholder="Buscar eventos, barrios, artistas…" id="searchInput">
      <button class="search-btn">→</button>
    </div>
    <div class="filter-chips" id="filterChips">
      <button class="chip active" data-cat="">Todo</button>
      <button class="chip" data-cat="nightlife">Nightlife</button>
      <button class="chip" data-cat="musica">Música</button>
      <button class="chip" data-cat="rooftop">Rooftop</button>
      <button class="chip" data-cat="arte">Arte</button>
      <button class="chip" data-cat="gastronomia">Gastro</button>
      <button class="chip" data-cat="popup">Pop-up</button>
      <button class="chip" data-cat="deporte">Deporte</button>
    </div>
  </div>

  
</section>
    <!-- CONTENIDO PRINCIPAL
        <main class="content">

            <h2>Recomendados</h2>
            <div class="cards recomendados">

                <div class="card">
                    <div class="fav">♡</div>

                    <img src="recursos/icono_imagen.avif" alt="Evento">

                    <div class="card-info">

                        <div class="info-left">
                            <h4>Concierto Indie Night</h4>
                            <div class="rating">★★★★☆</div>
                            <p class="meta">Centro · 12€ · Música</p>
                        </div>

                        <div class="info-right">
                            <a href="evento.php"><button>Ver más</button></a>
                        </div>

                    </div>

                </div>


                <div class="card">
                    <div class="fav">♡</div>

                    <img src="recursos/icono_imagen.avif" alt="Evento">

                    <div class="card-info">

                        <div class="info-left">
                            <h4>Concierto Indie Night</h4>
                            <div class="rating">★★★★☆</div>
                            <p class="meta">Centro · 12€ · Música</p>
                        </div>

                        <div class="info-right">
                            <a href="evento.php"><button>Ver más</button></a>
                        </div>

                    </div>

                </div>

            </div>

            <h2>Eventos por categoría</h2>
            <div class="cards grid">
                <div class="card"></div>
                <div class="card"></div>
                <div class="card"></div>
            </div>
            <div class="cards grid">
                <div class="card"></div>
                <div class="card"></div>
                <div class="card"></div>
            </div>
            <div class="cards grid">
                <div class="card"></div>
                <div class="card"></div>
                <div class="card"></div>
            </div>

        </main>

    </div> -->

   

<!-- ── FOOTER ──────────────────────────────────────── -->
<footer class="footer">
  <div class="footer-inner">
    <img class ="logo"src="recursos/logo.png" alt="SPARK">
    <p class="footer-tagline">Plans, people, memories.</p>
    <nav class="footer-nav">
      <a href="https://www.instagram.com" target="_blank">Instagram</a>
      <a href="https://www.tiktok.com" target="_blank">Tiktok</a>
      <a href="tipoUsuario.php">Organizar</a>
    </nav>
    <p class="footer-copy">© <?= date('Y') ?> SPARK · Todos los derechos reservados</p>
  </div>
</footer>

    <!-- NAVBAR MÓVIL -->
    <nav class="mobile-nav">
        <a href="home.php"><span>🏠</span></a>
        <a href="https://www.google.com/maps"><span>📍</span></a>
        <a href="foro.php"><span>💬</span></a>
        <a href="perfil.php"><span>👤</span></a>
    </nav>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script>
$(function() {
  let current = 0;
  const slides = $('.slide');
  const total = slides.length;

  setInterval(function() {
    slides.eq(current).removeClass('active');
    current = (current + 1) % total;
    slides.eq(current).addClass('active');
  }, 4000); // cambia cada 4 segundos
});
</script>

<?php include 'layout-bottom.php'; ?>