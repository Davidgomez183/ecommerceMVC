<?php
// path_to_your_php_script.php

// Iniciar sesión para manejar el carrito
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtener el cuerpo de la solicitud
    $input = json_decode(file_get_contents('php://input'), true);

    // Verificar que todos los datos necesarios están presentes
    if (isset($input['id']) && isset($input['precio']) && isset($input['descripcion']) && isset($input['productName'])) {
        $productId = $input['id'];
        $precio = $input['precio'];
        $descripcion = $input['descripcion'];
        $productName = $input['productName'];

        // Agregar lógica para añadir el producto al carrito (por ejemplo, añadiéndolo a la sesión)
        if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = [];
        }

        // Añadir el producto al carrito
        $_SESSION['cart'][] = [
            'id' => $productId,
            'precio' => $precio,
            'descripcion' => $descripcion,
            'nombre' => $productName
        ];

        // Responder con JSON indicando éxito
        echo json_encode(['success' => true]);
    } else {
        // Responder con JSON indicando fallo por datos incompletos
        echo json_encode(['success' => false, 'message' => 'Datos del producto incompletos']);
    }
} else {
    // Responder con JSON indicando fallo por método no permitido
    echo json_encode(['success' => false, 'message' => 'Método no permitido']);
}
?>
