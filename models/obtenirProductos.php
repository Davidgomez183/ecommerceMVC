<?php

// Incluir el archivo que contiene la función conectarDB()
require_once 'connexio.php';

function obtenirProductos() {
    $conexio = conectarDB();
    $resultat = mysqli_query($conexio, "SELECT * FROM articulos");
    $Productos = mysqli_fetch_all($resultat, MYSQLI_ASSOC);
    mysqli_close($conexio);
    return $Productos;
}

