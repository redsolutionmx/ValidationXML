<?php
$fecha_antigua=$_SESSION["ultimoingreso"];
$hora=date("Y-n-j H:i:s");

$tiempo=(strtotime($hora) - strtotime($fecha_antigua));
$operacion=60*1;

if($tiempo>=$operacion){
  SESSION_DESTROY();
  echo '<script>alert("Su sesion ha sido cerrada por inactividad , ingrese nuevamente")
  self.location="salir.php"</script>';

}else//termina if
{
  $_SESSION["ultimoingreso"]=$hora;
}//termina else
?>
