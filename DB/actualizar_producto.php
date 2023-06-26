<?php
require_once "con_db.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Obtener los datos enviados por la solicitud HTTP
  $nombre = $_POST['nombre'];
  $descripcion = $_POST['descripcion'];
  $presentacion = $_POST['presentacion'];

  // Realizar la actualización en la base de datos (ejemplo)
  $sql = "UPDATE producto SET descripcion = :descripcion, presentacion = :presentacion WHERE nombre = :nombre";
  $stmt = $conex->prepare($sql);
  $stmt->bindParam(':descripcion', $descripcion);
  $stmt->bindParam(':presentacion', $presentacion);
  $stmt->bindParam(':nombre', $nombre);
  $stmt->execute();

  // Enviar una respuesta de éxito al cliente
  http_response_code(200);
} else {
  // Enviar una respuesta de error si la solicitud no es POST
  http_response_code(400);
}
?>
