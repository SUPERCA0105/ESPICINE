<?php
session_start();
include_once 'config/conex.php';
// Verificar si ya se ha iniciado sesión
if (isset($_SESSION['id_usuario'])) {
    // Si ya se ha iniciado sesión, redirigir al usuario a la página de inicio
    header("Location:home_usuario.html");
    exit;
}
// Verificar si se ha enviado el formulario de inicio de sesión
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtener las credenciales del formulario
    $email = $_POST['email'];
    $contra = $_POST['password'];
    // Validar las credenciales (puedes agregar más validaciones según tus necesidades)
    if (empty($email) || empty($contra)) {
        // Si falta alguna credencial, mostrar un mensaje de error
        echo "Debe ingresar el correo electrónico y la contraseña";
    } else {
        // Consultar la base de datos para verificar las credenciales
        $sql = "SELECT * FROM `registro` WHERE email = '$email' AND contraseña = '$contra' ";
        $vnclar_datos = $dbh->query($sql);
        if ($vnclar_datos->rowCount() == 1) {
            // Inicio de sesión exitoso
            $_SESSION['id_usuario'] = $user_id; // Guarda el ID de usuario en la sesión
            header("Location:home_usuario.html");
            exit;
        } else {
            // Credenciales incorrectas
            echo "Usuario y/o contraseña incorrectos";
        }
    }
}
?>