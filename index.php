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
                
                
                <?php
                session_start();
                $loggedIn = isset($_SESSION['username']);
                ?>

                <?php if ($loggedIn) : ?>
                    <span class="navbar-text ms-3" style="color: white;">Bienvenido, <?php echo $_SESSION['username']; ?></span>
                    <a href="logout.php" class="btn btn-light ms-3">Cerrar sesión</a>
                <?php else : ?>
                    <a href="./views/index.html" class="btn btn-light ms-3">Iniciar Sesión</a>
                <?php endif; ?>

                <!-- Carrito con badge -->
                <a class="btn btn-primary ms-3" href="?accion=Carrito">
                    <span class="badge bg-danger">0</span> <!-- Número de productos en el carrito -->
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
    <!-- <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
            
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="./img/tienda-online.jpg" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Tienda Online</h5>
                    <p>Compra de manera facil y segura.</p>
                </div>
            </div>
            
            </div>
            <div class="carousel-item">
                <img src="./img/sale.jpg" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div> -->
    <?php
    }
    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

        <!-- Contenido dinámico generado por el controlador -->
        <?php
        if (isset($_GET['accion']))
            if ($_GET['accion'] == "mostrar") {

                include __DIR__ . '\.\controllers\mostrarProductos.php';
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