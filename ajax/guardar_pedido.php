<?php 
	
	require '../conexion.php';
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

	echo $subtotal;
	echo $total;
	if($CantidadGanchosVenta>0){
		$consulta = $mysqli->query("SELECT PrecioG from precioganchos");
		$fila = $consulta->fetch_array(MYSQLI_ASSOC);
		$preciog = $fila['PrecioG'];		
		$sql4="INSERT INTO ganchosvendidos(Cantidad,PrecioVenta) VALUES ('$CantidadGanchosVenta',$preciog)";
		$insertar=$mysqli->query($sql4);
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
		$sql3="INSERT INTO productospedidos (idproducto,Prenda,idpedido,cantidad,express,almidon) VALUES ('$codigo_producto','$nombre_producto','$id_pedido','$cantidad','$express','$almidon')";
		$resultado2= $mysqli->query($sql3);		
	}

	$_SESSION['subtotal'];


	$sqlborrar = "DELETE FROM tmp";
	$resultadoborrar = $mysqli->query($sqlborrar);
	header('Location: ../pedidos_pendientes.php');




?>