<?php
$id_accion = $_GET['accion'];
$ejercicio = $_GET['ejercicio'];
if($ejercicio=='2014'){
require("../../seguridad/siplan_connection_db.php");
}else{require("../../seguridad/siplan_connection_db_2015.php");}

$consulta_metas = "SELECT * FROM metas WHERE id_accion = '$id_accion'";
$ejecuta_consulta = mysql_query($consulta_metas,$siplan_data_conn) or die (mysql_error());
$resultado = mysql_fetch_array($ejecuta_consulta);
$consulta_accion = mysql_query("SELECT * FROM acciones WHERE id_accion = '$id_accion'",$siplan_data_conn)or die(mysql_error());
$resultado_accion = mysql_fetch_array($consulta_accion);
$consulta_resultados = mysql_query("SELECT * FROM resultados WHERE id_accion = '$id_accion'",$siplan_data_conn)or die(mysql_error());
$res_resultados = mysql_fetch_array($consulta_resultados);
?>
<html>
<head>
	<title>Acciones</title>
	<style type="text/css">
		body {
			font-family:Arial, Helvetica, sans-serif;
			font-size:11px;
			color:#333;
		}
	</style>
</head>
<body>
<h2>Acci&oacute;n:<?php echo $resultado_accion['descripcion'];?></h2>
<table width="31%" border="0" cellpadding="3" cellspacing="0">
  <tr bgcolor = "#cccccc">
    <td width="28%">Mes</td>
    <td width="37%">Meta</td>
    <td width="35%">Resultado</td>
  </tr>
  <tr bgcolor="#99CC66">
    <td>Enero</td>
    <td><?php echo $resultado['enero_m'];?></td>
    <td><?php echo $res_resultados['enero_r'];?></td>
  </tr>
  <tr bgcolor = "#DFFFBF">
    <td>Febrero</td>
    <td><?php echo $resultado['febrero_m'];?></td>
    <td><?php echo $res_resultados['febrero_r'];?></td>
  </tr>
  <tr bgcolor="#99CC66">
    <td>Marzo</td>
    <td><?php echo $resultado['marzo_m'];?></td>
    <td><?php echo $res_resultados['marzo_r'];?></td>
  </tr>
  <tr bgcolor = "#DFFFBF">
    <td>Abril</td>
    <td><?php echo $resultado['abril_m'];?></td>
    <td><?php echo $res_resultados['abril_r'];?></td>
  </tr>
  <tr bgcolor="#99CC66">
    <td>Mayo</td>
    <td><?php echo $resultado['mayo_m'];?></td>
    <td><?php echo $res_resultados['mayo_r'];?></td>
  </tr>
  <tr bgcolor = "#DFFFBF">
    <td>Junio</td>
    <td><?php echo $resultado['junio_m'];?></td>
    <td><?php echo $res_resultados['junio_r'];?></td>
  </tr>
  <tr bgcolor="#99CC66">
    <td>Julio</td>
    <td><?php echo $resultado['julio_m'];?></td>
    <td><?php echo $res_resultados['julio_r'];?></td>
  </tr>
  <tr bgcolor = "#DFFFBF">
    <td>Agosto</td>
    <td><?php echo $resultado['agosto_m'];?></td>
    <td><?php echo $res_resultados['agosto_r'];?></td>
  </tr>
  <tr bgcolor="#99CC66">
    <td >Septiembre</td>
    <td><?php echo $resultado['septiembre_m'];?></td>
    <td><?php echo $res_resultados['septiembre_r'];?></td>
  </tr>
  <tr bgcolor = "#DFFFBF">
    <td>Octubre</td>
    <td><?php echo $resultado['octubre_m'];?></td>
    <td><?php echo $res_resultados['octubre_r'];?></td>
  </tr>
  <tr bgcolor="#99CC66">
    <td>Noviembre</td>
    <td><?php echo $resultado['noviembre_m'];?></td>
    <td><?php echo $res_resultados['noviembre_r'];?></td>
  </tr>
  <tr bgcolor = "#DFFFBF">
    <td>Diciembre</td>
    <td><?php echo $resultado['diciembre_m'];?></td>
    <td><?php echo $res_resultados['diciembre_r'];?></td>
  </tr>
</table>
<p>&nbsp;</p>
</body>
</html>