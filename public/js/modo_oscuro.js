 // Función para confirmar la eliminación con SweetAlert2
 function confirmDelete(event, url) {
     event.preventDefault(); // Evita que el enlace se abra inmediatamente
     Swal.fire({
         title: '¿Estás seguro?',
         text: "¡No podrás revertir esta acción!",
         icon: 'warning',
         showCancelButton: true,
         confirmButtonColor: '#d33',
         cancelButtonColor: '#3085d6',
         confirmButtonText: 'Sí, eliminar',
         cancelButtonText: 'Cancelar'
     }).then((result) => {
         if (result.isConfirmed) {
             window.location.href = url; // Redirige a la URL de eliminación
         }
     });
 }

 // Función para mostrar alerta de éxito al guardar
 document.getElementById('movimientoForm').addEventListener('submit', function(event) {
     event.preventDefault(); // Evita que el formulario se envíe inmediatamente
     Swal.fire({
         title: '¡Guardado!',
         text: 'El movimiento ha sido guardado correctamente.',
         icon: 'success',
         confirmButtonText: 'Aceptar'
     }).then((result) => {
         if (result.isConfirmed) {
             event.target.submit(); // Envía el formulario después de confirmar
         }
     });
 });

 // Función para cambiar entre modo oscuro y claro
 document.getElementById('theme-toggle').addEventListener('click', function() {
     const body = document.body;
     body.classList.toggle('dark-mode');
     const isDarkMode = body.classList.contains('dark-mode');
     localStorage.setItem('dark-mode', isDarkMode);
     this.innerHTML = isDarkMode ? '🌞' : '🌓'; // Cambia el ícono del botón
 });

 // Verificar el modo al cargar la página
 document.addEventListener('DOMContentLoaded', function() {
     const isDarkMode = localStorage.getItem('dark-mode') === 'true';
     if (isDarkMode) {
         document.body.classList.add('dark-mode');
         document.getElementById('theme-toggle').innerHTML = '🌞';
     }
 });