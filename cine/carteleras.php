<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Cartelera</title>
  <link rel="stylesheet" href="styles/carteleras.css">
  <link rel="stylesheet" href="styles/boton_inicio.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css">
  <link rel="stylesheet" href="styles/slick-custom.css">
</head>
<body>
    <header>
        <a class="logo" href="#">
      <img class="logo_img" src="img/ESPICINE.jpg" alt="espicine">
        <h2 class="nombre_empresa">ESPICINE</h2>
      </a>
        <nav>
          <ul>
            <li><a href="index.html">INICIO</a></li>
            <li><a href="proximos_estrenos.html">Próximos estrenos</a></li>
            <li><a href="contactanos.html">Contacto</a></li>
            <li><a href="#" id="login-btn">Iniciar sesión</a></li>
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
              $id = $fila['id_peliculas'];            
              $titulo = $fila['titulo'];
              $sinopsis = $fila['sinopsis'];
              $portada = $fila['portada']; 
              echo '<div class="movie">';
              echo '<img src="'.$portada.'" alt="'.$titulo.'">';
              echo '<div class="movie-info">';
              echo '<h3>'.$titulo.'</h3>';
              echo '<p>'.$sinopsis.'</p>';
              echo '<a href="#" class="btn" data-id="'.$id.'">Ver horarios</a>';
              echo '</div>';
              echo '</div>';
          }
        ?>
        </div>
      </div>
    </section>
    <div id="login-modal" class="modal">
    <div class="modal-content">
      <span class="close">×</span>
      <h3>Iniciar sesión</h3>
      <form action="ingreso.php" method="post">
        <div class="form-group">
          <label for="email">Email</label>
          <input type="email" id="email" name="email" placeholder="Correo electrónico">
        </div>
        <div class="form-group">
          <label for="password">Contraseña</label>
          <input type="password" id="password" name="password" placeholder="Contraseña">
        </div>
        <div class="form-group">
          <input type="submit" value="Iniciar sesión">
          <a href="registro.html">Crear cuenta nueva</a>
          <p class="error-message"></p>
        </div>
      </form>
    </div>
  </div>
  <script src="js/inicio.js"></script>
  <script src="js/info_horarios.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>
</body>
</html>