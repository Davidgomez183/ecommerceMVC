<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ecommerceMVC</title>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <!-- Bootstrap Icons CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.0/font/bootstrap-icons.css" rel="stylesheet"><!-- Enlaces a archivos CSS y JavaScript -->
</head>
<style>
    .carousel {
        margin-top: 40px;
        /* Ajusta este valor según sea necesario */
    }
    body {
            background-color: #f5f5dc; /* Color crema */
        }

    .modal-header-custom {

        color: blue;
    }
</style>

<body>
    <header>
        <!-- Encabezado de la página  -->
        <nav class="navbar bg-dark border-bottom border-body" data-bs-theme="dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="index.php">ecommerceMVC</a>
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="?accion=mostrar" id="cargarProductos">Productos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="?accion=mostrarCategorias">Categorías</a>
                    </li>
                </ul>
                <!-- Nombre de la página en el centro -->
                <div class="mx-auto text-center" style="position: absolute; left: 50%; transform: translateX(-50%); font-size: 1.5rem;">
                    <span class="navbar-text" style="color: white;">&copy;ClockworkBoutique&copy;</span>
                </div>

                <?php
                session_start();
                $loggedIn = isset($_SESSION['username']);
                ?>

                <?php if ($loggedIn) : ?>
                    <span class="navbar-text ms-3" style="color: white;">!Hola, <?php echo $_SESSION['username']; ?></span>
                    <a href="logout.php" class="btn btn-light ms-3">Desconectarse</a>
                <?php else : ?>
                    <a href="./views/index.html" class="btn btn-light ms-3">Acceder</a>
                <?php endif; ?>

                <!-- Carrito con badge -->
                <a class="btn btn-primary ms-3" href="?accion=Carrito">
                    <span class="badge bg-danger"><?php echo isset($_SESSION['productsInCart']) ? $_SESSION['productsInCart'] : 0; ?></span>
                    <i class="bi bi-cart" id="caro"></i> Carrito


                </a>
            </div>
        </nav>

    </header>

    <main>

        <?php
        $accion = isset($_GET['accion']) ? $_GET['accion'] : '';
        if ($accion != 'mostrar' && $accion != 'mostrarCategorias') {
        ?>
            <img src="./img/tienda-online.jpg" class="d-block w-100" alt="...">
        <?php
        }
        ?>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

        <!-- Contenido dinámico generado por el controlador -->
        <?php
        if (isset($_GET['accion']))
            if ($_GET['accion'] == "mostrar") {
                $loggedIn = isset($_SESSION['username']);

                // Verificar si el usuario ha iniciado sesión antes de incluir el controlador "mostrarProductos.php"
                if ($loggedIn || !isset($_GET['accion']) || $_GET['accion'] != 'mostrar') {
                    include __DIR__ . '\.\controllers\mostrarProductos.php';
                } else {
                    // Mensaje de advertencia con estilos CSS
                    echo '<div style="background-color: #f8d7da; color: #721c24; padding: 20px; margin-bottom: 20px; font-size: 30px; margin-top: 8%;">';
                    echo "Por favor inicia sesión para ver los productos.";
                    echo '</div>';
                }
            }

        //Para mostrar las Categorias
        if (isset($_GET['accion']))
            if ($_GET['accion'] == "mostrarCategorias") {

                include __DIR__ . '\.\controllers\mostrarCategories.php';
            }






        ?>
        <div id="contenido"></div>
    </main>

    <footer>
        <?php include __DIR__ . './footer.php';   ?>
    </footer>
</body>

</html>

<!-- Agregar al final del body para asegurarse de que todos los elementos estén cargados -->

<!-- Modal -->
<div class="modal fade" id="carritoModal" tabindex="-1" aria-labelledby="carritoModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title modal-header-custom" id="carritoModalLabel">Carro con Fetch</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <?php
                // Verificar si existe un carrito en la sesión
                if (isset($_SESSION['carrito']) && !empty($_SESSION['carrito'])) {
                    // Mostrar el contenido del carrito
                    echo "<h2>Carro de la Compra</h2>";
                    echo "<ul>";
                    foreach ($_SESSION['carrito'] as $producto) {
                        echo "<li>{$producto['productName']} - {$producto['precio']} €  - Cantidad: {$producto['cantidad']}</li>";
                        // Puedes mostrar más detalles del producto si lo deseas
                    }
                    // Agregar botón para realizar la compra
                    echo '<button id="comprarBtn" class="btn btn-success mt-3">Realizar Compra</button>';
                    echo "</ul>";
                } else {
                    // Si no hay productos en el carrito, mostrar un mensaje indicándolo
                    echo "<p>No hay productos en el carrito.</p>";
                }
                ?>
            </div>
        </div>
    </div>
</div>
<!-- Script para abrir automáticamente el modal del carrito si la acción es "Carrito" -->
<script>
    // Verificar si la acción es "Carrito" y mostrar el modal del carrito si es así
    window.addEventListener('DOMContentLoaded', function() {
        const accion = '<?php echo isset($_GET['accion']) ? $_GET['accion'] : ''; ?>';
        if (accion === 'Carrito') {
            const carritoModal = new bootstrap.Modal(document.getElementById('carritoModal'));
            carritoModal.show();
        }
    });
</script>