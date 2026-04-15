<?php session_start(); 
require_once '../Controller1/user.Controler.php'; // Asegúrate de que la ruta sea correcta
$controller = new User_Controler();
$controller->logout();

header('Location: home.php');
exit();
?>