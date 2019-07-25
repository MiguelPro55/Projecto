<?php
	require 'conexion.php';
	
	$id = $_GET['id'];
	
	$sql = "SELECT * FROM usuarios WHERE id = '$id'";
	$resultado = $mysqli->query($sql);
	$row = $resultado->fetch_array(MYSQLI_ASSOC);
	
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
				<h3 style="text-align:center">MODIFICAR REGISTRO</h3>
			</div>
			
			<form class="form-horizontal" method="POST" action="update_empleado.php" autocomplete="off">
				<div class="form-group">
					<label for="usuario" class="col-sm-2 control-label">Usuario</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="usuario" name="usuario" placeholder="usuario" value="<?php echo $row['usuario']; ?>" required>
					</div>
				</div>
				
				<input type="hidden" id="id" name="id" value="<?php echo $row['id']; ?>" />
				
				<div class="form-group">
					<label for="clave" class="col-sm-2 control-label">Clave</label>
					<div class="col-sm-5">
						<input type="text" class="form-control" id="clave" name="clave" placeholder="clave" value="<?php echo $row ['clave']; ?>" required>
					</div>
				</div>

				<div class="form-group">
					<label for="NuevoPedido" class="col-sm-2 control-label">Pedido Nuevo</label>
					<div class="col-sm-1">
						<input type="checkbox" class="form-control" id="NuevoPedido" name="NuevoPedido" <?php if ($row['NuevoPedido']==1){
						 ?> checked <?php }else{ ?> <?php } ?>>
					</div>
				</div>

				<div class="form-group">
					<label for="PedidosPendientes" class="col-sm-2 control-label">Pedidos pendientes</label>
					<div class="col-sm-1">
						<input type="checkbox" class="form-control" id="PedidosPendientes" name="PedidosPendientes" <?php if ($row['PedidosPendientes']==1){
						 ?> checked <?php }else{ ?> <?php } ?>>
					</div>
				</div>

				<div class="form-group">
					<label for="PedidosEntregados" class="col-sm-2 control-label">Pedidos entregados</label>
					<div class="col-sm-1">
						<input type="checkbox" class="form-control" id="PedidosEntregados" name="PedidosEntregados" <?php if ($row['PedidosEntregados']==1){
						 ?> checked <?php }else{ ?> <?php } ?>>
					</div>
				</div>
				<div class="form-group">
					<label for="Productos" class="col-sm-2 control-label">Productos</label>
					<div class="col-sm-1">
						<input type="checkbox" class="form-control" id="Productos" name="Productos" <?php if ($row['Productos']==1){
						 ?> checked <?php }else{ ?><?php } ?>>
					</div>
				</div>
				<div class="form-group">
					<label for="Empleados" class="col-sm-2 control-label">Empleados</label>
					<div class="col-sm-1">
						<input type="checkbox" class="form-control" id="Empleados" name="Empleados" <?php if ($row['Empleados']==1){
						 ?> checked <?php }else{ ?><?php } ?>>
					</div>
				</div>
				<div class="form-group">
					<label for="ReportePedidos" class="col-sm-2 control-label">Reporte pedidos</label>
					<div class="col-sm-1">
						<input type="checkbox" class="form-control" id="ReportePedidos" name="ReportePedidos" <?php if ($row['ReportePedidos']==1){
						 ?> checked <?php }else{ ?> <?php } ?>>
					</div>
				</div>
				<div class="form-group">
					<label for="GanchosVendidos" class="col-sm-2 control-label">GanchosVendidos</label>
					<div class="col-sm-1">
						<input type="checkbox" class="form-control" id="GanchosVendidos" name="GanchosVendidos" <?php if ($row['GanchosVendidos']==1){
						 ?> checked <?php }else{ ?><?php } ?>>
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-offset-2 col-sm-10">
						<a href="empleados.php" class="btn btn-default">Regresar</a>
						<button type="submit" class="btn btn-primary">Guardar</button>
					</div>
				</div>
			</form>
		</div>
	</body>
</html>