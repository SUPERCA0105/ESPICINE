<?php
include_once 'config/conex.php';
$sql = "SELECT titulo FROM peliculas WHERE estado = 1;";
$resultado = $dbh->query($sql);
$options = "";
while ($row = $resultado->fetch(PDO::FETCH_ASSOC)) {
    $titulo = $row['titulo'];
    $options .= "<option value='$titulo'>$titulo</option>";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Compra De Boletos</title>
    <link rel="stylesheet" href="styles/style_compra_de_boletos.css">
</head>
<body>
<header>
        <a class="logo" href="#">
      <img class="logo_img" src="img/ESPICINE.jpg" alt="espicine" width="5%" height="5%">
        <h2 class="nombre_empresa">ESPICINE</h2>
      </a>
      <ul>
        <nav>
         
          <ul>
            <li><a href="index.html">INICIO</a></li>
            <li><a href="carteleras.html">Cartelera</a></li>
            <li><a href="#">Próximos estrenos</a></li>
            <li><a href="contactanos.html">Contacto</a></li>
          </ul>
        </ul>
        </nav>
    </header>
    <center>
        <h1>Compra de boletos</h1>
    </center>
    <center>
        <form id="ticketForm">
            <table>
                <tr>
                    <td>
                        Usuario:
                        <input id="Usuario" required>
                    </td>    
                    <td>
                        Película:
                        <select id="tituloPelicula" required>
                            <?php echo $options; ?>
                        </select>
                                              
                    </td>
                </tr>
                <tr>
                    <td>
                        Cantidad de boletos:
                        <input type="number" id="cantidadBoletos" min="0" required>
                    </td>
                </tr>
            </table>
        </form>
        <button onclick="calcularFactura()">Generar factura</button>
    </center>
    <div id="facturaContainer"></div>
    <script src="js/factura.js"></script>
</body>
</html>