<?php

class EventModel {

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

    public function register() {}  

    public function getEventById() {}
       

    public function updateEvent() {}


    public function deleteEvent() {}
}
?>