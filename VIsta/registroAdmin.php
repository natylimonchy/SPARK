<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>SPARK · Registro</title>

  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;900&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="registro.css">
</head>

<body>

  <?php
  require_once __DIR__ . "/../Controller1/user.Controler.php";
  if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $nombre = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
   

    $nombreImg = uniqid() . "_" . $_FILES['imagen']['name'];
    $ruta = "uploads/" . $nombreImg;

    move_uploaded_file($_FILES['imagen']['tmp_name'], $ruta);

    $user = new User_Controler();
    $user->register($nombre, $email, $password, $ruta);

    

    header("Location: home.php");
    exit();
  }
  ?>

  <div class="card">

    <form action="" method="POST" enctype="multipart/form-data">
      <h3 id="registro">Registrarse</h3>

      <label for="name">Nombre</label>
      <input type="text" id="name" name="name" required>

      <label for="email">Email</label>
      <input type="email" id="email" name="email" required>

      <label>Foto de perfil</label>
      <input type="file" name="imagen" required>

      <img id="preview" src="" style="display:none; width:120px; margin-top:10px; border-radius:10px;">


      <label for="password">Contraseña</label>
      <input type="password" id="password" name="password" required>

      <label for="password_confir">Confirmar contraseña</label>
      <input type="password" id="password_confir" name="password_confir" required>

      <a href="login.php">Ya tengo cuenta</a>

      <input type="submit" value="Crear cuenta">
    </form>

  </div>

</body>

</html>