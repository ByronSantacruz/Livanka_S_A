<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <!-- custom css file link  -->
    <link rel="stylesheet" href="../ESTILOS/style.css">
    <!-- custom js file link  -->
    <script src="script.js" defer></script>

</head>
<body>
    <header>
        <div class="logo">
          <a href="#"><img src="../IMAGENES/logo.png" alt="Logo de la empresa"></a>
        </div>
        <nav class="items">
          <ul>
            <li><a href="#">Productos</a>
              <ul>
              <li><a href="#">SNACK</a></li>
              <li><a href="#">CONGELADOS</a></li>
              <li><a href="#">FRESCOS</a></li>
              </ul>
            </li>
          </ul>
        </nav>
        <div class="search-bar">
          <form>
            <input type="text" placeholder="Buscar...">
            <button type="submit">Buscar</button>
          </form>
        </div>
        <nav class="items">
          <ul>
            <li><a href="#">ACERCA DE</a>
              <ul>
                <li><a href="#">Nosotros</a></li>
                <li><a href="#">¿Cómo Comprar?</a></li>
              </ul>
            </li>
            <li><a href="#">¿Quiénes somos?</a></li>
          </ul>
        </nav>
      </header>
      <h1 class="titulo-categorias">Snacks</h1>
      <?php
require_once "../DB/con_db.php";

// Realizar una consulta SELECT para obtener los datos de los productos Snack
$sql = "SELECT nombre, descripcion, presentacion, src FROM producto WHERE categoria_id = 2 ORDER BY nombre";
$result = $conex->query($sql);

// Verificar si se encontraron resultados
if ($result->rowCount() > 0) {
  // Generar el código HTML para el contenedor inicial
  echo "<div class='container'>";
  echo "<div class='products-container'>";

  // Iterar sobre los resultados y generar el código HTML para cada producto
  while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
    $nombre = $row['nombre'];
    $descripcion = $row['descripcion'];
    $presentacion = $row['presentacion'];
    $imagen = $row['src'];

    // Generar el código HTML para cada producto
    echo "<div class='product' data-name='p-$nombre'>";
    echo "<img src='$imagen' alt='Imagen del producto'>";
    echo "<h3>$nombre</h3>";
    echo "<div class='price'></div>";
    echo "</div>";
  }
  echo "</div>"; // products-container
  echo "</div>"; // container

  // Volver al inicio del resultado para generar la clase "preview"
  $result->execute();

  // Generar el código HTML para el contenedor de la vista previa
  echo "<div class='products-preview'>";
  
  // Iterar sobre los resultados y generar el código HTML para la vista previa de cada producto
  while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
    $nombre = $row['nombre'];
    $descripcion = $row['descripcion'];
    $presentacion = $row['presentacion'];
    $imagen = $row['src'];

    // Generar el código HTML para la vista previa de cada producto
    echo "<div class='preview' data-target='p-$nombre'>";
    echo "<i class='fas fa-times'></i>";
    echo "<img src='$imagen' alt='Imagen del producto'>";
    echo "<h3>$nombre</h3>";
    echo "<div class='stars'>";
    echo "<p>PRESENTACIONES</p>";
    echo "<span>($presentacion)</span>";
    echo "</div>";
    echo "<p>$descripcion</p>";
    echo "<div class='price'></div>";
    echo "</div>";
  }
  
  echo "</div>"; // products-preview
} else {
  echo "<p>No se encontraron productos Snack.</p>";
}

// Cerrar la conexión a la base de datos
$conex = null;
?>





 
</body>
</html>
