<?php
session_start();
  if (!isset($_SESSION['user_id'])) {
    if($_SESSION['user_role'] != 1){
      header('Location: home.php');
      exit();
    }
  header('Location: login.php');
  exit();
}
    require_once __DIR__ . "/../Controller1/user.Controler.php";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $name = $_POST['name'];
        $descripcion = $_POST['descripcion'];
        $fecha_evento = $_POST['fecha_evento'];
        $ubicacion = $_POST["ubicacion"];
        
    }

        
           
    
    ?>
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
    <h2 id="registro-titulo">Registrar evento</h2>


    <form method="POST" enctype="multipart/form-data">
      <input type="text" name="name" placeholder="Nombre" required>
      <input type="email" name="email" placeholder="Descripcion" required>
      <input type="file" name="imagen" required>
      <input type="password" name="password" placeholder="Fecha del evento" required>
      <input type="password" name="password_confir" placeholder="Ubicacion" required>
      <button type="submit">Registrar</button>
    </form>
  </div>

</body>
</html>