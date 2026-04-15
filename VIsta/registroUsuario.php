<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
 
  <title>Document</title>
</head>

<body>
  <?php
  require_once __DIR__ . "/../Controller1/user.Controler.php";
  if ($_SERVER["REQUEST_METHOD"] == "POST") {


  $name = $_POST["name"];
  $email = $_POST["email"]; 
  $password = $_POST["password"];
  $password_confir = $_POST["password_confir"];
  $usuario = 1;

  if ($password !== $password_confir) {
    echo "Las contraseñas no coinciden.";
  } else {
    $user_Controler = new User_Controler();
    if ($user_Controler->register($name, $email, $password, null,$usuario)) {
      echo "Registro exitoso.";
      header("Location: login.php");
      exit();

    } else {
      echo "Error al registrar el usuario.";
      header("Location: login.php");
        exit();
    }
  }
  }
  ?>

  <div class="card">

    <form action="" method="POST" enctype="multipart/form-data">
      <h3 id="registro">Registrarse</h3>

      <label for="name">Nombre</label>
      <input type="text" id="name" name="name" required>

      <label for="email">Email</label>
      <input type="email" id="email" name="email" required>

    


      <label for="password">Contraseña</label>
      <input type="password" id="password" name="password" required>

      <label for="password_confir">Confirmar contraseña</label>
      <input type="password" id="password_confir" name="password_confir" required>

      <a href="login.php">Ya tengo cuenta</a>

      <input type="submit" value="Crear cuenta" >
    </form>

  </div>
</body>

</html>