<?php
// Configuración de la conexión a la base de datos
$dsn = "pgsql:host=localhost;dbname=LIVANKA";
$username = "postgres";
$password = "12345";

try {
    // Crear una nueva instancia de PDO
    $conex = new PDO($dsn, $username, $password);

    // Establecer el modo de error para lanzar excepciones en caso de error
    $conex->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Mostrar mensaje de conexión exitosa
    echo "Conexión exitosa a la base de datos.";
} catch (PDOException $e) {
    // Error al conectar a la base de datos
    exit();
}

// Lista de nombres de tablas
$users = 'users';
$snack = 'snack';
?>
