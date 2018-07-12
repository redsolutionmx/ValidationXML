<?php
include '../Conexion/conexion.php';

require_once "../phpExcel/Classes/PHPExcel.php";
//require_once "../phpExcel/Classes/PHPExcel/Cell.php";

//date_default_timezone_set("America/Mexico_City");
$fechaactual = getdate();


//Consulta
//$sel = "-SELECT ticket,proveedor, rfc , fecha , importe_iva , num_factura , uuid, fecha_log, estatus, comentario,id FROM ticket";

if(!isset($com)){
  $sel="SELECT t.ticket, t.proveedor, t.rfc, t.fecha, t.importe_iva, t.num_factura,
  t.uuid, t.fecha_log, t.estatus, t.comentario,
  IFNULL( t.pre_ticket,  'sin generar' ) AS  'pre_ticket',
  IFNULL( t.com_ticket,  'sin generar' ) AS  'com_ticket',
  u.nombre AS  'Ultimo en modificar'
  FROM ticket t, usuarios u
  WHERE t.id = u.id
  ORDER BY t.ticket ASC";
}
else{
  $sel="SELECT t.ticket, t.proveedor, t.rfc, t.fecha, t.importe_iva, t.num_factura,
  t.uuid, t.fecha_log, t.estatus, t.comentario,
  IFNULL( t.pre_ticket,  'sin generar' ) AS  'pre_ticket',
  IFNULL( t.com_ticket,  'sin generar' ) AS  'com_ticket',
  u.nombre AS  'Ultimo en modificar'
  FROM ticket t, usuarios u
  WHERE t.id = u.id
  ".$com."
  ORDER BY t.ticket ASC";
}

$consulta = mysql_query($sel,$localhost);
//  $var = mysql_fetch_assoc($consulta) or die ('no se pudo hacer la consulta'.mysql_error());
$row = mysql_num_rows($consulta);

