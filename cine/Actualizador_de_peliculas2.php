<?php
include_once 'config/conex.php';
$titulo = $_POST['titulo'];
$estado = $_POST['estado'];
if($estado == 1){
    $sql = "UPDATE peliculas SET estado = 1 WHERE titulo = :titulo";
    echo'<script type="text/javascript">
    alert("La pelicula seleccionada esta en Cartelera");
    window.location.href="Actualizador_de_peliculas.php";
    </script>';
} else if($estado == 0) {
    $sql = "UPDATE peliculas SET estado = 0 WHERE titulo = :titulo";
    echo'<script type="text/javascript">
    alert("La pelicula seleccionada ya no estara en Cartelera");
    window.location.href="Actualizador_de_peliculas.php";
    </script>';
}else{
    echo'<script type="text/javascript">
    alert("Hubo un error, ese dato es invalido");
    window.location.href="Actualizador_de_peliculas.php";
    </script>';
}
$stmt = $dbh->prepare($sql);
$stmt->bindParam(':titulo', $titulo);
$stmt->execute();
?>
