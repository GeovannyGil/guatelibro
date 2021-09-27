<?php
require 'Controlador.php';

class Factura extends Controlador{
    public function imprimir($id_venta){
        $consultas = $this->modelo("Venta");
        $datos_venta = $consultas->buscarVentaImprimir($id_venta);
        $datos_detalle_venta = $consultas->buscarDetalleVentaImprimir($id_venta);
        $filas_a_agregar = 0;


       foreach($datos_venta as $fila){
           $id_venta = $fila['id_venta'];
           $fecha_hora = $fila['fecha_hora'];
           $total_venta = $fila['total_venta'];
           $estados = $fila['estados'];
           $id_cliente = $fila['id_cliente'];
           $datos_cliente = $consultas->buscarClienteImprimir($id_cliente);
           
           foreach($datos_cliente as $fila2){
               $nombre_cliente = $fila2['nombre'];
               $dpi = $fila2['dpi'];
               $direccion = $fila2['direccion'];
           }

           $id_usuario = $fila['id_usuario'];
           $datos_usuario = $consultas->buscarUsuarioImprimir($id_usuario);
           foreach($datos_usuario as $fila3){
               $nombre_usuario = $fila3['nombre'];
           }
       }

       //datos de los productos
       foreach($datos_detalle_venta as $fila4){
           $id_zapato = $fila4['id_zapato'];
           $datos_zapato = $consultas->buscarZapatoImprimir($id_zapato);
           foreach($datos_zapato as $fila5){
               $nombre_zapato = $fila5['estilo'];  
           }
           $cantidad = $fila4['cantidad'];
           $precio_venta = $fila4['precio_venta'];
           $total = $fila4['total'];
           $filas_a_agregar+=7;

       }

       ob_start();
       require 'assets/fpdf/fpdf.php';
       define('QUETZALES',chr(81));
       $pdf = new FPDF('P','mm',array(80,135+$filas_a_agregar));
       $pdf->AddPage();
       
       /*************Encabezado*************/
       $pdf->setFont('Helvetica','',12);
       $pdf->Cell(60,4,'SistemaVentaZapato.com',0,1,'C');
       $pdf->setFont('Helvetica','',8);
       $pdf->Cell(60,4,'N.I.T: 259603-5',0,1,'C');
       $pdf->Cell(60,4,'5ta av 5-32 Zona 5',0,1,'C');
       $pdf->Cell(60,4,'San Miguel Morazan',0,1,'C');
       $pdf->setFont('Helvetica','',6);
       $pdf->Cell(60,4,'RESOLUCION: 2020-1-20',0,1,'C');
       $pdf->Cell(60,4,'DE FECHA: 2020-10-11',0,1,'C');
       $pdf->Cell(60,4,'SERIE: A1 DE 00003 A 10000',0,1,'C');
       $pdf->Cell(60,4,'RESOLUCION VENCE: 2020-12-20',0,1,'C');  
       
       /*************Datos del cliente**************/
       $pdf->setFont('Helvetica','B',7);
       $pdf->Cell(5,10,'Datos del cliente',0);
       $pdf->Ln(8);
       $pdf->Cell(60,0,'','T');
       $pdf->Ln(0);
       $pdf->setFont('Helvetica','',7);
       $pdf->Cell(60,4,'Cliente:'.utf8_decode($nombre_cliente),0,1,'L');
       $pdf->Cell(60,4,'DPI:'.$dpi,0,1,'L');
       $pdf->Cell(60,4,'Direccion:'.utf8_decode($direccion),0,1,'L');
       $pdf->Cell(60,4,'Fecha:'.$fecha_hora,0,1,'L');

       /******************Encabezado productos*******************/
       $pdf->setFont('Helvetica','B',7);
       $pdf->Cell(5,10,'Cod',0,0,'R');
       $pdf->Cell(16,10,'Producto',0,0,'R');
       $pdf->Cell(19,10,'Cant',0,0,'R');
       $pdf->Cell(10,10,'Precio',0,0,'R');
       $pdf->Cell(8,10,'Total',0,0,'R');
       $pdf->Ln(8);
       $pdf->Cell(60,0,'','T');
       $pdf->Ln(0);

       //datos de los productos
      foreach($datos_detalle_venta as $fila4){
        $id_zapato = $fila4['id_zapato'];
        $datos_zapato = $consultas->buscarZapatoImprimir($id_zapato);
        foreach($datos_zapato as $fila5){
            $nombre_zapato = $fila5['estilo'];  
        }
        $cantidad = $fila4['cantidad'];
        $precio_venta = $fila4['precio_venta'];
        $total = $fila4['total'];
        $pdf->setFont('Helvetica','',7);
        $pdf->Ln(1);
        $pdf->SetFillColor('255','255','255');
        $pdf->Cell(5,4,$id_zapato,0,0,'R');
        $pdf->MultiCell(30,4,utf8_decode($nombre_zapato),0,0,'L');
        $pdf->Cell(37,-4,$cantidad,0,0,'R');
        $pdf->Cell(10,-4,$precio_venta,0,0,'R');
        $pdf->Cell(10,-4,$total,0,0,'R');
        $pdf->Ln(1);
    
    }
    
    
        /********Pie********/
        $iva = $total_venta * 0.12;
        $total_sin_iva = $total_venta - $iva;
        $pdf->Ln(1);
        $pdf->Cell(60,0,'','T');
        $pdf->Ln(3);
        $pdf->Cell(25,10,'TOTAL SIN IVA',0);
        $pdf->Cell(20,10,'',0);
        $pdf->Cell(15,10,QUETZALES.'.'.$total_sin_iva,0,0,'R');
        $pdf->Ln(3);
        $pdf->Cell(25,10,'IVA',0);
        $pdf->Cell(20,10,'',0);
        $pdf->Cell(15,10,QUETZALES.'.'.$iva,0,0,'R');
        $pdf->Ln(3);
        $pdf->Cell(25,10,'TOTAL',0);
        $pdf->Cell(20,10,'',0);
        $pdf->Cell(15,10,QUETZALES.'.'.$total_venta,0,0,'R');

        /********PIE DE PAGINA*********/
        $pdf->Ln(15);
        $pdf->setFont('Helvetica','',6);
        $pdf->Cell(60,4,'Venta hecha por:' .utf8_decode($nombre_usuario),0,1,'R');
        $pdf->Cell(60,4,'Estado: ' .utf8_decode($estados),0,1,'R');
        $pdf->setFont('Helvetica','',7);
        $pdf->Ln(5);
        $pdf->Cell(60,0,'SUJETO A PAGOS TRIMESTRALES',0,1,'C');
        $pdf->Ln(3);
        $pdf->Cell(60,0,'GRACIAS POR TU COMPRA',0,1,'C');



       
       $pdf->OutPut();
       ob_end_flush();
   
   }  


}
?>