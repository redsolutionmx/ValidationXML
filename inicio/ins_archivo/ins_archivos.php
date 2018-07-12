<?php
//+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
//corregir validacion para que solo acepte pdf y xml
//Version inicial
include '../../Conexion/conexion.php';
include 'LecturaXml.php';

$cont = 0;
if($_SERVER['REQUEST_METHOD']=='POST'){

  $isgood = true;
  $nombrebase = "";
  if (count($_FILES['ruta']['tmp_name']) != 2) {
    header('location: ../../extend/alerta.php?msj=ERROR! cargue el xml con su pdf&c=arc&p=le&t=error');
  }else{
    foreach ($_FILES['ruta']['tmp_name'] as $key => $value) {
      $id = htmlentities($_POST['id']);
      $ruta = $_FILES['ruta']['tmp_name'][$key];
      //se obtiene la ruta del archivo
      $archivo = $_FILES['ruta']['name'][$key];
      $extension = '';
      $info = pathinfo($archivo);
      if ($archivo != '') {
        $extension = $info['extension'];
        if ($extension == "xml" || $extension == "XML" || $extension =="pdf" || $extension == "PDF"){
          if (empty($nombrebase)) {
            $nombrebase = $info['filename'];
            //echo $nombrebase.'--1--';
          }
          if ($nombrebase == $info['filename']) {
            //echo $nombrebase.' --2-- ';
            goto a;
          }else{
            $isgood = false;
            //echo $isgood.' --3-- ';
            break;
          }
        }else{
          $isgood = false;
          //echo $isgood.' --4-- ';
          break;
        }
      }else{//if archivo!=
        $isgood= false;
        //echo $isgood.' --5--';
        break;
      }
      //echo ($isgood?"yes":"No"); exit();
      a:
      //echo 'por entrar a $isgood';
      if($isgood){
        //echo 'entro a is good';
        $carpeta = '../archivos/';
        //$carpeta2 = $carpeta.'/'.$archivo;
        /*$destino = '../archivos/';
        $destino2 = $carpeta.'/'.$archivopdf;
        copy($_FILES['archivopdf']['tmp_name'], $destino2);
        */
        if($extension == "xml" || $extension == "XML"){
          $valor =LeerXml($ruta , $archivo,$cont,$localhost,$nombrebase);//leer XML
        }
        if (!file_exists($carpeta)) {
          mkdir($carpeta, 0777);
          //echo $carpeta.'/'.$archivo;
        }//Termina if !file_exists

        if (move_uploaded_file($ruta,$carpeta.$nombrebase.'.'.$extension)) {
        //echo "El fichero es válido y se subió con éxito.\n";
        $cont = $cont +1;
        }
        else{
        header('location: ../../extend/alerta.php?msj=ERROR! cargue el xml con su pdf&c=arc&p=le&t=error');
        }

      }else{
        header('location: ../../extend/alerta.php?msj=Los nombres no coinciden&c=arc&p=le&t=error');
      }//termina $isgood*********************************************************
    }//termina foreach
    if($valor){
      header('location: ../../extend/alerta.php?msj=El usuario ha registrado la factura: '.$nombrebase  .'&c=arc&p=le&t=success');
    }else{
      header('location: ../../extend/alerta.php?msj=El usuario ha registrado la factura: '.$nombrebase  .'&c=arc&p=le&t=success');
      }
  }//termina validacion
  //
}else{
header('location:../../extend/alerta.php?msj=Utiliza el formulario&c=prop&p=img&t=error');
}//Termina alerta de utiliza formulario

