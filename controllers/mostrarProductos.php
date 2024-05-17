<?php
include_once __DIR__ .'/../models/obtenirProductos.php';

$productes = obtenirProductos();

echo "<div class='container'>";
   
    $count = 0;
    echo "<div class='row'>";
    foreach ($productes as $atriculos) : 
        if ($count % 3 == 0 && $count != 0) {
            echo "</div><div class='row'>";
        }
    ?>
        <div class="col-md-4"> 
            <div class="card"> 
                <!-- se hace un foreach que itera por cada categoria que hay dentro de "$categories" entonces mostramos la imagen, nombre y descripcion de la categoria que toca -->
                <div class="card-body">
                <img src="<?php echo $atriculos['foto']; ?>" class="categoria-imagen card-img-top" alt="Imagen del producto">
                    <h5 class="card-title"><?php echo $atriculos['nombre']; ?></h5>
                    <p class="card-text"><?php echo $atriculos['descripcion']; ?></p>
                    <h3 class="card-text"><?php echo $atriculos['precio']; ?></h3>
                </div>
            </div>
        </div>
    <?php 
        $count++;
    endforeach; 
    ?>
</div>

<style>
.categoria-imagen {
    width: 150px; /* Ancho deseado */
    margin:  auto; /* Centrar la imagen horizontalmente */
    margin-bottom: 20px;
   
}


</style>