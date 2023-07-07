<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="stylesheet" href="../ESTILOS/jostin.css">
    <link href="css/styles.css" rel="stylesheet" />
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light fixed-top shadow-sm" id="mainNav">
    <div class="container px-5">
        <a class="navbar-brand" href="inicio-usuario.php">
            <img src="../IMAGENES/logo.png" height="70px" alt="...">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            Menu
            <i class="bi-list"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ms-auto me-4 my-3 my-lg-0">
                <li class="nav-item"><a class="nav-link me-lg-3" href="Categorias.php">Productos</a></li>
                <li class="nav-item"><a class="nav-link me-lg-3" href="pedido.php">¿Como comprar?</a></li>
                <li class="nav-item"><a class="nav-link me-lg-3" href="vym.php">¿Quienes somos?</a></li>
            </ul>
            <a class="btn btn-primary rounded-pill px-3 mb-2 mb-lg-0" href="https://w.app/ZRus1W">
              <span class="d-flex align-items-center">
                  <i class="bi-chat-text-fill me-2"></i>
                  <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/6/6b/WhatsApp.svg/800px-WhatsApp.svg.png" height="30vw">
                  <span class="small">Escríbenos por Whatsapp</span>
              </span>
          </a>
        </div>
    </div>
  </nav><br>
    <h1 class="titulo-categorias">Categorias</h1>
    <div class="container-card">
        <div class="card">
            <figure>
              <center>  <img src="../IMAGENES/imagen1.jpg"style="max-height: 300px; width: 190px; " ></center>
            </figure>
            <div class="contenido-card">
                <h3>snack</h3>
                <p>Deleciosos snack de comida a base de platanos, yuca y otros derivados</p>
                <a href="Snacks.php"> Saber Mas</a>
            </div>
        </div>
        <div class="card">
            <figure>
            <center>  <img src="../IMAGENES/imagen1.jpg"style="max-height: 300px; width: 190px; " ></center>
            </figure>
            <div class="contenido-card">
                <h3>Congelados</h3>
                <p>Productos Congelados.</p>
                <a href="Congelados.php">Saber Mas</a>
            </div>
        </div>
        <div class="card">
            <figure>
            <center>  <img src="../IMAGENES/imagen1.jpg"style="max-height: 300px; width: 190px; " ></center>
            </figure>
            <div class="contenido-card">
                <h3>refrijerados</h3>
                <p>Productos refrijerados</p>
                <a href="refrijerados.php">Saber Mas</a>
            </div>
        </div>
    </div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="js/scripts.js"></script>
<script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
</body>
</html>