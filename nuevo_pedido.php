<?php 
	require 'conexion.php';
		

?>

<html lang="es">
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" type="text/css" href="alertifyjs/css/alertify.css">
		<link rel="stylesheet" type="text/css" href="alertifyjs/css/themes/default.css">
		
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link href="css/bootstrap-theme.css" rel="stylesheet">
		<script src="js/jquery-3.1.1.min.js"></script>
		<script src="js/bootstrap.min.js"></script>	
		<script type="alertifyjs/alertify.js"></script>
	</head>
	
	<body>
		<div class="container">
			<div class="row">
				<h3 style="text-align:center">NUEVO REGISTRO</h3>
			</div>
			
			<form class="form-horizontal" method="POST" action="guardar.php" autocomplete="off">
				<div class="form-group">
					<label for="nombre" class="col-sm-2 control-label">Cliente</label>
					<div class="col-sm-5">
						<input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre" required>
					</div>
				</div>

				<div class="form-group">
					<label for="AbonoPedido" class="col-sm-2 control-label">Abono</label>
					<div class="col-sm-5">
						<input type="text" class="form-control" id="AbonoPedido" name="AbonoPedido" placeholder="$" value="0">
					</div>
				</div>
						
				<div class="form-group">
					<label for="cantidadganchos" class="col-sm-2 control-label">Ganchos del cliente</label>
					<div class="col-sm-5">
						<input type="text" class="form-control" id="cantidadganchos" name="cantidadganchos" placeholder="Cantidad" value="0">
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-offset-2 col-sm-5">
						<button type="button" class="btn btn-default" data-toggle="modal" data-target="#myModal">Agregar Prendas</button>
					</div>
				</div>


				<div id="resultados" class='col-md-12'></div><!-- Carga los datos ajax -->

				

				<div id="TOTAL" class='col-md-12'></div><!-- Carga el total -->
				<div class="form-group">
					<div class="col-sm-offset-2 col-sm-5">
						<span><a href="#" onclick="actualizarprecio()">ACTUALIZAR TOTAL</a></span>
					</div>
				</div>
				
				<div class="form-group">
					<div class="col-sm-offset-2 col-sm-10">
						<div class="pull-right">
						<a href="index.php" class="btn btn-default">Regresar</a>
						<button id="guarda" type="submit" class="btn btn-primary">Guardar</button>
						</div>
					</div>
				</div>
				
				
				
					
			</form>
		



			<!-- Modal -->
			<div class="modal fade bs-example-modal-lg" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
			  <div class="modal-dialog modal-lg" role="document">
				<div class="modal-content">
				  <div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="myModalLabel">Buscar productos</h4>
				  </div>
				  <div class="modal-body">
					<form class="form-horizontal">
					  <div class="form-group">
						<div class="col-sm-6">
						  <input type="text" class="form-control" id="q" placeholder="Buscar productos" onkeyup="load(1)">
						</div>
						<button type="button" class="btn btn-default" onclick="load(1)"><span class='glyphicon glyphicon-search'></span> Buscar</button>
					  </div>
					</form>
					<div id="loader" style="position: absolute;	text-align: center;	top: 55px;	width: 100%;display:none;"></div><!-- Carga gif animado -->
					<div class="outer_div" ></div><!-- Datos ajax Final -->
				  </div>
				  <div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
					
				  </div>
				</div>
			  </div>
			</div>
			
			</div>	
		 </div>
	</div>

	</body>
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
	<script type="text/javascript" src="js/VentanaCentrada.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.2/js/select2.min.js"></script>
	<script>
		$(document).ready(function(){
			load(1);
		});

		function load(page){
			var q= $("#q").val();
			var parametros={"action":"ajax","page":page,"q":q};
			$("#loader").fadeIn('slow');
			$.ajax({
				url:'./ajax/productos_pedido.php',
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
	<script>
	function agregar (id,preciop,preciol)
		{
			var precio_venta_p=parseFloat(preciop);	
			var precio_venta_l=parseFloat(preciol);
			var cantidad=$('#cantidad_'+id).val();	
			var express=$('#express_'+id).val();
			var almidon=$('#almidon_'+id).val();
			//Inicia validacion
			if (isNaN(cantidad))
			{
			alert('Esto no es un numero');
			document.getElementById('cantidad_'+id).focus();
			return false;
			}
			
			
			//Fin validacion
		var parametros={"id":id,"precio_venta_p_":precio_venta_p,"precio_venta_l_":precio_venta_l,"cantidad":cantidad, "express":express, "almidon":almidon};	
		$.ajax({
        type: "POST",
        url: "./ajax/agregar_pedido.php",
        data: parametros,
		 beforeSend: function(objeto){
			$("#resultados").html("Mensaje: Cargando...");
		  },
        success: function(datos){
		$("#resultados").html(datos);
		}
			});
		}
		
			function eliminar (id)
		{
			
			$.ajax({
        type: "GET",
        url: "./ajax/agregar_pedido.php",
        data: "id="+id,
		 beforeSend: function(objeto){
			$("#resultados").html("Mensaje: Cargando...");
		  },
        success: function(datos){
		$("#resultados").html(datos);
		}
			});

		}
		
	</script>
	<script >
		function actualizarprecio(){
		var abono = $('#AbonoPedido').val();
		var express = $('#precioexpress').val();

			
		var parametros2={"abono":abono, "express": express}
		$.ajax({
			type: "POST",
			url: "./ajax/mostrar_total.php",
			data:parametros2,
			beforeSend: function(objeto){
				$("#TOTAL").html();
			},
			success:function(datos){
				$("#TOTAL").html(datos);
			}
		});
		}
	</script>
	
	
</html>