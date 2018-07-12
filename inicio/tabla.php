<?php include '../extend/header.php';

include '../Conexion/conexion.php';
$estatus = $_GET['id'];
?>

<!--Primer card emisor-->
<?php

//echo $estatus;
$registros = mysql_query("SELECT * FROM emisor where ticket = ".$estatus ) or die ("Error en consulta ".mysql_error);
//echo $registros;
$row = mysql_num_rows($registros); // con este despliego la cantidad de registros
//echo "cantidad de registros:";
//echo $row;

?>


<div class="row">
  <div class="col s12">
    <div class="card hoverable">
      <div class="card-content">
        <span class="card-title">Resultados de emisor:(<?php echo $row ?>)</span>
        <table>
          <thead>
            <tr class="cabecera">
              <th>Ticket</th>
              <th>RegimenFiscal</th>
              <th>Nombre</th>
              <th>Rfc</th>
              <!--
              <th>Prerecibo</th>
              <th>Contrarecibo</th>-->

            </tr>

          </thead>


<?php  while ($registro = mysql_fetch_array($registros)) { ?>

 <tr>

   <td><?php echo $registro['ticket'] ?></td>
   <td><?php echo $registro['regimenfiscal'] ?></td>
   <td><?php echo $registro['nombre'] ?></td>
   <td><?php echo $registro['rfc'] ?></td>



   <!--
   <td><?php //echo $registro['pre_ticket'] ?></td>
   <td><?php //echo $registro['com_ticket'] ?></td>
 -->

 </tr>

<?php } ?>


</table>
</div>
</div>
</div>
<!--TERMINA PRIMER CARD**********************************************-->



<!--Primer card emisor-->
<?php

//echo $estatus;
$registros = mysql_query("SELECT * FROM concepto where ticket = ".$estatus ) or die ("Error en consulta ".mysql_error);
//echo $registros;
$row = mysql_num_rows($registros); // con este despliego la cantidad de registros
//echo "cantidad de registros:";
//echo $row;

?>


<div class="row">
  <div class="col s12">
    <div class="card hoverable">
      <div class="card-content">
        <span class="card-title">Resultados de concepto:(<?php echo $row ?>)</span>
        <table>
          <thead>
            <tr class="cabecera">
              <th>Importe</th>
              <th>Valor Unitario</th>
              <th>Descripcion</th>
              <th>Unidad</th>
              <th>Clave Unidad</th>
              <th>Cantidad</th>
              <th>No.Identificacion</th>
              <th>ClaveProdServ</th>
              <!--
              <th>Prerecibo</th>
              <th>Contrarecibo</th>-->

            </tr>

          </thead>


<?php  while ($registro = mysql_fetch_array($registros)) { ?>

 <tr>

   <td><?php echo "$". number_format($registro['importe'], 2); ?></td>
   <td><?php echo "$". number_format($registro['valorunitario'], 2); ?></td>
   <td><?php echo $registro['descripcion'] ?></td>
   <td><?php echo $registro['unidad'] ?></td>
   <td><?php echo $registro['claveunidad'] ?></td>
   <td><?php echo $registro['cantidad'] ?></td>
   <td><?php echo $registro['noidentificacion'] ?></td>
   <td><?php echo $registro['claveprodserv'] ?></td>



   <!--
   <td><?php //echo $registro['pre_ticket'] ?></td>
   <td><?php //echo $registro['com_ticket'] ?></td>
 -->

 </tr>

<?php } ?>


</table>
</div>
</div>
</div>
<!--TERMINA PRIMER CARD**********************************************-->


<?php


//echo $estatus;
$registros = mysql_query("SELECT * FROM factura where ticket = ".$estatus ) or die ("Error en consulta ".mysql_error);
//echo $registros;
$row = mysql_num_rows($registros); // con este despliego la cantidad de registros
//echo "cantidad de registros:";
//echo $row;

?>


