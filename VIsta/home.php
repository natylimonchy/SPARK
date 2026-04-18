<?php
session_start();
if (!isset($_SESSION['user_email'])) {
    header("Location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SPARK</title>
    <link rel="stylesheet" href="home.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;800;900&display=swap"
        rel="stylesheet">
</head>

<body>

    <header class="topbar">
        <img src="recursos/logo_azul_transparente.png" class="logo-header">


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


        <!-- MENU IDIOMA MOBILE (INSERTADO) -->
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

    <section class="search">
        <input type="search" placeholder="Buscar eventos...">
    </section>

    <div class="layout">
        <div class="logo">
            <img id="mascota" src="recursos/mascota_mirada.png">
        </div>

        <!-- FILTROS -->
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
        </aside>

        <!-- CONTENIDO PRINCIPAL -->
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

    </div>

    <!-- NAVBAR MÓVIL -->
    <nav class="mobile-nav">
        <a href="home.php"><span>🏠</span></a>
        <a href="https://www.google.com/maps"><span>📍</span></a>
        <a href="foro.php"><span>💬</span></a>
        <a href="perfil.php"><span>👤</span></a>
    </nav>

</body>

</html>