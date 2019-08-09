<?php


session_start();

if (isset($_POST['abono'])){$abono=$_POST['abono']; if($abono==null){$abono=0;}}
if (isset($_SESSION['subtotal'])){$total=$_SESSION['subtotal'];}
$ver = $_GET['idprec'];
$totaldef=$total-$abono;
$format=number_format($totaldef,2);
?>
<tr>
	<td colspan=4><span class="pull-right">SUBTOTAL $</span></td>
	<td><span class="pull-right"><?php echo $format?></span></td>
	<td></td>
</table>