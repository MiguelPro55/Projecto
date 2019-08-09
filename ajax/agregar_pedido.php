<?php

session_start();
if (isset($_POST['id'])){$id=$_POST['id'];}
if (isset($_POST['cantidad'])){$cantidad=$_POST['cantidad'];}
if (isset($_POST['precio_venta_p_'])){$precio_planchado=$_POST['precio_venta_p_'];}
if (isset($_POST['precio_venta_l_'])){$precio_lavado=$_POST['precio_venta_l_'];}

	/* Connect To Database*/
	require_once ("../conexion.php");//Contiene funcion que conecta a la base de datos

if (!empty($id) and !empty($cantidad))
{
	if ($precio_planchado != 0 and $precio_lavado == 0) {
		$insert_tmp=mysqli_query($mysqli, "INSERT INTO tmp (id_producto,cantidad,preciop) VALUES ('$id','$cantidad','$precio_planchado')");
	}
	else if($precio_lavado != 0 and $precio_planchado == 0){
		$insert_tmp=mysqli_query($mysqli, "INSERT INTO tmp (id_producto,cantidad,preciol) VALUES ('$id','$cantidad','$precio_lavado')");
	}
	else {
		$insert_tmp=mysqli_query($mysqli, "INSERT INTO tmp (id_producto,cantidad,preciop,preciol) VALUES ('$id','$cantidad','$precio_planchado','$precio_lavado')");
	}

}
if (isset($_GET['id']))//codigo elimina un elemento del array
{
	$id=intval($_GET['id']);
$delete=mysqli_query($mysqli, "DELETE FROM tmp WHERE id_tmp='".$id."'");
}

?>
<table class="table">
<tr>
	<th>CODIGO</th>
	<th>CANT.</th>
	<th>DESCRIPCION</th>
	<th><span class="pull-right" style="width:170px;">PRECIO PLANCHADO</span></th>
	<th><span class="pull-right" style="width:300px;">PRECIO LAVADO</span></th>
	<th><span class="pull-right">EXPRESS</span></th>
	<th><span class="pull-right">ALMIDÓN</span>
	<th></th>
</tr>
<?php
	$sumador_total=0;
	$sql=mysqli_query($mysqli, "select * from productos, tmp where productos.id=tmp.id_producto");
	while ($row=mysqli_fetch_array($sql))
	{
	$id_tmp=$row["id_tmp"];
	$codigo_producto=$row['id'];
	$cantidad=$row['cantidad'];
	$nombre_producto=$row['Prenda'];
	$precio_planchado=$row['preciop'];
	$precio_lavado=$row['preciol'];
	$precio_venta_f_planchado=number_format($precio_planchado,2);//Formateo variables
	$precio_venta_f_lavado=number_format($precio_lavado,2);//Formateo variables
	$precio_venta_r_planchado=str_replace(",","",$precio_venta_f_planchado);//Reemplazo las 	comas
	$precio_venta_r_lavado=str_replace(",", "", $precio_venta_f_lavado);//Remplazo las comas
	$precio_total=($precio_venta_r_planchado+$precio_venta_r_lavado)*$cantidad;
	$precio_total_f_planchado=number_format($precio_total,2);//Precio total formateado
	$precio_total_r_planchado=str_replace(",","",$precio_total_f_planchado);//Reemplazo las comas
	$sumador_total+=$precio_total_r_planchado;//Sumador
	
		?>

		<tr>
			<td><?php echo $codigo_producto;?></td>
			<td><?php echo $cantidad;?></td>
			<td><?php echo $nombre_producto;?></td>
			<td><span><input type="checkbox" name="checarplanchado" id="checarplanchado" onclick="validar('<?php echo $id_tmp ?>')"></span></td>
			<td><span><input type="checkbox" name="checarlavado" id="checarlavado"></span></td>
			<td><div class="pull-right" style="width:200px;"><input type="text" name="precioexpress" id="precioexpress" placeholder="Precio" value="0" ></td>
			<td><div class="pull-right" style="width:200px;"><input type="text" name="precioalmidon" id="precioalmidon" placeholder="Precio" value="0"></td>
			<td ><span class="pull-right"><a href="#" onclick="eliminar('<?php echo $id_tmp ?>')"><i class="glyphicon glyphicon-trash"></i></a></span></td>
		</tr>	



		<?php
			}
		?>
<?php 
$_SESSION['subtotal']=$sumador_total;	
?>
<tr>
	<td colspan=4><span class="pull-right">TOTAL $</span></td>
	<td><span class="pull-right"><?php echo number_format($sumador_total,2);?></span></td>
	<td></td>
</tr>

</table>
			