document.addEventListener('DOMContentLoaded', function() {
  var menuItems = document.querySelectorAll('.menu_item .item');
  menuItems.forEach(function(menuItem) {
    menuItem.addEventListener('click', function(event) {
      event.stopPropagation();
      // Cierra todos los otros submenús
      menuItems.forEach(function(otherMenuItem) {
        if (otherMenuItem !== menuItem) {
          otherMenuItem.classList.remove('open');
        }
      });
      // Abre o cierra este submenú
      this.classList.toggle('open');
    });
  });
  // Cierra todos los submenús cuando se hace clic fuera del menú
  document.addEventListener('click', function() {
    menuItems.forEach(function(menuItem) {
      menuItem.classList.remove('open');
    });
  });
});