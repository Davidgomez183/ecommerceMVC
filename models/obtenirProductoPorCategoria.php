
<?php

require_once 'connexio.php';

function obtenerProductosPorCategoria($id_categoria) {
    $conexio = conectarDB();
    $stmt = $conexio->prepare("SELECT * FROM articulos WHERE id_categoria = ?");
    $stmt->bind_param('i', $id_categoria);
    $stmt->execute();
    $resultat = $stmt->get_result();
    $productos = $resultat->fetch_all(MYSQLI_ASSOC);
    $stmt->close();
    mysqli_close($conexio);
    return $productos;
}
?>
