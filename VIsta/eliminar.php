<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}

require_once __DIR__ . "/../Controller1/user.Controler.php";
$user_Controler = new User_Controler();

if (isset($_POST['confirmar']) && $_POST['confirmar'] == 'si') {
    $resultado = $user_Controler->deleteProfile($_SESSION['user_email']);

    if ($resultado == "ok") {
        session_destroy();
        header('Location: login.php');
        exit();
    } else {
        $error = "Error al eliminar la cuenta.";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Eliminar cuenta</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="perfil.css">
</head>
<body>

  <header class="topbar">
    <div class="logo">SPARK</div>
    <nav class="menu">
      <a href="home.php">Home</a>
      <a href="https://www.google.com/maps">Mapa</a>
      <a href="foro.php">Foro</a>
    </nav>
    <div class="actions">
      <a href="logout.php" class="login">Cerrar sesión</a>
    </div>
  </header>

  <div class="layout">
    <div class="left">
      <section class="profile">
        <h2>¿Eliminar cuenta?</h2>
        <p>Esta acción es permanente y no se puede deshacer.</p>

        <?php if (isset($error)): ?>
          <p style="color:red;"><?php echo $error; ?></p>
        <?php endif; ?>

        <form action="eliminar.php" method="POST">
          <div style="display:flex; gap:1rem; margin-top:1rem;">
            <a href="perfil.php">Cancelar</a>
            <button type="submit" name="confirmar" value="si">Sí, eliminar mi cuenta</button>
          </div>
        </form>

      </section>
    </div>
  </div>

</body>
</html>