<?php

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
require_once("../Model/UserModel.php");

class User_Controler {

    private $model;

    public function __construct() {
        $this->model = new UserModel();
    }

    function register($nombre, $email, $password, $ruta = null, $usuario) {
        if (empty($nombre) || empty($email) || empty($password)) {
            return "campos_vacios";
        }

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return "email_invalido";
        }

        if (strlen($password) < 4) {
            return "password_corta";
        }

        try {
            $ok = $this->model->register($nombre, $email, $password, $ruta, $usuario);
            if ($ok) {
                return "ok";
            } else {
                // Revisar si hay error de duplicidad en la conexión
                $errorMsg = $this->model->getLastError();
                error_log("DEBUG Controller: register() retornó false. Error MySQL: " . $errorMsg);
                
                if (strpos($errorMsg, 'Duplicate entry') !== false) {
                    if (strpos($errorMsg, 'Nombre_Usuario') !== false) {
                        return "usuario_existe";
                    }
                    if (strpos($errorMsg, 'Correo') !== false) {
                        return "correo_existe";
                    }
                    return "usuario_o_email_duplicado";
                }
                return "error";
            }
        } catch (mysqli_sql_exception $e) {
            // DEBUG: ver qué error capturó
            error_log("DEBUG Controller: Exception capturada: " . $e->getMessage());
            
            // Detectar específicamente cuál campo está duplicado
            $errorMsg = $e->getMessage();
            
            if (strpos($errorMsg, 'Duplicate entry') !== false) {
                // Detectar si es el nombre de usuario duplicado
                if (strpos($errorMsg, 'Nombre_Usuario') !== false) {
                    return "usuario_existe";
                }
                // Detectar si es el correo duplicado
                if (strpos($errorMsg, 'Correo') !== false) {
                    return "correo_existe";
                }
                // Si ambos o no se puede determinar
                return "usuario_o_email_duplicado";
            }
            return "error_base_datos";
        }
    }

    function login($email, $password) {
        if (empty($email) || empty($password)) {
            return false;
        }

        $user = $this->model->login($email, $password);

        if ($user) {
            // RETORNAMOS EL ARRAY COMPLETO, NO SOLO "OK"
            return $user; 
        } else {
            return false;
        }
    }

    public function logout() {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        $_SESSION = [];
        session_destroy();
        header("Location: ../Vista/login.php");
        exit();
    }
}
?>