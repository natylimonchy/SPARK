<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Registro Usuario</title>
</head>

<body>

<?php
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
        $resultado = $user_Controler->register($name, $email, $password, null, $usuario);

        if ($resultado == "ok") {
            header("Location: login.php");
            exit();
        }

        if ($resultado == "usuario_existe") {
            $mensaje = "Ese nombre de usuario ya existe";
        }

        if ($resultado == "correo_existe") {
            $mensaje = "Ese correo ya está registrado";
        }

        if ($resultado == "campos_vacios") {
            $mensaje = "Completa todos los campos";
        }

        if ($resultado == "email_invalido") {
            $mensaje = "Email inválido";
        }

        if ($resultado == "password_corta") {
            $mensaje = "La contraseña debe tener al menos 4 caracteres";
        }

        if ($resultado == "error") {
            $mensaje = "Error al registrar";
        }
    }
}
?>

<?php if ($mensaje): ?>
    <p style="color:red;"><?php echo $mensaje; ?></p>
<?php endif; ?>

<form method="POST">
    <input type="text" name="name" placeholder="Nombre" required>
    <input type="email" name="email" placeholder="Email" required>
    <input type="password" name="password" placeholder="Contraseña" required>
    <input type="password" name="password_confir" placeholder="Confirmar" required>
    <button type="submit">Registrar</button>
</form>

</body>
</html>