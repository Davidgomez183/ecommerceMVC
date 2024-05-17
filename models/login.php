<?php
require_once 'connexio.php';

function obtenerUsuarioPorCredenciales($nom, $contrasenya) {
    $conn = conectarDb();
    $stmt = $conn->prepare("SELECT id FROM login WHERE username = ? AND password = ?");
    $stmt->bind_param("ss", $nom, $contrasenya);
    $stmt->execute();
    $stmt->bind_result($id);
    $stmt->fetch();
    $stmt->close();
    $conn->close();
    
    if ($id) {
        return $id;
    } else {
        return false;
    }
}
?>
