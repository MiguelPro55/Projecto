<?php

	require 'conexion.php';

	$nombre = $_POST['nombre'];
	$apellido = $_POST['apellido'];
	$telefono = $_POST['telefono'];

	$sql = "INSERT INTO usuarios (Nombre, Apellido, Telefono) VALUES ('$nombre', '$apellido', '$telefono')";
	$resultado = $mysqli->query($sql);

?>

<html lang="es">
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link href="css/bootstrap-theme.css" rel="stylesheet">
		<script src="js/jquery-3.1.1.min.js"></script>
		<script src="js/bootstrap.min.js"></script>	
	</head>
	<body>
		<div class="container">
			<div class="row" style="text-align:center">
				<?php if($resultado) { ?>
				<h3>Registro guardado</h3>
				<?php } else { ?>
				<h3>Error al guardar</h3>
				<?php } ?>

				<a href="/proyecto/" class="btn btn-primary">Regresar</a>
		</div>

	</body>
</html>