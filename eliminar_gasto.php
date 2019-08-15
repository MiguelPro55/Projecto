<?php
	
	require 'conexion.php';

	$id = $_GET['id'];
	
	$sql = "DELETE FROM gastos WHERE id = '$id'";
	$resultado = $mysqli->query($sql);
	header('Location: gastos.php');
	
?>
