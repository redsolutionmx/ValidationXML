<?php include '../extend/header.php';
  //Restringe a usuarios para no entrar a paginas no permitidas
include '../extend/permiso.php';
 ?>
 <!--Buscador en la tabla-->
 <div class="row">
   <div class="col s12">
     <nav class="green lighten-1" >
       <div class="nav-wrapper" >
         <div class="input-field">
           <input type="search" id="buscar" autocomplete="off">
           <label for="buscar"><i class="material-icons">search</i></label>
           <i class="material-icons">close</i>
         </div>
       </div>
     </nav>
   </div>
 </div>
 <!-- termina buscador-->


<?php include '../extend/scripts.php'; ?>
<script src="../js/validacion.js"></script>
