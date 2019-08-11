<?php

require '..//conexion.php';
session_start();

if (isset($_POST['abono'])){$abono=$_POST['abono']; if($abono==null){$abono=0;}}
if (isset($_SESSION['subtotal'])){$total=$_SESSION['subtotal']; if($total==null){$total=0;}}
if (isset($_POST['cantganchos'])){$cantganchos=$_POST['cantganchos']; if($cantganchos==null){$cantganchos=0;}}
$resultado = $mysqli->query("SELECT PrecioG from precioganchos");
$row = $resultado->fetch_array(MYSQLI_ASSOC);
$preciog = $row['PrecioG'];
$totaldelpedido=$total+($cantganchos*$preciog);
$totaldef=$total-$abono+($cantganchos*$preciog);

$format0=number_format($totaldelpedido,2);
$format=number_format($totaldef,2);
$_SESSION['totalpedido']=$format0;
$_SESSION['Total']=$format;
?>
<table class="table">
<tr>
	<td colspan=4><span class="pull-right">TOTAL  $</span></td>
	<td><span class="pull-right"><?php echo $format?></span></td>
	<td></td>
</tr>
</table>