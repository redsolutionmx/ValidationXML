<?php
include '../Conexion/conexion.php';
setlocale(LC_ALL,"es_MX.UTF-8");

//$id = htmlentities($_GET['id']);
$pdf = htmlentities($_GET['pdf']);

//Fecha_log
date_default_timezone_set('America/Mexico_City');
$date = date("d-m-y (H:i:s)");
$fechafol = date("d/m/Y");
$folio = "PR_".$fechafol."_".$pdf;
$fechaactual = getdate();

$up = "UPDATE ticket SET  ticket.pre_ticket= '".$folio."' WHERE ticket.ticket = ".$pdf;
$con = mysql_query($up,$localhost);
//echo "Hoy es: $fechaactual[weekday], $fechaactual[mday] de $fechaactual[month] de $fechaactual[year]";

$sel = "SELECT ticket,proveedor, rfc , fecha , importe_iva , num_factura , uuid, estatus, comentario FROM ticket WHERE ticket=".$pdf;
$consulta = mysql_query($sel,$localhost);
//  $var = mysql_fetch_assoc($consulta) or die ('no se pudo hacer la consulta'.mysql_error());
$row = mysql_num_rows($consulta);


ob_start();

  while ($f=mysql_fetch_assoc($consulta)) {
 ?>

 </br>
 </br>
    <table class="striped" width="100%"  cellpadding="3" border="1">
      <tr>
      <td colspan="4" align="center"><b>Datos generales de precontrarecibo</b></td>
    </tr>
    <tr>
      <td>Proveedor</td>
      <td><?php echo $f['proveedor'] ?></td>
    </tr>
    <tr>
      <td>Importe con iva</td>
      <td><?php echo "$". number_format($f['importe_iva'], 2); ?></td>
    </tr>
    <tr>
      <td>Numero de factura</td>
      <td><?php echo $f['num_factura'] ?></td>
    </tr>

    <tr>
      <td>Fecha</td>
      <td><?php echo "$fechaactual[mday] / $fechaactual[mon] / $fechaactual[year]"?></td>
    </tr>

    <tr>
      <td>Hora</td>
      <td><?php echo "$fechaactual[hours] horas con $fechaactual[minutes] minutos y $fechaactual[seconds] segundos"?></td>
    </tr>

</table>
<?php
$nombre = "PR-".$f['ticket']. "-".$f['proveedor'];
}
require_once 'dompdf/autoload.inc.php';
use Dompdf\Dompdf;

$dompdf = new Dompdf();
$dompdf->loadHtml(ob_get_clean());
$dompdf->setPaper('A4' , 'portrait');
$dompdf->render();
$dompdf->stream($nombre);


?>
