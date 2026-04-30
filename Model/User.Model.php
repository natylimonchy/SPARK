<?php

class UserModel {

    private $conn;

    public function __construct() {
        try {
        $this->conn = new PDO("mysql:host=localhost;dbname=spark", "root", "");
        // Configurar PDO para lanzar excepciones en caso de error
            
        $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "Error" . $e->getMessage();
            
        }
        }

    public function register($nombre, $email, $password,$usuario , $ruta = null) {

        // IMPORTANTE: Para que esto funcione con "Imagen", debes ejecutar en tu SQL:
        // ALTER TABLE Usuario ADD COLUMN Imagen VARCHAR(255);
        
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
    }

    public function login($email, $password) {
        // Usamos Contraseña con 'ñ' porque así está en tu script de base de datos
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