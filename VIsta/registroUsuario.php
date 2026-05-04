<?php
session_start();
require_once __DIR__ . "/../Controller1/user.Controler.php";
$mensaje = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $password_confir = $_POST["password_confir"];
    $usuario = 1;

    if ($password !== $password_confir) {
        $mensaje = "Las contraseñas no coinciden.";
    } else {
        $user_Controler = new User_Controler();
        $resultado = $user_Controler->register($name, $email, $password, $usuario, null);

        if ($resultado == "ok") {
          

            
            $_SESSION['user_email'] = $email; 
            $_SESSION['user_name'] = $name;   
            $_SESSION['user_id'] = $name; 

            
            header("Location: home.php");
            exit();
        }
        // Mapeo de errores
        if ($resultado == "usuario_existe") $mensaje = "Ese nombre de usuario ya existe";
        elseif ($resultado == "correo_existe") $mensaje = "Ese correo ya está registrado";
        elseif ($resultado == "campos_vacios") $mensaje = "Completa todos los campos";
        elseif ($resultado == "email_invalido") $mensaje = "Email inválido";
        elseif ($resultado == "password_corta") $mensaje = "La contraseña debe tener al menos 4 caracteres";
        elseif ($resultado == "error_base_datos") $mensaje = "Error en la base de datos, intenta más tarde";
        elseif ($resultado == "error") $mensaje = "Error desconocido en el registro";
        else $mensaje = "Error al registrar";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Registro Usuario</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;900&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="/SPARK/Vista/registro.css">
</head>
<body>

  <div class="card">
    <h2 id="registro-titulo">REGISTRO</h2>

    <?php if ($mensaje): ?>
        <p class="error-msg"><?php echo htmlspecialchars($mensaje); ?></p>
    <?php endif; ?>

    <form method="POST">
      <input type="text" name="name" placeholder="Nombre" required>
      <input type="email" name="email" placeholder="Email" required>
      <input type="password" name="password" placeholder="Contraseña" required>
      <input type="password" name="password_confir" placeholder="Confirmar" required>
      <button type="submit">Registrar</button>
    </form>
  </div>

</body>
</html>