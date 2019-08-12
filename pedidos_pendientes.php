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
					"sAjaxSource": "server_process_pedidos.php"
				});	
			});
			
		</script>	
	</head>
	
	<body>
		
		<div class="container">
			<div class="row">
				<h2 style="text-align:center">Pedidos Pendientes</h2>
				<h4 style="padding-left:800">
				</h4>
			</div>
			
			<br>
			
			<div class="row table-responsive">
				<table class="display" id="mitabla">
					<thead>
						<tr>
							<th>ID</th>
							<th>Cliente</th>
							<th>Ganchos del cliente</th>
							<th>Ganchos que se le vendieron</th>
							<th>Total</th>
							<th>Abono</th>
							<th>Pendiente por Pagar</th>
							<th>Realizo el pedido</th>
							<th>Fecha</th>
							<th></th>
							<th></th>
						</tr>
					</thead>
					
					<tbody>
						
					</tbody>
				</table>
			</div>
		</div>
		<!-- Modal -->
		<div class="modal fade" id="detalles" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						<h4 class="modal-title" id="myModalLabel"></h4>
					</div>
					
					<div class="modal-body">
						<div id="loader" style="position: absolute;	text-align: center;	top: 55px;	width: 100%;display:none;"></div><!-- Carga gif animado -->
						<div class="outer_div" ></div><!-- Datos ajax Final -->
					</div>
					
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
						
					</div>
				</div>
			</div>
		</div>

		<script>
		$(document).ready(function(){
				load(1);
			});

		function load(page){

			var parametros={"action":"ajax","page":page};
			$("#loader").fadeIn('slow');
			$.ajax({
				url:'./ajax/productos_pendientes.php',
				data: parametros,
				 beforeSend: function(objeto){
				 $('#loader').html('<img src="./img/ajax-loader.gif"> Cargando...');
			  },
				success:function(data){
					$(".outer_div").html(data).fadeIn('slow');
					$('#loader').html('');
					
				}
			})
		}
		</script>		
	</body>
</html>	