<?php
session_start();
$varsesion = $_SESSION['nombre_usuario'];
if ($varsesion == null || $varsesion == '') {
  echo 'ILEGAL... No has ingresado datos para iniciar sesión!!';
  die();
}
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Livanka Admin</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="estilos.css">
    <script src="fotoproducto.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="EliminarScript.js"></script>
    <style>
      /* Estilo para el contenedor principal */
      .container {
        background-image: url(../IMAGENES/FondoAdmi.png);
        background-repeat: no-repeat;
        background-size: cover;
        height: 100%;
      }
    </style>
  </head>
  <body>
    <div class="container">
      <header>
        <div class="logo">
          <a href="#"><img src="../IMAGENES/logo.png" alt="Logo de la empresa"></a>
        </div>
        <nav class="items">
          <ul>
            <li><a href="#">Categorías</a>
              <ul>
                <li><a href="adminSnack.php">SNACK</a></li>
                <li><a href="adminCongelados.php">CONGELADOS</a></li>
                <li><a href="#" onclick="location.reload();">FRESCOS</a></li>
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
        <nav class="person">
          <ul>
            <li><a href="#">Hola, <?php echo $_SESSION['nombre_completo']; ?></a>
              <ul>
                <li><li><a href="../DB/cerrarsesion.php">Cerrar Sesion</a></li>
              </ul>
            </li>
          </ul>
        </nav>
      </header>
      <h3 class="tituloFrescos">FRESCOS</h3>
      <form class="formularioFescos" action="../DB/procesar_formularioFrescos.php" method="post" onsubmit="agregarProducto(); return false;" enctype="multipart/form-data">
      <div class="columna">
      <div class="cuadradito" onclick='mostrarRectangulo()'>
      <h3>Editar</h3>
      </div>
    </div>
    <div class="columna">
      <label for="nombre-producto" class="etiqueta">Nombre del producto:</label>
      <input type="text" id="nombre-producto" name="nombre-producto" class="campo-texto" placeholder="Nombre del producto">

      <label for="descripcion" class="etiqueta">Descripción del producto:</label>
      <textarea id="descripcion" name="descripcion" class="campo-texto" placeholder="Describir Producto"></textarea>

      <label for="presentacion_producto" class="etiqueta">Presentación del producto:</label>
      <input type="text" id="presentacion_producto" name="presentacion-producto" class="campo-texto" placeholder="ejemplo: (45g/100g/200g/400g)">

      <h3>Calificación</h3>
      <div class="calificacion">
        <span class="estrella">&#9733;</span>
        <span class="estrella">&#9733;</span>
        <span class="estrella">&#9733;</span>
        <span class="estrella">&#9733;</span>
        <span class="estrella">&#9733;</span>
      </div>
    </div>
    <div class="columna">
      <label for="imagen-producto" class="etiqueta">Insertar Imagen del producto:</label>
      <input type="file" id="imagen-producto" name="imagen-producto" class="campo-archivo" accept="image/*">
      <div class="vista-previa-container">
        <img id="vista-previa" src="#" alt="Vista previa de la imagen" style="display: none;">
      </div>
      <button type="submit" class="boton">Agregar Producto</button>
    </div>
  </form>
