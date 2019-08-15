<?php
    require 'conexion.php';
    $descripcion = $_POST['descripcion'];
    $monto = $_POST['monto'];

    $sql = "INSERT into gastos (descripcion,monto) values ('$descripcion','$monto')";
    $resultado = $mysqli->query($sql);
    header('Location: gastos.php');



?>