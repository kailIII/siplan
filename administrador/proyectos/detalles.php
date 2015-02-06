  <?php
    //$id_proyecto=1;
	$id_proyecto=$_GET['id_proyecto'];
 	$consulta_proyectos = mysql_query("SELECT * FROM proyectos WHERE id_proyecto='$id_proyecto'" ,$siplan_data_conn)or die (mysql_error());
 	$resproyectos = mysql_fetch_assoc($consulta_proyectos);    
  ?>
<style type="text/css" title="currentStyle">
			@import "diseño/tablas/demo_page.css";
			@import "diseño/tablas/demo_table.css";
</style>
<div style="margin-left:20px; margin-right:20px;">
<div id="cuadro_info">
  <h2 align="center"><strong>DETALLES DEL PROYECTO</strong></h2>
  <h2 align="center"><strong><?php echo $resproyectos['nombre']; ?></strong></h2>
  <p align="center"><br />
    
  <div id="container" class="ex_highlight_row">

<td width="9%" valign="middle"> <a href="main.php?token=<?php print(md5(2.5));?>&id_proyecto=<?php echo"$id_proyecto";?>">Agregar Componente</a> </td>
<div id="demo">
<table width="100%" cellpadding="0" cellspacing="0" border="1" class="display" id="example">
 <thead>
    <tr>
    <td width="20%"><div align="center"></div></td>
    <td width="80%"><div align="center"><strong>Descripción</strong></div></td>
  </tr>
  </thead>
  <tbody>
   <tr class="gradeA">
      <td><strong>Acuerdo</strong></td>
      <td><?php echo $resproyectos['id_acuerdo']; ?></td>
    </tr>
    <tr>
      <td><strong>Programa</strong></td>
      <td><?php echo $resproyectos['id_programa']; ?></td>
    </tr>
    <tr class="gradeA">
      <td><strong>Subprograma</strong></td>
      <td><?php echo $resproyectos['id_subprograma']; ?></td>
    </tr>
    <tr>
      <td><strong>Estatus</strong></td>
      <td><?php  
	   switch ($resproyectos['estatus']){
		   case 0:
		   echo "Sin aprobar en dependencia";
		   break;
		   case 1:
		   echo "Aprobada por Dependencia";
		   break;
		   case 2:
		   echo "Aprobada por Copladez";
		   break;
		   case 3:
		   echo "Aprobada para oficio";
		   break;
	   }
	?></td>
    </tr>
    <tr class="gradeA">
      <td><strong>Grado</strong></td>
      <td><?php echo $resproyectos['grado']; ?></td>
    </tr>
    <tr>
      <td><strong>Clasificaci&oacute;n</strong></td>
      <td><?php echo $resproyectos['clasificacion']; ?></td>
    </tr>
    <tr class="gradeA">
      <td><strong>Nombre</strong></td>
      <td><?php echo $resproyectos['nombre']; ?></td>
    </tr>
    <tr>
      <td><strong>Inversi&oacute;n</strong></td>
      <td><?php echo $resproyectos['inversion']; ?></td>
    </tr>
    <tr class="gradeA">
      <td><strong>Ponderaci&oacute;n</strong></td>
      <td><?php echo $resproyectos['ponderacion']; ?></td>
    </tr>
    <tr>
      <td><strong>Unidad Medida </strong></td>
      <td><?php echo $resproyectos['unidad_medida']; ?></td>
    </tr>
   <tr class="gradeA">
      <td><strong>Cantidad</strong></td>
      <td><?php echo $resproyectos['cantidad']; ?></td>
    </tr>
    <tr>
      <td>Prog Sem </td>
      <td><?php echo $resproyectos['prog_sem']; ?></td>
    </tr>
    <tr class="gradeA">
      <td><strong>G&eacute;nero</strong></td>
      <td><?php echo $resproyectos['genero']; ?></td>
    </tr>
    <tr>
      <td>G Vulnerable </td>
      <td><?php echo $resproyectos['g_vulnerable']; ?></td>
    </tr>
    <tr class="gradeA">
      <td>Beneficiarios Hombres </td>
      <td><?php echo $resproyectos['beneficiarios_h']; ?></td>
    </tr>
    <tr>
      <td>Beneficiarios Mujeres </td>
      <td><?php echo $resproyectos['beneficiarios_m']; ?></td>
    </tr>
    <tr class="gradeA">
      <td>Subfunci&oacute;n</td>
      <td><?php echo $resproyectos['subfucnion']; ?></td>
    </tr>
    <tr>
      <td><strong>Justificaci&oacute;n</strong></td>
      <td><?php echo $resproyectos['justificacion']; ?></td>
    </tr>
    <tr class="gradeA">
      <td><strong>Finalidad</strong></td>
      <td><?php echo $resproyectos['finalidad']; ?></td>
    </tr>
    <tr>
      <td><strong>Funci&oacute;n</strong></td>
      <td><?php echo $resproyectos['funcion']; ?></td>
    </tr>
    <tr class="gradeA">
      <td><strong>Prop&oacute;sito</strong></td>
      <td><?php echo $resproyectos['proposito']; ?></td>
    </tr>
    <tr>
      <td><strong>Indicador</strong></td>
      <td><?php echo $resproyectos['indicador']; ?></td>
    </tr>
    <tr class="gradeA">
      <td><strong>Observaciones</strong></td>
      <td><?php echo $resproyectos['observaciones']; ?></td>
    </tr>
    <tr>
      <td>Anual pr </td>
      <td><?php echo $resproyectos['anual_pr']; ?></td>
    <tr class="gradeA">
      <td width="20%"><strong>No. Proyecto</strong></td>
    <td width="80%"><?php echo $resproyectos['no_proyecto']; ?></td>
    </tr>
    </tbody>
  </table>
  <p align="center"><strong><a href="main.php?token=<?php print(md5(2)); ?>" >Regresar</a></a></strong></p>
  </div>
  </div>
 </div>
</div>