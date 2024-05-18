<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Footer</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
  <style>
    /* Estilos para el cuerpo y el footer */
    body {
      display: flex;
      flex-direction: column;
      min-height: 100vh; /* Establece la altura mínima del cuerpo al 100% del viewport height */
      margin: 0; /* Asegura que no haya margen alrededor del cuerpo */
    }

    footer {
      margin-top: auto; /* Empuja el footer hacia abajo para que esté siempre al final de la página */
    }
  </style>
</head>
<body>
  <!-- Contenido de la página -->

  <footer class="footer mt-auto py-3 bg-dark text-light">
    <div class="container">
      <div class="row">
        <div class="col-lg-6">
          <h5>Enlaces</h5>
          <ul class="list-unstyled">
            <li><a href="./index.php">Inicio</a></li>
            <li><a href="/">Productos</a></li>
            <li><a href="#">Contacto</a></li>
            <!-- Otros enlaces -->
          </ul>
        </div>
        <div class="col-lg-6">
          <h5>Redes Sociales</h5>
          <ul class="list-unstyled">
            <li><a href="#"><i class="fab fa-facebook"></i> Facebook</a></li>
            <li><a href="#"><i class="fab fa-twitter"></i> Twitter</a></li>
            <li><a href="#"><i class="fab fa-instagram"></i> Instagram</a></li>
            <!-- Otros enlaces a redes sociales -->
          </ul>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-12 text-center">
          <p>&copy; 2024 David Gomez-Oscar bertolin &copy;</p>
        </div>
      </div>
    </div>
  </footer>
</body>
</html>
