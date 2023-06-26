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
 
   // Aquí puedes realizar las acciones necesarias para guardar la información del producto
   // por ejemplo, enviarla a través de una solicitud HTTP o guardarla en una base de datos
 
   console.log('Nombre:', nombre);
   console.log('Descripción:', descripcion);
   console.log('Presentación:', presentacion);
   console.log('Calificación:', calificacion);
}