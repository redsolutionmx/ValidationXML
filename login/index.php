<?php
  include '../Conexion/conexion.php';
//añadido para evitar que la session no se abra
  if(!isset($_SESSION))
    {
        session_start();
    }

  $_SESSION["ultimoingreso"]=date("Y-n-j H:i:s");

  if($_SERVER['REQUEST_METHOD'] == 'POST')
  {
      //CIERRA IF POST----valida usuarios
      $user = htmlentities($_POST['usuario']);
      $pass = htmlentities($_POST['contra']);
      $candado = ' ';//busca en las variables si hay espacios, ayuda contra sql injection
      //Esta funcion busca caracteres
      $str_u = strpos($user,$candado);//usuario
      $str_p = strpos($pass,$candado);//password
      //si es entero
      if (is_int($str_u) || is_int($str_p)) {
          $user = '';
          $pass = '';
      }
      else
      {
          $user = $user;
          $pass2 = MD5($pass);
      } //termina vaciado de $user y $ pass, hay que encontrar metodo para encryptar mientras se escribe

      if (!isset($user) || !isset($pass) )
      {
          header('location: ../extend/alerta.php?msj=Ingrese sus credenciales correctas&c=salir&p=salir&t=error');
      }else{
      //$sel = $con->query("SELECT id , nick, nombre, nivel, correo, pass FROM Usuarios WHERE nick = '$usuario' AND pass = '$pass2' AND bloqueo = 1");
      //$row = mysqli_num_rows($sel);
      $sel = "SELECT id , nick, nombre, nivel, correo FROM usuarios WHERE nick = '".$user."' AND pass = '".$pass2."' AND bloqueo = 1";
        $consulta = mysql_query($sel,$localhost);
        $var = mysql_fetch_assoc($consulta) or die ('no se pudo hacer la consulta'.mysql_error(header('location: ../extend/alerta.php?msj= Porfavor contacte al administrador &c=salir&p=salir&t=error')));
        $row = mysql_num_rows($consulta);
        //$var = mysql_fetch_assoc($consulta);
    }
    if(!isset($var['id']) || $row != 1  || $usuario != $var['nick'] && $pass2 != $var['pass'] )
    {
        header('location: ../extend/alerta.php?msj=El nombre o la contraseña es incorrecto&c=salir&p=salir&t=error');
    }

    $ID     = $var['id'];
    $nick   = $var['nick'];
    $contra = $var['pass'];
    $nivel  = $var['nivel'];
    $correo = $var['correo'];
    $nombre = $var['nombre'];

    switch($nivel)
    {
        case 'ADMINISTRADOR':
            $_SESSION['id'] = $ID;
            $_SESSION['nick'] = $nick;
            $_SESSION['nombre']= $nombre;
            $_SESSION['nivel']= $nivel;
            $_SESSION['correo']= $correo;

            echo $ID;
            echo $nick;
            echo $nombre;
            echo $nivel;
            echo $correo;
            header('location: ../extend/alerta.php?msj=Bienvenido administrador&c=home&p=home&t=success');
            break;
        case 'MESADECONTROL':
            $_SESSION['id'] = $ID;
            $_SESSION['nick'] = $nick;
            $_SESSION['nombre']= $nombre;
            $_SESSION['nivel']= $nivel;
            $_SESSION['correo']= $correo;
            header('location: ../extend/alerta.php?msj=Bienvenido mesa de control&c=arc&p=le&t=success');
            break;
            case 'HISTORIAL':
                $_SESSION['id'] = $ID;
                $_SESSION['nick'] = $nick;
                $_SESSION['nombre']= $nombre;
                $_SESSION['nivel']= $nivel;
                $_SESSION['correo']= $correo;
                header('location: ../extend/alerta.php?msj=Bienvenido&c=home&p=home&t=success');
                break;
        case 'COMPRAS':
            $_SESSION['id'] = $ID;
            $_SESSION['nick'] = $nick;
            $_SESSION['nombre']= $nombre;
            $_SESSION['nivel']= $nivel;
            $_SESSION['correo']= $correo;
            header('location: ../extend/alerta.php?msj=Bienvenido compras&c=com&p=pras&t=success');
            break;
        case 'CUENTASPORPAGAR':
            $_SESSION['id'] = $ID;
            $_SESSION['nick'] = $nick;
            $_SESSION['nombre']= $nombre;
            $_SESSION['nivel']= $nivel;
            $_SESSION['correo']= $correo;
            header('location: ../extend/alerta.php?msj=Bienvenido compras&c=cuen&p=pagar&t=success');
            break;
        case 'CONTABILIDAD':
            $_SESSION['id'] = $ID;
            $_SESSION['nick'] = $nick;
            $_SESSION['nombre']= $nombre;
            $_SESSION['nivel']= $nivel;
            $_SESSION['correo']= $correo;
            header('location: ../extend/alerta.php?msj=Bienvenido contabilidad&c=cont&p=bili&t=success');
            break;
        default:
            header('location: ../extend/alerta.php?msj=No tienes permiso de entrar&c=salir&p=salir&t=error');
    }
}
    /*if($row == 1){
      if($var = mysql_fetch_assoc($consulta)){
        $ID= $var['id'];
        $nick = $var['nick'];
        $contra = $var['pass'];
        $nivel = $var['nivel'];
        $correo = $var['correo'];
        $nombre = $var['nombre'];
      }
      if($nick == $usuario && $contra = $pass2 && $nivel == 'ADMINISTRADOR'){
        $_SESSION['id'] = $ID;
        $_SESSION['nick'] = $nick;
        $_SESSION['nombre']= $nombre;
        $_SESSION['nivel']= $nivel;
        $_SESSION['correo']= $correo;
        header('location: ../extend/alerta.php?msj=Bienvenido&c=home&p=home&t=success');
      }
      elseif($nick == $usuario && $contra = $pass2 && $nivel == 'MESADECONTROL'){
        $_SESSION['id'] = $ID;
        $_SESSION['nick'] = $nick;
        $_SESSION['nombre']= $nombre;
        $_SESSION['nivel']= $nivel;
        $_SESSION['correo']= $correo;
        header('location: ../extend/alerta.php?msj=Bienvenido&c=home&p=home&t=success');
      }elseif($nick == $usuario && $contra = $pass2 && $nivel == 'COMPRAS'){
        $_SESSION['id'] = $ID;
        $_SESSION['nick'] = $nick;
        $_SESSION['nombre']= $nombre;
        $_SESSION['nivel']= $nivel;
        $_SESSION['correo']= $correo;
        header('location: ../extend/alerta.php?msj=Bienvenido&c=home&p=home&t=success');
      }
      else {
        header('location: ../extend/alerta.php?msj=No tienes permiso de entrar &c=salir&p=salir&t=error');
      }
    }else{

      header('location: ../extend/alerta.php?msj=El nombre o la contraseña es incorrecto&c=salir&p=salir&t=error');
    }*/
else{
    header('location: ../extend/alerta.php?msj=Utiliza el formulario para continuar!&c=salir&p=salir&t=error');
  }
 ?>
