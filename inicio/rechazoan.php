<?php
    include '../Conexion/conexion.php';

    $id = htmlentities($_GET['id']);
    //$coment = htmlentities($_GET['coment']);
  $del = "UPDATE ticket SET estatus='RECHAZO' WHERE ticket.id =".$id;
  //  $del = "SELECT Ticket FROM ticket";
  //  $consulta = mysql_query($del,$localhost);
    // $row = mysql_num_rows($consulta);

  /*  while ($f=mysql_fetch_assoc($consulta)) {
        echo $f['Ticket'];

        echo $del;
    }
*/

  //  $del = "UPDATE Ticket SET Estatus='RECHAZO'WHERE Ticket =".$id;
    //$consult = mysql_query($del,$localhost);
    /*if (!$consult) {
      header('location:../extend/alerta.php?msj=No pudo ser rechazado&c=arc&p=le&t=error');

    }else {
      header('location:../extend/alerta.php?msj=Cuenta rechazado&c=arc&p=le&t=success');


    }//termina else, Comentario
EstatusComentario
    //$con->close();*/
 ?>
 <?php include '../extend/scripts.php'; ?>
 <script src="../js/validacion.js"></script>
