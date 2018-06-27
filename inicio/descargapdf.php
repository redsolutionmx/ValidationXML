<?php

  include '../conexion/conexion.php';

  $id = htmlentities($_GET['id']);


  $sel = "SELECT ruta FROM ticket WHERE ticket=".$id;
  $consulta = mysql_query($sel,$localhost);
  //  $var = mysql_fetch_assoc($consulta) or die ('no se pudo hacer la consulta'.mysql_error());
  $row = mysql_num_rows($consulta);

        $f=mysql_fetch_array($consulta);
        //print_r($f);
$nombrebase = $f[0];

  echo $nombrebase;
  header("Content-disposition: attachment; filename=$nombrebase.pdf");
  header("Content-type: application/pdf");
  readfile("../inicio/archivos/$nombrebase.pdf");
  ?>
