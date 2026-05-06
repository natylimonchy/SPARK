<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // cuando se envíe el formulario
    // redirigir a login
    header('Location: login.php');
    exit();

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="password.css">
    <title>Document</title>
</head>
<body>
    <div class="content">
        <h3>Contraseña olvidada</h3>
        <label for="email">Ingresa tu correo electronico:</label><br>
        <form action="password.php" method="POST">
            
            <input type="text" id="email" name="email"><br>
        
        <br><a href="login.php">Volver a iniciar sesión</a><br>
    
        <br>
        
            <input type="hidden" name="action" value="reset_password">
            <input type="submit" value="Enviar">
        </form>
    </div>

</body>
</html>