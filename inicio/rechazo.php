<?php
    include '../conexion/conexion.php';

    $id = htmlentities($_GET['id']); // Revisa lo que mandas en el de carga.php
    $coment = htmlentities($_GET['comentario']);
    /**/

    $del = "UPDATE ticket SET ticket.estatus='RECHAZADO' WHERE ticket.ticket = ".$id;
    //Seccion quitadad e rechazar ticket.comentario=".$coment."
    //$insert = "INSERT INTO Ticket (Comentario)VALUES('".$coment."') ";
  //  $com = "UPDATE Ticket SET Ticket.Estatus='RECHAZADO' WHERE Ticket.Ticket = ".$id.;
    //$del = "UPDATE Ticket SET Ticket.Comentario='".$coment."' WHERE Ticket.Ticket = ".$id.;
	if (mysql_query($del,$localhost))
	{
		header('location:../extend/alerta.php?msj=archivo rechazado&c=arc&p=le&t=success');
	}
	else
	{
		header('location:../extend/alerta.php?msj=No pudo ser rechazado&c=arc&p=le&t=error');
    }

    //$con->close();
 ?>
<?php include '../extend/scripts.php'; ?>
