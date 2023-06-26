<?php
require_once "con_db.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Obtener el nombre del producto desde la solicitud POST
  $nombre = $_POST['nombre'];

  // Realizar la consulta para eliminar el producto con el nombre especificado
  $sql = "DELETE FROM producto WHERE nombre = :nombre";
  $stmt = $conex->prepare($sql);
  $stmt->bindValue(':nombre', $nombre, PDO::PARAM_STR);
  $stmt->execute();

  // Verificar si se eliminó correctamente
 // Verificar si se eliminó correctamente
if ($stmt->rowCount() > 0) {
  echo json_encode(array('success' => true, 'message' => 'El producto se eliminó correctamente'));
} else {
  echo json_encode(array('success' => false, 'message' => 'Error al eliminar el producto'));
}
}

// Cerrar la conexión a la base de datos
$conex = null;
?>




