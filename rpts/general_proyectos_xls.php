<?php
session_start();
require_once("../seguridad/siplan_connection_db.php");
require_once("dompdf_config.inc.php");
date_default_timezone_set('America/Mexico_City');
header ("Expires: 0");
header ("Last-Modified: " . gmdate("D,d M YH:i:s") . " GMT");
header ("Cache-Control: no-cache, must-revalidate");
header ("Pragma: no-cache");
header ("Content-type: application/x-msexcel");
header ("Content-Disposition: attachment; filename=\"lista_proyectos_poa_2014.xls\"" );

$encabezado = "<table>
  <tr>
    <td>No. proyecto</td>
    <td>nombre</td>
    <td>eje</td>
    <td>l&iacute;nea</td>
    <td>estrategia</td>
    <td>estatus</td>
    <td>grado</td>
    <td>clasificaci&oacute;n</td>
    <td>inversi&oacute;n</td>
    <td>ponderaci&oacute;n</td>
    <td>unidad de medida</td>
    <td>cantidad</td>
    <td>programado semestral</td>
    <td>grupo vulnerable</td>
    <td>beneficiarios hombres</td>
    <td>beneficiarios mujeres</td>
    <td>Justificaci&oacute;n</td>
    <td>prop&oacute;sito</td>
    <td>finalidad</td>
    <td>funci&oacute;n</td>
    <td>subfunci&ocute;n</td>
    <td>observaciones</td>
  </tr>";
 $contenido = "";
 $consulta = mysql_query("select
pr.no_proyecto as no_proyecto,
pr.nombre as nombre,
t2.eje as eje,
t3.nombre as linea,
t4.nombre as estrategia,
CASE pr.estatus
 WHEN 0 THEN 'sin aprobar'
 WHEN 1 THEN 'aprobado dependencia'
 WHEN 2 THEN 'aprobado colpadez'
END as estatus,
t5.grado as grado,
t6.clasificacion as clasificacion,
pr.inversion as inversion,
pr.ponderacion as ponderacion,
pr.unidad_medida as unidad_medida,
pr.cantidad as cantidad,
pr.prog_sem as prog_sem,
t7.descripcion as vulnerable,
pr.beneficiarios_h as ben_h,
pr.beneficiarios_m as ben_m,
pr.justificacion as justificacion,
pr.proposito as proposito,
t8.nombre as finalidad,
t9.nombre as funcion,
t10.nombre as subfuncion,
pr.observaciones as observaciones
from proyectos pr
inner join eje t2 on (pr.id_eje = t2.id_eje)
inner join linea t3 on (pr.id_linea = t3.id_linea)
inner join estrategias t4 on (pr.id_estrategia = t4.id_estrategia)
inner join grado t5 on (pr.grado = t5.id_grado)
inner join clasificacion t6 on (pr.clasificacion = t6.id_clasificacion)
inner join grupo_vulnerable t7 on (pr.g_vulnerable = t7.id_vulnerable)
inner join finalidad t8 on (pr.finalidad = t8.id_finalidad)
inner join funcion t9 on (pr.funcion = t9.id_funcion)
inner join subfuncion t10 on (pr.subfuncion = t10.id_subfuncion)
where id_dependencia = ".$_SESSION['id_dependencia_v3']." order by no_proyecto asc",$siplan_data_conn) or die (mysql_error());
  while($resultado = mysql_fetch_array($consulta)){


  $contenido.="
  <tr>
    <td>".$resultado['no_proyecto']."</td>
    <td>".$resultado['nombre']."</td>
    <td>".$resultado['eje']."</td>
    <td>".$resultado['linea']."</td>
    <td>".$resultado['estrategia']."</td>
    <td>".$resultado['estatus']."</td>
    <td>".$resultado['grado']."</td>
    <td>".$resultado['clasificacion']."</td>
    <td>".$resultado['inversion']."</td>
    <td>".$resultado['ponderacion']."</td>
    <td>".$resultado['unidad_medida']."</td>
    <td>".$resultado['cantidad']."</td>
    <td>".$resultado['prog_sem']."</td>
    <td>".$resultado['vulnerable']."</td>
    <td>".$resultado['ben_h']."</td>
    <td>".$resultado['ben_m']."</td>
    <td>".$resultado['justificacion']."</td>
    <td>".$resultado['proposito']."</td>
    <td>".$resultado['finalidad']."</td>
    <td>".$resultado['funcion']."</td>
    <td>".$resultado['subfuncion']."</td>
    <td>".$resultado['observaciones']."</td>
  </tr>";
  mysql_free_result($consulta_eje);

}

print(utf8_decode($encabezado.$contenido)."</table>");


?>
