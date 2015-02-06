<?php
$consultar_status_pr = @mysql_query("SELECT estatus FROM proyectos WHERE ID_PROYECTO = ".$_GET['id_proyecto'],$siplan_data_conn);
$r_s=mysql_result($consultar_status_pr,0);
$consulta_proyectos = @mysql_query("SELECT * FROM proyectos WHERE id_dependencia = ".$_SESSION['id_dependencia_v3']." AND id_proyecto = ". $_GET['id_proyecto'],$siplan_data_conn);
$encontrado = mysql_num_rows($consulta_proyectos);
if($encontrado==0){
		echo "<script>
		alert('el proyecto no pertenece a tu dependencia');
		location.href='main.php?token=eccbc87e4b5ce2fe28308fd9f2a7baf3';
		</script>";}else{$resultado_proyecto = mysql_fetch_assoc($consulta_proyectos);}
$cons_pry2  = @mysql_query("SELECT estatus FROM proyectos WHERE id_proyecto =".$_GET['id_proyecto'],$siplan_data_conn);
$res_pry_2 = mysql_result($cons_pry2,0);
?>
<script type="text/javascript">
function eliminar(a){
	respuesta = confirm("Esta seguro de eliminar el componente");
	if(respuesta){
		location.href="main.php?token=<?php echo md5(18); ?>&id_componente="+a+"&id_proyecto=<?php echo $_GET['id_proyecto']; ?>";
	}
}
</script>
<script type="text/javascript">
function acciones(x,y){
	document.getElementById('idcomponente').value = x;
	document.getElementById('ncomp').value = y;
	document.accionesform.submit();
}
</script>
<br>


<div class="wrap">
<h2><span class="glyphicon glyphicon-list"></span>&nbsp;Componentes</h2>
<br>


<ul class="nav nav-pills">
  <li><a href="main.php?token=eccbc87e4b5ce2fe28308fd9f2a7baf3"><span class="glyphicon glyphicon-chevron-left"></span>&nbsp;Proyectos </a></li>
  <?php   if($res_pry_2==0) {  ?>
  <li><a href="main.php?token=<?php echo md5(14); ?>&id_proyecto=<?php echo $_GET['id_proyecto']; ?>"><span class="glyphicon glyphicon-plus"></span>&nbsp;Agregar componente</a></li>
  <?php } ?>
  <li><a href="rpts/componentes_general.php?id_proyecto=<?php echo $_GET['id_proyecto']; ?>" target="_blank"><span class="glyphicon glyphicon-print"></span>&nbsp;Imprimir</a></li>
  <li><a href="rpts/componentes_general_xls.php?id_proyecto=<?php echo $_GET['id_proyecto']; ?>" target="_blank"><span class="glyphicon glyphicon-export"></span>&nbsp;Exportar a XLS</a></li>
</ul> 

<table width="100%"  align="center" cellpadding="0" cellspacing="0" style="border:solid 1px #DFDFDF; border-radius:4px;">
  <tr bgcolor="#EDEDED">
    <td style="border-bottom:solid 1px #DFDFDF; border-right:solid 1px #DFDFDF; padding:6px 6px 6px 6px;"><span style="font-family:Tahoma, Geneva, sans-serif; font-size:14px; color:#464646;">Listado de Componentes</span></td>
  </tr>
  <tr bgcolor="#F8F8F8">
    <td style="padding:5px 5px 5px 5px;">

<div id="container" class="ex_highlight_row">
<div id="demo">
<p>Dependencia:<b> <?php echo $_SESSION['nombre_dependencia_v3']; ?></b><br>
Proyecto: <b><?php echo $resultado_proyecto['no_proyecto']; ?> - <?php echo $resultado_proyecto['nombre']; ?></b>  
<?php
 $consulta_componentes = mysql_query("
SELECT 
t1.id_componente,
t1.no_componente as no_componente,
t1.descripcion as descripcion,
t1.cantidad as cantidad,
t1.ponderacion as ponderacion,
t1.estatus as estatus,
t2.nombre as unidad_medida
from
componentes as t1
inner join u_medida_prog01 as t2 on (t1.unidad_medida = t2.id_unidad)
where id_proyecto = ".$_GET['id_proyecto'],$siplan_data_conn) or die (mysql_error());
?>
 <br /> N&uacute;mero de Componentes Registrados:&nbsp;<b><?php echo mysql_num_rows($consulta_componentes);  ?></b>
<table width="99%" cellpadding="0" cellspacing="0" border="0" class="display" id="example">
 <thead>
    <tr>
	<td width="4%"><div align="center">No.</div></td>
    <td width="25%"><div align="center">Descripci&oacute;n</div></td>
    <td width="15%"><div align="center">Unidad de Medida</div></td>
    <td width="7%"><div align="center">Cantidad</div></td>
    <td width="9%"><div align="center">Ponderaci&oacute;n</div></td>
    <td width="6%"><div align="center">Estatus</div></td>
    <td width="8%"><div align="center">Actividades</div></td>
    <td width="8%"><div align="center">Info.</div></td>
    <td width="8%"><div align="center">Editar</div></td>
    <td width="8%"><div align="center">Eliminar</div></td>       
  </tr>
  </thead>
  <tbody>
  <?php
     $ponderado = 0;
	 while ($resCom = mysql_fetch_array($consulta_componentes)) {
	 	$id_componente = $resCom['id_componente'];
		 $consulta_acciones = mysql_query("SELECT * FROM acciones WHERE id_componente = ".$id_componente,$siplan_data_conn) or die (mysql_error());
	     $resultado_acciones = mysql_num_rows($consulta_acciones);

?>
<?php if ($resCom['estatus']==1){$color = "gradeA";$tex="Activo";}else{$color = "gradeU";$tex="Inactivo";} ?>
  <tr class="<?php echo $color;?>">
    <td><?php echo $resCom['no_componente']; ?></td>
    <td><?php print(substr($resCom['descripcion'],0,30)."..."); ?></td>
    <td align="center"><?php echo $resCom['unidad_medida']; ?></td>
    <td align="center"><?php echo $resCom['cantidad']; ?></td>
    <td align="center"><?php echo  $resCom['ponderacion']; $ponderado = $ponderado +  $resCom['ponderacion']; ?>%</td>
    <td align="center"><?php  echo  $tex;  ?></td>
    <td align="center"><a href="main.php?token=<?php echo md5(19)."&id_componente=".$id_componente."&id_proyecto=".$_GET['id_proyecto']; ?>"><img src="imagenes/options24x24.png" width="24" height="24"></a></td>
    <td align="center"><a href="main.php?token=<?php echo md5(90)."&id_componente=".$id_componente."&id_proyecto=".$_GET['id_proyecto']; ?>"><img src="imagenes/info.png" width="24" height="24"></a></td>
    <?php   if($res_pry_2==0) {  ?>
    <td align="center"><a href="main.php?token=<?php echo md5(15); ?>&componente=<?php echo $resCom['id_componente'];?>&id_proyecto=<?php echo $_GET['id_proyecto']; ?>"><img src="imagenes/pencil_edit24x24.png" width="24" height="24"></a></td>
    <?php } else { ?>
    <td align="center"><img src="imagenes/pencil_edit24x24_disable.png" width="24" height="24"></td>
    <?php } ?>	
    <td align="center">
    <?php  
	   if($resultado_acciones>0||$r_s==1){
	   ?>
         <img src="imagenes/trash_box_24x24_disable.png" width="23" height="24" /></td>
    <?php } else {?>
        <a href="javascript:eliminar(<?php echo $resCom['id_componente'];?>)"><img src="imagenes/trash_box_24x24.png" width="24" height="24"></a></td>
	<?php } ?>	
  </tr>  
    <?php } ?>
    </tbody>
    <tfoot>
		<tr>
	<td width="4%"><div align="center">No.</div></td>
    <td width="25%"><div align="center">Descripci&oacute;n</div></td>
    <td width="15%"><div align="center">Unidad de Medida</div></td>
    <td width="7%"><div align="center">Cantidad</div></td>
    <td width="9%"><div align="center">Ponderaci&oacute;n</div></td>
    <td width="6%"><div align="center">Estatus</div></td>
    <td width="8%"><div align="center">Actividades</div></td>
    <td width="8%"><div align="center">Info.</div></td>
    <td width="8%"><div align="center">Editar</div></td>
    <td width="8%"><div align="center">Eliminar</div></td>       
    </tr></tfoot>
  </table>
  </div></div> 
<p>&nbsp;</p>
</div>
</div>
    <form id="accionesform" name="accionesform" method="post" action="main.php?token=<?php echo md5(812); ?>">
      <input type="hidden" name="idcomponente" id="idcomponente" />
       <input type="hidden" name="ncomp" id="ncomp" />
       <input type="hidden" name="id_proyecto" id="id_proyecto" value="<?php echo $_GET['numproyecto'];?>" />
        <input type="hidden" name="n_proyecto" id="n_propyecto" value="<?php echo $_GET['nombre_proyecto'];?>" />
    </form>
     </tr>
  </table>
   </div></div> 
 <p>&nbsp;</p>
</div></div>