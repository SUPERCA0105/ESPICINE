<?php
include_once 'config/conex.php';
$titulo=$_POST['titulo'];
$director=$_POST['director'];
$duracion = $_POST['duracion'];
$sinopsis=$_POST['sinopsis'];
$genero=$_POST['genero'];
$portada='';
if(isset($_FILES["portada"])){
    $file = $_FILES["portada"];
    $nombre = $file["name"];
    $tipo = $file["type"];
    $ruta_provisional = $file["tmp_name"];
    $size = $file["size"];
    $dimensiones = getimagesize($ruta_provisional);
    $width = $dimensiones[0];
    $height = $dimensiones[1];
    $carpeta = "portada/";
    $src = $carpeta.$nombre;
    if($tipo != 'image/jpg' && $tipo != 'image/JPG' && $tipo != 'image/jpeg' && $tipo != 'image/png' && $tipo != 'image/gif'){
        echo "Error el archivo no es una imagen";
    }elseif($size > 10*1024*1024){
        echo "Error el tamaño maximo permitido es de 10MB";
    }else{
        $src = $carpeta.$nombre;
        move_uploaded_file($ruta_provisional, $src);
        $portada="portada/".$nombre;
    }
}
list($horas, $minutos, $segundos) = explode(':', $duracion);
$sql="INSERT INTO peliculas(titulo, director, duracion, sinopsis, genero, portada, fecha_sys) VALUES ('".$titulo."','".$director."','".$duracion."','".$sinopsis."','".$genero."','".$portada."',now())";
if($dbh->query($sql))
{
    echo'<script type="text/javascript">
    alert("Se ha registrado la pelicula correctamente");
    window.location.href="Registro_de_peliculas.html";
    </script>';
}
else
{
    echo'<script type="text/javascript">
    alert("Hubo un error, no se ha registrado la pelicula correctamente");
    window.location.href="Registro_de_peliculas.html";
    </script>';
}
?>