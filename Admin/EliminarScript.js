$(document).ready(function() {
    // Agregar un evento de clic a los botones de eliminación
    $('.botonEliminar').on('click', function() {
      // Obtener el nombre del producto
      var nombre = $(this).data('id');
  
      // Realizar la solicitud de eliminación al servidor
      $.ajax({
        url: '../DB/eliminar_producto.php',
        method: 'POST',
        data: { nombre: nombre },
        success: function(response) {
          var result = JSON.parse(response);
          if (result.success) {
            alert(result.message);
            location.reload(); // Recargar la página actual
          } else {
            console.error(result.message);
          }
        },
        error: function(xhr, status, error) {
          console.error(error);
        }
      });
    });
  });
  
      
  