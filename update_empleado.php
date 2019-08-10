<?php
	
    require 'conexion.php';
    
	$id = $_POST['id'];
	$usuario = $_POST['usuario'];
    $clave = $_POST['clave'];
    if(isset($_POST['NuevoPedido'])){
        $nuevopedido = 1;
    }else{
        $nuevopedido = 0;
    }
    if(isset($_POST['PedidosPendientes'])){
        $pedidospendientes = 1;
    }else{
        $pedidospendientes = 0;
    }
    if(isset($_POST['PedidosEntregados'])){
        $pedidosentregados = 1;
    }else{
        $pedidosentregados = 0;
    }
    if(isset($_POST['Productos'])){
        $productos = 1;
    }else{
        $productos = 0;
    }
    if(isset($_POST['Empleados'])){
        $empleados = 1;
    }else{
        $empleados = 0;
    }
    if(isset($_POST['ReportePedidos'])){
        $reportepedidos = 1;
    }else{
        $reportepedidos = 0;
    }
    if(isset($_POST['GanchosVendidos'])){
        $ganchosvendidos = 1;
    }else{
        $ganchosvendidos = 0;
    }

	$sql = "UPDATE usuarios SET usuario='$usuario', clave='$clave',NuevoPedido='$nuevopedido',PedidosPendientes='$pedidospendientes',PedidosEntregados='$pedidosentregados',Productos='$productos',Empleados='$empleados',ReportePedidos='$reportepedidos',GanchosVendidos='$ganchosvendidos' WHERE id = '$id'";
	$resultado = $mysqli->query($sql);

    header('Location: empleados.php');
	
?>

