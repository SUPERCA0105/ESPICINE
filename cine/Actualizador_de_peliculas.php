<?php
include_once 'config/conex.php';
$sql = "SELECT titulo FROM peliculas;";
$resultado = $dbh->query($sql);
?>
<html>
<head>
    <meta charset="UTF-8">
    <title>Actualizador De Cartelera</title>
    <center>
        <h1>Actualizacion De Cartelera</h1>
    </center>
    <link rel="stylesheet" href="styles/style.actualizacion_carteleras.css" />
</head>
<body>
    <center>
        <form method="post" action="Actualizador_de_peliculas2.php">
            <table>
                <tr>
                    <td>
                        Título de la película
                        <select name="titulo" required>
                        <?php
                            foreach ($resultado as $row) {
                                echo "<option value='".$row["titulo"]."'>".$row["titulo"]."</option>";
                            }
                        ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>
                        Estado de la pelicula
                        <Select name="estado">
                            <option value="0">Ya no estara en Cartelera</option>
                            <option value="1">En Cartelera</option>
                        </Select>
                    </td>
                </tr>
                <tr>
                    <td>
                        <button type="submit" value="enviar">Actualizar Cartelera</button>
                    </td>
                </tr>
            </table>    
        </form>
    </center>
</body>
</html>