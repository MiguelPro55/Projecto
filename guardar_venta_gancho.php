<?php
	
	require 'conexion.php';
	include "fpdf181/fpdf.php";
	session_start();
	$cantidad= $_POST['cantidadventa'];
	$usuario=$_SESSION["usuario"];
	$consulta = $mysqli->query("SELECT PrecioG from precioganchos");
	$fila = $consulta->fetch_array(MYSQLI_ASSOC);
	$preciog = $fila['PrecioG'];
	$sql = "INSERT INTO ganchosvendidos (Cantidad,PrecioVenta,empleado) VALUES ('$cantidad','$preciog','$usuario') ";
	$resultado = $mysqli->query($sql);


$CELDA=50;

$pdf = new FPDF($orientation='L',$unit='mm', array(72,$CELDA));
$pdf->AddPage();
$pdf->SetFont('Arial','B',10);    //Letra Arial, negrita (Bold), tam. 20



$textypos = 5;
$pdf->Image('logo-planchaduria-icon-ticket.jpg',0,0,15);
$pdf->text(17,$textypos,"Lavanderia Mi Reyna");
$pdf->SetFont('Arial','',10);    //Letra Arial, negrita (Bold), tam. 20
$textypos+=10;
$pdf->text(5,$textypos,'Atendido por: ');
$pdf->text(28,$textypos,$usuario);
$textypos+=3;
$pdf->text(2,$textypos,'---------------------------------------------------------');
$textypos+=4;
$pdf->text(5,$textypos,'CANT.        ARTICULO      PRECIO UNIT.  ');
$precioUnitario=0;
$textypos+=6;




$total=$cantidad*$preciog;
$pdf->text(8,$textypos,	$cantidad);
$pdf->text(25,$textypos,	'Gancho');
$pdf->text(55,$textypos,	$preciog);

	$textypos+=5;



$pdf->text(2,$textypos,'---------------------------------------------------------');
$textypos+=5;
$pdf->text(5,$textypos,"TOTAL: " );
$pdf->text(50,$textypos,"$ ".number_format($total,2,".",","),0,0,"R");
$textypos+=7;
$pdf->text(5,$textypos,'GRACIAS POR SU PREFERENCIA ');
$textypos+=5;
$pdf->text(2,$textypos,'---------------------------------------------------------');

$pdf->output();


	
?>