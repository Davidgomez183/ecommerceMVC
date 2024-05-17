<?php 
//Los models son siempre contra la BBDD

// Incluir el archivo que contiene la función conectarDB()
require_once 'connexio.php';

function obtenirProductos() {
    $conexio = conectarDB(); //Para que el conectarDB() funcione se necesita la linia de require.
    $resultat = mysqli_query($conexio, "SELECT * FROM categorias");
    $Categorias = mysqli_fetch_all($resultat, MYSQLI_ASSOC);
    mysqli_close($conexio);
    return $Categorias;
}