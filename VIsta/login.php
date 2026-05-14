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
    $_SESSION['user_nombre'] = $user['Nombre_Usuario'];
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
  
<div class="auth-layout">

  <!-- LADO IZQUIERDO — hero oscuro -->
  <div class="auth-hero">
  <div class="hero-bg"></div>

  

  <img class="hero-logo" src="recursos/logo.png" alt="SPARK">

  <div class="hero-grain"></div>

  <div class="hero-content">
    

  </div>
</div>

  <!-- LADO DERECHO — formulario -->
  <div class="auth-form-wrap">
    <div class="auth-card">

      <p class="auth-eyebrow">Tu cuenta</p>
      <h2 class="auth-title">Iniciar sesión</h2>



      <form method="POST" action="login.php">
        <div class="field">
          <label for="email">Email</label>
          <input type="email" id="email" name="email" placeholder="tu@email.com" required>
        </div>

        <div class="field">
          <label for="password">Contraseña</label>
          <input type="password" id="password" name="password" placeholder="••••••••" required>
        </div>

        <a class="forgot-link" href="password.php">¿Olvidaste tu contraseña?</a>

        <button type="submit" name="action" value="login" class="auth-btn">Entrar →</button>
      </form>

      <p class="auth-footer-text">
        ¿No tienes cuenta? <a href="tipoUsuario.php">Únete a SPARK</a>
      </p>

    </div>
  </div>

</div>
</body>

</html>