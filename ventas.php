<?php

require_once './models/connexio.php';

session_start();

$conn = conectarDB();

// Verificar si se ha recibido una solicitud POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Decodificar el JSON enviado en la solicitud POST
    $productos = json_decode($_POST['productos'], true);
    
    // Iterar sobre los productos recibidos
    foreach ($productos as $producto) {
        // Obtener los datos del producto
        $productName = $producto['productName'];
        $precio = $producto['precio'];
        $cantidad = $producto['cantidad'];

        // Consulta SQL para insertar los datos del producto en la tabla de ventas, incluyendo la fecha actual
        $sql = "INSERT INTO ventas (productName, precio, cantidad, fecha_venta) VALUES (?, ?, ?, NOW())";

        // Preparar la consulta
        $stmt = $conn->prepare($sql);
        
        // Vincular los parámetros de la consulta
        $stmt->bind_param("sdi", $productName, $precio, $cantidad);
        
        // Ejecutar la consulta preparada
        if ($stmt->execute()) {
            echo "Nuevo producto creado exitosamente";
        } else {
            echo "Error: " . $stmt->error;
        }
        $stmt->close();
    }
}

// Una vez que se han insertado los productos exitosamente, limpiar el carrito
unset($_SESSION['carrito']);
$_SESSION['productsInCart'] = 0;

// Devolver una respuesta JSON al cliente con el indicador de carrito limpio
echo json_encode(array("message" => "¡Productos añadidos y carrito limpiado exitosamente!", "success" => true, "carrito_limpio" => true));

$conn->close();
?>
