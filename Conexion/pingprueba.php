<?php
  $enlace_actual = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
  print_r("paso1");
  if URL == "http://desarrollos.gadhr.com.mx/GestionArchivos"
  {
    print_r("paso2");
    include "conexion.php";
    print_r("paso3");
  } else if  URL == "http://validador-dev.central-mx.com/" && IP = "107.180.3.223"
{ // el proyecto debe de mandar un ping a consulting.redsolution-mx.com,
 //si responde debe de proceder a la conexión con la base de datos  de ese servidor /
 print_r("paso4");
      $ip = "consulting.redsolution-mx.com";
      print_r("paso5");
      $output = shell_exec("ping $ip");
      print_r("paso6");
      if $ping == ("consulting.redsolution-mx.com")
{ // proceder a el login completo
  print_r("paso7");
  include "../login/index.php";
  print_r("paso8");
}
else
{
  echo "fallo en la red por favor revise su servicio "; exit();
}
else
{
   echo "error en el proyecto , contacte con el desarrollador";
 }


 ?>
