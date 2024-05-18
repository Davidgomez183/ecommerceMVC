<!-- views/productosPorCategoria.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Productos de la Categoría</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>

<div class="container mt-4">
    <h1>Productos de la Categoría</h1>
    <div class="row">
        <?php foreach ($productos as $producto) : ?>
            <div class="col-md-4 mb-4">
                <div class="card">
                    <img src="<?php echo $producto['foto']; ?>" class="card-img-top" alt="Imagen del producto">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $producto['nombre']; ?></h5>
                        <p class="card-text"><?php echo $producto['descripcion']; ?></p>
                        <h3 class="card-text"><?php echo $producto['precio']; ?></h3>
                        <button class="btn btn-primary">Añadir al carrito</button>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>
<footer>
        <?php include __DIR__ . '/../footer.php';   ?>
    </footer>
</body>
</html>
