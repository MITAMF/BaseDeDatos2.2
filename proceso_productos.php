<script>
// Función para mostrar un popup con un mensaje
function mostrarPopup(mensaje) {
    alert(mensaje);
}
</script>

<?php
include("conexion.php");
// Función para agregar un nuevo artículo
if(isset($_POST['agregar_articulo'])) {
    $nombre = $_POST['nombre'];
    $precio = $_POST['precio'];
    $talla = $_POST['talla'];
    $temporada = $_POST['temporada'];
    $color = $_POST['color'];

    // Insertar el nuevo artículo en la base de datos
    $sql = "INSERT INTO productos (nombre_producto, precio, talla, temporada, color) VALUES ('$nombre', '$precio', '$talla', '$temporada', '$color')";
    if(mysqli_query($conex, $sql)) {
        echo '<script>mostrarPopup("El producto ha sido creado.");</script>';
    } else {
        echo '<script>mostrarPopup("Error al crear producto: ' . mysqli_error($conex) . '");</script>';
    }
}


// Función para modificar un artículo
if(isset($_POST['modificar_articulo'])) {
    $id_producto = $_POST['id_producto'];
    $nombre = $_POST['nombre'];
    $precio = $_POST['precio'];
    $talla = $_POST['talla'];
    $temporada = $_POST['temporada'];
    $color = $_POST['color'];

    // Actualizar el artículo en la base de datos
    $sql = "UPDATE productos SET nombre_producto='$nombre', precio=$precio, talla = '$talla', temporada = '$temporada', color='$color' WHERE id_producto=$id_producto";
    if(mysqli_query($conex, $sql)) {
        echo '<script>mostrarPopup("El producto ha sido modificado.");</script>';
    } else {
        echo '<script>mostrarPopup("Error al actualizar producto: ' . mysqli_error($conex) . '");</script>';
    }
}

// Función para eliminar un artículo
if(isset($_POST['eliminar_articulo'])) {
    $id_producto = $_POST['id_producto'];

    // Eliminar el artículo de la base de datos
    $sql = "DELETE FROM productos WHERE id_producto=$id_producto";
    if(mysqli_query($conex, $sql)) {
        echo '<script>mostrarPopup("El producto ha sido eliminado.");</script>';
    } else {
        echo '<script>mostrarPopup("Error al eliminar producto: ' . mysqli_error($conex) . '");</script>';
    }
}

if(isset($_POST['id_crear_categoria'])) {
    $nombre = $_POST['id_crear_categoria']; // Cambié el nombre de la variable para que coincida con el formulario HTML
    $idProveedor = $_POST['id_proveedor'];
    $idSubcategorias = $_POST['id_sub'];

    // Consulta para buscar la ID del proveedor
    $sqlProveedor = "SELECT id_proveedor FROM proveedor";
    $resultadoProveedor = mysqli_query($conex, $sqlProveedor);
    if($filaProveedor = mysqli_fetch_assoc($resultadoProveedor)) { // Agregué una condición para verificar si se encontraron resultados
        $idProveedor = $filaProveedor['id_proveedor'];

        // Insertar la nueva categoría en la base de datos
        $sql = "INSERT INTO categorias (nombre_categoria, id_proveedor, id_sub) VALUES ('$nombre', '$idProveedor', '$idSubcategorias')";
        if(mysqli_query($conex, $sql)) {
            echo '<script>mostrarPopup("La categoría ha sido creada.");</script>';
        } else {
            echo '<script>mostrarPopup("Error al crear categoría: ' . mysqli_error($conex) . '");</script>';
        }
    } else {
        echo '<script>mostrarPopup("Error: El proveedor no existe.");</script>';
    }
}

?>
