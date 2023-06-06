// Obtener el botón y la ventana modal
var botonAbrirModal = document.getElementById('abrir-modal');
var ventanaModal = document.getElementById('mi-modal');

// Obtener el botón de cerrar y asignar un controlador de eventos
var botonCerrarModal = ventanaModal.querySelector('.cerrar');
botonCerrarModal.addEventListener('click', function() {
  ventanaModal.style.display = 'none'; // Ocultar la ventana modal al hacer clic en el botón de cerrar
});

// Asignar un controlador de eventos al botón para abrir la ventana modal
botonAbrirModal.addEventListener('click', function() {
  ventanaModal.style.display = 'block'; // Mostrar la ventana modal al hacer clic en el botón
});

// Ocultar la ventana modal al hacer clic fuera de ella
window.addEventListener('click', function(event) {
  if (event.target == ventanaModal) {
    ventanaModal.style.display = 'none';
  }
});