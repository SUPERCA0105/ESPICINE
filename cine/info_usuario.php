<html>
<head>
    <meta charset="UTF-8">
    <title>Informacion Del Usuario</title>
    <center>
        <h1>Informacion del usuario</h1>
    </center>
    <link rel="stylesheet" href="styles/style.actualizacion_carteleras.css" />
</head>
<body>
    <center>
        <form">
            <table>
                <tr>
                    <td>
                        <?php
                            session_start();
                            $user_id = $_SESSION['id_usuario'];
                            include_once 'config/conex.php';
                            $sql = "SELECT user_name, nombres, apellidos, edad, email FROM registro WHERE id_usuario = $user_id;";
                            $resultado = $dbh->query($sql);
                            while ($fila = $resultado->fetch(PDO::FETCH_ASSOC)) {
                                $user_name = $fila['user_name'];            
                                $nombres = $fila['nombres'];
                                $apellidos = $fila['apellidos'];
                                $edad = $fila['edad'];
                                $email = $fila['email'];
                                echo '<div class="user">';
                                echo '<h3>'.$user_name.'</h3>';
                                echo '<p>Nombre: '.$nombres.'</p>';
                                echo '<p>Apellidos: '.$apellidos.'</p>';
                                echo '<p>Edad: '.$edad.'</p>';
                                echo '<p>Email: '.$email.'</p>';
                                echo '</div>';
                            }
                        ?>
                    </td>
                </tr>
                <tr>
                    <td>
                        <button onclick="window.location.href='home_usuario.php';">Volver al inicio</button>
                    </td>
                </tr>
            </table>    
        </form>
    </center>
</body>
</html>