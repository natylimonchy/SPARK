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

  <div class="card">
    <h2 id="registro-titulo">REGISTRO</h2>

    <?php
    require_once __DIR__ . "/../Controller1/user.Controler.php";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $password_confir = $_POST["password_confir"];
        $usuario = 2;
        $ruta = "";

        if (isset($_FILES['imagen']) && $_FILES['imagen']['error'] == 0) {
            $nombreImg = uniqid() . "_" . $_FILES['imagen']['name'];
            $ruta = "uploads/" . $nombreImg;
            if (!is_dir('uploads')) { mkdir('uploads', 0777, true); }
            move_uploaded_file($_FILES['imagen']['tmp_name'], $ruta);
        }

        if ($password !== $password_confir) {
            echo "<p class='error-msg'>Las contraseñas no coinciden.</p>";
        } else {
            $user_Controler = new User_Controler();
            $resultado = $user_Controler->register($name, $email, $password, $ruta, $usuario);

            if ($resultado == "ok") {
                header("Location: login.php");
                exit();
            } else {
                echo "<p class='error-msg'>Error: " . $resultado . "</p>";
            }
        }
    }
    ?>

    <form method="POST" enctype="multipart/form-data">
      <input type="text" name="name" placeholder="Nombre" required>
      <input type="email" name="email" placeholder="Email" required>
      <input type="file" name="imagen" required>
      <input type="password" name="password" placeholder="Contraseña" required>
      <input type="password" name="password_confir" placeholder="Confirmar" required>
      <button type="submit">Registrar</button>
    </form>
  </div>

</body>
</html>