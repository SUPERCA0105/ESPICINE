
  function toggleMenu() {
    var menu = document.querySelector('.menu');
    menu.classList.toggle('show');
  }
  function cargarUsuarios() {
    var solicitudhttp = new XMLHttpRequest();
    solicitudhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("userList").innerHTML = this.responseText;
      }
    };
    solicitudhttp.open("GET", "panel_abministrador.php", true);
    solicitudhttp.send();
  }
  function actualizarUsuario(id) {
    var nombres = document.getElementById("nombres-" + id).value;
    var apellidos = document.getElementById("apellidos-" + id).value;
    var edad = document.getElementById("edad-" + id).value;

    var solicitudhttp = new XMLHttpRequest();
    solicitudhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        alert("Usuario actualizado correctamente");
      }
    };
    solicitudhttp.open("POST", "actulizar_usuario.php", true);
    solicitudhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    solicitudhttp.send("id=" + id + "&nombres=" + nombres + "&apellidos=" + apellidos + "&edad=" + edad);
  }

  function eliminarUsuario(id) {
    var confirmacion = confirm("¿Estás seguro de que deseas eliminar este usuario?");
    if (confirmacion) {
      var solicitudhttp = new XMLHttpRequest();
      solicitudhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
          alert("Usuario eliminado correctamente");
          cargarUsuarios();
        }
      };
      solicitudhttp.open("POST", "eliminar_usuario.php", true);
      solicitudhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
      solicitudhttp.send("id=" + id);
    }
  }