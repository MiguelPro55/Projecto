<?php
	
	require 'conexion.php';
	
	$id = $_POST['id'];
	$nombre = $_POST['nombre'];
	$preciolavado = $_POST['preciolavado'];
	$precioplanchado = $_POST['precioplanchado'];

	$sql = "UPDATE productos SET Prenda='$nombre', PrecioLavado='$preciolavado',PrecioPlanchado='$precioplanchado' WHERE id = '$id'";
	$resultado = $mysqli->query($sql);
	header('Location: productos.php');
	
?>
