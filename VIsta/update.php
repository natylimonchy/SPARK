<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}

require_once __DIR__ . '/../Controller1/user.Controler.php';
$user_Controler = new User_Controler();
$error = "";

if (isset($_POST['action']) && $_POST['action'] == 'update') {
    $ruta = null;

    if ($_SESSION['user_role'] == 2 && isset($_FILES['imagen']) && $_FILES['imagen']['error'] == 0) {
        $destino = 'recursos/' . basename($_FILES['imagen']['name']);
        move_uploaded_file($_FILES['imagen']['tmp_name'], $destino);
        $ruta = $destino;
    }

    $resultado = $user_Controler->updateProfile(
        $_POST['nombre'],
        $_POST['email'],
        $_POST['password'],
        $ruta
    );

    if ($resultado == "ok") {
        header('Location: perfil.php');
        exit();
    } else {
        $error = match($resultado) {
            "email_invalido"            => "El email no es válido.",
            "password_corta"            => "La contraseña debe tener al menos 4 caracteres.",
            "usuario_existe"            => "Ese nombre de usuario ya existe.",
            "correo_existe"             => "Ese correo ya está en uso.",
            "usuario_o_email_duplicado" => "El usuario o correo ya existen.",
            default                     => "Error al actualizar."
        };
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Editar perfil</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="perfil.css">
</head>
<body>

  <header class="topbar">
    <div class="logo">SPARK</div>
    <nav class="menu">
      <a href="home.php">Home</a>
      <a href="https://www.google.com/maps">Mapa</a>
      <a href="foro.php">Foro</a>
    </nav>
    <div class="actions">
      <a href="logout.php" class="login">Cerrar sesión</a>
    </div>
    <div>
        <a href="eliminar.php" class="delete">Eliminar cuenta</a>
    </div>
  </header>

  <div class="layout">
    <div class="left">
      <section class="profile">
        <h2>Editar perfil</h2>

        <?php if ($error): ?>
          <p style="color:red;"><?php echo $error; ?></p>
        <?php endif; ?>

        <form action="update.php" method="POST" enctype="multipart/form-data">

          <label>Nombre de usuario</label>
          <input type="text" name="nombre" value="<?php echo htmlspecialchars($_SESSION['user_nombre']); ?>" required>

          <label>Email</label>
          <input type="email" name="email" value="<?php echo htmlspecialchars($_SESSION['user_email']); ?>" required>

          <label>Contraseña</label>
          <input type="password" name="password" placeholder="Nueva contraseña" required>

          <?php if ($_SESSION['user_role'] == 2): ?>
          <label>Imagen de perfil</label>
          <input type="file" name="imagen" accept="image/*">
          <?php endif; ?>

          <div style="display:flex; gap:1rem; margin-top:1rem;">
            <a href="perfil.php">Cancelar</a>
            <button type="submit" name="action" value="update" href="perfil.php">Guardar cambios</button>
          </div>

        </form>
      </section>
    </div>
  </div>

</body>
</html>