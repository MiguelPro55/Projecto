<?php
	require 'conexion.php';
	require 'barra_tareas.php';
	
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
		
		<script>
			$(document).ready(function(){
				$('#mitabla').DataTable({
					"order": [[1, "asc"]],
					"language":{
					"lengthMenu": "Mostrar _MENU_ registros por pagina",
					"info": "Mostrando pagina _PAGE_ de _PAGES_",
						"infoEmpty": "No hay registros disponibles",
						"infoFiltered": "(filtrada de _MAX_ registros)",
						"loadingRecords": "Cargando...",
						"processing":     "Procesando...",
						"search": "Buscar:",
						"zeroRecords":    "No se encontraron registros coincidentes",
						"paginate": {
							"next":       "Siguiente",
							"previous":   "Anterior"
						},					
					},
					"bProcessing": true,
					"bServerSide": true,
					"sAjaxSource": "server_process_ganchos.php"
				});	
			});
			
		</script>
		
	</head>
	
	<body>
		
		<div class="container">
			<div class="row">
				<h2 style="text-align:center">Ganchos vendidos</h2>
				<h4 style="padding-left:800">
				</h4>
			</div>
			
			<div class="row">
				<a class="btn btn-primary" data-toggle="modal" data-target="#Vender_Gancho">Vender Ganchos</a>
			</div>
			
			<br>
			
			<div class="row table-responsive">
				<table class="display" id="mitabla">
					<thead>
						<tr>
							<th>Cantidad</th>
							<th>Precio Unitario al momento de hacer la venta</th>
							<th>Fecha</th>
							<th>Vendido por</th>
						</tr>
					</thead>
					
					<tbody>
						
					</tbody>
				</table>
			</div>
		</div>
		
		<!-- Modal -->
		<div class="modal fade" id="Vender_Gancho" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						<h4 class="modal-title" id="myModalLabel">Vender Ganchos</h4>
					</div>
					<form target="_blank" action="guardar_venta_gancho.php" method="POST">
					<div class="modal-body">
						<div class="form-group">
							<label for="nombre" class="col-sm-2 control-label">Cantidad a vender</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" id="cantidadventa" name="cantidadventa" placeholder="Cantidad" value="0" required>
							</div>
							<br>
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
						<button type="submit" class="btn btn-primary">Vender</button>
					</div>
					</form>
				</div>
			</div>
		</div>
		
		
	</body>
</html>	