<div class="row">
  <div class="col s12">
    <div class="card hoverable">
      <div class="card-content">
        <span class="card-title">Resultados de factura:(<?php echo $row ?>)</span>
        <table>
          <thead>
            <tr class="cabecera">

              <th>Fecha</th>
              <th>Total</th>
              <th>subtotal</th>
              <th>FormaPago</th>
              <th>Tipo Comprobante</th>
              <th>Lugar Exp.</th>
              <th>Metodo Pago</th>
              <th>Moneda</th>
              <th>Condiciones de pago</th>
              <th>Folio</th>
              <th>TotalImpuestosTrasladados</th>
              <!--
              <th>Prerecibo</th>
              <th>Contrarecibo</th>-->

            </tr>

          </thead>


<?php  while ($registro = mysql_fetch_array($registros)) { ?>

 <tr>


   <td><?php echo $registro['fecha'] ?></td>
   <td><?php echo "$". number_format($registro['total'], 2); ?></td>
   <td><?php echo "$". number_format($registro['subtotal'], 2); ?></td>
   <td><?php echo $registro['formaPago'] ?></td>
   <td><?php echo $registro['tipodecomprobante'] ?></td>
   <td><?php echo $registro['lugarexpedicion'] ?></td>
   <td><?php echo $registro['metodopago'] ?></td>
   <td><?php echo $registro['moneda'] ?></td>
   <td><?php echo $registro['condicionesdepago'] ?></td>
   <td><?php echo $registro['folio'] ?></td>
   <td><?php echo "$". number_format($registro['totalimpuestostrasladados'], 2); ?></td>


   <!--
   <td><?php //echo $registro['pre_ticket'] ?></td>
   <td><?php //echo $registro['com_ticket'] ?></td>
 -->

 </tr>

<?php } ?>


</table>
</div>
</div>
</div>
<!--TERMINA PRIMER CARD**********************************************-->

<?php


//echo $estatus;
$registros = mysql_query("SELECT * FROM traslado where ticket = ".$estatus ) or die ("Error en consulta ".mysql_error);
//echo $registros;
$row = mysql_num_rows($registros); // con este despliego la cantidad de registros
//echo "cantidad de registros:";
//echo $row;

?>


<div class="row">
  <div class="col s12">
    <div class="card hoverable">
      <div class="card-content">
        <span class="card-title">Resultados de traslado:(<?php echo $row ?>)</span>
        <table>
          <thead>
            <tr class="cabecera">

              <th>Importe</th>
              <th>TasaOCuota</th>
              <th>TipoFactor</th>
              <th>Impuesto</th>
              <th>Base</th>
              <!--
              <th>Prerecibo</th>
              <th>Contrarecibo</th>-->

            </tr>

          </thead>


<?php  while ($registro = mysql_fetch_array($registros)) { ?>

 <tr>


   <td><?php echo "$". number_format($registro['importe'], 2); ?></td>
   <td><?php echo $registro['tasaocuota'] ?></td>
   <td><?php echo $registro['tipofactor'] ?></td>
   <td><?php echo $registro['impuesto'] ?></td>
   <td><?php echo $registro['base'] ?></td>

   <!--
   <td><?php //echo $registro['pre_ticket'] ?></td>
   <td><?php //echo $registro['com_ticket'] ?></td>
 -->

 </tr>

<?php } ?>


</table>
</div>
</div>
</div>
<!--TERMINA PRIMER CARD**********************************************-->


<?php


//echo $estatus;
$registros = mysql_query("SELECT * FROM  receptor where ticket = ".$estatus ) or die ("Error en consulta ".mysql_error);
//echo $registros;
$row = mysql_num_rows($registros); // con este despliego la cantidad de registros
//echo "cantidad de registros:";
//echo $row;

?>


<div class="row">
  <div class="col s12">
    <div class="card hoverable">
      <div class="card-content">
        <span class="card-title">Resultados de receptor:(<?php echo $row ?>)</span>
        <table>
          <thead>
            <tr class="cabecera">

              <th>UsoCfdi</th>
              <th>Nombre</th>
              <th>Rfc</th>
              <!--
              <th>Prerecibo</th>
              <th>Contrarecibo</th>-->

            </tr>

          </thead>


