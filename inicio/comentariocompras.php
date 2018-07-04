<?php
  include '../Conexion/conexion.php';

  // You can access the values posted by jQuery.ajax
// through the global variable $_POST, like this:
//$id = htmlentities($_GET['id']); // Revisa lo que mandas en el de carga.php
//$coment = htmlentities($_GET['coment']);

//echo "¡Funciona!";
$coment = $_POST['comentario'];
$id_xml = $_POST['id_coment'];

$del = "UPDATE ticket SET ticket.comentario='".$coment."' WHERE ticket.ticket = ".$id_xml;

if (mysql_query($del,$localhost))
{
//header('location:../extend/alerta.php?msj=archivo comentado&c=arc&p=le&t=success');
//echo "Se realizo consulta con estos valores: ".$id_xml." y el comentario fue: ".$coment;
header("Location: compras.php");
}
else
{
//header('location:../extend/alerta.php?msj=No pudo ser rechazado&c=arc&p=le&t=error');
//echo "No se realizo consulta con estos valores: ".$id_xml." y el comentario fue: ".$coment;
header("Location: compras.php");
}
