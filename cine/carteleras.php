<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/carteleras.css">
    <title>Cartelera</title>
</head>
<body>
    <header>
        <a class="logo" href="#">
      <img class="logo_img" src="img/ESPICINE.jpg" alt="espicine">
        <h2 class="nombre_empresa">ESPICINE</h2>
      </a>
      <ul>
        <nav>
          <ul>
            <li><a href="index.html">INICIO</a></li>
            <li><a href="#">Próximos estrenos</a></li>
            <li><a href="contactanos.html">Contacto</a></li>
          </ul>
        </ul>
        </nav>
    </header>
    <section class="movies">
      <div class="container">
        <h3>Cartelera</h3>
        <div class="movie-container">
        <?php
          include_once 'config/conex.php';
          $sql = "SELECT * FROM peliculas WHERE estado = 1;";
          $resultado = $dbh->query($sql);
          while ($fila = $resultado->fetch(PDO::FETCH_ASSOC)) {
              $titulo = $fila['titulo'];
              $sinopsis = $fila['sinopsis'];
              $portada = $fila['portada']; 
              echo '<div class="movie">';
              echo '<img src="'.$portada.'" alt="'.$titulo.'">';
              echo '<div class="movie-info">';
              echo '<h3>'.$titulo.'</h3>';
              echo '<p>'.$sinopsis.'</p>';
              echo '<a href="horarios_pelicula.html" class="btn">Ver horarios</a>';
              echo '</div>';
              echo '</div>';
          }
        ?>
        </div>
      </div>
    </section>  
</body>
</html>