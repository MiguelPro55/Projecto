<?php

	/* Connect To Database*/

	require_once ("..//conexion.php");//Contiene funcion que conecta a la base de datos
	
	$action = (isset($_REQUEST['action'])&& $_REQUEST['action'] !=NULL)?$_REQUEST['action']:'';
	if($action == 'ajax'){
		// escaping, additionally removing everything that could be (html/javascript-) code
         $q = mysqli_real_escape_string($mysqli,(strip_tags($_REQUEST['q'], ENT_QUOTES)));
		 $aColumns = array('id', 'Prenda');//Columnas de busqueda
		 $sTable = "productos";
		 $sWhere = "";
		if ( $_GET['q'] != "" )
		{
			$sWhere = "WHERE (";
			for ( $i=0 ; $i<count($aColumns) ; $i++ )
			{
				$sWhere .= $aColumns[$i]." LIKE '%".$q."%' OR ";
			}
			$sWhere = substr_replace( $sWhere, "", -3 );
			$sWhere .= ')';
		}
		include 'pagination.php'; //include pagination file
		//pagination variables
		$page = (isset($_REQUEST['page']) && !empty($_REQUEST['page']))?$_REQUEST['page']:1;
		$per_page = 5; //how much records you want to show
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
					<th>Código</th>
					<th>Producto</th>
					<th><span class="pull-right">Cant.</span></th>
					<th><span class="pull-right">Planchado</span></th>
					<th><span class="pull-right">Lavado</span></th>
					<th><span class="pull-right">EXPRESS</span></th>
					<th><span class="pull-right">ALMIDÓN</span>
					<th style="width: 36px;"></th>
				</tr>
				<?php
				while ($row=mysqli_fetch_array($query)){
					$id_producto=$row['id'];
					$codigo_producto=$row['id'];
					$nombre_producto=$row['Prenda'];
					$codigo_producto=$row["id"];
					$precio_planchado=$row["PrecioPlanchado"];
					$precio_lavado=$row["PrecioLavado"];
					$precio_venta_p=number_format($precio_planchado,2);
					$precio_venta_l=number_format($precio_lavado,2);
					?>
					<tr>
						<td><?php echo $codigo_producto; ?></td>
						<td><?php echo $nombre_producto; ?></td>
						<td class='col-xs-1'>
						<div class="pull-right">
						<input type="text" class="form-control" style="text-align:right" id="cantidad_<?php echo $id_producto; ?>"  value="1" >
						</div></td>
						<td class='col-xs-2'><div align="center">
						<span><input type="checkbox" name="checarplanchado" id="checarplanchado" value='1'></span>

						</div></td>
						<td class='col-xs-2'><div align="center">
						<span><input type="checkbox" name="checarlavado" id="checarlavado" value='1'></span>
						</div></td>
						<td class="col-xs-1">
							<div class="pull-right">
								<input type="text" class="form-control" style="text-align:right" id="express_<?php echo $id_producto; ?>" value="0">
							</div>
						</td>
						<td class="col-xs-1">
							<div class="pull-right">
								<input type="text" class="form-control" style="text-align:right" id="almidon_<?php echo $id_producto; ?>" value="0">
							</div>
						</td>
						<script type="text/javascript">
							function validarplanchado(){
								var checado= document.getElementById('checarplanchado').checked;
								if(checado){
																		
									return 1; 
								}
								else{
									return 0;
								}
							}
							function validarlavado(){
								var checado= document.getElementById('checarlavado').checked;
								if(checado){
									return 1;
								}
								else{
									return 0;
								}
							}							
						</script>
						<td ><span class="pull-right"><a href="#" onclick="agregar('<?php echo $id_producto ?>',validarplanchado(),validarlavado(),'100','<?php echo $precio_lavado?>')"><i class="glyphicon glyphicon-plus"></i></a></span></td>
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