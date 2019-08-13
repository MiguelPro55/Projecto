<?php

	/* Connect To Database*/

	require_once ("..//conexion.php");//Contiene funcion que conecta a la base de datos
	
	$action = (isset($_REQUEST['action'])&& $_REQUEST['action'] !=NULL)?$_REQUEST['action']:'';
	if($action == 'ajax'){
		// escaping, additionally removing everything that could be (html/javascript-) code
         $q = mysqli_real_escape_string($mysqli,(strip_tags($_REQUEST['q'], ENT_QUOTES)));
		 $aColumns = array('idpedido', 'Cliente');//Columnas de busqueda
		 $sTable = "pedidos";
		 $sWhere = "WHERE Entregado = 1";
		if ( $_GET['q'] != "" )
		{
			$sWhere = "WHERE pedidos.Entregado = 1 AND (";
			for ( $i=0 ; $i<count($aColumns) ; $i++ )
			{
				$sWhere .= $aColumns[$i]." LIKE '%".$q."%' OR ";
			}
			$sWhere = substr_replace( $sWhere, "", -3 );
			$sWhere .= ')';
		}
		include 'pagination2.php'; //include pagination file
		//pagination variables
		$page = (isset($_REQUEST['page']) && !empty($_REQUEST['page']))?$_REQUEST['page']:1;
		$per_page = 7; //how much records you want to show
		$adjacents  = 4; //gap between pages after number of adjacents
		$offset = ($page - 1) * $per_page;
		//Count the total number of row in your table*/
		$count_query   = mysqli_query($mysqli, "SELECT count(*) AS numrows FROM $sTable  $sWhere");
		$row= mysqli_fetch_array($count_query);
		$numrows = $row['numrows'];
		$total_pages = ceil($numrows/$per_page);
		$reload = './index.php';
		//main query to fetch the data
		$sql="SELECT * FROM  $sTable $sWhere LIMIT $offset,$per_page";
		$query = mysqli_query($mysqli, $sql);
		//loop through fetched data
		if ($numrows>0){
			
			?>
			<div class="table-responsive">
			  <table class="table">
				<tr  class="warning">
							<th>ID</th>
							<th>Cliente</th>
							<th>Ganchos que se le vendieron</th>
							<th>Total</th>
							<th>Realizo el pedido</th>
							<th>Fecha Creado</th>
							<th>Fecha Entregado</th>
							<th>Entregado por</th>
							<th></th>
				</tr>
				<?php
				while ($row=mysqli_fetch_array($query)){
					$id_pedido=$row['idpedido'];
					$nombre_cliente=$row['Cliente'];
					$ganchos_vendidos=$row['ganchosvendidos'];
					$total=$row['total'];
					$empleado=$row['Empleado'];
					$fecha=$row['horapedido'];
					$fecha_entregado=$row['horaentregado'];
					$entregadopor=$row['Entregadopor'];
					
					?>
					<tr>
						<td><?php echo $id_pedido; ?></td>
						<td><?php echo $nombre_cliente; ?></td>
						<td><?php echo $ganchos_vendidos; ?></td>
						<td><?php echo $total; ?></td>
						<td><?php echo $empleado; ?></td>
						<td><?php echo $fecha; ?></td>
						<td><?php echo $fecha_entregado; ?></td>
						<td><?php echo $entregadopor; ?></td>
						<td><span><a href="#" onclick="mostrarproductos('<?php echo $id_pedido ?>')" data-toggle="modal" data-target="#detalles">Prendas</a></span></td>

						
					</tr>
					<?php
				}
				?>
				<tr>
					<td colspan=5><span class="pull-right"><?php
					 echo paginate($reload, $page, $total_pages, $adjacents);
					?></span></td>
				</tr>
			  </table>
			</div>
						


			<?php
		}
	}
?>