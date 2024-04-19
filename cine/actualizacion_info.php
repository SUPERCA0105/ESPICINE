<?php
session_start();
$user_id = $_SESSION['id_usuario'];
include_once 'config/conex.php';
$nombres = $_POST['nombres'];
$apellidos = $_POST['apellidos'];
$email = $_POST['email'];
$contraseña = $_POST['contraseña'];
$username = $_POST['user_name'];
$estado = 1;
   $sql = "UPDATE registro  SET nombres='".$nombres."', apellidos='".$apellidos."', email='".$email."', contraseña='".$contraseña."', user_name='".$username."' WHERE id_usuario = $user_id";
   $stmt = $dbh->prepare($sql);
   $stmt->execute();
   if ($stmt->rowCount() > 0) {
        echo "<script>alert('Se ha actualizado la informacion correctamente'); window.setTimeout(function(){ window.location.href = 'http://localhost/cine/home_usuario.php'; }, 1000);</script>";
    } else {
        echo "<script>alert('Hubo un error, no se pudo actualizar la informacion');</script>";
    }
?>