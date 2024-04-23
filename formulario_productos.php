<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Administración de Productos</title>
    <link rel="stylesheet" href="styles2.css">

    <script>
    // Función para mostrar un popup con un mensaje
    function mostrarPopup(mensaje) {
        alert(mensaje);
    }
</script>

</head>
<body>
    <div class="container">
        <h2>Formulario de Administración de Productos</h2>
        <form action="proceso_productos.php" method="post">
            <div>
                <label for="nombre">Nombre del Producto:</label>
                <input type="text" id="nombre" name="nombre" required>
            </div>
            <div>
                <label for="precio">Precio del Producto:</label>
                <input type="number" id="precio" name="precio" required>
            </div>
            <div>
                <label for="talla">Talla del producto:</label>
                <input type="text" id="talla" name="talla" required>
            </div>
            <div>
                <label for="temporada">Temporada del producto:</label>
                <input type="text" id="temporada" name="temporada" required>
            </div>
            <div>
                <label for="Color">Color del producto:</label>
                <input type="text" id="color" name="color" required>
            </div>
            <div>
                <button type="submit" name="agregar_articulo">Agregar Producto</button>
            </div>
        </form>

        <h2>Modificar Producto</h2>
        <form action="proceso_productos.php" method="post">
            <div>
                <label for="id_modificar">ID del Producto a Modificar:</label>
                <input type="number" id="id_modificar" name="id_producto" required>
            </div>
            <div>
                <label for="nombre_modificar">Nuevo Nombre del Producto:</label>
                <input type="text" id="nombre_modificar" name="nombre" required>
            </div>
            <div>
                <label for="precio_modificar">Nuevo Precio del Producto:</label>
                <input type="number" id="precio_modificar" name="precio" required>
            </div>
            <label for="talla">Talla del producto:</label>
                <input type="text" id="talla" name="talla" required>
            </div>
            <div>
                <label for="temporada">Temporada del producto:</label>
                <input type="text" id="temporada" name="temporada" required>
            </div>
            <div>
                <label for="color">Color del producto:</label>
                <input type="text" id="color" name="color" required>
            </div>
            <div>
                <button type="submit" name="modificar_articulo">Modificar Producto</button>
            </div>
        </form>

        <h2>Eliminar Producto</h2>
        <form action="proceso_productos.php" method="post">
            <div>
                <label for="id_eliminar">ID del Producto a Eliminar:</label>
                <input type="number" id="id_eliminar" name="id_producto" required>
            </div>
            <div>
                <button type="submit" name="eliminar_articulo">Eliminar Producto</button>
            </div>
        </form>
        
        <h2>Crear categoria</h2>
        <form action="proceso_productos.php" method="post">
            <div>
                <label for="nombre_categoria">Nombre de la categoria:</label>
                <input type="text" id="nombre_categoria" name="nombre_categoria">
            </div>
            <div>
                <label for="id_proveedor">ID del proveedor:</label>
                <input type="text" id="id_proveedor" name="id_proveedor">
            </div>
            <div>
                <label for="id_sub">ID de las subcategorias:</label>
                <input type="text" id="id_sub" name="id_sub">
            </div>
            <div>
                <button type="submit" name="id_crear_categoria">Crear categoría</button>
            </div>
</form>


    </div>
    <?php
        include("proceso_productos.php");
     ?>

<table id="tablaDatos"> <!-- Inicio de la tabla con un identificador único -->
        <thead> 
            <tr> <!-- Fila de encabezados -->
                <th data-columna="id_producto">ID ⇅</th> <!-- Encabezado para ID con atributo de datos -->
                <th data-columna="nombre_producto">Nombre ⇅</th> <!-- Encabezado para Nombre con atributo de datos -->
                <th data-columna="precio">precio ⇅</th> <!-- Encabezado para RUT con atributo de datos -->
                <th data-columna="fecha_de_alta">Fecha de alta ⇅</th> <!-- Encabezado para Fecha con atributo de datos -->
                <th data-columna="talla">Talla del producto:⇅</th>
                <th data-columna="temporada">Temporada del producto: ⇅</th>
                <th data-columna="color">Color del producto: ⇅</th>
            
            
            </tr>
        </thead>
        <tbody> 
            <?php
                // Incluye el archivo de conexión
                include("conexion.php");
                // Consulta SQL para obtener los datos de la tabla
                $consulta = "SELECT * FROM productos";
                $resultado = mysqli_query($conex, $consulta);

                // Iterar sobre los resultados y mostrar cada fila en la tabla
                while ($fila = mysqli_fetch_assoc($resultado)) { // Recorrer cada fila de resultados
                    echo "<tr>"; // Inicio de una fila de la tabla
                    echo "<td>" . $fila['id_producto'] . "</td>"; // Celda para ID
                    echo "<td>" . $fila['nombre_producto'] . "</td>"; // Celda para Nombre
                    echo "<td>" . $fila['precio'] . "</td>"; // Celda para Email
                    echo "<td>" . $fila['fecha_de_alta'] . "</td>"; // Celda para Fecha
                    echo "<td>" . $fila['talla'] . "</td>";
                    echo "<td>" . $fila['temporada'] . "</td>";
                    echo "<td>" . $fila['color'] . "</td>";
                    echo "</tr>"; // Fin de la fila
                }
            ?>
        </tbody>
    </table>

        <!-- Inclusión de jQuery para funcionalidades JavaScript -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> <!-- Enlace al archivo jQuery -->
    <!-- Inclusión del archivo de funcionalidades JavaScript -->
    <script src="funcionalidades.js"></script> <!-- Enlace al archivo de funcionalidades JavaScript -->
</body>

</html>
