<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8"/>
	<link rel="stylesheet" type="text/css" href="styles/style_registro.css">
	<title>Eliminar Cuenta</title>
	<script src="js/confirm_eliminacion.js"></script>
</head>
<body>
	<form action="eliminar_cuenta.php" method="post">
		<tr>
			<td>
				<?php
					session_start();
					$user_id = $_SESSION['id_usuario'];
					include_once 'config/conex.php';
					$query = "SELECT user_name FROM registro WHERE id_usuario = :id_usuario";
					$stmt = $dbh->prepare($query);
					$stmt->bindParam(':id_usuario', $user_id, PDO::PARAM_INT);
					$stmt->execute();
					if ($stmt->rowCount() > 0) {
					$row = $stmt->fetch(PDO::FETCH_ASSOC);
					$username = $row["user_name"];
					echo "Nombre de usuario: " . $username . "<br>";
				} else {
					echo "No se encontraron datos del usuario.";
				  }
				?>  
			</td>
		</tr>
		<tr>
			<td>
				<button type="submit">Eliminar Cuenta</button>
			</td>
		</tr>
	</form>
</body>
</html>