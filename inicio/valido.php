<?php

    include '../Conexion/conexion.php';

    $user = $_SESSION['id'];
    $id = htmlentities($_GET['id']); // Revisa lo que mandas en el de carga.php
    $fechafol = date("d/m/Y");
    $folio = "PR_".$fechafol."_".$id;
    $hoy = date("c");
    $up = "UPDATE ticket SET ticket.estatus='MESA', ticket.fecha_log='".$hoy."', ticket.id='".$user."' WHERE ticket.ticket = ".$id;
    //$del = "UPDATE Ticket SET Ticket.Comentario='".$coment."' WHERE Ticket.Ticket = ".$id.;
	if (mysql_query($up,$localhost))
	{
    //include_once 'pdf.php';
    header('location:../extend/alerta.php?msj=Archivo validado&c=arc&p=le&t=success');
  }
	else
	{
		header('location:../extend/alerta.php?msj=No pudo ser validado&c=arc&p=le&t=error');
    }

    //$con->close();

?>
