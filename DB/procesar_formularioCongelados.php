<?php
require_once "con_db.php";

$nombre = $_POST['nombre'];
$descripcion = $_POST['descripcion'];
$presentacion = $_POST['presentacion'];
$calificacion = $_POST['calificacion'];
$categoria_id = 2; // Congelados

$imagen = $_FILES['imagen'];
$rutaDestino = '../IMAGENES/' . $imagen['name'];

if (move_uploaded_file($imagen['tmp_name'], $rutaDestino)) {
    // La imagen se ha guardado correctamente
    echo "IMAGEN GUARDADA CORRECTAMENTE.\n";
    // Aquí puedes realizar las acciones adicionales para guardar la información del producto en la base de datos

    // Insertar los datos en la tabla producto
    $sql = "INSERT INTO producto (nombre, descripcion, presentacion, calificacion, src, categoria_id) 
            VALUES (:nombre, :descripcion, :presentacion, :calificacion, :rutaDestino, :categoria_id)";

    // Preparar la consulta
    $stmt = $conex->prepare($sql);

    // Asociar los valores a los parámetros de la consulta
    $stmt->bindParam(':nombre', $nombre);
    $stmt->bindParam(':descripcion', $descripcion);
    $stmt->bindParam(':presentacion', $presentacion);
    $stmt->bindParam(':calificacion', $calificacion);
    $stmt->bindParam(':rutaDestino', $rutaDestino);
    $stmt->bindParam(':categoria_id', $categoria_id);

    // Ejecutar la consulta
    if ($stmt->execute()) {
        // Los datos se han insertado correctamente
        echo "Datos guardados correctamente en la tabla producto.\n";
    } else {
        // Error al insertar los datos
        echo "Error al guardar los datos en la tabla producto.\n";
    }
} else {
    echo "NO SE GUARDÓ LA IMAGEN CORRECTAMENTE.\n";
    // Ocurrió un error al guardar la imagen
    // Maneja el error de acuerdo a tus necesidades
}
?>