if($row > 0){
  $objPHPExcel = new PHPExcel();

  //Se asignan las propiedad del libro
  $objPHPExcel->getProperties()->setCreator("Administrador")//Nombre del autor
              ->setLastModifiedBy("Administrador")//Ultimo usuario que lo modifico
              ->setTitle("Reporte svf")//Titulo
              ->setSubject("Reporte Excel de prueba")//Asunto
              ->setDescription("Reporte de xml")//Descripcion
              ->setKeywords("Reporte facturas proveedores")//Etiquetas
              ->setCategory("Reporte Excel");//categorias

  $tituloReporte = "Reporte de facturas";
  $titulosColumnas = array('Ticket' ,'Ultimo en modificar' , 'Proveedor' , 'Rfc' , 'Fecha' , 'Importe Iva' , 'No. Factura' , 'UUID' , 'Fecha carga' , 'Estatus' , 'Comentario', 'Prerecibo' , 'Contrarecibo');

//Se combinan las celdas A1 hasta D1 para cpñpcar ahi el titulo
$objPHPExcel->setActiveSheetIndex(0)->mergeCells('A1:D1');

            //Se agregan los titulos del reporte
            $objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue('A1' , $tituloReporte)//Titulo del reporte
            ->setCellValue('A3' , $titulosColumnas[0])//Titulo de las columnas
            ->setCellValue('B3' , $titulosColumnas[1])
            ->setCellValue('C3' , $titulosColumnas[2])
            ->setCellValue('D3' , $titulosColumnas[3])
            ->setCellValue('E3' , $titulosColumnas[4])
            ->setCellValue('F3' , $titulosColumnas[5])
            ->setCellValue('G3' , $titulosColumnas[6])
            ->setCellValue('H3' , $titulosColumnas[7])
            ->setCellValue('I3' , $titulosColumnas[8])
            ->setCellValue('J3' , $titulosColumnas[9])
            ->setCellValue('K3' , $titulosColumnas[10])
            ->setCellValue('L3' , $titulosColumnas[11])
            ->setCellValue('M3' , $titulosColumnas[12]);

            //SE agregan los datos
            $i = 4;//Numero de fila donde se va a comenzar a rellenar
            while($fila=mysql_fetch_array($consulta)){
              $objPHPExcel->setActiveSheetIndex(0)
              ->setCellValue('A'.$i,$fila['ticket'])
              ->setCellValue('B'.$i,$fila['Ultimo en modificar'])
              ->setCellValue('C'.$i,$fila['proveedor'])
              ->setCellValue('D'.$i,$fila['rfc'])
              ->setCellValue('E'.$i,$fila['fecha'])
              ->setCellValue('F'.$i,$fila['importe_iva'])
              ->setCellValue('G'.$i,$fila['num_factura'])
              ->setCellValue('H'.$i,$fila['uuid'])
              ->setCellValue('I'.$i,$fila['fecha_log'])
              ->setCellValue('J'.$i,$fila['estatus'])
              ->setCellValue('K'.$i,$fila['comentario'])
              ->setCellValue('L'.$i,$fila['pre_ticket'])
              ->setCellValue('M'.$i,$fila['com_ticket']);
              $i++;
            }//termina while

            $estiloTituloReporte = array(
              'font' => array(
              'name' => 'Verdana',
              'bold' => true,
              'italic' => false,
              'strike' => false,
              'size' => 16,
              'color' => array(
                'rgb' => 'FFFFFF'
              )
            ),
            'fill' => array(
              'type' => PHPExcel_Style_Fill::FILL_SOLID,
              'color' => array(
                'argb' => 'FF220835')
            ),
            'borders' => array(
              'allborders' => array(
                'style' => PHPExcel_Style_Border::BORDER_NONE
              )
            ),
            'alignment' => array(
              'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
              'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER,
              'rotation' => 0,
              'wrap' => TRUE
            )
          );

          $estiloTituloColumnas = array(
            'font' => array(
              'name' => 'Arial',
              'bold' => true,
              'color' => array(
                'rgb' => '#000000'
              )
            ),
            //Rellena el cuadro con el contenido
            'fill' => array(
              'type' => PHPExcel_Style_Fill::FILL_GRADIENT_LINEAR,
              'rotation' => 90,
              'startcolor' => array(
                'rgb' => '#FFFFFF'
              ),
              'endcolor' => array(
                'argb' => 'FF431a5d'
              )
            ),
            'borders' => array(
              'top' => array(
                'style' => PHPExcel_Style_Border::BORDER_MEDIUM,
                'color' => array(
                  'rgb' => '143860'
                )
              ),
              'bottom' => array(
                'style' => PHPExcel_Style_Border::BORDER_MEDIUM,
                'color' => array(
                  'rgb' => '143860'
                )
              )
            ),
            'alignment' => array(
              'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
              'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER,
              'wrap' => TRUE
            )
          );

          $estiloInformacion = new PHPExcel_Style();
          $estiloInformacion->applyFromArray( array(
            'font' => array(
              'name' => 'Arial',
              'color' => array(
                'rgb' => '000000'
              )
            ),
            'fill' => array(
              'type' =>PHPExcel_Style_Fill::FILL_SOLID,
              'color'=>array(
                    'argb' => 'FFFAFA')
            ),
             'borders' => array(
               'left' => array(
                  'style' => PHPExcel_Style_Border::BORDER_THIN,
                  'color'=> array(
                    'rgb'=> '3a2a47'
                  )
               )
             )
           ));

        $objPHPExcel->getActiveSheet()->getStyle('A1:M1')->applyFromArray($estiloTituloReporte);
        $objPHPExcel->getActiveSheet()->getStyle('A3:M3')->applyFromArray($estiloTituloColumnas);
        $objPHPExcel->getActiveSheet()->setSharedStyle($estiloInformacion, "A4:M".($i-1));

        for($i = 'A'; $i <= 'M'; $i++){
          $objPHPExcel->setActiveSheetIndex(0)->getColumnDimension($i)->setAutoSize(TRUE);
        }
        //Se asigna el nombre a la hoja
        $objPHPExcel->getActiveSheet()->setTitle('Cuentas');
        //Se activa la hoja para que sea la que se muestre cuando el archivo se abre
        $objPHPExcel->setActiveSheetIndex(0);
        //inmovilizar paneles
        $objPHPExcel->getActiveSheet(0)->freezePaneByColumnAndRow(0,4);
        //Protege el archivo y le da solo lectura
        $objPHPExcel->getActiveSheet()->getProtection()->setSheet(true);

    /*Linea que no funciona en servidor
      // Se manda el archivo al navegador web, con el nombre que se indica, en formato 2007
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="Reporte.xlsx"');
header('Cache-Control: max-age=0');
$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
$objWriter->save('php://output');

exit;*/
//funciona en servidor
// redirect output to a client’s web browser (Excel5)
    $hoy = date("d-m-Y");
    header('Content-Type: application/vnd.ms-excel');
    header('Content-Disposition: attachment;filename="Reporte('.$hoy.').xls"');
    header('Cache-Control: max-age=0');
    $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
    $objWriter->save('php://output');
    exit;
}
else{
    print_r('No hay resultados para mostrar');
}



