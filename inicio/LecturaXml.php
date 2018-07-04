<?php

$xml = simplexml_load_file($carpeta.$_FILES['ruta']['name'][$i]);
$sxe = $xml;
$ns = $sxe->getNamespaces(true);
$xml->registerXPathNamespace('c', $ns['cfdi']);
$xml->registerXPathNamespace('t', $ns['tfd']);

//EMPIEZO A LEER LA INFORMACION DEL CFDI E IMPRIMIRLA
foreach ($xml->xpath('//cfdi:Comprobante') as $cfdiComprobante){
      $varTotal = $cfdiComprobante['Total'];
      $varFol = $cfdiComprobante['Folio'];
}
foreach ($xml->xpath('//cfdi:Comprobante//cfdi:Emisor') as $Emisor){
  $val_Emisor = $Emisor['Nombre'];
  $val_RFC = $Emisor['Rfc' ];
}
//ESTA ULTIMA FUNCIONA ESPECIFICAMENTE PARA EL TIMBRE FISCAL DIGITAL
foreach ($xml->xpath('//t:TimbreFiscalDigital') as $tfd) {
   $val_UUID = $tfd['UUID'];
   $val_Fecha = $tfd['FechaTimbrado'];
}
$usuario = $_SESSION['id'];
$registro = "";

$hoy = date("d-m-Y");

$estado = "Activo";

$insert = "INSERT INTO ticket (id,proveedor,rfc,fecha,importe_IVA,num_factura,uuid,fecha_log,ruta,estatus) VALUE S ('".$usuario."','".$val_Emisor."','".$val_RFC."','".$val_Fecha."','".$varTotal."','".$varFol."','".$val_UUID."','".$hoy."','".$nombrebase."','".$estado."')";
$mysql_insert_query = mysql_query($insert, $localhost) or die (mysql_error());
/*if (mysql_query($insert, $localhost)){
  return true;
}else{
  return false;
}*/


?>
