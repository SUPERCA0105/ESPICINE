<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Home Administrador</title>
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
                <a href="#" class="link flex">
                  <i class="bx bx-home-alt"></i>
                  <span>Funcionalidades</span>
                </a>
                <ul class="submenu">
                  <li><a href="Registro_Admin.html">Registro de Administrador</a></li> 
                  <li><a href="Registro_de_peliculas.html">Registro de Peliculas</a></li>
                  <li><a href="Actualizador_de_peliculas.php">Actualizar Cartelera</a></li>
                  <li><a href="#">Actualizar Horarios</a></li>
                  <li><a href="proximos_estrenos.html">Proximos Estrenos</a></li>
                </ul>
              </li>
              <li class="item">
                <a href="#" class="link flex">
                  <i class="bx bx-user"></i>
                  <span>Usuarios</span>
                </a>
                <ul class="submenu">
                  <li><a href="informacion_usuarios.html">Información de Usuarios</a></li>
                  <li><a href="historial_compras.html">Historial de Compras</a></li>
                  <li><a href="usuarios_desactivados.html">Usuarios Desactivados</a></li>
                </ul>
              </li>
              <li class="item">
                <a href="#" class="link flex">
                  <i class="bx bx-user-circle"></i>
                  <span>Empleados</span>
                </a>
                <ul class="submenu">
                  <li><a href="registro_empleado.html">Registro de Empleados</a></li>
                  <li><a href="informacion_empleado.html">Información del Empleados</a></li>
                  <li><a href="eliminacion_empleado.html">Eliminación del Empleados</a></li>
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
                $admin_id = $_SESSION['id_administrador'];
                include_once 'config/conex.php';
                $query = "SELECT nombres, apellidos, email FROM administradores WHERE id_administrador = :id_administrador";
                $stmt = $dbh->prepare($query);
                $stmt->bindParam(':id_administrador', $admin_id, PDO::PARAM_INT);
                $stmt->execute();
                if ($stmt->rowCount() > 0) {
                  $row = $stmt->fetch(PDO::FETCH_ASSOC);
                  $realname = $row["nombres"] . " " . $row["apellidos"];
                  $email = $row["email"];
                  echo "Nombre real: " . $realname . "<br>";
                  echo "Correo electrónico: " . $email . "<br>";
                } else {
                  echo "No se encontraron datos del administrador.";
                }
              ?>
                <a href="cierre.php" id="logout">Cerrar Sesión</a>
            </div>
          </div>
        </div>
      </nav>

    <div class="header">
        <center>
        <h1>Bienvenido al Panel de Administración del Cine</h1>
        </center>
    </div>
    <div class="nav">
    </div>
    <div class="content">
        <h2>Panel de Control</h2>
        <p>Aquí puedes gestionar las películas, horarios y ver los reportes.</p>
    </div>
        <script src="js/menu.js"></script>
</body>
</html>