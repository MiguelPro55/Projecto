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
                <h3 style="text-align:center; font-weight:600">NUEVO GASTO</h3>
                <br><br>
			</div>
			
			<form class="form-horizontal" method="POST" action="guardar_gasto.php" autocomplete="off">
				<div class="form-group">
					<label for="usuario" class="col-sm-3 control-label">Descripcion del gasto</label>
					<div class="col-sm-5">
						<textarea type="text" class="form-control" id="descripcion" name="descripcion" placeholder="Concepto del gasto realizado" required></textarea>
					</div>
				</div>
				
				<div class="form-group">
					<label for="clave" class="col-sm-3 control-label">Monto del gasto</label>
					<div class="col-sm-5">
						<input type="text" class="form-control" id="monto" name="monto" placeholder="Monto del gasto" required>
					</div>
				</div>			
				
				<div class="form-group">
					<div class="col-sm-offset-5 col-sm-10">
						<a href="gastos.php" class="btn btn-default">Regresar</a>
						<button type="submit" class="btn btn-primary">Guardar</button>
					</div>
				</div>
			</form>
		</div>
	</body>
</html>
