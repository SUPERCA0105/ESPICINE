document.addEventListener('DOMContentLoaded', (event) => {
  const verHorariosButtons = document.querySelectorAll('.btn');
  verHorariosButtons.forEach(button => {
    button.addEventListener('click', function(e) {
      e.preventDefault();
      const idPelicula = this.dataset.id; // Obtiene el ID de la película
      fetch(`horarios_pelicula.php?id=${idPelicula}`)
      .then(response => response.text())
      .then(html => {
        // Aquí puedes decidir qué hacer con el HTML recibido
        document.body.innerHTML = html; // Esto reemplazaría el contenido actual de la página
      });
    });
  });
});