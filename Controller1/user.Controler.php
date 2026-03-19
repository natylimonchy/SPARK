<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

<?php

class User_Controler{

    private $conn;
    public function __construct(){
        // Datos de conexión
$host = "localhost";
$usuario = "root";
$password = "";
$base_datos = "spark";

// Crear conexión
$conexion = new mysqli($host, $usuario, $password, $base_datos);

// Verificar conexión
if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

echo "Conexión exitosa";

// Establecer charset UTF-8
$conexion->set_charset("utf8mb4");

// Cerrar conexión
$conexion->close();
    }
   public function login($email, $password){

    }

    function logout(){

    }
    function register(){

    }
}

?> 


</body>
</html>