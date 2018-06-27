<?php
include '../conexion/conexion.php';
include '../extend/permiso.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $nick = htmlentities($_POST['nick']);
  $pass1 = htmlentities($_POST['pass1']);
  $pass2 = htmlentities($_POST['pass2']);
  $nivel = htmlentities($_POST['nivel']);
  $nombre = htmlentities($_POST['nombre']);
  $correo = htmlentities($_POST['correo']);
  if (empty($nick) || empty($pass1) || empty($nivel) || empty($nombre)) {
    header('location:../extend/alerta.php?msj=Hay un campo sin especificar&c=us&p=in&t=error');
    exit;
  }
    if (!ctype_alpha($nick)) {
      header('location: ../extend/alerta.php?msj=El nick no contiene solo letras&c=us&p=in&t=error');
      exit;
    }
    if (!ctype_alpha($nivel)) {
      header('location: ../extend/alerta.php?msj=El nivel no contiene solo letras&c=us&p=in&t=error');
      exit;
    }
    //nos traera el caracter 1
    $caracteres = "QWERTYUIOPASDFGHJKLÑZXCVBNM ";
    for ($i=0; $i < strlen($nombre); $i++) {
      $buscar = substr($nombre, $i,1);
      if (strpos($caracteres,$buscar) == false) {
        header('location: ../extend/alerta.php?msj=El nombre no contiene solo letras&c=us&p=in&t=error');
        exit;
      }
    }

    $usuario = strlen($nick);
    $contra = strlen($pass1);

    if ($usuario < 8 || $usuario >15) {
      header('location: ../extend/alerta.php?msj=El nick debe contener entre 8 y 15 caracteres&c=us&p=in&t=error');
      exit;
    }

    if ($contra < 8 || $contra >15) {
      header('location: ../extend/alerta.php?msj=la contraseña debe contener entre 8 y 15 caracteres&c=us&p=in&t=error');
      exit;
    }

    if (!empty($correo)) {
      if (!filter_var($correo,FILTER_VALIDATE_EMAIL)) {
        header('location: ../extend/alerta.php?msj=El email no es valido&c=us&p=in&t=error');
        exit;
      }
    }
    //esta sirve para identificar la extension del archivo
        /*$extension = '';
        $ruta = 'foto_perfil';
        $archivo=$_FILES['foto']['tmp_name'];
        $nombrearchivo = $_FILES['foto']['name'];
        $info = pathinfo($nombrearchivo);
        if ($archivo != '') {
          $extension = $info['extension'];
          if ($extension == "png" || $extension == "PNG" || $extension == "jpg" || $extension == "JPG") {
            move_uploaded_file($archivo,'foto_perfil/'.$nick.'.'.$extension);
            $ruta = $ruta."/".$nick.'.'.$extension;
          }else{
            header('location:../extend/alerta.php?msj=El formato no es valido&c=us&p=in&t=error');
            exit;
          }
        }else{
          $ruta = "foto_perfil/perfil.png";
        }


        //codigo para xml y pdf
        $extension = '';
        $ruta = 'archivos';
        $archivo=$_FILES['formato']['tmp_name'];
        $nombrearchivo = $_FILES['formato']['name'];
        $info = pathinfo($nombrearchivo);
        if ($archivo != '') {
          $extension = $info['extension'];
          if ($extension == "xml" || $extension == "XML" || $extension == "PDF" || $extension  == "pdf") {
            move_uploaded_file($archivo,'archivos/'.$nick.'.'.$extension);
            $ruta = $ruta."/".$nick.'.'.$extension;
          }else{
            header('location:../extend/alerta.php?msj=El formato no es valido&c=us&p=in&t=error');
            exit;
          }
*/
    //Ingresa datos al registro
    /*$salt = '$contraseña$/';
    $pass1 = sha1(md5($salt,$pass1));*/
    $pass1 = MD5($pass1);
    $hoy = getdate();


    /*$ins = $con->query("INSERT INTO Usuarios (id,nick,pass,nombre,correo,nivel,bloqueo,Last_session)VALUES('','$nick', '$pass1', '$nombre', '$correo' , '$nivel' , 1 , '$hoy') ");
    */
    $insert = "INSERT INTO usuarios (id,nick,pass,nombre,correo,nivel,bloqueo,last_session)VALUES('','".$nick."','".$pass1."','".$nombre."','".$correo."','".$nivel."',' 1 ','".$hoy."') ";
    if ($consulta = mysql_query($insert, $localhost)) {
      header('location: ../extend/alerta.php?msj=El usuario ha sido registrado&c=us&p=in&t=success');
    }else{
      header('location: ../extend/alerta.php?msj=El usuario no pudo ser registrado&c=us&p=in&t=error');
    }

  }else{
    header('location: ../extend/alerta.php?msj=Utiliza el formulario&c=us&p=in&t=error');
  }

 ?>
