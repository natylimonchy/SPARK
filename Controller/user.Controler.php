<?php

class User_Controler{

    private $db;
    public function __construct($database){
        $this->db = $database;
        session_start();
    }
   public function login($email, $password){

    if (isset($_POST['user']) && $_POST['password'] !== "") {
        $user = htmlspecialchars($_POST['user']);
        $password = htmlspecialchars($_POST['password']);
        if (isset($_POST['activo']))
            $es_activo = 1;
        $activo = htmlspecialchars($_POST['activo']);

        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "Spark";

        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = "Select ";

        if ($conn->query($sql) === TRUE) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

        $conn->close();
    } else {
        echo "<p>No has seleccionado ninguna opción</p>";
    }
    }

    function logout(){

    }
    function register(){

    }
}

?> 