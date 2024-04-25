<?php

include __DIR__ .'\..\models\obtenirProductos.php';

// Aquí generas el contenido dinámico, por ejemplo:
$productos = obtenirProductos();
foreach ($productos as $producto) {
    echo $producto['product_name'] . "<br>";
}
?>
