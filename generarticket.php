<?php
include "fpdf181/fpdf.php";
require "conexion.php";
session_start();
//$id_pedido=$_SESSION['id_pedido'];
//$cliente=$_SESSION['cliente'];
$id_pedido=759;
$cliente = "Prueba";

$sql=mysqli_query($mysqli, "select * from productospedidos where idpedido=$id_pedido");
$CELDA=46;
while ($row=mysqli_fetch_array($sql)){
	$CELDA+=15;
}





$pdf = new FPDF($orientation='P',$unit='mm', array(72,$CELDA));
$pdf->AddPage();
$pdf->SetFont('Arial','B',8);    //Letra Arial, negrita (Bold), tam. 20
$textypos = 5;
$pdf->setY(2);
$pdf->setX(5);
$pdf->Cell(5,$textypos,"Lavanderia Mi Reyna");
$pdf->SetFont('Arial','',5);    //Letra Arial, negrita (Bold), tam. 20
$textypos+=6;
$pdf->setX(2);
$pdf->Cell(5,$textypos,'Cliente: ');
$pdf->setX(9);
$pdf->Cell(5,$textypos,$cliente);
$textypos+=6;



$pdf->setX(0);
$pdf->Cell(5,$textypos,'-------------------------------------------------------------------');
$textypos+=6;
$pdf->setX(2);
$pdf->Cell(5,$textypos,'CANT.        ARTICULO           PRECIO  ');
$precioUnitario=30;
$off = $textypos+6;
$total=0;
$sql2=mysqli_query($mysqli, "select * from productospedidos where idpedido=$id_pedido");
while ($row2=mysqli_fetch_array($sql2)){
	$cantidad= $row2['cantidad'];
	$prenda =$row2['Prenda'];
	
	$pdf->setX(2);
	$pdf->Cell(5,$off,	$cantidad);
	$pdf->setX(12);
	$pdf->Cell(5,$off,	$prenda);
	$pdf->setX(27);
	$pdf->Cell(5,$off,	$precioUnitario);
	$total+=$precioUnitario;

	$off+=6;



}
$pdf->setX(0);
$pdf->Cell(2,$off,'-------------------------------------------------------------------');
$pdf->setX(2);
$off+=6;
$pdf->Cell(5,$off,"TOTAL: " );
$pdf->setX(28);
$pdf->Cell(5,$off,"$ ".number_format($total,2,".",","),0,0,"R");
$pdf->setX(2);
$off+=6;
$pdf->Cell(5,$off,'GRACIAS POR TU COMPRA ');
/*$total =0;
$off = $textypos+6;
$producto = array(
	"q"=>3,
	"name"=>"Playera",
	"price"=>200
);
$productos = array($producto, $producto, $producto, $producto, $producto );
forpdf->setX(2);
$pdf->Cell(5,$off,$pro["q"]);each($productos as $pro){
$
$pdf->setX(6);
$pdf->Cell(35,$off,  strtoupper(substr($pro["name"], 0,12)) );
$pdf->setX(20);
$pdf->Cell(11,$off,  "$".number_format($pro["price"],2,".",",") ,0,0,"R");
$pdf->setX(32);
$pdf->Cell(11,$off,  "$ ".number_format($pro["q"]*$pro["price"],2,".",",") ,0,0,"R");

$total += $pro["q"]*$pro["price"];
$off+=6;
}
$textypos=$off+6;

$pdf->setX(2);
$pdf->Cell(5,$textypos,"TOTAL: " );
$pdf->setX(38);
$pdf->Cell(5,$textypos,"$ ".number_format($total,2,".",","),0,0,"R");

$pdf->setX(2);
$pdf->Cell(5,$textypos+6,'GRACIAS POR TU COMPRA ');

*/

$pdf->output();
