<?php
$consulta_marco =$conexion->query("SELECT count(*)
FROM marco_estrategico WHERE id_dependencia = ".$_SESSION['id_dependencia_v3']." AND ejercicio = ".$_SESSION['ejercicio_v3']);
$res_marco = $consulta_marco->fetch_array();
if($res_marco[0]==0){
echo "<script type='text/javascript'>
alert('Para aprobar sus proyectos primero debe completar el Marco Estrat\u00e9gico');
</script>";
}
$consulta_marco->free();
?>
<script type="text/JavaScript">
function eliminar_proyecto(a){
r=confirm("\u00bf Desea eliminar el proyecto?");
if(r){
location.href="main.php?token=<?php echo md5(27); ?>&id_proyecto="+a;
}
}
function ponderacion_full(){
alert("Ponderaci\u00f3n completa, elimine o edite otro(s) proyecto(s)")
}
</script>
<div class="wrap">
<h2><span class="glyphicon glyphicon-th-list"></span>&nbsp;Proyectos</h2>
<br>
<ul class="nav nav-pills">
<li><a href="main.php?token=<?php print(md5(1));?>"><span class="glyphicon glyphicon-edit"></span>&nbsp;Marco Estrategico </a></li>
 <?php
   $conulta_pondera_proyectos = "SELECT sum(ponderacion) FROM proyectos WHERE id_dependencia = ".$_SESSION['id_dependencia_v3'];
   $EjecutarConsulta = $conexion->query($conulta_pondera_proyectos);
   $Resultado_Consulta = $EjecutarConsulta->fetch_array();
   if($Resultado_Consulta[0]==100){
?>
<li><a href="javascript:ponderacion_full()"><span class="glyphicon glyphicon-plus"></span>&nbsp;Agregar Proyecto</a></li>
<?php
}else{
?>
	<li><a href="main.php?token=<?php echo md5(4); ?>"><span class="glyphicon glyphicon-plus"></span>&nbsp;Agregar Proyecto</a></li>
 <?php } $EjecutarConsulta->free();
    unset($EjecutarCosnulta);
    unset($conulta_pondera_proyectos);

    ?>


  <li><a href="rpts/general_proyectos.php" target="_blank"><span class="glyphicon glyphicon-print"></span>&nbsp;Imprimir</a></li>
  <li><a href="rpts/general_proyectos_xls.php" target="_blank"><span class="glyphicon glyphicon-export"></span>&nbsp;Exportar a XLS</a></li>
</ul>
<div class="panel panel-default">
<div class="panel-heading"><span class="glyphicon glyphicon-list-alt"></span>&nbsp; Listado de Proyectos</div>
<div class="panel-body">
<div id="container" class="ex_highlight_row">
<div id="demo">
<table width="100%" cellpadding="0" cellspacing="0" border="0" class="display" id="example">
<thead>
<tr>
    <td width="5%"><div align="center">No. </div></td>
	<td width="27%"><div align="center">Proyecto</div></td>
	<td width="5%"><div align="center">PED</div></td>
	<td width="9%"><div align="center">Ponderaci&oacute;n</div></td>
	<td width="10%"><div align="center">Estatus</div></td>
	<td width="8%"><div align="center">Indicadores</div></td>
	<td width="8%"><div align="center">Componentes</div></td>
	<td width="7%"><div align="center">Info.</div></td>
	<td width="7%"><div align="center">Apr/Des</div></td>
	<td width="7%"><div align="center">Editar</div></td>
	<td width="7%"><div align="center">Eliminar</div></td>
  </tr>
  </thead>
  <tbody>
  <?php
    $consulta_proyectos = $conexion->query("SELECT
pr.id_proyecto as id_proyecto,
pr.no_proyecto as no_proyecto,
pr.nombre as nombre,
est.nombre as estrategia,
pr.ponderacion as ponderacion,
pr.estatus as estatus
FROM
proyectos as pr
inner join estrategias as est on(pr.id_estrategia = est.id_estrategia)
WHERE pr.id_dependencia =".$_SESSION['id_dependencia_v3']);
    while ($resproyectos = $consulta_proyectos->fetch_assoc()) {
	    $id_proyecto= $resproyectos['id_proyecto'];
	    $status_proyecto = $resproyectos['estatus'];

            $consulta_componentes = $conexion->query("SELECT sum(ponderacion) From componentes WHERE id_proyecto = ".$id_proyecto);
	  	$num_componentes = $consulta_componentes->fetch_array();

$consulta_indicadores =$conexion->query("SELECT count(*) FROM indicadores_proyecto WHERE id_proyecto = ".$id_proyecto." AND completado=1");
	 	$res_indicadores = $consulta_indicadores->fetch_array();

		$consulta_componentes1 =$conexion->query("SELECT count(*) FROM componentes WHERE id_proyecto = ".$id_proyecto);
		$num_componentes2 = $consulta_componentes1->fetch_array();

       $total_acciones =0;
    	$suma_accion =0;
		while($res_componente1 = $consulta_componentes1->fetch_assoc()){
                $consulta_accion1 =$conexion->query("SELECT sum(ponderacion) as suma FROM acciones WHERE id_componente = ".$res_componente1['id_componente']);
				$res_accion1 = $consulta_accion1->fetch_assoc();
				$suma_accion =$suma_accion+$res_accion1['suma'];

		}
	     switch ($resproyectos['estatus']){
		   case 0:
		   $status = "Sin aprobar";
		   $css_color = "gradeX";
		   break;
		   case 1:
		   $status = "Aprob. Dependencia";
		   $css_color = "gradeB";
		   break;
		   case 2:
		   $status = "Aprob. UPLA";
		   $css_color = "gradeA";
		   break;
		   case 3:
		   $status = "Inactivo";
		   $css_color = "gradeU";
		   break;
	   }


 if($num_componentes2[0] != 0){
  $max_Acc = $suma_accion/$num_componentes2[0];
  }
  ?>
 <tr class="<?php echo $css_color; ?>">
    <td><?php echo $resproyectos['no_proyecto']; ?></td>
    <td><?php print(substr($resproyectos['nombre'],0,32)."..."); ?></td>
    <td><?php print(substr($resproyectos['estrategia'],0,5)); ?></td>
    <td><div align="center"><?php echo $resproyectos['ponderacion']; ?>%</div></td>
    <td><div align="center"><?php echo $status; ?></div></td>
    <td valign="middle"><div align="center"><a href="main.php?token=<?php print(md5(11));?>&id_proyecto=<?php echo"$id_proyecto";?>"><span class="glyphicon glyphicon-stats"></span></a></div></td>
    <td valign="middle"><div align="center"><a href="main.php?token=<?php print(md5(13));?>&id_proyecto=<?php echo"$id_proyecto";?>"><span class="glyphicon glyphicon-list"></span></a></div></td>
    <td valign="middle"><div align="center"><a href="main.php?token=<?php print(md5(25));?>&id_proyecto=<?php echo"$id_proyecto";?>"><span class="glyphicon glyphicon-info-sign"></span></a></div></td>

    <?php

    if($status_proyecto==0 AND $num_componentes==100 AND $max_Acc==100 AND $res_indicadores>0 AND $res_marco>0){
    $status_proyecto = 3;
    }

    switch($status_proyecto){
    	case 1:
    	echo "<td valign='middle'><div align='center'><span class='glyphicon glyphicon-check'></div></td>";
    	break;
    	case 2:
    	echo "<td valign='middle'><div align='center'><a href='main.php?token=".md5(91)."&id_proyecto=".$id_proyecto."'><span class='glyphicon glyphicon-ban-circle'></a></div></td>";
    	break;
    	case 3:
    	$status_proyecto=0;
    	print "<td valign='middle'><div align='center'><a href='main.php?token=".md5(91)."&id_proyecto=".$id_proyecto."'><span class='glyphicon glyphicon-ok-sign'></a></div></td>";
    	break;
    	default:
    	echo "<td valign='middle'><div align='center'> <span class='glyphicon glyphicon-minus'> </div></td>";
    	break;
    }
if($status_proyecto==0){ ?>
    <td valign="middle"><div align="center"><a href="main.php?token=<?php print(md5(8));?>&id_proyecto=<?php echo"$id_proyecto";?>"><span class="glyphicon glyphicon-pencil"></span></a></div></td>
    <?php } ?>
    <?php if($status_proyecto!=0){ ?>
    <td valign="middle"><div align="center"><span class="glyphicon glyphicon-minus"></span></div></td>
    <?php } ?>
    <td valign="middle"><div align="center">
    <?php if($num_componentes==0){ ?>
    	<a href="javascript:eliminar_proyecto('<?php echo"$id_proyecto";?>')"><span class="glyphicon glyphicon-trash"></span></a>
    	<?php } else { ?>
    		<span class="glyphicon glyphicon-minus"></span>
    		<?php } ?>
    </div></td>
 </tr>
    <?php } ?>
    </tbody>
    <tfoot>
     <tr>
    <td width="5%"><div align="center">No. </div></td>
	<td width="27%"><div align="center">Proyecto</div></td>
	<td width="5%"><div align="center">PED</div></td>
	<td width="9%"><div align="center">Ponderaci&oacute;n</div></td>
	<td width="10%"><div align="center">Estatus</div></td>
	<td width="8%"><div align="center">Indicadores</div></td>
	<td width="8%"><div align="center">Componentes</div></td>
	<td width="7%"><div align="center">Info.</div></td>
	<td width="7%"><div align="center">Aprobar</div></td>
	<td width="7%"><div align="center">Editar</div></td>
	<td width="7%"><div align="center">Eliminar</div></td>
  </tr>
  </tfoot>
  </table>
  </tr>
  </table>


</div></div></div>
