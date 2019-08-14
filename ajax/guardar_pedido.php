<?php 
	
	require '../conexion.php';
	include "../fpdf181/fpdf.php";
	session_start();
	$nombre=$_POST['cliente'];
	$abono=$_POST['AbonoPedido'];
	$CantidadGanchosVenta=$_POST['vendeganchos'];
	$Ganchos_cliente=$_POST['cantidadganchos'];
	$usuario=$_SESSION["usuario"];
	$subtotal=$_SESSION['Total'];
	$total=$_SESSION['totalpedido'];
	$id_pedido=$_SESSION['id_pedido'];
	$_SESSION['cliente']=$nombre;
	$CELDA=50;
	if($CantidadGanchosVenta>0){
		$consulta = $mysqli->query("SELECT PrecioG from precioganchos");
		$fila = $consulta->fetch_array(MYSQLI_ASSOC);
		$preciog = $fila['PrecioG'];		
		$sql4="INSERT INTO ganchosvendidos(Cantidad,PrecioVenta,empleado) VALUES ('$CantidadGanchosVenta',$preciog,'$usuario')";
		$insertar=$mysqli->query($sql4);
		$CELDA+=3;
	}
	$sql = "INSERT INTO pedidos(Cliente,Abono,ganchoscliente,ganchosvendidos,pendientepagar,total,Empleado,Entregado,idproductos) VALUES ('$nombre','$abono','$Ganchos_cliente','$CantidadGanchosVenta','$subtotal','$total','$usuario','0','$id_pedido')";
	$resultado = $mysqli->query($sql);
	
	$sql2=mysqli_query($mysqli, "select * from productos, tmp where productos.id=tmp.id_producto");
	while($row=mysqli_fetch_array($sql2)){
		$codigo_producto=$row['id'];
		$cantidad=$row['cantidad'];
		$nombre_producto=$row['Prenda'];
		$express=$row['express'];
		$almidon=$row['almidon'];
		$lavado=$row['preciol'];
		$planchado=$row['preciop'];
		if($lavado == null and $planchado > 0){
		$sql3="INSERT INTO productospedidos (idproducto,Prenda,idpedido,cantidad,express,almidon,Planchado,Lavado) VALUES ('$codigo_producto','$nombre_producto','$id_pedido','$cantidad','$express','$almidon','Si','No')";
		$resultado2= $mysqli->query($sql3);	
		}elseif($planchado == null and  $lavado> 0){
			$sql3="INSERT INTO productospedidos (idproducto,Prenda,idpedido,cantidad,express,almidon,Planchado,Lavado) VALUES ('$codigo_producto','$nombre_producto','$id_pedido','$cantidad','$express','$almidon','No','Si')";
		$resultado2= $mysqli->query($sql3);
		}elseif($planchado >0 and  $lavado> 0){
			$sql3="INSERT INTO productospedidos (idproducto,Prenda,idpedido,cantidad,express,almidon,Planchado,Lavado) VALUES ('$codigo_producto','$nombre_producto','$id_pedido','$cantidad','$express','$almidon','Si','Si')";
		$resultado2= $mysqli->query($sql3);		
		}
		else{
			$sql3="INSERT INTO productospedidos (idproducto,Prenda,idpedido,cantidad,express,almidon,Planchado,Lavado) VALUES ('$codigo_producto','$nombre_producto','$id_pedido','$cantidad','$express','$almidon','No','No')";
		$resultado2= $mysqli->query($sql3);	
		}
	}

	$_SESSION['subtotal'];


	



$sql=mysqli_query($mysqli, "select * from productospedidos where idpedido=$id_pedido");

$Cont=0;
while ($row=mysqli_fetch_array($sql)){
	$CELDA+=9;
	$Cont+=1;
}

if ($Cont==1){
	$pdf = new FPDF($orientation='L',$unit='mm', array(72,$CELDA));	
}else{
	$pdf = new FPDF($orientation='P',$unit='mm', array(72,$CELDA));
}



$pdf->AddPage();
$pdf->SetFont('Arial','B',10);    //Letra Arial, negrita (Bold), tam. 20



$textypos = 5;
$pdf->Image('logo-planchaduria-icon-ticket.jpg',0,0,15);
$pdf->text(17,$textypos,"Lavanderia Mi Reyna");
$pdf->SetFont('Arial','',10);    //Letra Arial, negrita (Bold), tam. 20
$textypos+=12;
$pdf->text(5,$textypos,'Cliente: ');
$pdf->text(20,$textypos,$nombre);
$textypos+=3;
$pdf->text(5,$textypos,'Atendido por: ');
$pdf->text(28,$textypos,$usuario);
$textypos+=2;
$pdf->text(2,$textypos,'---------------------------------------------------------');
$textypos+=4;
$pdf->text(5,$textypos,'CANT.        ARTICULO           PRECIO  ');
$precioUnitario=0;
$textypos+=6;


$sql3=mysqli_query($mysqli, "select * from productos, tmp where productos.id=tmp.id_producto");
while ($row2=mysqli_fetch_array($sql3)){
	$cantidad= $row2['cantidad'];
	$prenda =$row2['Prenda'];
	$preciol=$row2['preciol'];
	$preciop=$row2['preciop'];
	$almidon=$row2['almidon'];
	$express=$row2['express'];
	$precioUnitario=$preciol+$preciop+$almidon+$express;
	$pdf->text(8,$textypos,	$cantidad);
	$pdf->text(25,$textypos,	$prenda);
	$pdf->text(55,$textypos,	$precioUnitario);

	$textypos+=5;
}
if($CantidadGanchosVenta>0){
	$pdf->text(8,$textypos,	$CantidadGanchosVenta);
	$preciogancho=$preciog*$CantidadGanchosVenta;
	$pdf->text(25,$textypos,	'Gancho');
	$pdf->text(55,$textypos,	$preciogancho);
	$textypos+=5;
}


$pdf->text(2,$textypos,'---------------------------------------------------------');
$textypos+=5;
$pdf->text(5,$textypos,"TOTAL: " );
$pdf->text(50,$textypos,"$ ".number_format($total,2,".",","),0,0,"R");
$textypos+=5;
$pdf->text(5,$textypos,"ABONO: " );
$pdf->text(50,$textypos,"$ ".number_format($abono,2,".",","),0,0,"R");
$textypos+=5;
$pdf->text(5,$textypos,"PENDIENTE: " );
$pdf->text(50,$textypos,"$ ".number_format($subtotal,2,".",","),0,0,"R");
$textypos+=7;
$pdf->text(5,$textypos,'GRACIAS POR SU PREFERENCIA ');
$textypos+=5;
$pdf->text(2,$textypos,'---------------------------------------------------------');

$pdf->output();






?>