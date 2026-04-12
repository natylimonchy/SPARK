<?php

class User_Controler{

    private $conn;
    public function __construct(){
        $this->conn = new mysqli("localhost", "root", "", "spark");
        if ($this->conn->connect_error) {
            die("Error de conexión: " . $this->conn->connect_error);
        }
        $this->conn->set_charset("utf8mb4");
    }
   public function login($email, $password){
        $sql = "SELECT * FROM Usuario WHERE Correo = '$email' AND Contraseña = '$password'";
        $result = $this->conn->query($sql);
        if ($result->num_rows > 0) {
            return $result->fetch_assoc();
        } else {
            return false;
        }

    }

    function logout(){
        session_start();
        session_unset();
        session_destroy();
        header("Location: home.php");
        exit();


    }
    function register($nombre, $email, $password, $ruta = null, $usuario ){
     if ($ruta) {
    $sql = "INSERT INTO Usuario (Nombre_Usuario, Correo, Contraseña, Imagen, id_perfil)
            VALUES ('$nombre', '$email', '$password', '$ruta', $usuario)";
  } else {
    $sql = "INSERT INTO Usuario (Nombre_Usuario, Correo, Contraseña, id_perfil)
            VALUES ('$nombre', '$email', '$password', $usuario)";
  }

  return $this->conn->query($sql);
 
    
    }
}

?> 




