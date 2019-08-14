<?php
    require 'conexion.php';
    $fecha1 =$_POST['fecha1'];
    $fecha2 = $_POST['fecha2'];
    $mysql_date = date('Y-m-d', strtotime($fecha1));
    $fecha1=$mysql_date;
    $mysql_date = date('Y-m-d', strtotime($fecha2));
    $fecha2=$mysql_date;
    $fecha1 .=" 00:00:00";
    $fecha2 .=" 23:00:00";
    //echo $fecha1;
    //echo "<br>";
    //echo $fecha2;

    if(isset($_POST['TotalPrendas']))
    {
        $sqlborrar = "DELETE FROM reporte";
	    $resultadoborrar = $mysqli->query($sqlborrar);
        $PRENDA= array();
        $CANTIDAD=array();
        $consulta_reporte="INSERT into reporte (idproductos,Prenda,cantidad) SELECT idproducto,Prenda,cantidad from productospedidos INNER JOIN pedidos where horapedido between '$fecha1'and '$fecha2' and productospedidos.idpedido=pedidos.idproductos";
        $resultado = $mysqli->query($consulta_reporte);
        $consulta_reporte2="SELECT Prenda ,SUM(cantidad) as CANTIDAD from reporte group by Prenda having COUNT(*)>=1";
        $resultado2 = $mysqli->query($consulta_reporte2);
        while($fila2= $resultado2 -> fetch_row()){
            //echo $fila2[0];
            $PRENDA[]=$fila2[0];
            //echo $fila2[1];
            $CANTIDAD[]=$fila2[1];
        }
        $numero2 = $resultado2->num_rows;
        
        

    }
    
    if(isset($_POST['dinero']))
    {
        $consulta_reporte="SELECT SUM(total) as DINERO from pedidos where Entregado=1 and horapedido between '$fecha1' and '$fecha2'";
        $result=$mysqli->query($consulta_reporte);
       // if (isset($dineroTotal)){ echo '1';}
        //$row=$dineroTotal->fetch_array(MYSQLI_ASSOC);
        //echo $row['DINERO'];
        $a = $result -> fetch_array();
        $DT = $a['DINERO'];
        //}

        //$DT=(string)$DT;

    }

    if(isset($_POST['PedidosP']))
    {
        $idpedido= array();
        $cliente=array();
        $consulta_reporte="SELECT idpedido,Cliente from pedidos where Entregado=0 and horapedido between '$fecha1' and '$fecha2'";
        $PedidosP=$mysqli->query($consulta_reporte);
        while($fila= $PedidosP -> fetch_row()){
            $idpedido[] = $fila[0];
            $cliente[] = $fila[1];
        }
        $numero = $PedidosP->num_rows;
        

    }

    if(isset($_POST['abonos']))
    {
        $consulta_reporte="SELECT SUM(Abono) as ABONO from pedidos where Entregado=0 and horapedido between '$fecha1' and '$fecha2'";
        $Abonos = $mysqli->query($consulta_reporte);
        $a = $Abonos -> fetch_array();
        $AB= $a['ABONO'];
    }


    if(isset($_POST['ganchosV']))
    {
        $consulta_reporte="SELECT SUM(Cantidad) as TOTALGANCHOS from ganchosvendidos where Fecha between '$fecha1' and '$fecha2' ";
        $ganchosVendidos = $mysqli -> query($consulta_reporte);
        $a = $ganchosVendidos -> fetch_array();
        $GV= $a['TOTALGANCHOS'];
        
    }
    


?>