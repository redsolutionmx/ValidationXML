<?php
include '../conexion/conexion.php';
$nick = htmlentities($_POST['nick']);
/*
$con->real_escape_string
$sel = $con->query("SELECT id FROM Usuarios WHERE nick = '$nick' ");
$row = mysqli_num_rows($sel);*/
$sel = "SELECT id FROM usuarios WHERE nick = '".$nick."'";
$consulta = mysql_query($sel,$localhost);
//  $var = mysql_fetch_assoc($consulta) or die ('no se pudo hacer la consulta'.mysql_error());
$row = mysql_num_rows($consulta);
if ($row != 0) {
  echo "<label style='color:red;'>El nombre de usuario ya existe</label>";
}else{
  echo "<label style='color:green;'>El nombre de usuario esta disponible</label>";
}
//$con->close();
 ?>
