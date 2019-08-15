<?php
    include 'model.php';
    require 'fpdf181/fpdf.php';
    

    function TablaBasica($header,$pedido,$cliente)
   {
    //Cabecera
        foreach($header as $col)
        {
            $this->Cell(40,7,$col,1);
            $this->Ln();
        }
        $this->Cell(40,5,$pedido[$num],1);
        $this->Cell(40,5,$cliente[$num],1);
        $this->Ln();
    
   }
    

    $fpdf = new fpdf('P','mm','letter',true);
    $fpdf->AddPage('portrait','letter');
    $fpdf->SetMargins(10,30,20,20);
    $fpdf->SetFillColor(54,54,54);
    $fpdf->Rect(0,0,220,8,'F');
    $fpdf->Image('imagen_reporte.jpg',25,20,160,30,'jpg');
    $fpdf->SetFont('Arial','B',26);
    $fpdf->Ln();
    $fpdf->SetX(50);
    $fpdf->SetTextColor(0,0,0);
    $fpdf->Write(10,'Reporte semanal de ventas');
    $fpdf->Ln();
    $fpdf->Ln();
    $fpdf->Ln();
    //Dinero que se genero
    if(isset($DT)){
        $fpdf->Ln();
        $fpdf->SetFont('Arial','I',12);
        $fpdf->SetX(20);
        $fpdf->Write(5,'De:'.$fecha1);
        $fpdf->SetX(130);
        $fpdf->Write(5,'A:'.$fecha2);
        $fpdf->Ln();
        $fpdf->Ln();
        $fpdf->SetFont('Arial','B',16);
        $fpdf->SetX(20);
        $fpdf->Write(8,'Dinero que ingreso: $');
        $fpdf->SetX(80);
        $fpdf->Write(8,$DT);
    }
    //Abonos totales que se generaron
    if(isset($AB)){
        $fpdf->Ln();
        $fpdf->SetX(20);
        $fpdf->Write(8,'Abonos totales: $');
        $fpdf->SetX(70);
        $fpdf->Write(8,$AB);
    }
    //Ganchos
    if(isset($GV)){
        $fpdf->Ln();
        $fpdf->SetX(20);
        $fpdf->Write(8,'Ganchos vendidos: ');
        $fpdf->SetX(75);
        $fpdf->Write(8,$GV);
        $fpdf->Ln();
        $fpdf->Ln();
    }
    //Tabla de pedidos
    //Títulos de las columnas
    if(isset($idpedido) && isset($cliente)){
        $fpdf->SetX(45);
        $fpdf->Write(8,'Pedidos generados y pendientes de entregar');
        $fpdf->Ln();
        $fpdf->Ln();
        $header=array('ID PEDIDO','NOMBRE DEL CLIENTE');
        $fpdf->SetX(45);
        $fpdf->SetFont('Arial','B',14);
    
        foreach($header as $col)
            {
                $fpdf->Cell(60,10,$col,1);
                
            }
            $fpdf->Ln();
            $fpdf->SetX(45);
        
        for ($i=0;$i<$numero;$i++){
            $fpdf->Cell(60,8,$idpedido[$i],1);
            $fpdf->Cell(60,8,$cliente[$i],1);
            $fpdf->Ln();
            $fpdf->SetX(45);
        }
        
    }
    //Tabla de prendas totales
    if(isset($PRENDA) && isset($CANTIDAD)){
        $fpdf->Ln();
        $fpdf->SetX(45);
        $fpdf->Write(8,'Total de prendas');
        $fpdf->Ln();
        $fpdf->Ln();
        $header=array('PRENDA','CANTIDAD');
        $fpdf->SetX(35);
        $fpdf->SetFont('Arial','B',14);
    
        foreach($header as $col)
            {
                $fpdf->Cell(70,10,$col,1);
                
            }
            $fpdf->Ln();
            $fpdf->SetX(35);
        
        for ($i=0;$i<$numero2;$i++){
            $fpdf->Cell(70,8,$PRENDA[$i],1);
            $fpdf->Cell(70,8,$CANTIDAD[$i],1);
            $fpdf->Ln();
            $fpdf->SetX(35);
        }
    }

    $fpdf->SetFillColor(54,54,54);
    $fpdf->Rect(0,275,220,6,'F');

    

    

    $fpdf->output();







?>
