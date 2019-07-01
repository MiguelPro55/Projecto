<?php

$mysqli = new mysqli('localhost', 'root', '3nt3r2v3c3s', 'lavanderia');

if($mysqli->connect_error){
	die('Error en la conexion' . $mysqli->connect_error);
}


?>