<?php 
	require 'conexion.php';
	require 'barra_tareas.php';
	

	$sqlborrar = "DELETE FROM reporte";
	$resultadoborrar = $mysqli->query($sqlborrar);
?>

<html lang="es">
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link href="css/bootstrap-theme.css" rel="stylesheet">
		<link href="css/jquery.dataTables.min.css" rel="stylesheet">
		<script src="js/jquery-3.1.1.min.js"></script>
		<script src="js/bootstrap.min.js"></script>	
		<script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>
		<script src="js/jquery.dataTables.min.js"></script>
		<script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>
	</head>
	
	<body>
		<div class="container">
			<div class="row">
				<h2 style="text-align:center">Reporte de pedidos</h2>
				<br><br>
			</div>
			
			<form class="form-horizontal" method="POST" target="_blank" action="FormatoReporte.php" autocomplete="off">
				<div class="form-group">
					<label class="col-sm-2 control-label">Fecha: De </label>
					<div class="col-sm-4">
						<input type="date" class="form-control" id="fecha1" name="fecha1" required>
					</div>
                    <label class="col-sm-2 control-label">A:  </label>
                    <div class="col-sm-4">
						<input type="date" class="form-control" id="fecha2" name="fecha2">
					</div>
				</div>
                <div class="form-group">
                    <label class='col-sm-5 control-label'>Lo que se mostrara en el reporte:</label>
                </div>
				<div class="form-group">
					<label for="AbonoPedido" class="col-sm-2 control-label">Total de prendas</label>
					<div class="col-sm-1">
						<input type="checkbox" class="form-control" id="TotalPrendas" name="TotalPrendas" value="1" checked>
					</div>
				</div>
                <div class="form-group">
					<label for="AbonoPedido" class="col-sm-2 control-label">Dinero generado</label>
					<div class="col-sm-1">
						<input type="checkbox" class="form-control" id="dinero" name="dinero" value="1" checked>
					</div>
				</div>
                <div class="form-group">
					<label for="AbonoPedido" class="col-sm-2 control-label">Pedidos pendientes de entregar generados en el plazo de tiempo</label>
					<div class="col-sm-1">
						<input type="checkbox" class="form-control" id="PedidosP" name="PedidosP" value="1" checked>
					</div>
				</div>
                <div class="form-group">
					<label for="AbonoPedido" class="col-sm-2 control-label">Total de abonos</label>
					<div class="col-sm-1">
						<input type="checkbox" class="form-control" id="abonos" name="abonos" value="1" checked>
					</div>
                    <label for="AbonoPedido" class="col-sm-5 control-label">El dinero que entra como abono, no es contabilizado como dinero generado en el periodo de tiempo dado.</label>
				</div>
                <div class="form-group">
					<label for="AbonoPedido" class="col-sm-2 control-label">Total de ganchos vendidos</label>
					<div class="col-sm-1">
						<input type="checkbox" class="form-control" id="ganchosV" name="ganchosV" value="1" checked>
					</div>
				</div>
                <div class="form-group">
				<button style="margin-left:500px; width:140px; height:40px;" type="submit" class="btn btn-default" >Generar reporte</button>
                </div>
               </form>
    </body>