<?php
    include '../Conexion/conexion.php';

    $id = htmlentities($_GET['id']);

    $del = "UPDATE usuarios SET bloqueo=9 WHERE id=".$id;

    if (mysql_query($del,$localhost)) {
      header('location:../extend/alerta.php?msj=Usuario dado de baja&c=us&p=in&t=success');

    }else {
      header('location:../extend/alerta.php?msj=El usuario no pudo ser dado de baja&c=us&p=in&t=error');

    }//termina else

    //$con->close();
 ?>
