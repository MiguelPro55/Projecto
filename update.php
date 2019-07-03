<?php

	require 'conexion.php';

	$id = $_POST['id'];
	$nombre = $_POST['nombre'];
	$precio = $_POST['precio'];

	$sql = "UPDATE productos SET Prenda='$nombre', Precio='$precio' WHERE id = '$id'";
	$resultado = $mysqli->query($sql);

?>

<html lang="es">
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link href="css/bootstrap-theme.css" rel="stylesheet">
		<script src="js/jquery-3.4.1.min.js"></script>
		<script src="js/bootstrap.min.js"></script>	
	</head>
	<body>
		<div class="container">
			<div class="row" style="text-align:center">
				<?php if($resultado) { ?>
				<h3>Registro Modificado</h3>
				<?php } else { ?>
				<h3>Error al modificar</h3>
				<?php } ?>

				<a href="/proyecto/" class="btn btn-primary">Regresar</a>
		</div>

	</body>
</html>