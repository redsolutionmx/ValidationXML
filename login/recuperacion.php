<?php
    include '../Conexion/conexion.php';
 ?>
<!DOCTYPE html>
<html lang="es" >
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.3.2/sweetalert2.css">


    <title>Gestion de Archivos</title>
  </head>
  <body>
<?php
$nick = htmlentities($_POST['correo']);
//echo $nick;
$rand_part = str_shuffle("abcdefghijklmnopqrstuvwxyz0123456789".uniqid());
//echo $rand_part;


$con = "SELECT  correo,nick,pass from usuarios where correo = '".$nick."'";
//echo $con;
$consulta = mysql_query($con,$localhost);
//echo $consulta;
$f=mysql_fetch_assoc($consulta);
//echo $f;
//echo "1";
$para      = $f['correo'];

//$contra = $f['pass']
//echo $f['correo'];
///echo $para;
$titulo    = 'Recuperacion de cuenta';
//$mensaje   = 'Hola ' .$f['nick'] .  ' este es tu token: '. $rand_part;
$mensaje   = 'Hola ' .$f['nick'] .  ', Por favor de click en el siguiente enlace para cambiar su contraseña y recuperar su acceso:  http://validador-dev.central-mx.com/ , Este link tiene una validez de 24 horas. ';
$cabeceras = 'From: webmaster@central-mx.com' . "\r\n" .
    'Reply-To: webmaster@central-mx.com' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();

if(mail($para, $titulo, $mensaje, $cabeceras)){
  $tituloSWAL = 'Mensaje enviado';
  $mensajeSWAL = 'Por si no lo encuentra por favor revise su bandeja de spam o correo no deseado';
  $t = 'success';
  $dir = '../index.php';
}else{
  $tituloSWAL = 'Mensaje no pudo ser enviado';
  $mensajeSWAL = 'Correo no registrado Contacte a su administrador';
  $t = 'error';
  $dir = '../index.php';
}


//echo "2";
?>

    <script
      src="https://code.jquery.com/jquery-3.1.1.min.js"
      integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8="
      crossorigin="anonymous"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.3.2/sweetalert2.js"></script>
  <script>
      swal({
        title: '<?php echo $tituloSWAL ?>',
        text: '<?php echo $mensajeSWAL ?>',
        type: '<?php echo $t ?>',
        confirmButtonColor: '#3085d6',
        confirmButtonText: 'ok'
      }).then(function(){
        location.href='<?php echo $dir ?>';
      });

      $(document).click(function(){
        location.href='<?php echo $dir ?>';
      });

      $(document).keyup(function(e){
        if (e.which == 27) {
          location.href='<?php echo $dir ?>';
        }
      });

  </script>

  </body>
</html>
