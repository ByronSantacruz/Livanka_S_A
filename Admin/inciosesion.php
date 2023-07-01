<!DOCTYPE html>
<html>
<head>
    <title>LIVANKA</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../ESTILOS/Login.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    <div class="container" >
        <form action="../DB/logininterno.php" method="post">
            <img src="../IMAGENES/logo.png">
            <label for="username">Usuario:</label>
            <input class="Datos" type="text" name="usuario" placeholder="Ingresa tu usuario" required>
            <label for="password">Contraseña:</label>
            <input class="Datos" type="password" name="contra" placeholder="Ingresa tu contraseña" required>
            <label for="showPassword">
                <input type="checkbox" id="showPassword"> Mostrar contraseña
            </label>
            <input class="Ingresar" type="submit" name="register" value="Iniciar sesión">
        </form>
    </div>
</body>
<script src="../scripts/Observar.js"></script>
</html>
