const form = document.getElementById('carteleraForm');
form.addEventListener('submit', function (event) {
    event.preventDefault();
    const selectedDate = form.elements.fecha_registro.value;
    console.log('Fecha seleccionada:', selectedDate);
    form.submit(); 
});
document.addEventListener("DOMContentLoaded", function() {
    var fechaRegistroInput = document.querySelector("input[name='fecha_registro']");
     fechaRegistroInput.addEventListener("change", function() {
      var fechaRegistro = fechaRegistroInput.value;
      document.getElementById("fecha_registro_hidden").value = fechaRegistro;
    });
  });