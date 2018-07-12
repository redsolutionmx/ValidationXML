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
      $mensaje = htmlentities($_GET['msj']);
      $c = htmlentities($_GET['c']);
      $p = htmlentities($_GET['p']);
      $t = htmlentities($_GET['t']);
      //


      switch ($c) {

        case 'us':
          $carpeta = '../usuarios/';
          break;
          case 'home':
          $carpeta = '../inicio/';
          break;
          case 'salir':
          $carpeta = '../';
          break;

        case 'arc':
          $carpeta = '../inicio/';
          break;

          case 'com':
            $carpeta = '../inicio/';
            break;

        case 'cuen':
          $carpeta = '../inicio/';
          break;

        case 'cont':
          $carpeta = '../inicio/';
          break;

      }//termina switch

      switch ($p) {
        case 'in':
          $pagina = 'index.php';
          break;
          case 'home':
          $pagina = 'index.php';
          break;
          case 'salir':
          $pagina = '';
          break;
        case 'le':
          $pagina = 'carga.php';
          break;
          case 'pras':
          $pagina = 'compras.php';
          break;
        case 'bili':
          $pagina = 'contabilidad.php';
          break;
        case 'pagar':
          $pagina = 'cuentasporpagar.php';
          break;
      }//termina segundo switch

      $dir = $carpeta.$pagina;
      if ($t == "error") {
        $titulo = "Oppss...";
      }else{
        $titulo = "Buen trabajo";
      }

      ?>

    <script
      src="https://code.jquery.com/jquery-3.1.1.min.js"
      integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8="
      crossorigin="anonymous"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.3.2/sweetalert2.js"></script>
  <script>
      swal({
        title: '<?php echo $titulo ?>',
        text: '<?php echo $mensaje ?>',
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
