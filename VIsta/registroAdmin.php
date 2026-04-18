<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>SPARK · Registro</title>

  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;900&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="/SPARK/Vista/registro.css">
</head>

<body>

  <?php
  require_once __DIR__ . "/../Controller1/user.Controler.php";
  if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = $_POST['name']; 
    $email = $_POST['email'];
    $password = $_POST['password'];
    $password_confir = $_POST["password_confir"];
    $usuario = 2; // Rol por defecto
    $ruta = "";   // Inicializamos la variable

    // 2. Manejo de la imagen (Descomentado para que funcione)
    if (isset($_FILES['imagen']) && $_FILES['imagen']['error'] == 0) {
        $nombreImg = uniqid() . "_" . $_FILES['imagen']['name'];
        $ruta = "uploads/" . $nombreImg;
        
        // Crear carpeta si no existe
        if (!is_dir('uploads')) {
            mkdir('uploads', 0777, true);
        }
        move_uploaded_file($_FILES['imagen']['tmp_name'], $ruta);
    }

    if ($password !== $password_confir) {
    echo "Las contraseñas no coinciden.";
  } else {
    $user_Controler = new User_Controler();
    if ($user_Controler->register($name, $email, $password, $ruta, $usuario)) {
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