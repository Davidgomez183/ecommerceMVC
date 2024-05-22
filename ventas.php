<?php

require_once './models/connexio.php';

session_start();

$conn = conectarDB();

// Verificar si se ha recibido una solicitud POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $productos = json_decode($_POST['productos'], true);
    $fecha_venta = date('Y-m-d H:i:s'); // Fecha actual

    foreach ($productos as $producto) {
        $productName = $producto['productName'];
        $precio = $producto['precio'];
        $cantidad = $producto['cantidad'];

        $sql = "INSERT INTO ventas (productName, precio, cantidad, fecha_venta) VALUES (?, ?, ?, ?)";

        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sdss", $productName, $precio, $cantidad, $fecha_venta);

        if ($stmt->execute()) {
            echo "Nuevo producto creado exitosamente";
           

        } else {
            echo "Error: " . $stmt->error;
        }
    }

    
    $stmt->close();
}

$conn->close();
?>
