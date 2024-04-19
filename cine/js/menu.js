document.addEventListener('DOMContentLoaded', function() {
  var menuItems = document.querySelectorAll('.item');
  menuItems.forEach(function(menuItem) {
    menuItem.addEventListener('click', function(event) {
      event.stopPropagation();
      // Cierra todos los otros submenús
      menuItems.forEach(function(otherMenuItem) {
        if (otherMenuItem !== menuItem) {
          otherMenuItem.querySelector('.submenu').style.display = 'none';
        }
      });
      // Abre o cierra este submenú
      var submenu = this.querySelector('.submenu');
      submenu.style.display = submenu.style.display === 'none' ? 'block' : 'none';
    });
  });
  // Cierra todos los submenús cuando se hace clic fuera del menú
  document.addEventListener('click', function() {
    menuItems.forEach(function(menuItem) {
      menuItem.querySelector('.submenu').style.display = 'none';
    });
  });
});