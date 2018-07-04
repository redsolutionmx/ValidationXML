<?php
  include '../Conexion/conexion.php';
  require '../phpdomhtml/simple_html_dom.php';

  $url = "carga.php";
  $html=file_get_contents($url);
  //Creamos el objeto de Dom
  $dom = new domDocument;

  //lee el html dentro del objeto
  $dom->loadHTML($html);

//descarta los espacios en blanco
$dom->preserveWhiteSpace = false;
//busca la tabla por el tag
  $tables = $dom->getElementsByTagName('table');
  //obtiene los rows de la tabla
  $rows = $tables->item(0)->getElementsByTagName('tr');
  //bucle de la tabla para los rows

  foreach ($rows as $row)
    {
        /*** get each column by tag name ***/
        $cols = $row->getElementsByTagName('td');

        /*** echo valores ***/
        echo $cols->item(0)->nodeValue.',';
        echo $cols->item(1)->nodeValue.',';
        echo $cols->item(2)->nodeValue.',';
        echo $cols->item(3)->nodeValue.',';
        echo $cols->item(4)->nodeValue;
        //echo $cols->item(5)->nodeValue.'<br />';
        //echo $cols->item(6)->nodeValue.'<br />';
        //echo $cols->item(7)->nodeValue.'<br />';
        //echo $cols->item(8)->nodeValue.'<br />';
        //echo $cols->item(9)->nodeValue.'<br />';
        //echo $cols->item(10)->nodeValue.'<br />';
        echo '<br />';
    }


  /*$resultado = mysql_query("SELECT Proveedor, RFC , Fecha , Importe_IVA , Num_Factura , UUID, Estatus FROM Ticket WHERE Estatus = 'ACTIVO' ", localhost);
if (!$resultado) {
    echo 'No se pudo ejecutar la consulta: ' . mysql_error();
    exit;
}
$fila = mysql_fetch_row($resultado);

echo $fila[0]; // 42
echo $fila[1]; // el valor de email
*/
  //Modifica el valor de nivel para los usuarios :\/
  /*if ($_SERVER['REQUEST_METHOD'] == 'POS-T') {
    $ticket = htmlentities($_POST['Ticket']);
    $Estatus = htmlentities($_POST['Estatus']);*/
    /*$MC = "MC";
    $opcionv = $_POST['Switch'];
    $insert = "INSERT INTO mesa_control (Comentario)VALUES('".$coment."') ";
    $up = "UPDATE ticket SET Estatus = 'MESA'  WHERE UUID='".$f['UUID']."'";
    */
  /*  if( mysql_query($up,$localhost) )
    {
      header('location:../extend/alerta.php?msj=Actualizado&c=arc&p=le&t=success');
    }//termina if

//$coneccion->close();

  else {
    header('location:../extend/alerta.php?msj=Utiliza el formulario&c=us&p=in&t=error');
  }//termina else principal*/

 ?>
