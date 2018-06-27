<?php include '../extend/header.php';
  //Restringe a usuarios para no entrar a paginas no permitidas
  include '../extend/permiso.php';

 ?>
<body class="grey lighten-3">
 <div class="row">
   <div class="col s12">
     <div class="card hoverable">
       <div class="card-content">
         <span class="card-title">Alta de usuarios</span>
         <form class="form" action="ins_usuarios.php" method="post" enctype="multipart/form-data" autocomplete="off">
           <div class="input-field">
             <input type="text" name="nick" required autofocus title="DEBE DE CONTENER ENTRE 8 Y 15 CARACTERES, SOLO LETRAS" pattern="[A-Za-z]{8,15}" id="nick" onblur="may(this.value, this.id)" >
             <label for="nick">Nick:</label>
           </div>
           <div class="validacion"></div>

           <div class="input-field">
             <input type="password" name="pass1" title="CONTRASEÑA CON NUMEROS, LETRAS MAYUSCULAS, MINUSCULAS, entre 8 y 15 caracteres" pattern="[A-Za-z0-9]{8,15}" id="pass1" required >
             <label for="pass1">Contraseña:</label>
           </div>

           <div class="input-field">
             <input type="password" name ="pass2 "title="CONTRASEÑA CON NUMEROS, LETRAS MAYUSCULAS, MINUSCULAS, entre 8 y 15 caracteres" pattern="[A-Za-z0-9]{8,15}" id="pass2" required >
             <label for="pass2">Verificar contraseña:</label>
           </div>

           <div class = "card-content">
             <label>Selecciona un nivel:</label>
         <select class="browser-default" name='nivel' required>
           <option value="" disabled selected>Selecciona una opción</option>
           <option value="MESADECONTROL">Mesa de control</option>
           <option value="COMPRAS">Compras</option>
           <option value="CUENTASPORPAGAR">Cuentas por pagar</option>
           <option value="CONTABILIDAD">Contabilidad</option>
         </select>
       </div>

           <div class="input-field">
             <input type="text" name="nombre" title="Nombre del usuario" id="nombre" onblur="may(this.value, this.id)" required pattern="[A-Z/s ]+" >
             <label for="nombre">Nombre completo</label>
           </div>

           <div class="input-field">
             <input type="email" name="correo" title="Correo electronico" id="correo" >
             <label for="correo">Correo electronico</label>
           </div>
           <!--
           <div class="file-field input-field">
             <div class="btn">
               <span>Foto:</span>
               <input type="file" name="foto">
           </div>
           <div class="file-path-wrapper">
             <input class="file-path validate" type="text">
             </div>
         </div>
       -->
         <button type="submit" class="btn black" id="btn_guardar">Guardar<i class="material-icons">send</i></button>

         </form>
       </div>
     </div>
   </div>
 </div>
</body>
 <!-- Esto llama a los scripts -->
 <?php include '../extend/scripts.php'; ?>
 <script src="../js/validacion.js"></script>
 </body>
 </html>
