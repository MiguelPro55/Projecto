<?php
	session_start();
	if(!isset($_SESSION["usuario"])){
		header("location:login.php");
	}
?>
<html>
<head>
    <link href="css/index_estilo.css" rel="stylesheet">

</head>
<body>
    <header class="header">
        <div class="container logo-nav-container">
            <a href="index.php" class="logo">Usuario:<?php print $_SESSION["usuario"] ?></a>
            <nav class="navigation">
                <ul>
                    <li><a href="nuevo_pedido.php">Nuevo pedido</a></li>
                    <li><a href="#">Pedidos pendientes</a></li>
                    <li><a href="#">Pedidos entregados</a></li>
                    <li><a href="productos.php">Productos</a></li>
                    <li><a href="empleados.php">Empleados</a></li>
                    <li><a href="#">Reporte de pedidos</a></li>
                    <li><a href="#">Ganchos vendidos</a></li>
                </ul>
            </nav>
            <a href="cierre_login" class="logo">Cerrar sesion</a>
        </div>
    </header>
    
</body>
</html>