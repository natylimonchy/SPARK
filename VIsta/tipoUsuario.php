<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="tipoUsuario.css">
    <title>Document</title>
</head>

<body>
    <?php
    if(isset($_POST['tipo'])){
        
        $tipo = $_POST ['tipo'];

        if($tipo == "organizador"){
             header("Location: registro.html");
             exit();
        }
    }

    ?>

    <form method="POST">
        <label>Tipo de usuario</label>
    
        <select name="tipo">
            <option value="usuario">Usuario</option>
            <option value="organizador">Organizador</option>
        </select>
    
        <input type="submit" value="Seleccionar">

    </form>

    
</body>

</html>