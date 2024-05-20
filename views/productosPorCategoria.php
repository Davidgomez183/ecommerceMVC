<!DOCTYPE html>
<html>

<head>
    <title>Productos de la Categoría</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <style>
        /* Estilos personalizados */
        .producto-card {
            margin-bottom: 20px;
        }

        .producto-imagen {
            height: 200px;
            /* Altura fija para todas las imágenes */
            object-fit: cover;
            /* Ajustar la imagen dentro del contenedor */
        }
    </style>
</head>

<!-- Al usar el require podemos usar las variables del otro fichero en este, porque junta los ficheros en uno -->

<body>

    <div class="container mt-4">
        <?php
        // Obtener el ID de la categoría desde la URL
        $nombre_categoria = $_GET['id_categoria'];
        ?>
        <h1 class="mb-4">Productos de la Categoría: <?php echo $nombre_categoria; ?></h1>
        <div class="row">
            <?php foreach ($productos as $producto) : ?>
                <div class="col-md-4">
                    <div class="card producto-card">
                        <img src="<?php echo '../' . $producto['foto']; ?>" class="producto-imagen card-img-top" alt="No hay imagen disponible">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $producto['nombre']; ?></h5>
                            <p class="card-text"><?php echo $producto['descripcion']; ?></p>
                            <h3 class="card-text"><?php echo $producto['precio']; ?>€</h3>
                            <div class="mt-4">
                                <a href="javascript:history.go(-1)" class="btn btn-secondary">Categorias</a>
                            </div>
                        
                        </div>
                    </div>
                </div>
                <!-- En este foreach ya se muestran solo los productos con la categoria que toca. Porque en el anterior fichero guardamos el producto con la categoria adecuada a través de la funcón -->


                <!-- Botón para retroceder a la página anterior -->

            <?php endforeach; ?>
        </div>

    </div>
    <footer>
        <?php include __DIR__ . '/../footer.php'; ?>
    </footer>

</body>

</html>