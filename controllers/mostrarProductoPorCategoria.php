
<?php

require_once '../models/obtenirProductoPorCategoria.php';

if (isset($_GET['id_categoria'])) {
    $id_categoria = $_GET['id_categoria'];

// En esta variable "$productos" guardamos todos los productos de la categoria que hay en "$id_categoria" ejemplo 1,2,3,5
    $productos = obtenerProductosPorCategoria($id_categoria);
    // Incluir la vista y pasar los productos a la vista si nos han pasado un id por parametros correcto mostrar los productos de esta categoria 
    require_once '../views/productosPorCategoria.php';
} else {
    // Redirigir a una página de error o a la página principal si no se proporciona un id de categoría
    echo "Error no se a proporcionado un id_categoria de categoría";
   
}
?>

<style>
    body {
            background-color: #f5f5dc; /* Color crema */
        }
</style>