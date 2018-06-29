<?php @session_start();//incluyendo la conexion para sesion
  if (isset($_SESSION['nick'])) {
    header('location: inicio');
    //cuando se ingresa del login se general las variables de sesion desde el login, aqui si existe se redirecciona a inicio
  }
/*TEST UPDATE BRACKETSS*/
 ?>

 <!DOCTYPE html>
 <html lang="es">
   <head>
     <meta charset="utf-8">
     <meta name="viewport" content="width=device-width , initial-scale=1.0">
     <meta http-equiv="X-UA-Compatible" content="ie-edge">
     <!-- Llama materialize desde una carpeta del proyecto, .. para salir de la carpeta actual-->
     <link rel="stylesheet" href="css/materialize.min.css">
     <!--Iconos de materialize-->
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--sweetalert-->
     <title>INICIO DE SESION</title>
     <!-- cabecera de todos los archivos-->
   </head>
   <style media="screen">
   body {
      background-image: url("img/foto-1.jpg");
       background-size: 100%;
   }
   </style>
   <body class="grey lighten-2">.
      <main>
        <!-- aqui va el logo-->
        <div class="row">
          <div class="input-field col s12 center">
            <img src="img/Logo.jpg" width="200px" height="200px" class="circle">
          </div>
        </div>
      </main>
<!-- Contenedor para inicio de sesion-->
      <div class="container">
            <div class = 'row'>
              <div class = 'col s6 offset-s3 valign'>
                <div class = 'card z-depth-5 hoverable'>
                  <div class = "card-content">
                    <span class = 'card-title'><center>Inicio de sesión</center></span>
                    <form action="login/index.php" method="post" autocomplete="off">
                      <div class="input-field"><!-- Guarda :v --->
                        <i class="material-icons prefix">perm_identity</i>
                      <input type="text" name="usuario" id="usuario" required pattern="[A-Za-z]{8,15}" autofocus>
                      <label for="usuario">Usuario</label><!--OYE -->
                      </div>
                  <div class="input-field">
                    <i class="material-icons prefix">vpn_key</i>
                    <input type="password" name="contra" id="contra" required pattern="[A-Za-z0-9]{8,15}">
                      <label for="contra">Contraseña</label>
                  </div>
                  <div class="input-field center">
                    <button type="submit" class="btn waves-effect waves-light">Acceder</button>
                  </div>
                </form>
                </div>
              </div>
            </div>
          </div>
        </div>
<!-- Librerias de materialize y jquery-->
      <script
        src="https://code.jquery.com/jquery-3.1.1.min.js"
        integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8="
        crossorigin="anonymous"></script>
        <script src="js/materialize.min.js"></script>



    </body>
  </html>
