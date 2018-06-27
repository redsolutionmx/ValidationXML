<?php
    include '../conexion/conexion.php';

    $user = $_SESSION['id'];
    $id = htmlentities($_GET['id']); // Revisa lo que mandas en el de carga.php
    $fechafol = date("d-m-y");
    $folio = "PR_".$fechafol."_".$id;
    $hoy = date("d-m-y");
    $up = "UPDATE ticket SET ticket.estatus='COMPRAS', ticket.pre_Ticket= '".$folio."', ticket.fecha_log='".$hoy."', ticket.id='".$user."' WHERE ticket.ticket = ".$id;
    //$up = "UPDATE ticket SET ticket.estatus='COMPRAS' WHERE ticket.ticket = ".$id;
    //$del = "UPDATE Ticket SET Ticket.Comentario='".$coment."' WHERE Ticket.Ticket = ".$id.;
	if (mysql_query($up,$localhost))
	{
		header('location:../extend/alerta.php?msj=Archivo validado&c=com&p=pras&t=success');
	}
	else
	{
		header('location:../extend/alerta.php?msj=No pudo ser validado&c=com&p=pras&t=error');
    }

    //$con->close();
 ?>
