<?php
include_once 'config/conex.php';
$nombres = $_POST['nombres'];
$apellidos = $_POST['apellidos'];
$edad = $_POST['edad'];
$email = $_POST['email'];
$contraseña = $_POST['contraseña'];
if ($edad >= 18) {
    $sql = "INSERT INTO registro (nombres, apellidos, edad, email, contraseña, fecha_sys) 
            VALUES ('".$nombres."', '".$apellidos."', '".$edad."', '".$email."', '".$contraseña."', now())";
    if ($dbh->query($sql)) {
        echo "<script>alert('Registro exitoso'); window.setTimeout(function(){ window.location.href = 'http://localhost/cine/index.html'; }, 1000);</script>";
    } else {
        echo "<script>alert('Hubo un error, no se pudo registrar');</script>";
    }
} else {
    echo "<script>alert('Debe ser mayor de edad para registrarse');</script>";
}
?>