<?php include '../extend/header.php';
  //Restringe a usuarios para no entrar a paginas no permitidas
  include '../extend/permiso.php';

 ?>

<!-- Buscador de XML-->
<body class="grey lighten-3">
<div class="row">
  <div class="col s12">
    <nav class="green darken-3">
      <div class="nav-wrapper">
        <div class="input-field">
        <input type="search" id="buscar" autocomplete="off">
        <label for="buscar"><i class="material-icons">search</i></label>
        <i class="material-icons">close</i>
        </div>
      </div>
    </nav>
  </div>
</div>

<!-- hace la consulta a la tabla-->
<?php
/*$sel = $con -> query ("SELECT * FROM Usuarios where bloqueo != 9");
//Esto te dice cuantos usuarios hay
$row = mysqli_num_rows($sel);*/
  $sel = "SELECT * FROM usuarios WHERE NOT nivel =  'ADMINISTRADOR' AND bloqueo =1 OR bloqueo =0";
  $consulta = mysql_query($sel,$localhost);
//  $var = mysql_fetch_assoc($consulta) or die ('no se pudo hacer la consulta'.mysql_error());
  $row = mysql_num_rows($consulta);
?>

    <div class = 'row'>
      <div class = 'col s12'>
        <div class = 'card hoverable'>
          <div class = "card-content">
            <span class = 'card-title'>Usuarios(<?php echo $row ?>)</span>
            <!-- puntos de arriba de la tabla-->
            <table  class="centered">
              <thead>
                <tr class="cabecera">
                <th>Nick</th>
                <th>Nombre</th>
                <th>Correo</th>
                <th>ID</th>

                <!--<th>Foto</th>-->
                <th>Bloqueo</th>
                <!-- esta tabla hace una consulta y muestra los datos-->
                <!--para botones de editar y eliminar usuario -->
                <th>BAJA</th>
                </tr>
              </thead>

              <?php while ($f=mysql_fetch_assoc($consulta)) { ?>
                <tr>
                  <td><?php echo $f['nick'] ?></td>
                  <td><?php echo $f['nombre'] ?></td>
                  <td><?php echo $f['correo'] ?></td>
                  <td><?php echo $f['id'] ?></td>
                <!--  <td>
                  Editar nivel del usuario
                  <form action="up_nivel.php" method="post">
                    <input type="hidden" name="id" value="<?php echo $f['id'] ?>">
                    <select name="nivel" required>
                      <option value="<?php echo $f['nivel'] ?>"><?php echo $f['nivel'] ?></option>
                      <option value="MESADECONTROL">Mesa de control</option>
                      <option value="COMPRAS">Compras</option>
                      <option value="CUENTASPORPAGAR">Cuentas por pagar</option>
                      <option value="CONTABILIDAD">Contabilidad</option>
                    </select>
                </td>
                <td>
                  <button type="submit" class="btn-floating"><i class="material-icons">repeat</i></button>
                </form>
              </td>-->
                  <!--<td><img src="<//?php echo $f['foto'] ?>" width="50" class="circle"</td>-->
                  <td>
                  <?php if ($f['bloqueo'] == 1): ?>
                    <a href="bloqueo_manual.php?us=<?php echo $f['id'] ?>&bl=<?php echo $f['bloqueo'] ?>"><i class="material-icons green-text">lock_open</i></a>
                  <?php else: ?>
                    <a href="bloqueo_manual.php?us=<?php echo $f['id'] ?>&bl=<?php echo $f['bloqueo'] ?>"><i class="material-icons red-text">lock_outline</i></a>
                  <?php endif; ?>
                </td>
                  <td>

                    <a href="#" class="btn-floating red" onclick="swal({ title: '¿Estas seguro?',
                    text: '¿desea dar de baja este usuario?', type: 'warning', showCancelButton: true, confirmButtonColor:
                    '#3085d6', cancelButtonColor: '#d33', confirmButtonText: 'Si, dar de baja!'}).then(function () {
                    location.href='eliminar_usuario.php?id=<?php echo $f['id'] ?>';  })"><i class="material-icons">clear</i></a>
                  </td>

                </tr>
              <?php } ?>
            </table>

          </div>
        </div>
      </div>
    </div>

</body>
<!-- Esto llama a los scripts -->
<?php include '../extend/scripts.php'; ?>
<script src="../js/validacion.js"></script>
</body>
</html>
