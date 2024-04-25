<?php
function conectarDB() {
    $conexio = mysqli_connect("localhost", "root", "", "ecommerce");
    if (!$conexio) {
        die("Error de conexió: " . mysqli_connect_error());
    }
    return $conexio;
}
?>

