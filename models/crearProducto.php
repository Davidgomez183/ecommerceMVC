
<?php
function crearProducto($nombre, $descripcion, $precio, $cantidad, $categoria_id, $imagen) {
    $conexion = conectarDB();
    $sql = "INSERT INTO productos (product_name, product_description, product_price, stock_quantity, category_id, product_image) 
            VALUES ('$nombre', '$descripcion', $precio, $cantidad, $categoria_id, '$imagen')";
    $exito = mysqli_query($conexion, $sql);
    mysqli_close($conexion);
    return $exito;
}

 
