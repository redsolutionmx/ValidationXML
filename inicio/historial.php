<?php include '../extend/header.php';
  //Restringe a usuarios para no entrar a paginas no permitidas
//include '../extend/permiso.php';
include '../Conexion/conexion.php';


 ?>
<!-- Excel-->
 <div class = 'row'>
   <div class = 'col s12'>
     <div class = 'card hoverable'>
       <div class = "card-content">
           <form action="excel.php" method="post" target="_blank" id="exportat">
             <span class = 'card-title'>Descarga de archivo excel de reporte:
               <button class="btn-floating green botonExcel"><i class="material-icons">library_books</i></button>
               <input type="hidden" name="datos" id="datos">
             </span>
           </form>
       </div>
     </div>
   </div>
 </div>

<script>//alert("Realiza una busqueda con cualquiera de los campos mostrados")</script>

<?php
/*
  $conprov = "SELECT distinct(t.proveedor) FROM ticket ";
  $consulta = mysql_query($conprov,$localhost);
  $row = mysql_num_rows($consulta);
*/
?>

<div class = 'row'>
  <div class = 'col s12 m12'>
    <div class = 'card hoverable'>
      <br>
<span ><h5 align="center">Busqueda en registro</h5></span>
    <form class="form" action="busquedaporfecha.php" method="post" >
      <div class = "card-content">
        <label>Selecciona una fecha:</label>
      <!--<input type="text" id="start_fecha" name="start_fecha" value="dd/mm/aaaa">
      <input type="text" id="end_fecha" name="end_fecha" value="dd/mm/aaaa">
      <input type="hidden" id="fomr_sent" name="form_sent" value="true">-->
      <input type="date" name="bday">
      <input type="date" name="bday2">
      <button type="submit" name="name" value="" class="btn black" id="btn_search"><i class="material-icons">search</i></button>

    <!--
    <input type="text" name="fecha" placeholder="Ingrese fecha a buscar con el siguiente formato: (dd-mm-aa)">
      <button type="submit" name="name" value="" class="btn black" id="btn_search"><i class="material-icons">search</i></button>
    -->
    </div>
</form>


<!--Comienza busqueda por proveedor-->
<?php
$pro = mysql_query("SELECT distinct(proveedor) FROM ticket" ) or die ("Error en consulta ".mysql_error);
?>
  <form class="form" action="busqueda.php" method="post">
    <div class = "card-content">
    <label>Busqueda de proovedor:</label>
    <select class="browser-default" name="proveedor" >
      <option value="TODO"  selected>Todo</option>
      <?php while ($registro = mysql_fetch_array($pro)) {?>
      <option value="<?php echo $registro['proveedor'] ?>"><?php echo $registro['proveedor'] ?></option>
      <?php } ?>
    </select>
      <button type="submit" name="name" value="" class="btn black" id="btn_search"><i class="material-icons">search</i></button>
    </div>
</form>



<form class="form" action="busquedaestatus.php" method="post" >
      <div class = "card-content">
        <label>Selecciona un estatus:</label>
    <select class="browser-default" name="estatus" >
      <option value="TODO"  selected>Todo</option>
      <option value="Activo">Activo</option>
      <option value="MESA">Mesa de control</option>
      <option value="COMPRAS">Compras</option>
      <option value="CUENTASPORPAGAR">Cuentas por pagar</option>
      <option value="CONTABILIDAD">Contabilidad</option>
      <option value="Rechazado">Rechazado</option>
    </select>
<button type="submit" name="name" value="" class="btn black" id="btn_search"><i class="material-icons">search</i></button>
  </div>
</form>

<?php
$pro = mysql_query("SELECT nombre FROM usuarios" ) or die ("Error en consulta ".mysql_error);
?>
  <form class="form" action="busquedaporusuario.php" method="post">
    <div class = "card-content">
    <label>Busqueda de usuario:</label>
    <select class="browser-default" name="usuario" >
      <option value="TODO"  selected>Todo</option>
      <?php while ($registro = mysql_fetch_array($pro)) {?>
      <option value="<?php echo $registro['nombre'] ?>"><?php echo $registro['nombre'] ?></option>
      <?php } ?>
    </select>
      <button type="submit" name="name" value="" class="btn black" id="btn_search"><i class="material-icons">search</i></button>
    </div>
</form>





<!-- Esto llama a los scripts -->
<?php include '../extend/scripts.php'; ?>
<script src="../js/validacion.js"></script>
</body>
</html>
