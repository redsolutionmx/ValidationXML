<?php

  include '../Conexion/conexion.php';
  //Modifica el valor de nivel para los usuarios :v
  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = htmlentities($_POST['id']);
    $nivel = htmlentities($_POST['nivel']);

    $up = "UPDATE usuarios SET nivel='".$nivel."' WHERE id='".$id ;
    if (mysql_query($up,$localhost)) {
      header('location:../extend/alerta.php?msj=Nivel actualizado&c=us&p=in&t=success');

    }else {
      header('location:../extend/alerta.php?msj=El nivel del usuario no pudo ser actualizado&c=us&p=in&t=error');

    }//termina else

  }else {
    header('location:../extend/alerta.php?msj=Utiliza el formulario&c=us&p=in&t=error');
  }//termina else principal
 ?>
