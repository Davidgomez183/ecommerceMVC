<?php
session_start();

// Verificar si se proporciona el valor del badge en la URL

//Determine if a variable is declared and is different than NULL
if (isset($_GET['badge'])) {
    // Actualizar la variable de sesión con el nuevo valor del badge
    $_SESSION['productsInCart'] = $_GET['badge'];
}
?>
