<?php

	require 'conexion.php';

	$where = "";

	$sql = "SELECT * FROM productos";
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
			<div class="row">
				<h2 style="text-align:center">Productos</h2>
			</div>
			<div class="row">
				<a href="nuevo.php" class="btn btn-primary">Nuevo Registro</a>			
			</div>

			<br>

			<div class="row table-responsive">
				<table class="table table-striped">
					<thead>
						<tr>
							<th>ID</th>
							<th>PRENDA</th>
							<th>PRECIO</th>
							<th></th>
							<th></th>
						</tr>
					</thead>
					<tbody>
						<?php while($row = $resultado->fetch_array(MYSQLI_ASSOC)) { ?>
							<tr>
								<td><?php echo $row['id']; ?></td>
								<td><?php echo $row['Prenda']; ?></td>
								<td><?php echo $row['Precio']; ?></td>
								<td><a href="modificar.php?id= <?php echo $row['id']; ?>"><span class="glyphicon glyphicon-pencil"></span></td>
								<td></td>
							</tr>
						<?php } ?>
					</tbody>
					
				</table>

			</div>
			
	</body>
</html>