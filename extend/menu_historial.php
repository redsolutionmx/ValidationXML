<nav class="black ">
  <a href="" data-activates="menu" class="button-collpase"><i class="material-icons">menu</i></a>
</nav>

  <ul id="menu" class="side-nav fixed">
<li>
  <div class="userView">
    <div class="background">
      <img src="https://png.pngtree.com/thumb_back/fw800/back_pic/03/74/44/1857bc353ef26c6.jpg" width= 100%; height="200px;" alt="">
    </div>
    <a href=""><img src="../img/Logo.jpg"  class="circle" alt=""></a>
    <a href="" class="white-text"><?php echo $_SESSION['nombre'] ?></a>
    <a href="" class="white-text"><?php echo $_SESSION['correo'] ?></a>
  </div>
</li>

<li><a href="../inicio"><i class="material-icons">home</i>INICIO</a></li>
<li><div class="divider"></div></li>

<li><a href="../inicio/historial.php"><i class="material-icons">dvr</i>HISTORIAL</a></li>
<li><div class="divider"></div></li>

<li><a href="../usuarios"><i class="material-icons">contacts</i>USUARIOS</a></li>
<li><div class="divider"></div></li>

<li><a href="../usuarios/registro.php"><i class="material-icons">person_add</i>AGREGAR</a></li>
<li><div class="divider"></div></li>

<li><a href="../login/salir.php"><i class="material-icons">power_settings_new</i>SALIR</a></li>
<li><div class="divider"></div></li>

  </ul>
