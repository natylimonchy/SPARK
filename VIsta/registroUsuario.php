<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
     <?php
  if ($_SERVER["REQUEST_METHOD"] == "POST") {


    $conn = new mysqli("localhost", "root", "", "tu_base_datos");

    if ($conn->connect_error) {
      die("Error de conexión");
    }

    $nombre = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $nombreImg = uniqid() . "_" . $_FILES['imagen']['name'];
    $ruta = "uploads/" . $nombreImg;

    move_uploaded_file($_FILES['imagen']['tmp_name'], $ruta);

    $sql = "INSERT INTO usuarios (nombre, email, imagen)
    VALUES ('$nombre', '$email', '$ruta', '$password')";

    $conn->query($sql);


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