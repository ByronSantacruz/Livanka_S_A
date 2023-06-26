<?php

require 'con_db.php';

session_start();
$usuario = $_POST['usuario'];
$contra = $_POST['contra'];
$query = "SELECT nombre_completo FROM users WHERE usuario=:usuario AND contra=:contra";
$statement = $conex->prepare($query);
$statement->bindParam(':usuario', $usuario);
$statement->bindParam(':contra', $contra);
$statement->execute();
$resultado = $statement->fetch(PDO::FETCH_ASSOC);

if ($resultado) {
    $_SESSION['nombre_usuario'] = $usuario;
    $_SESSION['nombre_completo'] = $resultado['nombre_completo'];
    header("location: ../Admin/adminSnack.php");
} else {
    echo "No se ha encontrado este usuario en la base de datos!<br>";
}
?>
