<?php

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

class User_Controler{

    private $conn;

    public function __construct(){
        $this->conn = new mysqli("localhost", "root", "", "spark");
        $this->conn->set_charset("utf8mb4");
    }

    function register($nombre, $email, $password, $ruta = null, $usuario){
        try {

            if ($ruta) {
                $sql = "INSERT INTO Usuario (Nombre_Usuario, Correo, Contraseña, Imagen, id_perfil)
                        VALUES ('$nombre', '$email', '$password', '$ruta', $usuario)";
            } else {
                $sql = "INSERT INTO Usuario (Nombre_Usuario, Correo, Contraseña, id_perfil)
                        VALUES ('$nombre', '$email', '$password', $usuario)";
            }

            $this->conn->query($sql);

            return "ok";

        } catch (mysqli_sql_exception $e) {

            if (str_contains($e->getMessage(), 'PRIMARY')) {
                return "usuario_existe";
            }

            if (str_contains($e->getMessage(), 'Correo')) {
                return "correo_existe";
            }

            return "error";
        }
    }
}
?>