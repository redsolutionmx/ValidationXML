<?php include '../extend/header.php';

include '../Conexion/conexion.php';

$usuarios = $_POST['proveedor'];
if($usuarios == 'TODO')
{
  $registros = mysql_query("SELECT * FROM ticket" ) or die ("Error en consulta ".mysql_error);
}else{
  $registros = mysql_query("SELECT * FROM ticket WHERE proveedor = '".$usuarios."' " ) or die ("Error en consulta ".mysql_error);
}


/*while ($registro = mysql_fetch_array($registros)) {
  echo $registro['proveedor']." ".$registro['num_factura']." ".$registro['estatus'];
}*/
$row = mysql_num_rows($registros); // con este despliego la cantidad de registros

?>
<!--Buscador en la tabla-->
<div class="row">
  <div class="col s12">
    <nav class="green lighten-1" >
      <div class="nav-wrapper" >
        <div class="input-field">
          <input type="search" id="buscar" autocomplete="off">
          <label for="buscar"><i class="material-icons">search</i></label>
          <i class="material-icons">close</i>
        </div>
      </div>
    </nav>
  </div>
</div>
<!-- termina buscador-->

<div class="row">
  <div class="col s12">
    <div class="card hoverable">
      <div class="card-content">
        <span class="card-title">Resultados de busqueda:(<?php echo $row ?>)</span>
        <table  class="centered">
          <thead>
            <tr class="cabecera">
              <th>Ticket</th>
              <th>Proveedor</th>
              <th>RFC</th>
              <th>Fecha</th>
              <th>Importe_IVA</th>
              <th>No.Fact</th>
              <th>UUID</th>
              <th>Comentario</th>
              <th>ID carga</th>
              <th>Fecha carga</th>
              <th>Estatus</th>
              <!--
              <th>Prerecibo</th>
              <th>Contrarecibo</th>-->

            </tr>

          </thead>


<?php  while ($registro = mysql_fetch_array($registros)) { ?>

 <tr>

   <td><?php echo $registro['ticket'] ?></td>
   <td><?php echo $registro['proveedor'] ?></td>
   <td><?php echo $registro['rfc'] ?></td>
   <td><?php echo $registro['fecha'] ?></td>
   <td><?php echo "$". number_format($registro['importe_iva'], 2); ?></td>
   <td><?php echo $registro['num_factura'] ?></td>
   <td><?php echo $registro['uuid'] ?></td>
   <td><?php echo $registro['comentario'] ?></td>
   <td><?php echo $registro['id'] ?></td>
   <td><?php echo $registro['fecha_log'] ?></td>
   <td><?php echo $registro['estatus'] ?></td>
   <!--
   <td><?php //echo $registro['pre_ticket'] ?></td>
   <td><?php //echo $registro['com_ticket'] ?></td>
 -->

 </tr>

<?php } ?>


</table>
</div>
<div>
 <a href="historial.php"><i class="material-icons">keyboard_return</i>REGRESO</a>
</div>
</div>
</div>

</body>

 <?php include '../extend/scripts.php'; ?>
 <script src="../js/validacion.js"></script>

 </html>
