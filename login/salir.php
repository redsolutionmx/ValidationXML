<?php @session_start();
      /*include '../conexion/conexion.php';
      $tiempo = date("c");
      $up = $con->query("UPDATE usuarios SET Last_session='$tiempo' WHERE id=$_SESSION["id"];");
      $up->close();
      $con->close();*/
      $_SESSION= array();
      session_destroy();
      header("location: ../");
 ?>