</div>


    <script>
      // Obtener todas las estrellas
      const estrellas = document.querySelectorAll('.estrella');

      // Variable para almacenar la calificación
      let calificacion = 0;

      // Agregar el evento de cambio de color al pasar el cursor
      estrellas.forEach((estrella, index) => {
        estrella.addEventListener('mouseover', () => {
          cambiarColorEstrellas(index);
        });

        estrella.addEventListener('mouseout', () => {
          restaurarColorEstrellas();
        });

        estrella.addEventListener('click', () => {
          calificacion = index + 1; // Actualizar la calificación al hacer clic en una estrella
        });
      });

      // Función para cambiar el color de las estrellas según el índice
      function cambiarColorEstrellas(index) {
        estrellas.forEach((estrella, i) => {
          if (i <= index) {
            estrella.style.color = '#FFA900'; // Cambiar color de las estrellas seleccionadas
          } else {
            estrella.style.color = '#dfdad0'; // Cambiar color de las estrellas no seleccionadas
          }
        });
      }

      // Función para restaurar el color original de las estrellas
      function restaurarColorEstrellas() {
        estrellas.forEach((estrella, i) => {
          if (i < calificacion) {
            estrella.style.color = '#FFA900'; // Mantener color de las estrellas seleccionadas
          } else {
            estrella.style.color = '#dfdad0'; // Restaurar color de las estrellas no seleccionadas
          }
        });
      }

     // Función para agregar el producto (puedes personalizarla según tus necesidades)
     function agregarProducto() {
        const nombre = document.getElementById('nombre-producto').value;
        const descripcion = document.getElementById('descripcion').value;
        const presentacion = document.getElementById('presentacion_producto').value;
        const imagen = document.getElementById('imagen-producto').files[0];

        // Validar si los campos están vacíos
        if (nombre === '' || descripcion === '' || presentacion === '' || imagen === undefined) {
          alert('Debes llenar todos los campos');
          return;
        }

        // Aquí puedes realizar las acciones necesarias para guardar la información del producto
        // por ejemplo, enviarla a través de una solicitud HTTP o guardarla en una base de datos

        // Crear un objeto FormData para enviar los datos
        const formData = new FormData();
        formData.append('nombre', nombre);
        formData.append('descripcion', descripcion);
        formData.append('presentacion', presentacion);
        formData.append('imagen', imagen);
        formData.append('calificacion', calificacion);

        // Realizar la solicitud HTTP POST a procesar_formulario.php
        const request = new XMLHttpRequest();
        request.open('POST', '../DB/procesar_formularioFrescos.php');
        request.onreadystatechange = function() {
          if (request.readyState === XMLHttpRequest.DONE) {
            if (request.status === 200) {
              console.log(request.responseText); // Mostrar la respuesta del servidor
              alert('Los datos se han enviado correctamente');
            } else {
              console.error('Error en la solicitud:', request.status);
            }
          }
        };
        request.send(formData);
      }
    </script>
    <?php
require_once "../DB/con_db.php";

// Realizar una consulta SELECT para obtener los datos de los productos Snack
$sql = "SELECT nombre, descripcion, presentacion, src, categoria_id FROM producto WHERE categoria_id = 3 ORDER BY nombre";
$result = $conex->query($sql);

// Verificar si se encontraron resultados
if ($result->rowCount() > 0) {
  // Generar el código HTML para el contenedor inicial
  echo "<div class='rectangulo' id='rectangulo' style='display: none;'>";
  echo "<button class='ocultar' onclick='ocultarRectangulo()'>X</button>"; // Botón para ocultar el cuadro
  echo "<div class='titulo'>Visualizar Productos</div>";

  // Generar la tabla dentro de un contenedor con altura fija
  echo "<div class='tabla-contenedor'>";
  echo "<table>";
  echo "<tr>";
  echo "<th>Nombre</th>";
  echo "<th>Imagen</th>";
  echo "<th>Editar</th>";
  echo "<th>Eliminar</th>";
  echo "</tr>";

  // Contador para limitar el número de filas mostradas
  $contador = 0;

  // Iterar sobre los resultados y generar una fila por cada producto
  while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
    $nombre = $row['nombre'];
    $descripcion = $row['descripcion'];
    $presentacion = $row['presentacion'];
    $imagen = $row['src'];

    echo "<tr>";
    echo "<td>$nombre</td>";
    echo "<td><img src='$imagen' alt='Imagen del producto' class='imagen-producto'></td>";
    echo "<td><button class='botoneditar' data-id='$nombre' onclick='mostrarCuadroEdicion(\"$imagen\",\"$nombre\", \"$presentacion\", \"$descripcion\")'>Editar</button></td>";
    echo "<td><button class='botonEliminar' data-id='$nombre'>Eliminar</button></td>";
    echo "</tr>";

  }

  echo "</table>";
  echo "</div>"; // tabla-contenedor
  echo "</div>"; // rectangulo
} else {
  echo "<p>No se encontraron productos Snack.</p>";
}

// Cerrar la conexión a la base de datos
$conex = null;
?>

