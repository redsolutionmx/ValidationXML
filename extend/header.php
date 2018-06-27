<?php
    include '../Conexion/conexion.php';
    //evita que se reabra la sesion una vez cerrado la pagina
    if (!isset($_SESSION['nick'])) {
      header('location: ../');
      //cuando se ingresa del login se general las variables de sesion desde el login, aqui si existe se redirecciona a inicio
    }

 ?>

 <!DOCTYPE html>
 <html lang="es">
   <head>
     <meta charset="utf-8">
     <meta name="viewport" content="width=device-width , initial-scale=1.0">
     <meta http-equiv="X-UA-Compatible" content="ie-edge">
     <!-- Llama materialize desde una carpeta del proyecto, .. para salir de la carpeta actual-->
     <link rel="stylesheet" href="../css/materialize.min.css">
     <!--Iconos de materialize-->
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--sweetalert-->
      <style type="text/css">
      .button {
        background-color: #4CAF50; /* Green */
        border-radius: 12px;
        color: white;
        padding: 5px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 12px;
      }
      .button:hover{
        background-color: green;
        color:white;
      }
      </style>

      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.3.2/sweetalert2.css">
      <style media="screen">
        header, main, footer {
          padding-left: 300px;
        }
        .button-collpase{
          display: none;
        }

        @media only screen and (max-width : 1010px) {
          header, main, footer{
            padding-left: 0;
          }
            .button-collpase{
              display: inherit;
            }
        }
      </style>

      <style>
      .card { width:1010px;}

      @media only screen
      and (max-width : 480px) {
      .card { width:100px;}
      }


      @media only screen
      and (max-width : 767px) {
      .card { width:400px;}
      }


      </style>

     <title>Proyecto</title>
     <!-- cabecera de todos los archivos-->
   </head>
   <body class="grey lighten-3">
      <main>


      <?php
      //Discrimina para asignar los accesos al login

      //AGREGA LOS IFS PARA LOS MODULOS menu_MODULO!.php
      if ($_SESSION['nivel'] == 'ADMINISTRADOR') {
        include '../extend/menu_admin.php';
      } elseif ($_SESSION['nivel'] == 'MESADECONTROL') {
        include '../extend/menu_asesor.php';
      }elseif ($_SESSION['nivel'] == 'COMPRAS') {
        include '../extend/menu_compras.php';
      }elseif ($_SESSION['nivel'] == 'CUENTASPORPAGAR') {
        include '../extend/menu_cuentasporpagar.php';
      }elseif ($_SESSION['nivel'] == 'CONTABILIDAD') {
        include '../extend/menu_contabilidad.php';
      }else{
        echo "Ingreso incorrecto";
      }
        ?>

    </body>
    </html>
