<?php
include '../../conexion/conexion.php';
function LeerXml($ruta,$carpeta,$cont,$localhost,$nombrebase){
//$preruta = "../archivos/";

$xml = simplexml_load_file($ruta);
$ns = $xml->getNamespaces(true);
$xml->registerXPathNamespace('c', $ns['cfdi']);
$xml->registerXPathNamespace('t', $ns['tfd']);

//EMPIEZO A LEER LA INFORMACION DEL CFDI E IMPRIMIRLA
foreach ($xml->xpath('//cfdi:Comprobante') as $cfdiComprobante){/*
      echo '----------------INFORMACION DEL COMPROBANTE----------------';
      echo "<br />";
      echo 'Esta es la fecha: ';
      val_fecha= $cfdiComprobante['Fecha'];
      echo "<br />";
      echo 'Esta es el sello: ';
      echo $cfdiComprobante['Sello'];
      echo "<br />";
      echo 'Esta es el total: $';*/
      $varTotal = $cfdiComprobante['Total'];
      /*echo "<br />";
      echo 'Esta es el subtotal: $';
      echo $cfdiComprobante['SubTotal'];
      echo "<br />";
      echo 'Esta es el certificado: ';
      echo $cfdiComprobante['Certificado'];
      echo "<br />";
      echo 'Esta es la forma de pago: ';
      echo $cfdiComprobante['FormaPago'];
      echo "<br />";
      echo 'Esta es el no.certificado: ';
      echo $cfdiComprobante['NoCertificado'];
      echo "<br />";
      echo 'Esta es el tipo de comprobante: ';
      echo $cfdiComprobante['TipoDeComprobante'];
      echo "<br />";
      echo 'Esta es el lugar de expedicion: ';*/
      //echo $cfdiComprobante['LugarExpedicion'];
      /*echo "<br />";
      echo 'Esta es el Metodo de pago: ';
      echo $cfdiComprobante['MetodoPago'];
      echo "<br />";
      echo 'Esta es la moneda: ';
      echo $cfdiComprobante['Moneda'];
      echo "<br />";
      echo 'Estas son las condiciones de pago: ';
      echo $cfdiComprobante['CondicionesDePago'];
      echo "<br />";
      echo 'Este es el folio: ';*/
      $varFol = $cfdiComprobante['Folio'];
      //echo "<br />";
      //echo "<br />";
}
foreach ($xml->xpath('//cfdi:Comprobante//cfdi:Emisor') as $Emisor){
  /*echo '----------------INFORMACION DEL EMISOR----------------';
  echo "<br />";
  echo "<br />";
  echo 'Este es el Regimen fiscal: ';
  echo $Emisor['RegimenFiscal'];
  echo "<br />";
  echo 'Este es el nombre del emisor: ';
  */$val_Emisor = $Emisor['Nombre'];
  /*echo "<br />";
  echo 'Este es el RFC del emisor: ';*/
  $val_RFC = $Emisor['Rfc' ];/*
  echo "<br />";
  echo "<br />";*/
}/*
foreach ($xml->xpath('//cfdi:Comprobante//cfdi:Receptor') as $Receptor){
   echo '----------------INFORMACION DEL RECEPTOR----------------';
   echo "<br />";
   echo "<br />";
   echo 'Este es el UsoCFDI: ';
   echo $Receptor['UsoCFDI'];
   echo "<br />";
   echo 'Este es el Nombre del receptor: ';
   echo $Receptor['Nombre'];
   echo "<br />";
   echo 'Este es el rfc del receptor: ';
   echo $Receptor['Rfc'];
   echo "<br />";
   echo "<br />";
}
/*foreach ($xml->xpath('//cfdi:Comprobante//cfdi:Conceptos//cfdi:Concepto') as $Concepto){
   echo '----------------INFORMACION DEL CONCEPTO----------------';
   echo "<br />";
   echo "<br />";
   echo 'Este es el Importe: $';
   echo $Concepto['Importe'];
   echo "<br />";
   echo 'Este es el valor unitario: $';
   echo $Concepto['ValorUnitario'];
   echo "<br />";
   echo 'Este es la descripcion: ';
   echo $Concepto['Descripcion'];
   echo "<br />";
   echo 'Esta es la unidad: ';
   echo $Concepto['Unidad'];
   echo "<br />";
   echo 'Este es el Clave unidad: ';
   echo $Concepto['ClaveUnidad'];
   echo "<br />";
   echo 'Este es la cantidad: ';
   echo $Concepto['Cantidad'];
   echo "<br />";
   echo 'Este es el No.Identificacion: ';
   echo $Concepto['NoIdentificacion'];
   echo "<br />";
   echo 'Este es la clave prod.serv.: ';
   echo $Concepto['ClaveProdServ'];
   echo "<br />";
   echo "<br />";
}*/
/*
foreach ($xml->xpath('//cfdi:Comprobante//cfdi:Conceptos//cfdi:Traslado') as $Traslado){
   echo '----------------INFORMACION DEL TRASLADO----------------';
   echo "<br />";
   echo "<br />";
   echo 'Este es el importe: $';
   echo $Traslado['Importe'];
   echo "<br />";
   echo 'Este es la Tasa0Cuota: ';
   echo $Traslado['TasaOCuota'];
   echo "<br />";
   echo 'Este es el tipo de factor: ';
   echo $Traslado['TipoFactor'];
   echo "<br />";
   echo 'Este es el impuesto: ';
   echo $Traslado['Impuesto'];
   echo "<br />";
   echo 'Este es la base: ';
   echo $Traslado['Base'];
   echo "<br />";
}
*/

/*
foreach ($xml->xpath('//cfdi:Comprobante//cfdi:Impuestos') as $Impuestos){
   echo '----------------INFORMACION DEL IMPUESTO DE TRASLADO----------------';
   echo "<br />";
   echo "<br />";
   echo 'Esta es el impuesto trasladado total: $';
   echo $Impuestos['TotalImpuestosTrasladados'];
   echo "<br />";
   echo "<br />";

}

*/
/*
foreach ($xml->xpath('//cfdi:Comprobante//cfdi:Impuestos//cfdi:Traslados//cfdi:Traslado') as $Traslado){
   echo '----------------INFORMACION DEL TRASLADO----------------';
   echo "<br />";
   echo "<br />";
   echo 'Esta es el Importe: $';
   echo $Traslado['Importe'];
   echo "<br />";
   echo "<br />";

}
*/
//ESTA ULTIMA FUNCIONA ESPECIFICAMENTE PARA EL TIMBRE FISCAL DIGITAL
foreach ($xml->xpath('//t:TimbreFiscalDigital') as $tfd) {
   /*echo '----------------INFORMACION DEL TIMBRE FISCAL----------------';
   echo "<br />";
   echo "<br />";
   echo 'Este es el sello cfd: ';
   echo $tfd['SelloCFD'];
   echo "<br />";
   echo 'Este es el UUID: ';
   */
   $val_UUID = $tfd['UUID'];/*
   echo "<br />";
   echo 'Esta es la version: ';
   echo $tfd['Version'];
   echo "<br />";
   echo 'Este es el sello del sat: ';
   echo $tfd['SelloSAT'];
   echo "<br />";
   echo 'Este es la fecha de timbrado: ';
   */
   $val_Fecha = $tfd['FechaTimbrado'];/*
   echo "<br />";
   echo 'Este es el RFC Prov.certif: ';
   echo $tfd['RfcProvCertif'];
   echo "<br />";
   echo 'Este es el no.certificado sat: ';
   echo $tfd['NoCertificadoSAT'];*/
}
$usuario = $_SESSION['id'];
$registro = "";
$hoy = date("c");
$estado = "Activo";
//$ins = $con->prepare("INSERT INTO Ticket (Ticket,id,Proveedor,RFC,Fecha,Importe_IVA,Num_Factura,UUID,Fecha_log,Ruta,Estatus) VALUES (?,?,?,?,?,?,?,?,?,?,?);");
//$ins->bind_param(iisssssssss,$registro ,$usuario,$val_Emisor,$val_RFC,$val_Fecha,$varTotal,$varFol,$val_UUID,$hoy,$carpeta,$estado);/*'','".$nick."','".$pass1."','".$nombre."','".$correo."','".$nivel."',' 1 ','".$hoy."'*/
$insert = "INSERT INTO ticket (ticket,id,proveedor,rfc,fecha,importe_iva,num_factura,uuid,fecha_log,ruta,estatus) VALUES ('".$registro."','".$usuario."','".$val_Emisor."','".$val_RFC."','".$val_Fecha."','".$varTotal."','".$varFol."','".$val_UUID."','".$hoy."','".$nombrebase."','".$estado."')";
if (mysql_query($insert, $localhost)){
  return true;
}else{
  return false;
}

}//Cierra funtion
?>
