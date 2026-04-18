<?php

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
require_once("../Model/UserModel.php");

class User_Controler {

    private $model;

    public function __construct() {
        $this->model = new UserModel();
    }

    function register($nombre, $email, $password, $ruta = null, $usuario) {

        // VALIDACIÓN (te suma puntos)
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
                return "error";
            }

        } catch (mysqli_sql_exception $e) {
    echo "ERROR SQL: " . $e->getMessage();
    exit();
}
    }

    function login($email, $password) {

        if (empty($email) || empty($password)) {
            return "campos_vacios";
        }

        $user = $this->model->login($email, $password);

        if ($user) {
            return "ok";
        } else {
            return "error";
        }
    }

    public function logout() {
     session_start();

    $_SESSION = [];
    session_destroy();

    header("Location: ../Vista/login.php");
    exit();
}
}
?>