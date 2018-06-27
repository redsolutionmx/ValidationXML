<?php include '../conexion/conexion.php';
$id = htmlentities($_GET['us']);
$bloqueo = htmlentities($_GET['bl']);

if ($bloqueo==1) {
  //$up = $con->query("UPDATE Usuarios SET bloqueo=0 WHERE id='".$id"'");
  $up = "UPDATE usuarios SET bloqueo=0 WHERE id=".$id;
  if (mysql_query($up,$localhost)) {
    header('location:../extend/alerta.php?msj=El usuario ha sido bloqueado&c=us&p=in&t=success');
  }else {
    header('location:../extend/alerta.php?msj=El usuario no ha sido bloqueado&c=us&p=in&t=error');

  }
}else {
  $up = "UPDATE usuarios SET bloqueo=1 WHERE id=".$id;
  if (mysql_query($up,$localhost)) {
  header('location:../extend/alerta.php?msj=El usuario ha sido desbloqueado&c=us&p=in&t=success');
}else {
  header('location:../extend/alerta.php?msj=El usuario no ha sido desbloqueado&c=us&p=in&t=error');
     }
}

 ?>
