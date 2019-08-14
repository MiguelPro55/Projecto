<?php

	/* Connect To Database*/
	require_once ("..//conexion.php");//Contiene funcion que conecta a la base de datos
	session_start();
	$action = (isset($_REQUEST['action'])&& $_REQUEST['action'] !=NULL)?$_REQUEST['action']:'';
	$id_pedido=$_REQUEST['id'];

	$sql2=$mysqli->query("SELECT idproductos FROM pedidos WHERE idpedido= $id_pedido");
	$idnecesario = $sql2->fetch_array(MYSQLI_ASSOC);
	$idproductos = $idnecesario['idproductos'];


	if($action == 'ajax'){
		// escaping, additionally removing everything that could be (html/javascript-) code

		 $sTable = "productospedidos";
		 $sWhere = "WHERE idpedido = $idproductos";
		include 'pagination.php'; //include pagination file
		//pagination variables
		$page = (isset($_REQUEST['page']) && !empty($_REQUEST['page']))?$_REQUEST['page']:1;
		$per_page = 10000; //how much records you want to show
		$adjacents  = 4; //gap between pages after number of adjacents
		$offset = ($page - 1) * $per_page;
		//Count the total number of row in your table*/
		$count_query   = mysqli_query($mysqli, "SELECT count(*) AS numrows FROM $sTable  $sWhere");
		$row= mysqli_fetch_array($count_query);
		$numrows = $row['numrows'];
		$total_pages = ceil($numrows/$per_page);
		$reload = './index.php';
		//main query to fetch the data
		$sql="SELECT idproducto,Prenda,cantidad,Planchado,Lavado FROM  $sTable $sWhere LIMIT $offset,$per_page";
		$query = mysqli_query($mysqli, $sql);
		//loop through fetched data
		if ($numrows>0){
			
			?>
			<div class="table-responsive">
			  <table class="table">
				<tr  class="warning">
					<th>Código</th>
					<th>Prenda</th>
					<th>Cantidad</th>
					<th>Planchado</th>
					<th>Lavado</th>
				</tr>
				<?php
				while ($row=mysqli_fetch_array($query)){
					$id_producto=$row['idproducto'];
					$nombre_producto=$row['Prenda'];
					$cantidad=$row['cantidad'];
					$Planchado=$row['Planchado'];
					$Lavado=$row['Lavado']
					
					?>
					<tr>
						<td><?php echo $id_producto; ?></td>
						<td><?php echo $nombre_producto; ?></td>
						<td style="text-align:center;"><?php echo $cantidad; ?></td>
						<td style="text-align:center;"><?php echo $Planchado; ?></td>
						<td style="text-align:center;"><?php echo $Lavado; ?></td>
					</tr>
					<?php
				}
				?>
				


			<?php
		}
	}
?>