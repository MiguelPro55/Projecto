<?php
    require 'barra_tareas.php';
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
			<div class="row">
				<h3 style="text-align:center; font-weight:600">NUEVO REGISTRO</h3>
				<br><br>
			</div>
			
			<form class="form-horizontal" method="POST" action="guardar.php" autocomplete="off">
				<div class="form-group">
					<label for="nombre" class="col-sm-4 control-label">Producto</label>
					<div class="col-sm-4">
						<input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre" required>
					</div>
				</div>
				
				<div class="form-group">
					<label for="preciolavado" class="col-sm-4 control-label">Precio Lavado</label>
					<div class="col-sm-1">
						<input type="text" class="form-control" id="preciolavado" name="preciolavado" placeholder="Precio" required>
					</div>
				</div>
				
				<div class="form-group">
					<label for="precioplanchado" class="col-sm-4 control-label">Precio Planchado</label>
					<div class="col-sm-1">
						<input type="text" class="form-control" id="precioplanchado" name="precioplanchado" placeholder="Precio">
					</div>
				</div>
				<br></br>
				
				
				
				<div class="form-group">
					<div class="col-sm-offset-2 col-sm-10">
						<a href="productos.php" class="btn btn-default">Regresar</a>
						<button type="submit" class="btn btn-primary">Guardar</button>
					</div>
				</div>
			</form>
		</div>
	</body>
</html>