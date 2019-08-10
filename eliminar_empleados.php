<?php
	
	require 'conexion.php';

	$id = $_GET['id'];
	
	$sql = "DELETE FROM usuarios WHERE id = '$id'";
	$resultado = $mysqli->query($sql);
	header('Location: empleados.php');
	
?>
