<?php
	
	require 'conexion.php';

	$id = $_GET['id'];
	
	$sql = "DELETE FROM productos WHERE id = '$id'";
	$resultado = $mysqli->query($sql);
	header('Location: productos.php');
	
?>
