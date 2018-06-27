<?php
//bloqueo de acceso a paginas no permitidas
include '../conexion/conexion.php';
$user = $_SESSION['nick'];

$up = "UPDATE usuarios SET bloqueo=0 WHERE nick='".$user."'";
if (mysql_query($up,$localhost)) {
  $_SESSION = array();
  session_destroy();
  header('location:../extend/alerta.php?msj=USO INDEBIDO DEL SISTEMA&c=salir&p=PAGINAS&t=error');
}
 ?>
