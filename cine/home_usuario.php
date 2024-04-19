<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Home Usuario</title>
    <link rel="stylesheet" type="text/css" href="styles/home_admin.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" />
    <link flex href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
</head>
<body>
    <nav class="sidebar locked">
        <div class="logo_items flex">
          <span class="nav_image">
            <img src="img/ESPICINE.jpg" alt="logo_img" />
          </span>
          <span class="logo_name">Espicine</span>
          <i class="bx bx-lock-alt" id="lock-icon" title="Unlock Sidebar"></i>
          <i class="bx bx-x" id="sidebar-close"></i>
        </div>
        <div class="menu_container">
          <div class="menu_items">
            <ul class="menu_item">
              <div class="menu_title flex">
                <span class="title">Menu</span>
                <span class="line"></span>
              </div>
              <li class="item">
                <a href="carteleras.php" class="link flex">
                  <i class="bx bx-home-alt"></i>
                  <span>Cartelera</span>
                </a>
                <ul class="submenu">
                </ul>
              </li>
              <li class="item">
                <a href="proximos_estrenos.html" class="link flex">
                  <i class="bx bx-user"></i>
                  <span>Proximos Estrenos</span>
                </a>
                <ul class="submenu">
                </ul>
              </li>
              <li class="item">
                <a href="#" class="link flex">
                  <i class="bx bx-user-circle"></i>
                  <span>Historial de compras</span>
                </a>
                <ul class="submenu">
                </ul>
              </li>
              <li class="item">
                <a href="#" class="link flex">
                  <i class="bx bx-user-circle"></i>
                  <span>Opciones</span>
                </a>
                <ul class="submenu">
                  <li><a href="info_usuario.php">Informacion del usuario</a></li>
                  <li><a href="actualizacion_info.html">Actualizacion de la informacion</a></li>
                  <li><a href="eliminacion_cuenta.php">Eliminación de la Cuenta</a></li>
                </ul>
              </li>
            </ul>
          </div>
          <div class="sidebar_profile flex">
            <span class="nav_image">
              <img src="img/ESPICINE.jpg" alt="logo_img"/>
            </span>
            <div class="data_text">
              <?php
                session_start();
                $user_id = $_SESSION['id_usuario'];
                include_once 'config/conex.php';
                $query = "SELECT user_name, nombres, apellidos, email FROM registro WHERE id_usuario = :id_usuario";
                $stmt = $dbh->prepare($query);
                $stmt->bindParam(':id_usuario', $user_id, PDO::PARAM_INT);
                $stmt->execute();
                if ($stmt->rowCount() > 0) {
                  $row = $stmt->fetch(PDO::FETCH_ASSOC);
                  $username = $row["user_name"];
                  $realname = $row["nombres"] . " " . $row["apellidos"];
                  $email = $row["email"];
                  echo "Nombre de usuario: " . $username . "<br>";
                  echo "Nombre real: " . $realname . "<br>";
                  echo "Correo electrónico: " . $email . "<br>";
                } else {
                  echo "No se encontraron datos del usuario.";
                }
              ?>
                <a href="cierre.php" id="logout">Cerrar Sesión</a>
              </div>
          </div>
        </div>
      </nav>
      <script src="js/menu.js"></script>
      <script src="js/home_user.js"></script>
</body>
</html>