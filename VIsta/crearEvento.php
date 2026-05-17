
<?php
session_start();

// Solo organizadores
if (!isset($_SESSION['user_id']) || $_SESSION['user_role'] != 2) {
    header('Location: home.php');
    exit();
}

require_once __DIR__ . '/../Controller1/eventController.php';
$eventController = new EventController();

$error   = "";
$success = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre      = trim($_POST['nombre']);
    $descripcion = trim($_POST['descripcion']);
    $fecha       = $_POST['fecha_evento'];
    $ubicacion   = trim($_POST['ubicacion']);

    // TODO: cuando tu compañero implemente register() en EventController
    // descomentar esto:
    // $resultado = $eventController->register($nombre, $descripcion, $fecha, $ubicacion);
    // if ($resultado === 'ok') {
    //     header('Location: perfil.php');
    //     exit();
    // } else {
    //     $error = 'Error al crear el evento.';
    // }

    $success = "Funcionalidad pendiente — el método register() está en desarrollo.";
}

$page_title = 'SPARK · Crear evento';
$page_css   = 'editarEvento.css';
include 'layout-top.php';
?>

<header class="topbar">
  <a href="home.php" class="nav-logo">
    <img src="recursos/logo.png" alt="SPARK">
  </a>
  <nav class="menu">
    <a href="home.php">Home</a>
    <a href="https://www.google.com/maps" target="_blank">Mapa</a>
    <a href="foro.php">Foro</a>
  </nav>
  <div class="actions">
    <a href="perfil.php" class="login">Perfil</a>
    <a href="logout.php" class="login">Cerrar sesión</a>
  </div>
</header>

<div class="update-layout">
  <div class="edit-card">
    <div class="edit-card-header">
      <div>
        <p class="edit-eyebrow">Organizador</p>
        <h2 class="edit-title">Crear evento</h2>
      </div>
    </div>

    <?php if ($error): ?>
      <div class="form-error"><?= htmlspecialchars($error) ?></div>
    <?php endif; ?>

    <?php if ($success): ?>
      <div class="form-success"><?= htmlspecialchars($success) ?></div>
    <?php endif; ?>

    <form method="POST">
      <div class="field">
        <label for="nombre">Nombre del evento</label>
        <input type="text" id="nombre" name="nombre" placeholder="Ej: Noche Electrónica" required>
      </div>

      <div class="field">
        <label for="descripcion">Descripción</label>
        <textarea id="descripcion" name="descripcion" rows="4"
                  placeholder="Describe tu evento..." required></textarea>
      </div>

      <div class="field-row">
        <div class="field">
          <label for="fecha_evento">Fecha</label>
          <input type="date" id="fecha_evento" name="fecha_evento" required>
        </div>
        <div class="field">
          <label for="ubicacion">Ubicación</label>
          <input type="text" id="ubicacion" name="ubicacion"
                 placeholder="Ej: Sala Apolo, Barcelona" required>
        </div>
      </div>

      <div class="form-actions">
        <a href="perfil.php" class="btn-cancel">Cancelar</a>
        <button type="submit" class="btn-save">Crear evento →</button>
      </div>
    </form>

  </div>
</div>

<?php include 'layout-bottom.php'; ?>