<script>
  function ocultarRectangulo() {
    var rectangulo = document.getElementById('rectangulo');
    rectangulo.style.display = 'none';
    // Limpiar el contenido del cuadro-GRIS
  var cuadroGris = document.getElementsByClassName('cuadro-GRIS')[0];
  
}
  function mostrarRectangulo() {
    var rectangulo = document.getElementById('rectangulo');
    rectangulo.style.display = 'block';
  }
  function mostrarCuadroEdicion(imagen, nombre, presentacion, descripcion) {
    var rectangulo = document.getElementById('rectangulo');
    // Crear un cuadro de edición con los datos correspondientes
    var cuadrogris = document.createElement('div');
    cuadrogris.classList.add('cuadro-GRIS');
    cuadrogris.style.position = 'fixed';
    cuadrogris.style.top = '0';
    cuadrogris.style.left = '0';
    cuadrogris.style.width = '100%';
    cuadrogris.style.height = '100%';
cuadrogris.style.backgroundColor = 'rgba(0, 0, 0, 0.5)';
cuadrogris.style.display = 'flex';
cuadrogris.style.alignItems = 'center';
cuadrogris.style.justifyContent = 'center';
cuadrogris.style.zIndex = '9999';
    var cuadroEdicion = document.createElement('div');
    cuadroEdicion.classList.add('cuadro-edicion');

    var botonCerrar = document.createElement('button');
    botonCerrar.textContent = 'X';
    botonCerrar.classList.add('cerrar');
    botonCerrar.addEventListener('click', function() {
// Limpiar el contenido del cuadro-GRIS
var cuadroGris = document.getElementsByClassName('cuadro-GRIS')[0];
cuadroGris.remove();
      cuadroEdicion.remove();

    });
    cuadroEdicion.appendChild(botonCerrar);

    var imagenProducto = document.createElement('img');
    imagenProducto.src = imagen;
    imagenProducto.alt = 'Imagen del producto';
    imagenProducto.classList.add('imagen-producto');
    cuadroEdicion.appendChild(imagenProducto);

    var labelNombre = document.createElement('label');
    labelNombre.textContent = 'Nombre:';
    cuadroEdicion.appendChild(labelNombre);

    var spanNombre = document.createElement('span');
spanNombre.textContent = nombre;
spanNombre.style.backgroundColor = 'black';
spanNombre.style.color = '#FFD400';
spanNombre.style.fontSize = '16px';
cuadroEdicion.appendChild(spanNombre);

    var labelDescripcion = document.createElement('label');
    labelDescripcion.textContent = 'Descripción:';
    cuadroEdicion.appendChild(labelDescripcion);

    var inputDescripcion = document.createElement('textarea');
    inputDescripcion.value = descripcion;
    cuadroEdicion.appendChild(inputDescripcion);

    var labelPresentacion = document.createElement('label');
    labelPresentacion.textContent = 'Presentación: ejemplo: (45g/100g/200g/400g)';
    cuadroEdicion.appendChild(labelPresentacion);

    var inputPresentacion = document.createElement('input');
    inputPresentacion.type = 'text';
    inputPresentacion.value = presentacion;
    cuadroEdicion.appendChild(inputPresentacion);

    var botonGuardar = document.createElement('button');
botonGuardar.textContent = 'Actualizar';
botonGuardar.addEventListener('click', function() {
  // Obtener los valores actualizados de los campos de edición
  var nuevoNombre = spanNombre.textContent;
  var nuevaDescripcion = inputDescripcion.value;
  var nuevaPresentacion = inputPresentacion.value;

  // Realizar una solicitud HTTP para enviar los datos actualizados al servidor
  var xhr = new XMLHttpRequest();
  xhr.open('POST', '../DB/actualizar_producto.php');
  xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
  xhr.onload = function() {
    if (xhr.status === 200) {
      // Mostrar una alerta de éxito (puedes personalizarla según tus necesidades)
      alert('Los cambios se han guardado correctamente');
    } else {
      // Mostrar una alerta de error si la solicitud no fue exitosa
      alert('Ha ocurrido un error al guardar los cambios');
    }

    // Ocultar el cuadro de edición
    cuadroEdicion.remove();
    var cuadroGris = document.getElementsByClassName('cuadro-GRIS')[0];
cuadroGris.remove();
  };
  xhr.send('nombre=' + encodeURIComponent(nuevoNombre) +
           '&descripcion=' + encodeURIComponent(nuevaDescripcion) +
           '&presentacion=' + encodeURIComponent(nuevaPresentacion));
});
cuadroEdicion.appendChild(botonGuardar);

    // Insertar el cuadro de edición dentro del rectángulo
    cuadrogris.appendChild(cuadroEdicion);
    rectangulo.appendChild(cuadrogris);

  }
</script>
    </div>
  </body>
  </html>