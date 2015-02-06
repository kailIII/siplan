<?php
$consulta_comp = "SELECT
componente.no_componente as num,
componente.descripcion as nombre,
componente.unidad_responsable as responsable,
componente.unidad_medida as id_unidad,
u_medida.nombre as unidad,
componente.id_tipo as id_tipo,
t_medida.nombre as tipo,
componente.cantidad as cantidad,
componente.ponderacion as ponderacion,
proy.nombre as proyecto,
proy.no_proyecto as num_proy
From componentes as componente
inner join u_medida_prog01 as u_medida on(componente.unidad_medida = u_medida.id_unidad)
inner join tipo_unidad_prog01 as t_medida on(componente.id_tipo = t_medida.id_tipo_unidad)
inner join proyectos as proy on(componente.id_proyecto = proy.id_proyecto)
Where id_componente =".$_GET['id_componente'];
$ejecuta_con_comp = @mysql_query($consulta_comp,$siplan_data_conn);
$res_consulta_comp = mysql_fetch_assoc($ejecuta_con_comp);
?>
<div style="margin-left:20px; margin-right:20px;">
<h1><img src="imagenes/info.png" width="24" height="24" align="left">Informaci&oacute;n del Componente</h1>
<ul id="botones">
    <li><a href="main.php?token=c51ce410c124a10e0db5e4b97fc2af39&id_proyecto=<?php echo $_GET['id_proyecto'];?>"><img src="imagenes/regresar24x24.png" width="24" height="24" align="middle"> Regresar a Componentes</a></li>
</ul>	
<hr>
<div id="cuadro_info">
	<b>Proyecto:</b>&nbsp;<?php echo $res_consulta_comp['num_proy']; ?>&nbsp;-<?php echo $res_consulta_comp['proyecto']; ?><br>
	<b>Componente:</b>&nbsp;<?php echo $res_consulta_comp['num']; ?>&nbsp;-<?php echo $res_consulta_comp['nombre']; ?><br>
	<b>Unidad Responsable:</b>&nbsp;<?php echo $res_consulta_comp['responsable']; ?><br>
	<b>Ponderaci&oacute;n:</b>&nbsp;<?php echo $res_consulta_comp['ponderacion']; ?>%<br>
	<b>Cantidad:</b>&nbsp;<?php echo $res_consulta_comp['cantidad']; ?>&nbsp;
	<b>Unidad de Medida:</b>&nbsp;<?php echo $res_consulta_comp['unidad']; ?>&nbsp;
	<b>Tipo de Medida:</b>&nbsp;<?php echo $res_consulta_comp['tipo']; ?><br>	
	<hr>
	<b>Acciones</b><hr>
	<?php
	$consulta_acciones = @mysql_query("SELECT 
accion.id_accion as id,
accion.no_accion as num,
accion.descripcion as nombre,
accion.ponderacion as ponderacion,
accion.cantidad as cantidad,
u_medida.nombre as unidad,
t_medida.nombre as tipo
FROM acciones as accion 
inner join u_medida_prog01 as u_medida on(accion.unidad_medida = u_medida.id_unidad)
inner join tipo_unidad_prog01 as t_medida on(accion.id_tipo = t_medida.id_tipo_unidad)
where id_componente  =".$_GET['id_componente']." ORDER BY accion.no_accion ASC",$siplan_data_conn);

	while ($res_accion=mysql_fetch_array($consulta_acciones)) {
		
	$id_accion = $res_accion['id'];
	$consulta_metas = @mysql_query("SELECT * FROM metas WHERE id_accion = ".$id_accion,$siplan_data_conn);
	$res_metas = mysql_fetch_array($consulta_metas);
	$consulta_resultados = @mysql_query("SELECT * FROM resultados WHERE id_accion = ".$id_accion,$siplan_data_conn);
	$res_resultados = mysql_fetch_array($consulta_resultados);
	$contenido=$contenido."<table width='100%'' cellspacing='0' cellpadding='2' style='border:solid 1px #cccccc;'>
  <tr>
    <td bgcolor='#ECF9F1'>Actividad:</td>
    <td>".$res_accion['num']." - ".$res_accion['nombre']."</td>
    <td bgcolor='#ECF9F1'>Ponderaci&oacute;n</td>
    <td>".$res_accion['ponderacion']."</td>
    <td bgcolor='#ECF9F1'>Cantidad</td>
    <td>".$res_accion['cantidad']."</td>
    <td bgcolor='#ECF9F1'>Unidad de Medida </td>
    <td>".$res_accion['unidad']."</td>
    <td bgcolor='#ECF9F1'>Tipo de Medida </td>
    <td>".$res_accion['tipo']."</td>
  </tr>
</table>
<table width='100%' style='border:solid 1px #cccccc;' cellspacing='0' cellpadding='2'>
  <tr>
    <td width='20%' bgcolor='#ECF9F1'>Mes</td>
    <td width='6%' bgcolor='#ECF9F1'>Enero</td>
    <td width='7%' bgcolor='#ECF9F1'>Febrero</td>
    <td width='6%' bgcolor='#ECF9F1'>Marzo</td>
    <td width='6%' bgcolor='#ECF9F1'>Abril</td>
    <td width='6%' bgcolor='#ECF9F1'>Mayo</td>
    <td width='7%' bgcolor='#ECF9F1'>Junio</td>
    <td width='7%' bgcolor='#ECF9F1'>Julio</td>
    <td width='7%' bgcolor='#ECF9F1'>Agosto</td>
    <td width='7%' bgcolor='#ECF9F1'>Septiembre</td>
    <td width='7%' bgcolor='#ECF9F1'>Octubre</td>
    <td width='7%' bgcolor='#ECF9F1'>Noviembre</td>
    <td width='7%' bgcolor='#ECF9F1'>Diciembre</td>
  </tr>
  <tr>
    <td bgcolor='#ECF9F1'>Metas</td>
    <td>".$res_metas['enero_m']."</td>
    <td>".$res_metas['febrero_m']."</td>
    <td>".$res_metas['marzo_m']."</td>
    <td>".$res_metas['abril_m']."</td>
    <td>".$res_metas['mayo_m']."</td>
    <td>".$res_metas['junio_m']."</td>
    <td>".$res_metas['julio_m']."</td>
    <td>".$res_metas['agosto_m']."</td>
    <td>".$res_metas['septiembre_m']."</td>
    <td>".$res_metas['octubre_m']."</td>
    <td>".$res_metas['noviembre_m']."</td>
    <td>".$res_metas['diciembre_m']."</td>
  </tr>
  <tr>
    <td bgcolor='#ECF9F1'>Resultados</td>
    <td>".$res_resultados['enero_r']."</td>
    <td>".$res_resultados['febrero_r']."</td>
    <td>".$res_resultados['marzo_r']."</td>
    <td>".$res_resultados['abril_r']."</td>
    <td>".$res_resultados['mayo_r']."</td>
    <td>".$res_resultados['junio_r']."</td>
    <td>".$res_resultados['julio_r']."</td>
    <td>".$res_resultados['agosto_r']."</td>
    <td>".$res_resultados['septiembre_r']."</td>
    <td>".$res_resultados['octubre_r']."</td>
    <td>".$res_resultados['noviembre_r']."</td>
    <td>".$res_resultados['diciembre_r']."</td>
  </tr>
</table>
<br>
";
mysql_free_result($consulta_metas);
unset($res_metas);
mysql_free_result($consulta_resultados);
unset($res_resultados);
}
echo $contenido;
	?>
</div>
</div>