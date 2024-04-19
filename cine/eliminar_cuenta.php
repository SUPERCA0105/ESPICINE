<?php
session_start();
$user_id = $_SESSION['id_usuario'];
include_once 'config/conex.php';
$sql = "UPDATE registro SET estado = 0 WHERE id_usuario = $user_id;";
$stmt = $dbh->prepare($sql);
$stmt->execute();
if ($stmt->rowCount() > 0) {
    echo "<script>alert('Se ha eliminado la cuenta con éxito'); window.setTimeout(function(){ window.location.href = 'home_usuario.php'; }, 1000);</script>";
} else {
    echo "<script>alert('Error al eliminar la cuenta, intentelo de nuevo mas tarde');</script>";
}
?>