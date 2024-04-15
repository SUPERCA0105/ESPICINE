<?php
include_once 'config/conex.php';
$query = "SELECT nombres, apellidos, user_name, email FROM registro WHERE id_usuario = id_usuario";
$stmt = $dbh->query($query);

if ($stmt) {
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    $username = $row["user_name"];
    $realname = $row["nombres"] . " " . $row["apellidos"];
    $email = $row["email"];
    $response = array("username" => $username, "realname" => $realname, "email" => $email);
    echo json_encode($response);
} else {
    echo json_encode(array("message" => "No se encontraron datos del usuario."));
}
?>
