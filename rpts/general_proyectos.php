<?php
session_start();
require_once("../seguridad/siplan_connection_db.php");
require_once("dompdf_config.inc.php");
date_default_timezone_set('America/Mexico_City');
$consulta = mysql_query("SELECT * FROM proyectos WHERE id_dependencia = ".$_SESSION["id_dependencia_v3"]." ORDER BY no_proyecto ASC",$siplan_data_conn) or die (mysql_error());
$inicio_html = "
<!doctype html>
<html>
<head>
<meta charset='utf-8'>
<style>
body{
	font-family:Arial, Helvetica, sans-serif;
	font-size:10px;
}
.titulo{
	font-family:Arial, Helvetica, sans-serif;
	font-size:12px;
}
.cabecera{
	font-family:Arial, Helvetica, sans-serif;
	font-size:12px;
}
table{
	border:solid 1px #666666;
}
td{
	border-right:solid 1px #666;
	border-bottom:solid 1px #666;
}

</style>
<title>Reporte General Proyectos</title>
</head>
<body>
<table width='100%' cellspacing='1' cellpadding='4' style='border:0px;'>
  <tr>
    <td width='29%' valign='middle' style='border:0px;'><img src='logoupla.png' width='309' height='66'></td>
    <td width='71%' valign='top' style='border:0px;'><span class='titulo'><b>Unidad de Planeaci&oacute;n<br>
      Direcci&oacute;n de Planeaci&oacute;n</b></span><br>
      <span class='cabecera'>
      <b>Dependencia: </b>&nbsp;&nbsp;".$_SESSION["id_dependencia_v3"]."&nbsp; &nbsp;".$_SESSION["nombre_dependencia_v3"]."<br>
      <b>Reporte:</b>&nbsp;General Proyectos<br>
      <b>Fecha del reporte:</b>&nbsp;".date('d-m-Y H:i')."</span></td>
  </tr>
</table>
<hr>
<h2>Proyectos por Dependencia</h2>
<table width='100%' border='1' cellspacing='0' cellpadding='2'>
  <tr bgcolor='#F2F4EF'>
    <td width='4%' >No.</td>
    <td width='25%'>Nombre</td>
    <td width='8%'>Alin. PED </td>
    <td width='10%'>Estatus</td>
    <td width='9%'>Inversi&oacute;n</td>
    <td width='8%'>Ponderaci&oacute;n</td>
    <td width='10%'>unidad de medida</td>
    <td width='10%'>cantidad</td>
    <td width='8%'>ben. h </td>
    <td width='8%'>ben. m </td>
  </tr>";
  $contenido = "";
  while($resultado = mysql_fetch_array($consulta)){
  $cons_estrategia = mysql_query("SELECT * FROM estrategias WHERE id_estrategia = ". $resultado['id_estrategia'],$siplan_data_conn)or die (mysql_error());
  $res_estrategia = mysql_fetch_array($cons_estrategia);
  switch($resultado['estatus']){
  case 0:
    $estatus = "Sin aprobar";
    break;
    case 1:
    $estatus = "Aprobado Dependencia";
    break;
    case 2:
    $estatus = "Aprobado COPLADEZ";
    break;

  }
  $contenido = $contenido."
  <tr>
    <td>".$resultado['no_proyecto']."</td>
    <td>".$resultado['nombre']."</td>
    <td>".substr($res_estrategia['nombre'],0,5)."</td>
    <td>".$estatus."</td>
    <td>$ ".number_format($resultado['inversion'],2)."</td>
    <td>".$resultado['ponderacion']."%</td>
    <td>".$resultado['unidad_medida']."</td>
    <td>".$resultado['cantidad']."</td>
    <td>".$resultado['beneficiarios_h']."</td>
    <td>".$resultado['beneficiarios_m']." </td>
  </tr>";
}
mysql_close($siplan_data_conn);
$full_html = utf8_decode($inicio_html.$contenido)."</table></body></html>";
$dompdf = new DOMPDF();
$dompdf->load_html($full_html);
$dompdf->set_paper("legal","landscape");
$dompdf->render();
$canvas = $dompdf->get_canvas();
$font = Font_Metrics::get_font("helvetica", "bold");
$canvas->page_text(20, 585, "Proyectos x Dep: Pag {PAGE_NUM} de {PAGE_COUNT}",$font, 7, array(0,0,0));
$canvas->page_text(450, 585, "Fecha del reporte: ".date('d-m-Y | h:i:s a'),$font, 7, array(0,0,0));
$dompdf->stream("sample.pdf",array("Attachment" => 0));
?>
