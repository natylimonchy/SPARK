
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
      class="hero-image"
      >
   
    </section>

    <section class="auth">
      <div class="card">
        <h2>Iniciar sesión</h2>
        <!-- FORMULARIO (funcional)-->
       <form action="../controller/UserController.php" method="POST">

          <label for="email">Email</label>
          <input type="email" id="email" name="email" required>

          <label for="password">Contraseña</label>
          <input type="password" id="password" name="password" required>

        <a class="link"href="password.html">¿Olvidaste tu contraseña?</a>
        
        <button type="submit" name="action" value="login">Entrar</button>
        </form>


      <p class="link">¿No tienes cuenta? <a href="tipoUsuario.php">Únete</a></p>
      </div>
    </section>

  </main>
</body>
</html>
