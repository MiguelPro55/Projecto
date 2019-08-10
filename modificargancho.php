<?php
	
	require 'conexion.php';
	
	$precio= $_POST['preciogang'];

	$sql = "UPDATE precioganchos SET PrecioG='$precio'";
	$resultado = $mysqli->query($sql);

	header('Location: productos.php');
	
?>