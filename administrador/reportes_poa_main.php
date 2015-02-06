<div class="wrap">
<div id="icon-edit-pages" class="icon32 icon32-posts-page"><br></div><h2>Reportes POA</h2>
<br>


<script src="SpryAssets/SpryTabbedPanels.js" type="text/javascript"></script>
<link href="SpryAssets/SpryTabbedPanels.css" rel="stylesheet" type="text/css">
<div id="TabbedPanels1" class="TabbedPanels">
  <ul class="TabbedPanelsTabGroup">
    <li class="TabbedPanelsTab" tabindex="0"><div style="font-size:12px;">POA 01 Resumen</div></li>
    <li class="TabbedPanelsTab" tabindex="0"><div style="font-size:12px;">POA 02 Resumen</div></li>
    <li class="TabbedPanelsTab" tabindex="0"><div style="font-size:12px;">POA 02 Inversión</div></li>
</ul>
  <div class="TabbedPanelsContentGroup">
    <div class="TabbedPanelsContent"><p><a href="rpts/reporte_general_proyectos.php" target="_blank">Descargar PDF</a> - <a href="rpts/reporte_poa01_xls.php" target="_blank">Descargar XLS</a></p>

    <?php
	$conuslta_poa01_res = mysql_query("SELECT sectores.sector, (eje.eje) nom_eje, (linea.nombre) as nom_lin, (estrategias.nombre) as nom_est, dependencias.acronimo, clasificacion.clasificacion, proyectos.no_proyecto, (proyectos.nombre) as nom_proy, proyectos.unidad_medida, proyectos.anual_pr, proyectos.prog_sem, proyectos.beneficiarios_h, proyectos.beneficiarios_m, proyectos.inversion, proyectos.id_dependencia,proyectos.estatus, proyectos.cantidad
FROM clasificacion INNER JOIN (sectores INNER JOIN (((eje INNER JOIN (dependencias INNER JOIN proyectos ON dependencias.id_dependencia = proyectos.id_dependencia) ON eje.id_eje = proyectos.id_eje) INNER JOIN linea ON (linea.id_linea = proyectos.id_linea) AND (eje.id_eje = linea.id_eje)) INNER JOIN estrategias ON (estrategias.id_estrategia = proyectos.id_estrategia) AND (linea.id_linea = estrategias.id_linea)) ON sectores.id_sector = dependencias.id_sector) ON clasificacion.id_clasificacion = proyectos.clasificacion ORDER BY  dependencias.id_dependencia, proyectos.no_proyecto ASC",$siplan_data_conn) or die (mysql_error());
?>
     <table width="100%" border="0" cellspacing="1" cellpadding="1">
  <tr style="background-color:#9BBB59;">
    <td style="border-bottom:solid 1px #C4D79B;"><div style="padding:2px 2px 2px 2px; color:#FFF; text-align:center;">SECTOR</div></td>
    <td style="border-bottom:solid 1px #C4D79B;"><div style="padding:2px 2px 2px 2px; color:#FFF; text-align:center;">ACRO</div></td>
    <td style="border-bottom:solid 1px #C4D79B;"><div style="padding:2px 2px 2px 2px; color:#FFF; text-align:center;">EJE</div></td>
    <td style="border-bottom:solid 1px #C4D79B;"><div style="padding:2px 2px 2px 2px; color:#FFF; text-align:center;">LINEA</div></td>
    <td style="border-bottom:solid 1px #C4D79B;"><div style="padding:2px 2px 2px 2px; color:#FFF; text-align:center;">ESTRATEGIA</div></td>
    <td style="border-bottom:solid 1px #C4D79B;"><div style="padding:2px 2px 2px 2px; color:#FFF; text-align:center;">CLASIFICACIÓN</div></td>
    <td style="border-bottom:solid 1px #C4D79B;"><div style="padding:2px 2px 2px 2px; color:#FFF; text-align:center;">NUM.</div></td>
    <td style="border-bottom:solid 1px #C4D79B;"><div style="padding:2px 2px 2px 2px; color:#FFF; text-align:center;">PROYECTO</div></td>
    <td style="border-bottom:solid 1px #C4D79B;"><div style="padding:2px 2px 2px 2px; color:#FFF; text-align:center;">ESTATUS</div></td>
    <td style="border-bottom:solid 1px #C4D79B;"><div style="padding:2px 2px 2px 2px; color:#FFF; text-align:center;">U. MEDIDA</div></td>
    <td style="border-bottom:solid 1px #C4D79B;"><div style="padding:2px 2px 2px 2px; color:#FFF; text-align:center;">META ANUAL</div></td>
    <td style="border-bottom:solid 1px #C4D79B;"><div style="padding:2px 2px 2px 2px; color:#FFF; text-align:center;">MET. SEM</div></td>
    <td style="border-bottom:solid 1px #C4D79B;"><div style="padding:2px 2px 2px 2px; color:#FFF; text-align:center;">BEN. H</div></td>
    <td style="border-bottom:solid 1px #C4D79B;"><div style="padding:2px 2px 2px 2px; color:#FFF; text-align:center;">BEN. M</div></td>
    <td style="border-bottom:solid 1px #C4D79B;"><div style="padding:2px 2px 2px 2px; color:#FFF; text-align:center;">INVERSIÓN</div></td>
  </tr>

  <?php
  $n1 = 1;
  while($rpoa01 = mysql_fetch_array($conuslta_poa01_res)) {
	if(($n1%2)==0){ $bg = "#FFFFFF";}else{$bg="#EBF1DE";}
	$n1 = $n1+1;
	switch ($rpoa01['estatus']){
		   case "0":
		   $statusA = $statusA+1; //"Sin Aprobar";
		    $status = "Sin Aprobar";

		   break;
		   case "1":
		   $statusD = $statusD+1; // "Aprob. Dependencia";
		    $status =  "Aprob. Dependencia";

		   break;
		   case "2":
		   $statusU = $statusU+1; //"Aprob. UPLA";
		    $status = "Aprob. UPLA";

		   break;
		    case "3":
		   $statusE = $statusE+1; //"Con Oficio de Ejec.";
		    $status = "No incluído";

		   break;
	   }


	?>
  <tr bgcolor="<?php echo $bg;?>">
    <td style="border-bottom:solid 1px #C4D79B;"><?php echo  $rpoa01['sector']; ?></td>
    <td style="border-bottom:solid 1px #C4D79B;"><?php echo  $rpoa01['acronimo']; ?></td>
    <td style="border-bottom:solid 1px #C4D79B;"><?php print (substr($rpoa01['nom_eje'],0,1)); ?></td>
    <td style="border-bottom:solid 1px #C4D79B;"><?php print (substr($rpoa01['nom_lin'],0,4)); ?></td>
    <td style="border-bottom:solid 1px #C4D79B;"><?php print (substr($rpoa01['nom_est'],0,6)); ?></td>

    <td style="border-bottom:solid 1px #C4D79B;"><?php echo  $rpoa01['clasificacion']; ?></td>
    <td style="border-bottom:solid 1px #C4D79B;"><?php echo  $rpoa01['no_proyecto']; ?></td>
    <td style="border-bottom:solid 1px #C4D79B;"><?php echo  $rpoa01['nom_proy']; ?></td>
    <td style="border-bottom:solid 1px #C4D79B;"><?php echo  $status; ?></td>
    <td style="border-bottom:solid 1px #C4D79B;"><?php echo  $rpoa01['unidad_medida']; ?></td>
    <td style="border-bottom:solid 1px #C4D79B;"><?php print (number_format($rpoa01['cantidad'],2)); ?></td>
    <td style="border-bottom:solid 1px #C4D79B;"><?php print (number_format($rpoa01['prog_sem'],2)); ?></td>
    <td style="border-bottom:solid 1px #C4D79B;"><?php print (number_format($rpoa01['beneficiarios_h'],2)); ?></td>
    <td style="border-bottom:solid 1px #C4D79B;"><?php print (number_format($rpoa01['beneficiarios_m'],2)); ?></td>
    <td style="border-bottom:solid 1px #C4D79B;">$<?php print (number_format($rpoa01['inversion'],2)); ?></td>
  </tr>
<?php } ?>
</table>
<br />
    </div>
    <div class="TabbedPanelsContent"><?php include("planeacion/reportepoa02_resumen.php");?></div>
    <div class="TabbedPanelsContent"><?php 	include("planeacion/reportepoa02_inversion.php");?></div>
</div>
</div>
<script type="text/javascript">
var TabbedPanels1 = new Spry.Widget.TabbedPanels("TabbedPanels1");
</script>

</div></div>
