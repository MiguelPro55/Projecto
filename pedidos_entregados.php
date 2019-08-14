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
	</head>
	<div class="container">
		<div class="row">
			<h2 style="text-align:center">Pedidos Entregados</h2>
			<h4 style="padding-left:800"></h4>
		</div>
	</div>
	<form class="form-horizontal">	
		<br>
		<div class="form-group">
			<div class="col-sm-6">
				<input style="margin:20px;" type="text" class="form-control" id="q" placeholder="Buscar productos" onkeyup="load2(1)">
			</div>
				<button style="margin:20px;" type="button" class="btn btn-default" onclick="load(1)"><span class='glyphicon glyphicon-search'></span> Buscar</button>
			</div>
	</form>

		<div id="loader1" style="position: absolute;	text-align: center;	top: 55px;	width: 100%;display:none;"></div><!-- Carga gif animado -->
		<div class="outer_div2" ></div><!-- Datos ajax Final -->



		<!-- Modal -->
		<div class="modal fade" id="detalles" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						<h4 class="modal-title" id="myModalLabel">Prendas</h4>
					</div>
					
					<div class="modal-body">
						<div id="datosprendas" class='col-md-12'></div><!-- Carga los datos -->
						
					</div>
					
				
					<button style="margin:30px;" type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
					<br></br>
				
					
				</div>
			</div>
		</div>

	<script>
		$(document).ready(function(){
			load2(1);
		});

		function load2(page){
			var q= $("#q").val();
			var parametros1={"action":"ajax","page":page,"q":q};
			$("#loader1").fadeIn('slow');
			$.ajax({
				url:'./ajax/cargar_entregados.php',
				data: parametros1,
				 beforeSend: function(objeto){
				 $('#loader1').html('Cargando...');
			  },
				success:function(data){
					$(".outer_div2").html(data).fadeIn('slow');
					$('#loader1').html('');
					
				}
			})
		}
	</script>	
	<script >


		function mostrarproductos(id){	
		var parametros2={"id":id,"action":"ajax"}
		$.ajax({
			type: "POST",
			url: "./ajax/productos_pendientes.php",
			data:parametros2,
			beforeSend: function(objeto){
				$("#datosprendas").html();
			},
			success:function(datos){
				$("#datosprendas").html(datos);
			}
		});
		}
	</script>	
	</body>
</html>	