//********************************************************************************
/*Version alan
include '../../Conexion/conexion.php';
//include 'LecturaXml.php';
///exit();
$cont = 0;
$carpeta = '../archivos/';

if($_SERVER['REQUEST_METHOD']=='POST'){

    $isgood = true;
    $nombrebase = "";

    if (count($_FILES['ruta']['tmp_name']) != 2) {

        header('location: ../../extend/alerta.php?msj=ERROR! cargue el xml con su pdf&c=arc&p=le&t=error');

    }
    else
    {

        for($i=0;$i<=2;$i++)
        {

            if($_FILES['ruta']['type'][$i] == 'text/xml' || $_FILES['ruta']['type'][$i] == 'application/pdf'  )
            {

                move_uploaded_file($_FILES['ruta']['tmp_name'][$i], $carpeta.$_FILES['ruta']['name'][$i] );

                $nombrebase = $_FILES['ruta']['name'][$i];
    //            echo $nombrebase;

                if($_FILES['ruta']['type'][$i] == 'text/xml')
                {

                    if(substr($_FILES['ruta']['name'][0],0,-3) == substr($_FILES['ruta']['name'][1],0,-3) )
                    {

                        include 'LecturaXml.php';
                    }
                }
             }
        }
        header('location: ../../extend/alerta.php?msj=El usuario ha registrado archivos&c=arc&p=le&t=success');

        /*if($_FILES['ruta'][])

        if($name_one != $name_two)
        {
            header('location: ../../extend/alerta.php?msj=ERROR! cargue el xml con su pdf&c=arc&p=le&t=error');
        }*/



        /*foreach ($_FILES['ruta']['tmp_name'] as $key => $value)
        {
            $id = htmlentities($_POST['id']);
            $ruta = $_FILES['ruta']['tmp_name'][$key];
            //se obtiene la ruta del archivo
            $archivo = $_FILES['ruta']['name'][$key];
            $extension = '';
            $info = pathinfo($archivo);
            if ($archivo != '') {
                $extension = $info['extension'];
                if ($extension == "xml" || $extension == "XML" || $extension =="pdf" || $extension == "PDF"){
                    if (empty($nombrebase)) {
                        $nombrebase = $info['filename'];
                        //echo $nombrebase.'--1--';
                    }
                    if ($nombrebase == $info['filename']) {
                        //echo $nombrebase.' --2-- ';
                        goto a;
                    }else{
                        $isgood = false;
                        //echo $isgood.' --3-- ';
                        break;
                    }
                }else{
                    $isgood = false;
                    //echo $isgood.' --4-- ';
                    break;
                }
            }else{//if archivo!=
                $isgood= false;
                //echo $isgood.' --5--';
                break;
            }
            //echo ($isgood?"yes":"No"); exit();
            a:
            //echo 'por entrar a $isgood';
            if($isgood){
                //echo 'entro a is good';
                $carpeta = '../archivos/';
                //$carpeta2 = $carpeta.'/'.$archivo;
                /*$destino = '../archivos/';
        $destino2 = $carpeta.'/'.$archivopdf;
        copy($_FILES['archivopdf']['tmp_name'], $destino2);

                if($extension == "xml" || $extension == "XML"){
                    $valor = LeerXml($ruta , $archivo,$cont,$localhost,$nombrebase);//leer XML
                }
                if (!file_exists($carpeta)) {
                    mkdir($carpeta, 0777);   // no validar , dejar pasar directo
                    //echo $carpeta.'/'.$archivo;
                }//Termina if !file_exists

                if (move_uploaded_file($ruta,$carpeta.$nombrebase.'.'.$extension)) {
                    //echo "El fichero es válido y se subió con éxito.\n";
                    $cont = $cont +1;
                }
                else{
                    header('location: ../../extend/alerta.php?msj=ERROR! cargue el xml con su pdf&c=arc&p=le&t=error');
                }

            }else{
                header('location: ../../extend/alerta.php?msj=ERROR! cargue el xml con su pdf&c=arc&p=le&t=error');
            }//termina $isgood*********************************************************
        }//termina foreach
        if($valor){
            header('location: ../../extend/alerta.php?msj=El usuario ha registrado la factura: '.$nombrebase  .'&c=arc&p=le&t=success');
        }else{
            header('location: ../../extend/alerta.php?msj=ERROR! cargue el xml con su pdf que no se haya cargado&c=arc&p=le&t=error');
        }
    }//termina validacion
    //
}else{
    header('location:../../extend/alerta.php?msj=Utiliza el formulario&c=prop&p=img&t=error');
}//Termina alerta de utiliza formulario
*/
?>
