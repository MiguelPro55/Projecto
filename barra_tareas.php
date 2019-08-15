<?php
	session_start();
	if(!isset($_SESSION["usuario"])){
		header("location:login.php");
	}
?>
<?php 
    require 'conexion.php';
    $usuario = $_SESSION["usuario"];
    $sql = "SELECT * FROM usuarios WHERE usuario='$usuario'";
    $resultado = $mysqli->query($sql);
	$row = $resultado->fetch_array(MYSQLI_ASSOC);
?>
<html>
<head>
    <link href="css/index_estilo.css" rel="stylesheet">

</head>
<body>
    <header class="header">
        <div class="container logo-nav-container">
            <a href="index.php" class="logo"><?php print $_SESSION["usuario"] ?></a>
            <nav class="navigation">
                <ul>
                    <?php if($row['NuevoPedido']==1){ ?>
                    <li><a href="nuevo_pedido.php">Nuevo pedido</a></li><?php } ?>
                    <?php if($row['PedidosPendientes']==1){ ?>
                    <li><a href="pedidos_pendientes.php">Pedidos pendientes</a></li><?php } ?>
                    <?php if($row['PedidosEntregados']==1){ ?>
                    <li><a href="pedidos_entregados.php">Pedidos entregados</a></li><?php } ?>
                    <?php if($row['Productos']==1){ ?>
                    <li><a href="productos.php">Productos</a></li><?php } ?>
                    <?php if($row['Empleados']==1){ ?>
                    <li><a href="empleados.php">Empleados</a></li><?php } ?>
                    <?php if($row['ReportePedidos']==1){ ?>
                    <li><a href="reporte_pedidos">Reporte de pedidos</a></li><?php } ?>
                    <?php if($row['GanchosVendidos']==1){ ?>
                    <li><a href="ganchos_vendidos.php">Ganchos vendidos</a></li><?php } ?>
                    <li><a href="gastos.php">Registro de gastos</a></li>
                </ul>
            </nav>
            <a href="cierre_login" class="logo">Cerrar sesion</a>
        </div>
    </header>
    
</body>
</html>
