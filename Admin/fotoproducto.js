document.addEventListener('DOMContentLoaded', () => {
    // Obtener referencia al campo de carga de archivos y a la etiqueta de imagen de vista previa
    const campoImagen = document.getElementById('imagen-producto');
    const vistaPrevia = document.getElementById('vista-previa');
  
    // Agregar un evento de cambio al campo de carga de archivos
    campoImagen.addEventListener('change', () => {
      // Verificar si se ha seleccionado un archivo
      if (campoImagen.files && campoImagen.files[0]) {
        // Crear un objeto FileReader
        const lector = new FileReader();
  
        // Configurar la función de carga completada del lector
        lector.onload = function (e) {
          // Establecer la imagen de la vista previa con la URL del archivo cargado
          vistaPrevia.src = e.target.result;
          vistaPrevia.style.display = 'block'; // Mostrar la imagen de la vista previa
        };
  
        // Leer el archivo seleccionado como una URL de datos
        lector.readAsDataURL(campoImagen.files[0]);
      }
    });
  });
  