<?php
$consulta_proyectos = mysql_query("SELECT * FROM proyectos WHERE id_dependencia = ".$_SESSION['id_dependencia_v3']." AND id_proyecto = ". $_GET['id_proyecto'],$siplan_data_conn) or die (mysql_error());
$encontrado = mysql_num_rows($consulta_proyectos);
if($encontrado==0){
		echo "<script>
		alert('el proyecto no pertenece a tu dependencia');
		location.href='main.php?token=eccbc87e4b5ce2fe28308fd9f2a7baf3';
		</script>";}
$res_proyectos = mysql_fetch_array($consulta_proyectos);
$consulta_componentes = mysql_query("SELECT * FROM componentes WHERE id_componente = ".$_GET['id_componente']." AND id_proyecto = ". $_GET['id_proyecto'],$siplan_data_conn) or die (mysql_error());
$encontrado_componente = mysql_num_rows($consulta_componentes);
if($encontrado_componente==0){
		echo "<script>
		alert('el componente no pertenece a tu dependencia');
		location.href='main.php?token=eccbc87e4b5ce2fe28308fd9f2a7baf3';
		</script>";}else{$resultado_componente = mysql_fetch_assoc($consulta_componentes);}
?>
<script type="text/javascript">

function resultados(a){
var miurl = "capturista/proyectos/acciones_info.php?accion="+a+"&ejercicio=<?php echo $_SESSION['ejercicio_v3'];?>";
window.open(miurl,'_blank','width=550,height=500,menubar=no,titlebar=no,resizable=no');
}

function eliminar_accion(b){
var r=confirm("Desea eliminar la acci\u00f3n");
if (r==true)  { var url ="main.php?token=<?php echo md5(24); ?>&id_accion="+b+"&id_componente=<?php echo $_GET['id_componente'];?>&id_proyecto=<?php echo $_GET['id_proyecto'];?>";  location.href=url; }
}

</script>

<br>
<div class="wrap">
	<div id="icon-edit-pages" class="icon32 icon32-posts-page"><br /></div><h2>Actividades</h2>
<br>

    <a href="main.php?token=c51ce410c124a10e0db5e4b97fc2af39&id_proyecto=<?php echo $_GET['id_proyecto'];?>"><img src="imagenes/regresar24x24.png" width="24" height="24" align="middle"> Regresar a Componentes</a>-
    <?php if($res_proyectos['estatus']==0){ ?>
    <a href="main.php?token=<?php print(md5(20));?>&id_componente=<?php echo $_GET['id_componente']; ?>&id_proyecto=<?php echo $_GET['id_proyecto'];?>"><img src="imagenes/agregar.png" width="24" height="24" align="middle">Agregar Actividad</a>-
    <?php } ?>
    <a href="rpts/general_acciones.php?id_componente=<?php echo $_GET['id_componente'];?>&id_proyecto=<?php echo $_GET['id_proyecto'];?>" target="_blank"><img src="imagenes/printer24x24.png" width="24" height="24" align="middle">Imprimir</a>-
    <a href="rpts/general_acciones_xls.php?id_componente=<?php echo $_GET['id_componente'];?>" target="_blank"><img src="imagenes/excel24x24.png" width="24" height="24" align="middle">Exportar XLS</a>-
	
<br><br>
<table width="100%"  align="center" cellpadding="0" cellspacing="0" style="border:solid 1px #DFDFDF; border-radius:4px;">
  <tr bgcolor="#EDEDED">
    <td style="border-bottom:solid 1px #DFDFDF; border-right:solid 1px #DFDFDF; padding:6px 6px 6px 6px;"><span style="font-family:Tahoma, Geneva, sans-serif; font-size:14px; color:#464646;">Listado de Actividades</span></td>
  </tr>
  <tr bgcolor="#F8F8F8">
    <td style="padding:5px 5px 5px 5px;"><p>Dependencia:<b> <?php echo $_SESSION['nombre_dependencia_v3']; ?></b><br>
Proyecto:<b> <?php echo $res_proyectos['nombre']; ?></b><br>
Componente: <b><?php  echo $resultado_componente['descripcion']; ?></b><br />
<?php
   $consulta_acciones = "SELECT 
t1.id_accion as id_actividad,
t1.no_accion as no_accion,
t1.descripcion as descripcion,
t2.nombre as u_medida,
t1.cantidad as cantidad,
t1.ponderacion as ponderacion
FROM acciones as t1
inner join u_medida_prog01 as t2 on(t2.id_unidad = t1.unidad_medida)
where id_componente  = '". $_GET['id_componente']."' ORDER BY no_accion ASC";
   $res_acciones = mysql_query($consulta_acciones,$siplan_data_conn) or die (mysql_error());
?>
 <br /> N&uacute;mero de Acciones Registradas:&nbsp;<b> <?php  print mysql_num_rows($res_acciones);?></b>
</p>
<div id="container" class="ex_highlight_row">
<div id="demo">
<table width="99%" cellpadding="0" cellspacing="0" border="0" class="display" id="example">
 <thead>
    <tr>
	<td width="5%"><div align="center">No.</div></td>
    <td width="30%"><div align="center">Descripci&oacute;n</div></td>
    <td width="16%"><div align="center">Unidad de Medida</div></td>
    <td width="9%"><div align="center">Cantidad</div></td>
    <td width="10%"><div align="center">Ponderaci&oacute;n</div></td>
    
    <td width="10%"><div align="center">Calendarizaci&oacute;n</div></td>
    <td width="10%"><div align="center">Editar</div></td>
    <td width="10%"><div align="center">Eliminar</div></td>       
  </tr>
  </thead>
  <tbody>
  <?php
	 while ($resAcc = mysql_fetch_assoc($res_acciones)) {
	 	$idaccion = $resAcc['id_actividad'];
?>
<?php $color = "gradeA";?>
  <tr class="<?php echo $color; ?>">
    <td><?php echo $resAcc['no_accion']; ?></td>
    <td><?php print(substr($resAcc['descripcion'],0,30)."..."); ?></td>
    <td align="center"><?php echo $resAcc['u_medida']; ?></td>
    <td align="center"><?php echo $resAcc['cantidad']; ?></td>
    <td align="center"><?php echo  $resAcc['ponderacion'] ?>%</td>
    
    <td align="center"><a href="javascript:resultados(<?php echo $idaccion ?>)"><img src="imagenes/info.png" width="24" height="24"></a></td>
    <?php if($res_proyectos['estatus']==0){ ?>
    <td align="center"><a href="main.php?token=<?php echo md5(21); echo "&id_accion=".$idaccion."&id_componente=".$_GET['id_componente']."&id_proyecto=".$_GET['id_proyecto'];?>"><img src="imagenes/pencil_edit24x24.png" width="24" height="24"></a></td>
    <?php }else{ ?>
    <td align="center"><img src="imagenes/pencil_edit24x24_disable.png" width="24" height="24"></a></td>	
    <?php } ?>	
     <?php if($res_proyectos['estatus']==0){ ?>
    <td align="center"><a href="javascript:eliminar_accion('<?php echo $idaccion ?>');"><img src="imagenes/trash_box_24x24.png" width="24" height="24"></a></td>
    	<?php }else{ ?>
    		<td align="center"><img src="imagenes/trash_box_24x24_disable.png" width="24" height="24"></td>
    			<?php } ?>
    </tr>
    <?php } ?>
    </tbody>
    <tfoot>
		<tr>
	<td width="5%"><div align="center">No.</div></td>
    <td width="30%"><div align="center">Descripci&oacute;n</div></td>
    <td width="13%"><div align="center">Unidad de Medida</div></td>
    <td width="8%"><div align="center">Cantidad</div></td>
    <td width="9%"><div align="center">Ponderaci&oacute;n</div></td>
    <td width="8%"><div align="center">Estatus</div></td>
    <td width="9%"><div align="center">Calendarizaci&oacute;n</div></td>
    <td width="9%"><div align="center">Editar</div></td>
    <td width="9%"><div align="center">Eliminar</div></td>       
  </tr></tfoot>
  </table>
  </div></div>
    <form id="eliminar_accion" name="eliminar_accion" method="post" action="main.php?token=<?php echo md5(815); ?>">
       <input type="hidden" name="idaccion_editar_del" id="idaccion_editar_del" />
       <input type="hidden" name="componenteid_del" id="componenteid_del" />
       <input type="hidden" name="ncomp_del" id="ncomp_del" value="<?php  echo $_POST['ncomp'];?>" />
    </form>
        </tr>
  </table>
   </div></div> 
 <p>&nbsp;</p>
</div></div>