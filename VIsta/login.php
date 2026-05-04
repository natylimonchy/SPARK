<?php
// UserController.php

session_start();
if (isset($_SESSION['user_id'])) {
    header('Location: home.php');
    exit();
}


require_once __DIR__ . '/../Controller1/user.Controler.php';

$user_Controler = new User_Controler();

$error_mensaje = "";

if (isset($_POST['action']) && $_POST['action'] == 'login') {
  $email = $_POST['email'];
  $password = $_POST['password'];

  $user = $user_Controler->login($email, $password);

  if ($user && is_array($user)) {
    $_SESSION['user_id'] = $user['Nombre_Usuario'];
    $_SESSION['user_email'] = $user['Correo'];
    $_SESSION['user_role'] = $user['id_perfil'];
    header('Location: perfil.php');
    exit();
  } else {
    $error_mensaje = "Correo o contraseña incorrectos.";
  }
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8" />
  <title>SPARK · Iniciar sesión</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;900&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="login.css">

</head>

<body>
  <main class="layout">

    <section class="hero">
      <h1 class="logo">SPARK</h1>
      <img
        src="recursos/Diseño sin título (1).png"
        alt="Spark mascot"
        class="hero-image">

    </section>

    <section class="auth">
      <div class="card">
        <h2>Iniciar sesión</h2>
        <form action="login.php" method="POST">

          <?php if ($error_mensaje): ?>
            <p style="color: red; text-align: center; font-size: 14px; margin-bottom: 15px;">
              <?php echo nl2br(htmlspecialchars($error_mensaje)); ?>
            </p>
          <?php endif; ?>

          <label for="email">Email</label>
          <input type="email" id="email" name="email" required>

          <label for="password">Contraseña</label>
          <input type="password" id="password" name="password" required>

          <a class="link" href="password.php">¿Olvidaste tu contraseña?</a>

          <button type="submit" name="action" value="login">Entrar</button>
        </form>


        <p class="link">¿No tienes cuenta? <a href="tipoUsuario.php">Únete</a></p>
      </div>
    </section>

  </main>
</body>

</html>