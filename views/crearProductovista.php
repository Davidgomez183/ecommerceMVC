<h1>Crear Nuevo Producto</h1>
    <form action="controlador.php?action=crearProducto" method="post">
        <label for="nombre">Nombre del Producto:</label><br>
        <input type="text" id="nombre" name="nombre" required><br><br>
        
        <label for="descripcion">Descripción del Producto:</label><br>
        <textarea id="descripcion" name="descripcion" rows="4" required></textarea><br><br>
        
        <label for="precio">Precio del Producto:</label><br>
        <input type="number" id="precio" name="precio" step="0.01" required><br><br>
        
        <label for="cantidad">Cantidad en Stock:</label><br>
        <input type="number" id="cantidad" name="cantidad" required><br><br>
        
        <label for="categoria">Categoría del Producto:</label><br>
        <select id="categoria" name="categoria" required>
            <option value="1">Categoría 1</option>
            <option value="2">Categoría 2</option>
            <!-- Opciones de categoría adicionales -->
        </select><br><br>
        
        <label for="imagen">Imagen del Producto:</label><br>
        <input type="file" id="imagen" name="imagen"><br><br>
        
        <input type="submit" value="Crear Producto">
    </form>

    <style>
         body {
            font-family: Arial, sans-serif;
        }
        form {
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #f9f9f9;
        }
        h1 {
            text-align: center;
        }
        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }
        input[type="text"],
        input[type="number"],
        textarea,
        select {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 3px;
            box-sizing: border-box;
        }
        input[type="file"] {
            margin-bottom: 20px;
        }
        input[type="submit"] {
            width: 100%;
            padding: 10px;
            border: none;
            border-radius: 3px;
            background-color: #4caf50;
            color: white;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>