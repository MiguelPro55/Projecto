<?php
	require '../conexion.php';
	session_start();
	$id = $_GET['idconfirma'];
	$usuario=$_SESSION['usuario'];

	$sql = "UPDATE pedidos SET horaentregado = now() , Entregadopor = '$usuario', Entregado = '1'   WHERE idpedido = '$id' ";
	$resultado = $mysqli->query($sql);
	header('Location: ../pedidos_entregados.php');



?>