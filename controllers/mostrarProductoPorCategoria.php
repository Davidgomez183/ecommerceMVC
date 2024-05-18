
<?php

require_once '../models/obtenirProductoPorCategoria.php';

if (isset($_GET['id_categoria'])) {
    $id_categoria = $_GET['id_categoria'];

    $productos = obtenerProductosPorCategoria($id_categoria);
    // Incluir la vista y pasar los productos a la vista
    require_once '../views/productosPorCategoria.php';
} else {
    // Redirigir a una página de error o a la página principal si no se proporciona un id de categoría
    echo "Error no se a proporcionado un id_categoria de categoría";
    exit();
}
?>
