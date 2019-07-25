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
			
			<form class="form-horizontal" method="POST" action="guardar_empleado.php" autocomplete="off">
				<div class="form-group">
					<label for="usuario" class="col-sm-3 control-label">Usuario</label>
					<div class="col-sm-5">
						<input type="text" class="form-control" id="usuario" name="usuario" placeholder="usuario" required>
					</div>
				</div>
				
				<div class="form-group">
					<label for="clave" class="col-sm-3 control-label">Clave</label>
					<div class="col-sm-5">
						<input type="text" class="form-control" id="clave" name="clave" placeholder="clave" required>
					</div>
				</div>
				
				<div class="form-group">
					<label for="NuevoPedido" class="col-sm-3 control-label">Nuevo pedido</label>
					<div class="col-sm-1">
						<input type="checkbox" class="form-control" id="NuevoPedido" name="NuevoPedido" value='1'>
                    </div>
                </div>
                <div class='form-group'>
                    <label for="PedidoPendiente" class="col-sm-3 control-label">Pedidos Pendientes</label>
					<div class="col-sm-1">
						<input type="checkbox" class="form-control" id="PedidosPendientes" name="PedidosPendientes" value='1'>
                    </div>
                </div>
                <div class='form-group'>
                    <label for="PedidoEntregados" class="col-sm-3 control-label">Pedidos Entregados</label>
					<div class="col-sm-1">
						<input type="checkbox" class="form-control" id="PedidosEntregados" name="PedidosEntregados" value='1'>
                    </div>
                </div>
                <div class='form-group'>
                    <label for="Productos" class="col-sm-3 control-label">Productos</label>
					<div class="col-sm-1">
						<input type="checkbox" class="form-control" id="Productos" name="Productos" value='1'>
                    </div>
                </div>
                <div class='form-group'>
                    <label for="Empleados" class="col-sm-3 control-label">Empleados</label>
					<div class="col-sm-1">
						<input type="checkbox" class="form-control" id="Empleados" name="Empleados" value='1'>
                    </div>
                </div>
                <div class='form-group'>
                    <label for="ReportePedidos" class="col-sm-3 control-label">Reporte de pedidos</label>
					<div class="col-sm-1">
						<input type="checkbox" class="form-control" id="ReportePedidos" name="ReportePedidos" value='1'>
                    </div>
                </div>
                <div class='form-group'>
                    <label for="GanchosVendidos" class="col-sm-3 control-label">Venta de ganchos</label>
					<div class="col-sm-1">
						<input type="checkbox" class="form-control" id="GanchosVendidos" name="GanchosVendidos" value='1'>
                    </div>
                </div>
				
				
				<div class="form-group">
					<div class="col-sm-offset-5 col-sm-10">
						<a href="productos.php" class="btn btn-default">Regresar</a>
						<button type="submit" class="btn btn-primary">Guardar</button>
					</div>
				</div>
			</form>
		</div>
	</body>
</html>