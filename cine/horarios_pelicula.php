<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Horarios de la Película</title>
    <link rel="stylesheet" href="styles/style_horarios.css">
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
            <li><a href="index.html">Inicio</a></li>
            <li><a href="carteleras.php">Cartelera</a></li>
            <li><a href="contactanos.html">Contacto</a></li>
            <li><a href="#" id="login-btn">Iniciar sesión</a></li>
          </ul>
        </nav>
      </div>
    </header>
    <main>
      <section class="movie-info">
        <div class="container">
          <div class="info">
            <?php
              include_once 'config/conex.php';
              $idPelicula = $_GET['id'];
              $sql = "SELECT titulo, sinopsis, portada FROM peliculas WHERE id_peliculas = ?";
              $stmt = $dbh->prepare($sql);
              $stmt->execute([$idPelicula]);
              $pelicula = $stmt->fetch(PDO::FETCH_ASSOC);
              if ($pelicula) {
                echo '<div>';
                echo '<h1>' . $pelicula['titulo'] . '</h1>';
                echo '<p>' . $pelicula['sinopsis'] . '</p>';
                echo '<img src="' . $pelicula['portada'] . '" alt="' . $pelicula['titulo'] . '">';
                echo '</div>';
              } else {
                echo 'Información no disponible.';
              }
            ?>
            <a href="compra.php" class="btn">Comprar Boletos</a>
          </div>
        </div>
      </section>
      <section class="showtimes">
        <div class="container">
          <h2>Horarios de la Película</h2>
          <table>
            <tr>
              <th>Cine</th>
              <th>Horarios Disponibles</th>
            </tr>
            <tr>
              <td>lunes</td>
              <td>12:00 PM, 3:00 PM, 6:00 PM, 9:00 PM</td>
            </tr>
            <tr>
              <td>miercoles</td>
              <td>1:00 PM, 4:00 PM, 7:00 PM, 10:00 PM</td>
            </tr>
            <tr>
              <td>viernes</td>
              <td>2:00 PM, 5:00 PM, 8:00 PM, 11:00 PM</td>
            </tr>
          </table>
        </div>
      </section>
    </main>
    <footer>
      <div class="container">
        <p>&copy; 2023 espicine</p>
      </div>
    </footer>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>
  </body>
</html>