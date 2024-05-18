<?php
include_once __DIR__ . '/../models/obtenirProductos.php';

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
                <button class="btn btn-primary add-to-cart" data_nombre="<?php echo $atriculos['nombre']; ?>" id_articulo="<?php echo $atriculos['id_articulo']; ?>" data-precio="<?php echo $atriculos['precio']; ?>" data-descripcion="<?php echo $atriculos['descripcion']; ?>">Añadir al Carrito</button>
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
        width: 150px;
        /* Ancho deseado */
        margin: auto;
        /* Centrar la imagen horizontalmente */
        margin-bottom: 20px;

    }
</style>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const buttons = document.querySelectorAll('.add-to-cart');
        const badge = document.querySelector('.badge');

        let productsInCart = 0;


        buttons.forEach(button => {
            button.addEventListener('click', function() {

                // Incrementar el contador de productos en el carrito
                productsInCart++;
                // Actualizar el valor del badge en la interfaz
                badge.textContent = productsInCart;

                const productName = this.getAttribute('data_nombre');
                const productId = this.getAttribute('id_articulo');
                const precio = this.getAttribute('data-precio');
                const descripcion = this.getAttribute('data-descripcion');

                console.log(productName);
                console.log(productId);
                console.log(precio);
                console.log(descripcion);
                // Guardar el valor del contador de productos en una variable de sesión
                 fetch('./controllers/setBadge.php?badge=' + productsInCart);

                fetch('./controllers/carroFetch.php', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/x-www-form-urlencoded'
                        },
                        // Envía la acción como dato de formulario 
                        body: `productName=${encodeURIComponent(productName)}&productId=${encodeURIComponent(productId)}&precio=${encodeURIComponent(precio)}&descripcion=${encodeURIComponent(descripcion)}`
                    })
                    .then(response => response.json()) // Parsea la respuesta como JSON
                    .then(data => {
                        if (data.success) {
                            console.log(data.message); // Muestra el mensaje recibido desde el servidor
                        } else {
                            alert('Error al añadir el producto al carrito');
                        }
                    })
                    .catch(error => console.error('Error:', error));
            });
        });
    });
</script>