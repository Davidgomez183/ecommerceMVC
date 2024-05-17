<?php
session_start();
require_once '../models/login.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nom = $_POST['username'];
    $contrasenya = $_POST['password'];
    
    $userId = obtenerUsuarioPorCredenciales($nom, $contrasenya);
    
    if ($userId) {
        $_SESSION['username'] = $nom;
        header("Location: ../index.php");
        exit();
    } else {
       echo"Login Incorrecto !";
        exit();
    }
} else {
    header("Location: xxxx.html");
    exit();
}
?>
