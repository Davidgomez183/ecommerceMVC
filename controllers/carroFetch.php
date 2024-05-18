<?php

// Iniciar sesión para manejar el carrito
session_start();

// Verificar si se recibieron datos POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Verificar si se recibieron los datos esperados
    if (isset($_POST['productName']) && isset($_POST['productId']) && isset($_POST['precio']) && isset($_POST['descripcion'])) {
        // Crear un array asociativo con los datos recibidos
        $nuevoProducto = array(
            'productName' => $_POST['productName'],
            'productId' => $_POST['productId'],
            'precio' => $_POST['precio'],
            'descripcion' => $_POST['descripcion'],
            'cantidad' => 1 // Iniciar con cantidad 1
        );

        // Verificar si el carrito ya existe en la sesión
        if (!isset($_SESSION['carrito'])) {
            $_SESSION['carrito'] = array();
        }

        // Buscar si el producto ya existe en el carrito
        $productoEncontrado = false;
        foreach ($_SESSION['carrito'] as &$producto) {
            if ($producto['productId'] === $nuevoProducto['productId']) {
                $producto['cantidad'] += 1;
                $productoEncontrado = true;
                break;
            }
        }

        // Si no se encontró el producto, agregarlo al carrito
        if (!$productoEncontrado) {
            $_SESSION['carrito'][] = $nuevoProducto;
        }

        // Puedes enviar una respuesta al cliente si es necesario
        // Devuelve un objeto JSON
        echo json_encode(array("message" => "¡Producto añadido al carrito!", "success" => true));

    } else {
        // Si falta alguno de los datos esperados, enviar un mensaje de error
        echo json_encode(array("message" => "Faltan datos en la solicitud.", "success" => false));
    }
} else {
    // Si no es una solicitud POST, enviar un mensaje de error
    echo json_encode(array("message" => "Este script solo acepta solicitudes POST.", "success" => false));
}
