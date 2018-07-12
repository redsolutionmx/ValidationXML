<?php include '../extend/header.php';
  //Restringe a usuarios para no entrar a paginas no permitidas
include '../extend/permiso.php';
//include 'ins_archivo/ins_archivos.php';
//include '../Conexion/conexion.php';

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
 <?php
 //consulta
 $sel = "SELECT ticket,proveedor, rfc , fecha , importe_iva , num_factura , uuid, comentario, estatus FROM ticket WHERE estatus = 'CUENTASPORPAGAR' ";
 $consulta = mysql_query($sel,$localhost);
 //  $var = mysql_fetch_assoc($consulta) or die ('no se pudo hacer la consulta'.mysql_error());
 $row = mysql_num_rows($consulta);
  ?>

 <div class="row">
   <div class="col s12">
     <div class="card hoverable">
       <div class="card-content">
         <span class="card-title">Archivos pendientes(<?php echo $row ?>)</span>
         <table  class="centered">
           <thead>
             <tr class="cabecera">
               <th>Visualizar</th>
               <th>Ticket</th>
               <th>Proveedor</th>
               <th>Fecha</th>
               <th>Importe_IVA</th>
               <th>UUID</th>
               <th>Comen.anterior</th>
               <th>Comentario</th>
               <th>Pdf</th>
               <th>Rechazado</th>
               <th>Valido</th>
             </tr>
           </thead>
           <?php

           while ($f=mysql_fetch_assoc($consulta)) { ?>
             <tr><!--Modal-->
               <td><a class="btn-floating btn-medium waves-effect waves-lighten blue" onclick="swal({ title: 'Visualizar informacion de factura', type: 'info', showCancelButton: true, confirmButtonColor:
               '#3085d6', cancelButtonColor: '#d33', confirmButtonText: 'Si!'}).then(function () {
                   location.href='tabla.php?id=<?php echo $f['ticket']?>;'  });"><i class="material-icons">visibility</i></a></td>



               <td><?php echo $f['ticket'] ?></td>
               <td><?php echo $f['proveedor'] ?></td>
               <!--<td><?php echo $f['rfc'] ?>-->
               <td><?php echo $f['fecha'] ?></td>
               <td><?php echo "$". number_format($f['importe_iva'], 2); ?></td>
               <!--<td><?php echo $f['num_factura'] ?></td>-->
               <td><?php echo $f['uuid'] ?></td>
               <td><?php echo $f['comentario'] ?></td>
               <td>
                 <form class="form" action="comentarioconta.php" method="post" enctype="multipart/form-data" autocomplete="off">
                   <table>
                 <div class="input-field">
                   <tr>
                     <input type="hidden" name="id_coment" value="<?php echo $f['ticket'] ?>">
                     <input type="text" name="comentario" id="comentario" onblur="may(this.value, this.id)" >

                   </div>
                   <button type="submit"id="btn_guardar">ENVIAR</button>
                 </td>
                 </tr>
                 </table>
                   </form>

               </td>

                     <td><a class="btn-floating btn-medium waves-effect waves-lighten blue" onclick="swal(
                       'Descargando PDF',
                       'Se genero exitosamente',
                       'success'
                       ).then(function () {
                         location.href='descargapdf.php?id=<?php echo $f['ticket']?>;'  });"><i class="material-icons">picture_as_pdf</i></a></td>


               <td>
                 <a href="#" class="btn-floating rbtn-medium waves-effect waves-lighten red" onclick="swal({ title: '¿Estas seguro?',
                 text: '¿desea rechazarlo?', type: 'warning', showCancelButton: true, confirmButtonColor:
                 '#3085d6', cancelButtonColor: '#d33', confirmButtonText: 'Si, rechazar!'}).then(function () {
                 location.href='rechazoconta.php?id=<?php echo $f['ticket'] ?>';  })"><i class="material-icons">clear</i>
               </td>
                <td>
                 <a class="btn-floating btn-medium waves-effect waves-lighten green darken-1 " onclick="swal({ title: 'Valido',
                 text: 'Este archivo esta valido', type: 'success', showCancelButton: true, confirmButtonColor:
                 '#3085d6', cancelButtonColor: '#d33', confirmButtonText: 'Si, Validar!'}).then(function () {
                 location.href='validoconta.php?id=<?php echo $f['ticket'] ?>';  })"><i class="material-icons">check</i></a>
               </td>
             </tr>
           <?php } ?>

         </table>
       </div>
       <div>
     </div>
   </div>
 </div>


 </body>
  <?php include '../extend/scripts.php'; ?>
  <script src="../js/validacion.js"></script>

  </html>
