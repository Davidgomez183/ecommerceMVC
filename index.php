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
                <a class="nav-link" href="#">Categorías</a>
            </li>
        </ul>
        <form class="d-flex">
            <input class="form-control me-2" type="search" placeholder="Buscar" aria-label="Buscar">
            <button class="btn btn-outline-light" type="submit">Buscar</button>
        </form>
        <a href="./views/crearProductovista.php" class="btn btn-success ms-3" >Crear Producto</a>

        <!-- Carrito con badge -->
        <a class="btn btn-primary ms-3" href="?accion=Carrito">
        <span class="badge bg-danger">0</span> <!-- Número de productos en el carrito -->
            <i class="bi bi-cart" id="caro"></i> Carrito
           
            
        </a>
    </div>
</nav>


    </header>

    <main>
        
        <!-- Contenido dinámico generado por el controlador -->
        <?php 
       if (isset($_GET['accion'])) 
        if ($_GET['accion']=="mostrar")
        {
            
            include __DIR__ . '\.\controllers\mostrarProductos.php'; 
            } 
            
            ?>
       
        
        <div id="contenido"></div>
    </main>

    <footer>
   <?php include __DIR__ . './footer.php';   ?> 
    </footer>
</body>

</html>


