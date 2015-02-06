<script src="SpryAssets/SpryTabbedPanels.js" type="text/javascript"></script>
<link href="SpryAssets/SpryTabbedPanels.css" rel="stylesheet" type="text/css" />

<div class="wrap">
<div id="icon-themes" class="icon32"><br /></div><h2>Información del Estado Financiero de su Dependencia</h2>


<div id="TabbedPanels1" class="TabbedPanels">
  <ul class="TabbedPanelsTabGroup">
    <li class="TabbedPanelsTab" tabindex="0"><div style="font-size:12px;">Estados Financieros</div></li>
    <li class="TabbedPanelsTab" tabindex="0"><div style="font-size:12px;">Origen</div></li>
    <li class="TabbedPanelsTab" tabindex="0"><div style="font-size:12px;">Partida</div></li>
  </ul>
  <div class="TabbedPanelsContentGroup">
    <div class="TabbedPanelsContent">
      <table width="97%" align="center" cellpadding="1" cellspacing="0">
        <tr bgcolor="#C2DDA6">
          <td width="2%" rowspan="2" align="center" style="border:solid 1px #B0D38D;">Proy</td>
          <td width="3%" rowspan="2" align="center" style="border:solid 1px #B0D38D;">Comp</td>
          <td width="2%" rowspan="2" align="center" style="border:solid 1px #B0D38D;">Act</td>
          <td width="3%" rowspan="2" align="center" style="border:solid 1px #B0D38D;">Partida</td>
          <td width="5%" rowspan="2" align="center" style="border:solid 1px #B0D38D;">Origen</td>
          <td width="21%" rowspan="2" style="border:solid 1px #B0D38D;">Desc Origen</td>
          <td colspan="7" style="border:solid 1px #B0D38D;">Presupuesto</td>
        </tr>
        <tr bgcolor="#C2DDA6">
          <td width="9%" style="border:solid 1px #B0D38D;">Asignado</td>
          <td width="9%" style="border:solid 1px #B0D38D;">Acomulado Ampliado</td>
          <td width="9%" style="border:solid 1px #B0D38D;">Acomulado Reducido</td>
          <td width="11%" style="border:solid 1px #B0D38D;">Acomulado transferido ampliado</td>
          <td width="10%" style="border:solid 1px #B0D38D;">Acomulado transferido reducido</td>
          <td width="8%" style="border:solid 1px #B0D38D;">Total</td>
          <td width="8%" style="border:solid 1px #B0D38D;">Ejercido</td>
        </tr>
   <?php $consulta_edo_fin = "SELECT
ef.s06c_proyec as proyecto,
ef.s11c_compon as componente,
ef.s25c_accion as actividad,
ef.s07c_partid as partida,
ef.s08c_origen as origen,
o.c08c_tipori as tipo_origen,
ef.d02p_preasi as asignado,
ef.d02p_acuamp as acuamp,
ef.d02p_acured as reducido,
ef.d02p_acutam as atam,
ef.d02p_acutre as atre,
ef.d02p_pagado as ejecutado

FROM estados_financieros ef
inner join origen o on(ef.s08c_origen = o.s08c_origen)
where s02c_depend = ".$_SESSION['id_dependencia_v3'];
   $ex_con = mysql_query($consulta_edo_fin,$siplan_data_conn) or die (mysql_error());
   $n = 1;
   while ($r_con = mysql_fetch_array($ex_con)){
	   $r=$n%2;
	   if($r==0){$v = "#DDFFDD";}else{$v = "#EEFFEE";}
	   $asignado = $r_con['asignado'];
	   $acuamp = $r_con['acuamp'];
	   $reducido = $r_con['reducido'];
	   $atam = $r_con['atam'];
	   $atre = $r_con['atre'];
	   $total = $asignado + $acuamp + $atam - $atre - $reducido;
	   ?>
        <tr bgcolor="<?php echo $v;?>">
          <td align="center"><?php echo $r_con['proyecto'];?></td>
          <td align="center"><?php echo $r_con['componente'];?></td>
          <td align="center"><?php echo $r_con['actividad'];?></td>
          <td align="center"><?php echo $r_con['partida'];?></td>
          <td align="center"><?php echo $r_con['origen'];?></td>
          <td><?php echo $r_con['tipo_origen'];?></td>
          <td><?php print("$".number_format($asignado,2));?></td>
          <td><?php print("$".number_format($acuamp,2));?></td>
          <td><?php print("$".number_format($reducido,2));?></td>
          <td><?php print("$".number_format($atam,2));?></td>
          <td><?php print("$".number_format($atre,2));?></td>
          <td><?php print("$".number_format($total,2));?></td>
          <td><?php print("$".number_format($r_con['ejecutado'],2));?></td>
        </tr>
 <?php $n=$n+1;}  ?>
      </table>
    <br /><a href="rpts/edos_fin_xls.php" target="_blank"><img src="imagenes/excel24x24.png" width="24" height="24" align="middle">Exportar XLS</a>


    </div>
    <div class="TabbedPanelsContent">

    </div>
    <div class="TabbedPanelsContent">Contenido 2</div>
  </div>
</div>
</div>
<p>&nbsp;</p>
<script type="text/javascript">
var TabbedPanels1 = new Spry.Widget.TabbedPanels("TabbedPanels1");
</script>
