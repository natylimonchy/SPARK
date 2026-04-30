<?php

class UserModel {

    private $conn;

    public function __construct() {
        try {
            $this->conn = new PDO("mysql:host=localhost;dbname=spark", "root", "");
            //code...
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            //throw $th;
            echo "Error" . $e->getMessage();
        }
    }

    public function register($nombre, $email, $password,  $usuario ,$ruta = null) {

        if ($ruta) {
            $sql = "INSERT INTO Usuario (Nombre_Usuario, Correo, Contraseña, id_perfil, Imagen)
                    VALUES (?, ?, ?, ?, ?)";
        } else {
            $sql = "INSERT INTO Usuario (Nombre_Usuario, Correo, Contraseña, id_perfil)
                    VALUES (?, ?, ?, ?)";
        }
     $stmt = $this->conn->prepare($sql);
        if ($ruta) {
            return $stmt->execute([$nombre, $email, $password, $usuario, $ruta]);
        } else {
            return $stmt->execute([$nombre, $email, $password, $usuario]);
        }
        return $this->conn->query($sql);
    }

    public function getLastError(): string
{
    $errorInfo = $this->conn->errorInfo();
    return $errorInfo[2] ?? 'Error desconocido'; // Mensaje legible
}

    public function login($email, $password) {
       $sql = "SELECT * FROM Usuario 
                WHERE Correo=? AND Contraseña=?";

                   $result = $this->conn->prepare($sql);
        $result->execute([$email, $password]);

   
        if ($result && $result->rowCount() > 0) {
            return $result->fetch(PDO::FETCH_ASSOC);
        }
        
        return false;
    }
}
?>