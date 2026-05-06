<?php

class UserModel {

    private $conn;

    public function __construct() {
        $this->conn = new mysqli("localhost", "root", "", "spark");
        $this->conn->set_charset("utf8mb4");
    }

    public function register($nombre, $email, $password, $ruta = null, $usuario) {

        if ($ruta) {
            $sql = "INSERT INTO Usuario (Nombre_Usuario, Correo, Contraseña, Imagen, id_perfil)
                    VALUES ('$nombre', '$email', '$password', '$ruta', $usuario)";
        } else {
            $sql = "INSERT INTO Usuario (Nombre_Usuario, Correo, Contraseña, id_perfil)
                    VALUES ('$nombre', '$email', '$password', $usuario)";
        }

        return $this->conn->query($sql);
    }

    public function getLastError() {
        return $this->conn->error;
    }

    public function login($email, $password) {
        $sql = "SELECT * FROM Usuario 
                WHERE Correo='$email' AND Contraseña='$password'";

        $result = $this->conn->query($sql);
        return $result->fetch_assoc();
    }

    public function updateProfile($nombre_usuario_actual, $nombre, $email, $password, $ruta = null) {
    if ($ruta) {
        $sql = "UPDATE Usuario 
                SET Nombre_Usuario='$nombre', Correo='$email', Contraseña='$password', Imagen='$ruta' 
                WHERE Nombre_Usuario='$nombre_usuario_actual'";
    } else {
        $sql = "UPDATE Usuario 
                SET Nombre_Usuario='$nombre', Correo='$email', Contraseña='$password' 
                WHERE Nombre_Usuario='$nombre_usuario_actual'";
    }
    return $this->conn->query($sql);
   
}
}
?>