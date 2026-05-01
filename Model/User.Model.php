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
        $password_encriptada= password_hash($password, PASSWORD_DEFAULT);
        if ($ruta) {
            $sql = "INSERT INTO Usuario (Nombre_Usuario, Correo, Contraseña, id_perfil, Imagen)
                    VALUES (?, ?, ?, ?, ?)";
        } else {
            $sql = "INSERT INTO Usuario (Nombre_Usuario, Correo, Contraseña, id_perfil)
                    VALUES (?, ?, ?, ?)";
        }

        $stmt = $this->conn->prepare($sql);
        if ($ruta) {
            return $stmt->execute([$nombre, $email, $password_encriptada, $usuario, $ruta]);
        } else {
            return $stmt->execute([$nombre, $email, $password_encriptada, $usuario]);
        }
    }

    public function login($email, $password) {
    
    // Primero buscas el usuario SOLO por email
    $sql = "SELECT * FROM Usuario WHERE Correo = ?";
    $stmt = $this->conn->prepare($sql);
    $stmt->execute([$email]);
    
    $usuario = $stmt->fetch(PDO::FETCH_ASSOC);
    
    // Si existe el usuario Y la contraseña es correcta
    if ($usuario && password_verify($password, $usuario['Contraseña'])) {
        return $usuario; // devuelves todos los datos del usuario
    }
    
    return false;
    }
}
?>