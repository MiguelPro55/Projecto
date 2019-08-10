<?php
	
	require 'conexion.php';
	
	$nombre = $_POST['nombre'];
	$preciolavado = $_POST['preciolavado'];
	$precioplanchado = $_POST['precioplanchado'];

	
	$sql = "INSERT INTO productos (Prenda,PrecioLavado,PrecioPlanchado) VALUES ('$nombre','$preciolavado','$precioplanchado')";
	$resultado = $mysqli->query($sql);
	header('Location: productos.php');
	
?>
