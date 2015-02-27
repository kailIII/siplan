<?php session_start();

$mp=$_GET['mp'];

if ( $mp!="" and $_SESSION['id_dependencia_v3']!=""){
//include('obras/classes/c_obra.php');
//include('obras/classes/c_funciones.php');
require_once("../seguridad/deniedacces.php");
require_once("../seguridad/siplan_connection_db.php");
require_once("../seguridad/logout.php");
require_once ("libchart/classes/libchart.php");
}
//$c=new obras;
//$f=new funciones;
?>
<?php

?>
 <style type="text/css" title="currentStyle">
			@import "../media/css/demo_page.css";
			@import "../media/css/demo_table.css";
</style>

<script type="text/javascript" language="javascript" src="../media/js/jquery.js"></script>
<script type="text/javascript" language="javascript" src="../media/js/jquery.dataTables.js"></script>

<script type="text/javascript" charset="utf-8">
			$(document).ready(function() {
					  var oTable = $('#example9').dataTable( {
		"sDom": '"clear"&gt;',
		"iDisplayLength": -1,

		 "oLanguage": {
           "sLengthMenu": '',
            "sZeroRecords": "No se encontro nada",
            "sInfo": "Mostrando _START_ a _END_ de _TOTAL_ registros",
            "sInfoEmpty": "Mostrando 0 a 0 de 0 registros",

            "sInfoFiltered": "(filtrado de _MAX_ registros totales)"

        },

		"bSort": false


		/*"aoColumnDefs": [
            { "bSortable": false, "aTargets": [ 0 ] }
        ],
        "aaSorting": [[1, 'asc']]*/

    });



} );

		/*
				  var oTable = $('#example9').dataTable( {
		"sDom": '"clear"&gt;',
		"iDisplayLength": -1,

		 "oLanguage": {
           "sLengthMenu": '',
            "sZeroRecords": "No se encontro nada",
            "sInfo": "Mostrando _START_ a _END_ de _TOTAL_ registros",
            "sInfoEmpty": "Mostrando 0 a 0 de 0 registros",

            "sInfoFiltered": "(filtrado de _MAX_ registros totales)"

        },

		"bSort": false

   */
		/*"aoColumnDefs": [
            { "bSortable": false, "aTargets": [ 0 ] }
        ],
        "aaSorting": [[1, 'asc']]*/

   // });



//} );
</script>


   <link rel="stylesheet" href="../css/jquery-ui.css" />

  <script type="text/javascript" language="javascript" src="../js/jquery-ui.js"></script>


<div id="obras"  style=" border-radius: 15px; background-color:white;	 -moz-border-radius: 5px 10px;    overflow:auto; width: 95%; height :450px; align:center;" >

<table  width="100%" cellpadding="0" cellspacing="0" border="0"  >
 <thead>
    <tr style="font-size:13px; background-color:#CCC;">
    <td rowspan="2" width="auto"><b>SECTOR</b></td>
    <td rowspan="2" width="auto"><b>DEP. </b></td>
    <td rowspan="2" width="auto"><b>FONDO O MOD. DE INV.</b></td>
    <td rowspan="2" width="auto"><b>DESCRIPCIÓN</b></td>
    <td rowspan="2" width="auto"><b>MUN.</b></td>
    <td rowspan="2" width="auto"><b>LOC.</b></td>
    <td colspan="7" align="center" width="auto"><b>INVERSIÓN TOTAL PROGRAMADA</b></td>
    <td colspan="2" align="center" width="auto"><b>METAS TOTALES</b></td>
    <td colspan="2" align="center" width="auto"><b>BENEF.</b></td>
    <td width="80"><b>PED</b></td>
  </tr>
  <tr style="font-size:13px; background-color:#CCC;">
    <td width="auto"><b>Total</b></td>
    <td width="auto"><b>Federal</b></td>
    <td width="auto"><b>Estatal</b></td>
    <td width="auto"><b>Municipal</b></td>
    <td width="auto"><b>Partic.</b></td>
    <td width="auto"><b>Créditos</b></td>
    <td width="auto"><b>Otros</b></td>
    <td width="auto"><b>MEDIDA</b></td>
    <td width="auto"><b>PROG.</b></td>
    <td width="auto"><b>H</b></td>
    <td width="auto"><b>M</b></td>
    <td width="auto"><b>E/L/E</b></td>
  </tr>
  </thead>
  <tbody>
  <?php
  $tt=0;
	$fd=0;
	$st=0;
	$mn=0;
	$pt=0;
	$cr=0;
	$ot=0;
	$cp=0;
	  $con_o="SELECT (dependencias.acronimo) as nom_dep, sectores.id_sector, sectores.sector, obras.status_obra,obras.prioridad,(obras.descripcion) as nom_obra, (proyectos.nombre) as nom_proy, eje.eje, (linea.nombre) as nom_linea, (estrategias.nombre) as nom_estr, municipios.id_finanzas, (municipios.nombre) as nom_mun, localidades.id_localidad, (localidades.id_finanzas) as idlfin, (localidades.nombre) as nom_loc, regiones.id_region, (regiones.nombre) as nom_reg, obras.ben_h, obras.ben_m, obras.cantidad, (unidad_medida_prog02.descripcion) as nom_med, obras.fecha_inicio, obras.fecha_fin, (programas_poa.clave) as cvprg, (programas_poa.descripcion) nom_ppoa, (subprogramas_poa.clave) as  cvsprg, (subprogramas_poa.descripcion) as sppoa, obras.obra, (componentes.descripcion) as nom_com,  (origen.c08c_tipori) as nom_origen,origen.s08c_origen, obras.modalidad, obras.retencion, aportes.federal, aportes.estatal, aportes.municipal, aportes.participantes, aportes.credito, aportes.otros, obras.programa, obras.otro_prog,proyectos.id_proyecto,componentes.id_componente,unidad_medida_prog02.id_unidad,subprogramas_poa.id_subprograma_poa,programas_poa.id_programa_poa, obras.ben_h, obras.ben_m, obras.id_obra,obras.municipio, obras.localidad , proyectos.no_proyecto
