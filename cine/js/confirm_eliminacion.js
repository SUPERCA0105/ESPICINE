function confirmarEliminacion() {
    var confirmacion = confirm("¿Está seguro de eliminar la cuenta?");
    if (confirmacion) {
        return true;
    } else {
        window.location.href = 'home_usuario.php';
        return false;
    }
}