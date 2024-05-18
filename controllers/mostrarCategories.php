<?php
include_once __DIR__ .'/../models/obtenirCategories.php';

$categories = obtenirCategories();

echo "<div class='container'>";
   
$count = 0;
echo "<div class='row'>";
foreach ($categories as $categoria) : 
    if ($count % 3 == 0 && $count != 0) {
        echo "</div><div class='row'>";
    }
?>
<div class="col-md-4"> 
    <div class="card"> 
        <!-- se hace un foreach que itera por cada categoria que hay dentro de "$categories" entonces mostramos la imagen, nombre y descripcion de la categoria que toca -->
        <div class="card-body">
            <img src="<?php echo $categoria['imagen']; ?>" class="categoria-imagen card-img-top" alt="Imagen de la categoría">
            <h5 class="card-title"><?php echo $categoria['nombre']; ?></h5>
            <p class="card-text"><?php echo $categoria['descripcion']; ?></p>
            <a href="controllers/mostrarProductoPorCategoria.php?id_categoria=<?php echo $categoria['id_categoria']; ?>" class="btn btn-primary">Ver productos</a>
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