FROM origen INNER JOIN (((programas_poa INNER JOIN (subprogramas_poa INNER JOIN (unidad_medida_prog02  INNER JOIN ((componentes INNER JOIN (sectores INNER JOIN (regiones INNER JOIN (municipios INNER JOIN ((dependencias INNER JOIN obras ON dependencias.id_dependencia = obras.id_dependencia) INNER JOIN (eje INNER JOIN proyectos ON eje.id_eje = proyectos.id_eje) ON (proyectos.id_proyecto = obras.id_proyecto) AND (dependencias.id_dependencia = proyectos.id_dependencia)) ON municipios.id_finanzas =
obras.municipio) ON regiones.id_region = municipios.id_region) ON sectores.id_sector = dependencias.id_sector) ON (proyectos.id_proyecto = componentes.id_proyecto) AND (componentes.id_componente = obras.id_componente)) INNER JOIN localidades ON municipios.id_municipio = localidades.id_municipio) ON (unidad_medida_prog02.id_unidad = obras.u_medida) AND (unidad_medida_prog02.id_unidad = obras.u_medida)) ON subprogramas_poa.id_subprograma_poa = obras.subprograma_poa) ON (programas_poa.id_programa_poa = subprogramas_poa.id_programa_poa) AND (programas_poa.id_programa_poa = obras.programa_poa)) INNER JOIN linea ON (linea.id_linea = proyectos.id_linea) AND (eje.id_eje = linea.id_eje)) INNER JOIN estrategias ON (estrategias.id_estrategia = proyectos.id_estrategia) AND (linea.id_linea = estrategias.id_linea)) ON origen.s08c_origen = obras.origen INNER JOIN aportes ON obras.id_obra = aportes.id_obra where  obras.municipio=".$_GET['mp']." and obras.status_obra>=3 and dependencias.acronimo='".$_GET['dep']."' group by obras.id_obra ORDER BY dependencias.id_dependencia, proyectos.no_proyecto, obras.id_obra";
  $consulta_obr=mysql_query($con_o,$siplan_data_conn);
  $i=0;
    while ($resobr = mysql_fetch_assoc($consulta_obr)) {
	  //sumar aporte programados
 $sumar_aportes = mysql_query("select  (federal + estatal + municipal + participantes + credito + otros ) as totalp  from aportes where id_obra = ".$resobr['id_obra'],$siplan_data_conn) or die (mysql_error());
	$sum_aporte= mysql_fetch_array($sumar_aportes);
	$totalp= number_format($sum_aporte['totalp'],2);
 //termina suamr aportes programasdos
 $PED=substr($resobr['nom_estr'],0,5);

// switch ($resobr['status_obra']){
		/*   case 1:
		   $status = "Sin Aprobar";
		   $css_color = "gradeX";
		   break;
		   case 2:
		   $status = "Aprob. Dependencia";
		   $css_color = "gradeB";
		   break;
		   case 3:
		   $status = "Aprob. UPLA";*/
		   if ($i%2==0){
		   $css_color = "gradeA even";
		  // break;
		//    case 4:
		//   $status = "Con Oficio de Ejec.";
		   }else{
		   $css_color = "gradeA odd";
		   }
		//   break;
	//   }
  ?>

 <tr  class=" <?php echo $css_color;  ?>"  style="font-size:12.3px" >
   <td align="justify"><?php echo $resobr['sector']; ?></td>
    <td align="right"><?php echo ($resobr['nom_dep']); ?></td>
	<td abbr="right"><?php echo $resobr['nom_origen'];?></td>
    <td abbr="right"><?php echo $resobr['nom_obra'];?></td>
    <td abbr="right"><?php echo $resobr['nom_mun'];?></td>
    <td abbr="right"><?php echo $resobr['nom_loc'];?></td>
    <td abbr="right"><?php echo $totalp;?></td>
    <td abbr="right"><?php echo number_format($resobr['federal'],2);?></td>
    <td abbr="right"><?php echo number_format($resobr['estatal'],2);?></td>
     <td abbr="right"><?php echo number_format($resobr['municipal'],2);?></td>
      <td abbr="right"><?php echo number_format($resobr['participantes'],2);?></td>
       <td abbr="right"><?php echo number_format($resobr['credito'],2);?></td>
        <td abbr="right"><?php echo number_format( $resobr['otros'],2);?></td>
         <td abbr="right"><?php echo $resobr['nom_med'];?></td>
  <td abbr="right"><?php echo number_format($resobr['cantidad']);?></td>
    <td abbr="right"><?php echo number_format($resobr['ben_h']);?></td>
      <td abbr="right"><?php echo number_format($resobr['ben_m']);?></td>
        <td abbr="right"><?php echo $PED; ?></td>




 </tr>
    <?php $i++; } ?>
    </tbody>
    <tfoot>

  </tfoot>
  </table>


 </div>