/*PRIMER INTENTO PARA EXCEL
//VARIABLES DE php
$objPHPExcel = new PHPExcel();
$Archivo = "phpexcel";

//Propiedades de archivo excel
$objPHPExcel->getProperties()->setCreator("Central")
->setLastModifiedBy("Central")
->setTitle("Reporte XLS")
->setSubject("Reporte")
->setDescription("")
->setKeywords("")
->setCategory("");

//Propiedades de la celda
$objPHPExcel->getDefaultStyle()->getFont()->setName('Arial Narrow');
$objPHPExcel->getDefaultStyle()->getFont()->setSize(12);
$objPHPExcel->getActiveSheet()->getRowDimension('1')->setRowHeight(20);
$objPHPExcel->getActiveSheet()->getRowDimension('2')->setRowHeight(20);
$objPHPExcel->getActiveSheet()->getRowDimension('3')->setRowHeight(20);
$objPHPExcel->getActiveSheet()->getRowDimension('4')->setRowHeight(20);
$objPHPExcel->getActiveSheet()->getRowDimension('5')->setRowHeight(20);
$objPHPExcel->getActiveSheet()->getRowDimension('6')->setRowHeight(20);
$objPHPExcel->getActiveSheet()->getRowDimension('7')->setRowHeight(20);
$objPHPExcel->getActiveSheet()->getRowDimension('8')->setRowHeight(20);
$objPHPExcel->getActiveSheet()->getRowDimension('9')->setRowHeight(20);
$objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(20);
$objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(20);
$objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(20);
$objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(20);
$objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(20);
$objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(20);
$objPHPExcel->getActiveSheet()->getColumnDimension('G')->setWidth(20);
$objPHPExcel->getActiveSheet()->getColumnDimension('H')->setWidth(20);
$objPHPExcel->getActiveSheet()->getColumnDimension('I')->setWidth(20);
$objPHPExcel->getActiveSheet()->getColumnDimension('J')->setWidth(20);

//CABECERA DE LA CONSULTA
$y = 1;
$objPHPExcel->setActiveSheetIndex(0)
->setCellValue("A",$y,'Ticket')
->setCellValue("B",$y,'Proveedor')
->setCellValue("C",$y,'RFC')
->setCellValue("D",$y,'Fecha')
->setCellValue("E",$y,'Importe_IVA')
->setCellValue("F",$y,'Num_Factura')
->setCellValue("G",$y,'UUID')
->setCellValue("H",$y,'Fecha_log')
->setCellValue("I",$y,'Comentario')
->setCellValue("J",$y,'Estatus');

$objPHPExcel->getActiveSheetIndex()
  ->getSyle('A1:B1:C1:D1:E1:F1:G1:H1:I1:J1')
  ->getFill()
  ->setFillType(PHPExcel_Style_Fill::FILLSOLID);
  //->getStartColor()->setARGB('FFEEEEEE'),

$borders = array(
  'borders' => array(
    'allborders' => array(
      'style' => PHPExcel_Style_Border::BORDER_THIN,
      'color' => array('argb' => 'FF000000'),
    )
  ),
);

$objPHPExcel->getActiveSheet()
            ->getSyle('A1:B1:C1:D1:E1:F1:G1:H1:I1:J1')
            ->applyFromArray($borders);

//DETALLE DE LA CONSULTA
$sql = "SELECT * FROM ticket";
$rec = mysql_query($sql);
while ($row=mysql_fetch_array($rec)) {
  $y++;
  //BORDE DE LA CELDA
  $objPHPExcel->setActiveSheetIndex(0)
  ->getStyle('A',$y,'B',$y,'C',$y,'D',$y,'E',$y,'F',$y,'G',$y,'H',$y,'I',$y,'J',$y)
  ->applyFromArray($borders);

//MOSTRAMOS LOS VALORES
$objPHPExcel->setActiveSheetIndex(0)
  ->setCellValue("A",$y,$row['Ticket'])
  ->setCellValue("B",$y,$row['Proveedor'])
  ->setCellValue("C",$y,$row['RFC'])
  ->setCellValue("D",$y,$row['Fecha'])
  ->setCellValue("E",$y,$row['Importe_IVA'])
  ->setCellValue("F",$y,$row['Num_Factura'])
  ->setCellValue("G",$y,$row['UUID'])
  ->setCellValue("H",$y,$row['Fecha_log'])
  ->setCellValue("I",$y,$row['Comentario'])
  ->setCellValue("J",$y,$row['Estatus']);

}

//DATOS DE LA SALIDA DEL EXCEL
header('Content-Type: application/vnd.es-excel');
header('Content-Disposition: attachment; filename "' .$Archivo.'"');
header('Cache-Control: max-age=0');
$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, "Excel5");
$objWriter->save('php://output');

exit;
*/
?>
