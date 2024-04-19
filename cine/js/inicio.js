// Obtener referencia al modal y al botón de inicio de sesión
var modal = document.getElementById("login-modal");
var loginBtn = document.getElementById("login-btn");

// Obtener referencia al elemento <span> que cierra el modal
var closeBtn = document.getElementsByClassName("close")[0];

// Abrir el modal al hacer clic en el botón de inicio de sesión
loginBtn.addEventListener("click", function() {
  modal.style.display = "block";
});

// Cerrar el modal al hacer clic en el botón de cierre (x)
closeBtn.addEventListener("click", function() {
  modal.style.display = "none";
});

// Cerrar el modal al hacer clic fuera del área del modal
window.addEventListener("click", function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
});
