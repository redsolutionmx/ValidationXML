<?php include '../extend/header.php';
  //Restringe a usuarios para no entrar a paginas no permitidas
include '../extend/permiso.php';

 ?>
<script>//alert("ASEGURESE DE CARGAR UN ARCHIVO XML CON SU RESPECTIVO PDF Y DEBE CONTENER EL MISMO NOMBRE!!!!!!")</script>
 <!--Seleccionar archivos-->
<body class="grey lighten-3">
<div class="row">
  <div class = 'col s12 m12 l12'>
    <div class = 'card hoverable'>
      <div class="card-content">
        <!--<span class="card-title" style=""><h5>¡Cargue un xml con su respectivo pdf , Debe contener el mismo nombre!</h5></span>-->
      <span class="card-title" style="">Carga de archivos: (Elije tu xml con su respectivo pdf, debe tener el mismo nombre)</span>
      <div class = "card-panel">
        <form action="ins_archivo/ins_archivos.php" method="post" enctype="multipart/form-data">
          <input type="hidden" name="id" value="<<?php echo $id ?>">
          <div class="file-field input-field">
          <div class="btn">
            <span>Archivos: </span>
              <input type="file" name="ruta[]" multiple>
          </div>
          <div class="file-path-wrapper">
            <input class="file-path validate" type="text" placeholder="!Debe contener el mismo nombre¡">
          </div>
          <!--<div><button type="submit" class="btn black" id="btn_cargar" >Cargar<i class="material-icons">cached</i></button></div>-->
          <div><button type="submit" class="btn-floating btn-medium waves-effect waves-light green" ><i class="material-icons">cloud_upload</i></button></div>
        </div>
        </form>
        </div>
        </div>
      </div>
    </div>
  </div>

<!-- Aqui comienza el despliegue de la tabla-->
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
$sel = "SELECT ticket,proveedor, rfc , fecha , importe_iva , num_factura , uuid, estatus, ruta, comentario FROM ticket WHERE estatus = 'ACTIVO' ";
$consulta = mysql_query($sel,$localhost);
//  $var = mysql_fetch_assoc($consulta) or die ('no se pudo hacer la consulta'.mysql_error());
$row = mysql_num_rows($consulta);
 ?>


<div class="row">
  <div class="col s12">
    <div class="card hoverable">
      <div class="card-content">
        <span class="card-title">Archivos pendientes(<?php echo $row ?>)</span>
        <table class="centered">
          <thead>
            <tr class="cabecera">
              <!--<th>Ticket</th>-->
              <th>Proveedor</th>
              <th>RFC</th>
              <th>Fecha</th>
              <th>Importe_IVA</th>
              <th>No.Factura</th>
              <th>UUID</th>
              <th>Comentario</th>
              <th>Recibo</th>
              <th>Rechazado</th>
              <th>Valido</th>
            </tr>
          </thead>
          <?php

          while ($f=mysql_fetch_assoc($consulta)) { ?>
            <tr>

              <!--<td><?php echo $f['ticket'] ?></td>-->
              <td><?php echo $f['proveedor'] ?></td>
              <td><?php echo $f['rfc'] ?></td>
              <td><?php echo $f['fecha'] ?></td>
              <td><?php echo "$". number_format($f['importe_iva'], 2); ?></td>
              <td><?php echo $f['num_factura'] ?></td>
              <td><?php echo $f['uuid'] ?></td>
              <td>
                <!--primera opcion
                <form>
                  <input type="text" id="Comentario" placeholder="Comentario"/>
                  <input type="button" class="button" value="Carga" onclick="post(); ">
                </form>-->

                <!--Segunda opcion
                <form id="myForm" action="" method="post">
                  <input type="text" name="Comentario"/>
                  <button class="button" id="sub" >Guardar</button>
                </form>-->

                <!--Tercera opcion-->
                <!--<form id="foo">
                  <label for="bar">Comentario</label>
                  <input id="bar" name="bar" type="text" value="" />
                  <input type="submit" value="Enviar" />
                </form>

                <div id="result"></div>
              -->
              <!-- cuarta opcion-->
              <form class="form" action="comentario.php" method="post" enctype="multipart/form-data" autocomplete="off">
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

              <!--<a class="btn-floating btn-medium waves-effect waves-lighten blue" onclick="swal({ title: '¿Cual es tu Comentario?',
              input: 'text', inputPlaceholder: 'Comentario', type: 'question', confirmButtonColor:
              '#3085d6', confirmButtonText: 'Comentar'}).then((result)=> {
                if (result.value) {
                  swal({
                    title: 'All done!',
                    html:
                    'Your answers: <pre>' +
            JSON.stringify(result.value) +
          '</pre>',
        confirmButtonText: 'Lovely!'
      })
    }})"><i class="material-icons">edit</i></a>-->

        <!--  <a class="btn-floating btn-medium waves-effect waves-lighten blue" onclick="tomarValor();"><i class="material-icons">edit</i></a>-->

            </td>
            <td><a class="btn-floating btn-medium waves-effect waves-lighten blue" onclick="swal(
              'Generando PDF',
              'Se genero exitosamente',
              'success'
              ).then(function () {
                location.href='pdf.php?pdf=<?php echo $f['ticket']?>;'  });"><i class="material-icons">file_download</i></a></td>

              <td><!-- -->
                <a class="btn-floating btn-medium waves-effect waves-lighten red" onclick="swal({ title: '¿Estas seguro?',
                text: '¿desea rechazarlo?', type: 'warning', showCancelButton: true, confirmButtonColor:
                '#3085d6', cancelButtonColor: '#d33', confirmButtonText: 'Si, rechazar!'}).then(function () {
                location.href='rechazo.php?id=<?php echo $f['ticket']?>';  })"><i class="material-icons">clear</i></a>

              </td>
              <td>
                <a class="btn-floating btn-medium waves-effect waves-lighten green darken-1 " onclick="swal({ title: 'Valido',
                text: 'Este archivo esta valido', type: 'success', showCancelButton: true, confirmButtonColor:
                '#3085d6', cancelButtonColor: '#d33', confirmButtonText: 'Si, Validar!'}).then(function () {
                location.href='valido.php?id=<?php echo $f['ticket'] ?>';  })"><i class="material-icons">check</i></a>
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
