<?php
include '../../Conexion/conexion.php';
function LeerXml($ruta,$carpeta,$cont,$localhost,$nombrebase){
//$preruta = "../archivos/";
$registro = "";
$usuario = $_SESSION['id'];
//$hoy = date("c");
$hoy = date("c");
$estado = "Activo";
$xml = simplexml_load_file($ruta);
$ns = $xml->getNamespaces(true);
$xml->registerXPathNamespace('c', $ns['cfdi']);
$xml->registerXPathNamespace('t', $ns['tfd']);
//echo 'Paso: 1';
//echo "<br />";

//EMPIEZO A LEER LA INFORMACION DEL CFDI E IMPRIMIRLA
foreach ($xml->xpath('//cfdi:Comprobante') as $cfdiComprobante){
      //echo '----------------INFORMACION DEL COMPROBANTE----------------';
      //echo "<br />";
      //echo 'Esta es la fecha: ';
      $val_fecha= $cfdiComprobante['Fecha'];
      //echo "<br />";
      //echo 'Esta es el sello: ';
      $var_sello = $cfdiComprobante['Sello'];
      //echo "<br />";
      //echo 'Esta es el total: $';
      $varTotal = $cfdiComprobante['Total'];
      //echo "<br />";
      //echo 'Esta es el subtotal: $';
      $var_SubTComprobante = $cfdiComprobante['SubTotal'];
      //echo "<br />";
      //echo 'Esta es el certificado: ';
      $vaCertComp = $cfdiComprobante['Certificado'];
      //echo "<br />";
      //echo 'Esta es la forma de pago: ';
      $varFPComp = $cfdiComprobante['FormaPago'];
      //echo "<br />";
      //echo 'Esta es el no.certificado: ';
      $varNoCertComp = $cfdiComprobante['NoCertificado'];
      //echo "<br />";
      //echo 'Esta es el tipo de comprobante: ';
      $varTDCComp = $cfdiComprobante['TipoDeComprobante'];
      //echo "<br />";
      //echo 'Esta es el lugar de expedicion: ';
      $varLugarExpComp = $cfdiComprobante['LugarExpedicion'];
      //echo "<br />";
      //echo 'Esta es el Metodo de pago: ';
      $varMetodPagComp = $cfdiComprobante['MetodoPago'];
      //echo "<br />";
      //echo 'Esta es la moneda: ';
      $varMonedaComp = $cfdiComprobante['Moneda'];
      //echo "<br />";
      //echo 'Estas son las condiciones de pago: ';
      $varCondcPagComp = $cfdiComprobante['CondicionesDePago'];
      //echo "<br />";
      //echo 'Este es el folio: ';
      $varFol = $cfdiComprobante['Folio'];
      //echo "<br />";
      //echo "<br />";
}
//echo 'Paso: 2';
//echo "<br />";
foreach ($xml->xpath('//cfdi:Comprobante//cfdi:Impuestos') as $Impuestos){
   //echo '----------------INFORMACION DEL IMPUESTO DE TRASLADO----------------';
   //echo "<br />";
   //echo "<br />";
   //echo 'Esta es el impuesto trasladado total: $';
   $varImpTIT = $Impuestos['TotalImpuestosTrasladados'];
   //echo "<br />";
   //echo "<br />";

}
//echo 'Paso: 3';
//echo "<br />";
foreach ($xml->xpath('//cfdi:Comprobante//cfdi:Impuestos//cfdi:Traslados//cfdi:Traslado') as $Traslado){
   //echo '----------------INFORMACION DEL TRASLADO----------------';
   //echo "<br />";
   //echo "<br />";
   //echo 'Esta es el Importe: $';
   $varTrasladoImp = $Traslado['Importe'];
   //echo "<br />";
   //echo "<br />";

}
//echo 'Paso: 4';
//echo "<br />";
//ESTA ULTIMA FUNCIONA ESPECIFICAMENTE PARA EL TIMBRE FISCAL DIGITAL
foreach ($xml->xpath('//t:TimbreFiscalDigital') as $tfd) {
   //echo '----------------INFORMACION DEL TIMBRE FISCAL----------------';
   //echo "<br />";
   //echo "<br />";
   //echo 'Este es el sello cfd: ';
   $varTfdSeCfd = $tfd['SelloCFD'];
   //echo "<br />";
   //echo 'Este es el UUID: ';
   $val_UUID = $tfd['UUID'];
   //echo "<br />";
   //echo 'Esta es la version: ';
   $varTfdVer = $tfd['Version'];
   //echo "<br />";
   //echo 'Este es el sello del sat: ';
   $varTfdSelSAT = $tfd['SelloSAT'];
   //echo "<br />";
   //echo 'Este es la fecha de timbrado: ';
   $val_Fecha = $tfd['FechaTimbrado'];
   //echo "<br />";
   //echo 'Este es el RFC Prov.certif: ';
   $varTfdRfcProvC = $tfd['RfcProvCertif'];
   //echo "<br />";
   //echo 'Este es el no.certificado sat: ';
   $varTfdNCeSAT = $tfd['NoCertificadoSAT'];
}
//echo 'Paso: 5';
//echo "<br />";
//aqui se hace el insert a la tabla de factura
//echo 'Paso: 6';
//echo "<br />";
foreach ($xml->xpath('//cfdi:Comprobante//cfdi:Emisor') as $Emisor){
  //echo '----------------INFORMACION DEL EMISOR----------------';
  //echo "<br />";
  //echo "<br />";
  //echo 'Este es el Regimen fiscal: ';
  $varEmiReg = $Emisor['RegimenFiscal'];
  //echo "<br />";
  //echo 'Este es el nombre del emisor: ';
  $val_Emisor = $Emisor['Nombre'];
  /*echo "<br />";
  echo 'Este es el RFC del emisor: ';*/
  $val_RFC = $Emisor['Rfc' ];/*
  echo "<br />";
  echo "<br />";*/
}

///aqui se inserta en la tabla emisor


foreach ($xml->xpath('//cfdi:Comprobante//cfdi:Receptor') as $Receptor){
   //echo '----------------INFORMACION DEL RECEPTOR----------------';
   //echo "<br />";
   //echo "<br />";
   //echo 'Este es el UsoCFDI: ';
   $varRecepCfdi = $Receptor['UsoCFDI'];
   //echo "<br />";
   //echo 'Este es el Nombre del receptor: ';
   $varRecepNom = $Receptor['Nombre'];
   //echo "<br />";
   //echo 'Este es el rfc del receptor: ';
   $varRecepRfc = $Receptor['Rfc'];
   //echo "<br />";
   //echo "<br />";
}

//aqui se inserta en la tabla receptor
$insert = "INSERT INTO ticket (ticket,id,proveedor,rfc,fecha,importe_iva,num_factura,uuid,fecha_log,ruta,estatus) VALUES ('".$registro."','".$usuario."','".$val_Emisor."','".$val_RFC."','".$val_Fecha."','".$varTotal."','".$varFol."','".$val_UUID."','".$hoy."','".$nombrebase."','".$estado."')";
$mysql_insert_query = mysql_query($insert, $localhost) or die (mysql_error());
//echo $insert;
$sel = "SELECT MAX(ticket) FROM ticket";
$consulta = mysql_query($sel,$localhost);
$f=mysql_fetch_assoc($consulta);

$insertContfact = "INSERT INTO factura (ticket,fecha,total,subtotal,formaPago,tipodecomprobante,lugarexpedicion,metodopago,moneda,condicionesdepago,folio,totalimpuestostrasladados,importe,uuid,version,fechatimbrado,sellocfd,sellosat,rfcprovcertif,nocertificadosat)
VALUES ('".$f['MAX(ticket)']."','".$val_fecha."','".$varTotal."','".$var_SubTComprobante."','".$varFPComp."','".$varTDCComp."','".$varLugarExpComp."','".$varMetodPagComp."','".$varMonedaComp."','".$varCondcPagComp."','".$varFol."','".$varImpTIT."', '".$varTrasladoImp."' , '".$val_UUID."','".$varTfdVer."','".$val_Fecha."','".$varTfdSeCfd."','".$varTfdSelSAT."','".$varTfdRfcProvC."','".$varTfdNCeSAT."')";
$mysql_insert_query_contfact = mysql_query($insertContfact, $localhost) or die (mysql_error());
//echo $insertContfact;
$insertemisor = "INSERT INTO emisor (ticket,regimenfiscal,nombre,rfc) VALUES ('".$f['MAX(ticket)']."','".$varEmiReg."','".$val_Emisor."','".$val_RFC."')";
$mysql_insert_query_contem = mysql_query($insertemisor, $localhost) or die (mysql_error());
//echo $insertemisor;
$insertrecept = "INSERT INTO receptor (ticket,usocfdi,nombre,rfc) VALUES ('".$f['MAX(ticket)']."','".$varRecepCfdi."','".$varRecepNom."','".$varRecepRfc."')";
$mysql_insert_query_conttre = mysql_query($insertrecept, $localhost) or die (mysql_error());
//echo $insertrecept;
foreach ($xml->xpath('//cfdi:Comprobante//cfdi:Conceptos//cfdi:Concepto') as $Concepto){
   //echo '----------------INFORMACION DEL CONCEPTO----------------';
   //echo "<br />";
   //echo "<br />";
   //echo 'Este es el Importe: $';
   $varConImp = $Concepto['Importe'];
   //echo "<br />";
   //echo 'Este es el valor unitario: $';
   $varConValU = $Concepto['ValorUnitario'];
   //echo "<br />";
   //echo 'Este es la descripcion: ';
   $varConDes = $Concepto['Descripcion'];
   //echo "<br />";
   //echo 'Esta es la unidad: ';
   $varConUni = $Concepto['Unidad'];
   //echo "<br />";
   //echo 'Este es el Clave unidad: ';
   $varConClavU = $Concepto['ClaveUnidad'];
   //echo "<br />";
   //echo 'Este es la cantidad: ';
   $varConCant = $Concepto['Cantidad'];
   //echo "<br />";
   //echo 'Este es el No.Identificacion: ';
   $varConNoid = $Concepto['NoIdentificacion'];
   //echo "<br />";
   //echo 'Este es la clave prod.serv.: ';
   $varConClavProdS = $Concepto['ClaveProdServ'];
   //echo "<br />";
   //echo "<br />";
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
   //aqui se hace el insert en la tabla CONCEPTO
   $insertconcep = "INSERT INTO concepto (ticket , importe, valorunitario , descripcion , unidad , claveunidad, cantidad , noidentificacion , claveprodserv) VALUES ('".$f['MAX(ticket)']."','".$varConImp."','".$varConValU."','".$varConDes."','".$varConUni."','".$varConClavU."','".$varConCant."','".$varConNoid."','".$varConClavProdS."')";
   $mysql_insert_query_contcon = mysql_query($insertconcep, $localhost) or die (mysql_error());
   //echo $insertconcep;

}

foreach ($xml->xpath('//cfdi:Comprobante//cfdi:Conceptos//cfdi:Traslado') as $Traslado){
   //echo '----------------INFORMACION DEL TRASLADO----------------';
   //echo "<br />";
   //echo "<br />";
   //echo 'Este es el importe: $';
   $varTrasImp = $Traslado['Importe'];
   //echo "<br />";
   //echo 'Este es la Tasa0Cuota: ';
   $varTrasTasaO = $Traslado['TasaOCuota'];
   //echo "<br />";
   //echo 'Este es el tipo de factor: ';
   $varTrasTipF = $Traslado['TipoFactor'];
   //echo "<br />";
   //echo 'Este es el impuesto: ';
   $varTrasImpu = $Traslado['Impuesto'];
   //echo "<br />";
   //echo 'Este es la base: ';
   $varTrasBase = $Traslado['Base'];
   //echo "<br />";

   //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
      //aqui se hace el insert en la tabla traslado
      $inserttraslado = "INSERT INTO traslado (ticket, importe , tasaocuota , tipofactor , impuesto , base) VALUES ('".$f['MAX(ticket)']."','".$varTrasImp."','".$varTrasTasaO."','".$varTrasTipF."','".$varTrasImpu."','".$varTrasBase."')";
      $mysql_insert_query_tras = mysql_query($inserttraslado, $localhost) or die (mysql_error());
    //  echo $inserttraslado;
  }



//$ins = $con->prepare("INSERT INTO Ticket (Ticket,id,Proveedor,RFC,Fecha,Importe_IVA,Num_Factura,UUID,Fecha_log,Ruta,Estatus) VALUES (?,?,?,?,?,?,?,?,?,?,?);");
//$ins->bind_param(iisssssssss,$registro ,$usuario,$val_Emisor,$val_RFC,$val_Fecha,$varTotal,$varFol,$val_UUID,$hoy,$carpeta,$estado);/*'','".$nick."','".$pass1."','".$nombre."','".$correo."','".$nivel."',' 1 ','".$hoy."'*/






/*if (mysql_query($insert, $localhost)){
  return true;
}else{
  return false;
}*/

}//Cierra funtion




/*VERSION ALAN******************************************************************************************
include '../../Conexion/conexion.php';

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
$registro = "";

$hoy = date("d/m/Y");

$estado = "Activo";

$insert = "insert into ticket(id,proveedor,rfc,fecha,importe_IVA,num_factura,uuid,fecha_log,ruta,estatus) VALUES ('".$_SESSION['id']."','".$val_Emisor."','".$val_RFC."','".$val_Fecha."','".$varTotal."','".$varFol."','".$val_UUID."','".$hoy."','".$nombrebase."','".$estado."');";
$query_insert = mysql_query($insert, $localhost) or die (mysql_error());

//echo $insert;

//exit();
/*if (mysql_query($insert, $localhost)){
  return true;
}else{
  return false;
}*/


?>
