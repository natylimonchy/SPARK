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
}
?>