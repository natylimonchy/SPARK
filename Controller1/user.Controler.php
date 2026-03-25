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

    }

    function logout(){

    }
    function register($nombre, $email, $password, $ruta = null){
     if ($ruta) {
    $sql = "INSERT INTO Usuario (Nombre_Usuario, Correo, Contraseña, Imagen)
            VALUES ('$nombre', '$email', '$password', '$ruta')";
  } else {
    $sql = "INSERT INTO Usuario (Nombre_Usuario, Correo, Contraseña)
            VALUES ('$nombre', '$email', '$password')";
  }

  return $this->conn->query($sql);
 
    
    }
}

?> 