<?php  while ($registro = mysql_fetch_array($registros)) { ?>

 <tr>

   <td><?php echo $registro['usocfdi'] ?></td>
   <td><?php echo $registro['nombre'] ?></td>
   <td><?php echo $registro['rfc'] ?></td>


   <!--
   <td><?php //echo $registro['pre_ticket'] ?></td>
   <td><?php //echo $registro['com_ticket'] ?></td>
 -->

 </tr>

<?php } ?>


</table>
</div>
</div>
</div>
<!--TERMINA PRIMER CARD**********************************************-->


<?php
$registros = mysql_query("SELECT * FROM factura where ticket = ".$estatus ) or die ("Error en consulta ".mysql_error);
//echo $registros;
$row = mysql_num_rows($registros); // con este despliego la cantidad de registros
//*************Segunda card****************************************
?>
<div class="row">
  <div class="col s12">
    <div class="card hoverable">
      <div class="card-content">
        <span class="card-title">Resultados de factura:(<?php echo $row ?>)</span>
        <table>
          <thead>
            <tr class="cabecera">
              <th>UUID</th>
              <th>Fecha timbrado</th>
              <th>rfc prov certif</th>
              <th>No. certificado sat</th>
              <!--
              <th>Prerecibo</th>
              <th>Contrarecibo</th>-->

            </tr>

          </thead>


<?php  while ($registro = mysql_fetch_array($registros)) { ?>

 <tr>

   <td><?php echo $registro['uuid'] ?></td>
   <td><?php echo $registro['fechatimbrado'] ?></td>
   <td><?php echo $registro['rfcprovcertif'] ?></td>
   <td><?php echo $registro['nocertificadosat'] ?></td>


   <!--
   <td><?php //echo $registro['pre_ticket'] ?></td>
   <td><?php //echo $registro['com_ticket'] ?></td>
 -->

 </tr>

<?php } ?>


</table>
</div>
</div>
</div>

<!--TERMINA segunda CARD**********************************************-->
<?php
$registros = mysql_query("SELECT * FROM factura where ticket = ".$estatus ) or die ("Error en consulta ".mysql_error);
//echo $registros;
$row = mysql_num_rows($registros); // con este despliego la cantidad de registros
//*************Tercer card****************************************
?>
<div class="row">
  <div class="col s12">
    <div class="card hoverable">
      <div class="card-content">

        <table>
          <thead>
            <tr class="cabecera">
              <th>Sello cfdi</th>

              <!--
              <th>Prerecibo</th>
              <th>Contrarecibo</th>-->

            </tr>

          </thead>


<?php  while ($registro = mysql_fetch_array($registros)) { ?>

 <tr>

   <td><?php
		$registro_salto = wordwrap($registro['sellocfd'],100,"\n", true);
		echo $registro_salto;
 ?></td>



   <!--
   <td><?php //echo $registro['pre_ticket'] ?></td>
   <td><?php //echo $registro['com_ticket'] ?></td>
 -->

 </tr>

<?php } ?>


</table>
</div>
</div>
</div>

<!--TERMINA Tercer CARD**********************************************-->
<?php
$registros = mysql_query("SELECT * FROM factura where ticket = ".$estatus ) or die ("Error en consulta ".mysql_error);
//echo $registros;
$row = mysql_num_rows($registros); // con este despliego la cantidad de registros
//*************Cuarta card****************************************
?>
<div class="row">
  <div class="col s12">
    <div class="card hoverable">
      <div class="card-content">
        <table >
          <thead>
            <tr class="cabecera">

              <th>Sello SAT</th>
              <!--
              <th>Prerecibo</th>
              <th>Contrarecibo</th>-->

            </tr>

          </thead>


<?php  while ($registro = mysql_fetch_array($registros)) { ?>

 <tr>


   <td><?php echo wordwrap($registro['sellosat'],100,"\n", true); ?></td>


   <!--
   <td><?php //echo $registro['pre_ticket'] ?></td>
   <td><?php //echo $registro['com_ticket'] ?></td>
 -->

 </tr>

<?php } ?>


</table>
</div>
<div>
 <a href="contabilidad.php"><i class="material-icons">keyboard_return</i>REGRESO</a>
</div>
</div>
</div>


</body>

 <?php include '../extend/scripts.php'; ?>
 <script src="../js/validacion.js"></script>

 </html>
