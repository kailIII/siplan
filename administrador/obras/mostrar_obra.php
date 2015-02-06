<?php

$id_obra=$_GET['d'];

if ($id_obra!="" and $_SESSION['id_dependencia_v3']!=""){
include('classes/c_obra.php');
include('classes/c_funciones.php');
$c=new obras;
$f=new funciones;


$res=$c->abrir_obra($id_obra,$_SESSION['id_dependencia_v3']);

if ($res){

}else{
echo '<script type="text/javascript">';
echo 'alert ("Hubo errores");';
echo 'window.close();';
echo 'window.location="main.php?token=c9f0f895fb98ab9159f51fd0297e236d"; ';
echo '</script>';
}


}

?>

  <link rel="stylesheet" href="css/jquery-ui.css" />
 <script type="text/javascript" language="javascript" src="js/jquery-1.9.1.js"></script>
  <script type="text/javascript" language="javascript" src="js/jquery-ui.js"></script>



<div style="margin-left:20px; margin-right:20px;">
<h2>Datos de la Obra </h2>  <li><a href="rpts/reporte_obra.php?d=<?php echo $_GET['d'] ?>" target="_blank"><img src="imagenes/printer24x24.png" width="24" height="24" align="middle">Imprimir</a></li>
<div id="cuadro_info">


 <hr />
<table width="90%" border="0" align="center" cellspacing="0" cellpadding="0">
  <tr>
    <td  colspan="2"><b>Dependencia:</b></td>
    <td " colspan="2"><?php echo $res['nom_dep'];?></td>
    <td colspan="2"><b>Sector:</b></td>
    <td colspan="2"><?php echo $res['id_sector'];?></td>
    <td colspan="2"><?php echo " ".utf8_encode($res['sector']);?></td>

  </tr>
  </table>
   <hr />
<table width="90%" border="0" align="center" cellspacing="0" cellpadding="0">
  <tr>
    <td  colspan="2"><b>Clave de la Obra:</b>  </td>
    <td  colspan="2"><?php echo $res['obra'];?></td>
    <td  colspan="2"><b>Obra:</b> </td>
    <td  colspan="4"><?php echo ($res['nom_obra']);?></td>
     </tr>
     </table>
      <hr />
<table width="90%" border="0" align="center" cellspacing="0" cellpadding="0">
  <tr>
    <td colspan="2"> <b>Proyecto:	 </b>
	<td colspan="8"><?php echo utf8_encode($res['nom_proy']);?></td></td>
     </tr>
  <tr>
  </table>
   <hr />

   <table width="90%" border="0" align="center" cellspacing="0" cellpadding="0">
  <tr>
    <td colspan="2"> <b>Origen:	 </b>
	<td colspan="8"><?php echo utf8_encode($res['nom_origen']);?></td></td>
     </tr>
  <tr>
  </table>
   <hr />
<table width="90%" border="0" align="center" cellspacing="0" cellpadding="0">
    <td colspan="2"><b>Eje: </b></td>
    <td colspan="2"><?php echo utf8_encode($res['eje']);?></td>
    <td colspan="2"><b>L&iacute;nea: </b></td>
      <td colspan="4"><?php echo utf8_encode($res['nom_linea']);?></td>

  </tr>
  </table>
   <hr />
   <table width="90%" border="0" align="center" cellspacing="0" cellpadding="0">
    <td colspan="2" ><b>Estrategia:</b></td>
    <td colspan="8"><?php echo utf8_encode($res['nom_estr']);?></td>

  </tr>
  </table>
   <hr />
<table width="90%" border="0" align="center" cellspacing="0" cellpadding="0">
  <tr>
    <td><b>Municipio: </b></td>
    <td ><?php echo ($res['id_finanzas']);?></td>
    <td ><?php echo utf8_encode($res['nom_mun']);?></td>
      <td><b>Localidad: </b></td>
	  <?php


	//  echo "SELECT * FROM municipios where id_finanzas=".$res['municipio'];
 $consulta_munz = mysql_query("SELECT * FROM municipios where id_finanzas=".$res['municipio'] ,$siplan_data_conn) or die (mysql_error());
			   $res_munz = mysql_fetch_array($consulta_munz);

//echo "SELECT * FROM localidades WHERE id_municipio =".$res_munz['id_municipio']." and id_finanzas=".$res['localidad'];

 $consulta_loc = mysql_query("SELECT * FROM localidades WHERE id_municipio =".$res_munz['id_municipio']." and id_finanzas=".$res['localidad'] ,$siplan_data_conn) or die (mysql_error());
  $res_loc = mysql_fetch_array($consulta_loc);

 /* while($res_loc = mysql_fetch_array($consulta_loc)){
			if ($res['localidad']==$res_loc['id_finanzas']){
			  echo "<option value=\"".$res_loc['id_localidad']."\" selected='selected'> ".utf8_encode($res_loc['nombre'])."</option>";
			}else{
			          echo "<option value=\"".$res_loc['id_localidad']."\"> ".utf8_encode($res_loc['nombre'])."</option>";
					  }

            }*/
	  ?>

    <td ><?php echo ($res_loc['id_finanzas']);?></td>
    <td ><?php echo utf8_encode($res_loc['nombre']);?></td>
      <td><b>Regi&oacute;n: </b></td>
    <td ><?php echo ($res['id_region']);?></td>
    <td  colspan="2" ><?php echo utf8_encode($res['nom_reg']);?></td>
     </tr>
     </table>
      <hr />
<table width="90%" border="0" align="center" cellspacing="0" cellpadding="0">

    <?php if ($res['modalidad']=='1'){
	  $v1='Administraci&oacute;n';}
	  if ($res['modalidad']=='2'){
	  $v1='Contrato';}
	  if ($res['modalidad']=='3'){
	  $v1='Mixto';}
	  ?>

	   <?php if ($res['retencion']=='1'){
	  $r1='Ninguna';}
	  if ($res['retencion']=='2'){
	  $r1='Al millar';}
	  if ($res['retencion']=='3'){
	  $r1='5 al millar';}
	    if ($res['retencion']=='4'){
	  $r1='1 y 5 al millar';}
	  ?>

  <tr>
    <td><b>Modalidad: </b></td>
    <td colspan="2" ><?php echo ($v1);?></td>
     <td><b>Retenci&oacute;n: </b></td>
    <td colspan="2" ><?php echo ($r1);?></td>
     <td><b>Ben H: </b></td>
    <td ><?php echo number_format($res['ben_h']);?></td>
     <td><b>Ben M: </b></td>
    <td ><?php echo number_format($res['ben_m']);?></td>
      </tr>
    </table>
     <hr />
<table width="90%" border="0" align="center" cellspacing="0" cellpadding="0">
      <tr>
    <td><b>Cantidad: </b></td>
    <td ><?php echo number_format($res['cantidad'],2);?></td>
      <td><b>Unidad de Medida: </b></td>
    <td colspan="3" ><?php echo utf8_encode($res['nom_med']);?></td>
      <td><b>Fecha inicio: </b></td>
    <td ><?php echo $f->fechames($res['fecha_inicio']);?></td>
      <td><b>Fecha fin: </b></td>
    <td ><?php echo $f->fechames($res['fecha_fin']);?></td>
      </tr>
      </table>
       <hr />
<table width="90%" border="0" align="center" cellspacing="0" cellpadding="0">
        <tr>
    <td colspan="2"><b>Programa: </b></td>
    <td colspan="3" ><?php echo utf8_encode($res['cvprg']." ".$res['nom_ppoa']);?></td>
     <td colspan="2"><b>Subprograma: </b></td>
    <td colspan="3" ><?php echo utf8_encode($res['cvsprg']." ".$res['sppoa']);?></td>
      </tr>

</table>

     <hr />




	 <h3><p>Aportes Programado</p></h3>

<table width="80%" align="center" border="1" cellspacing="0" cellpadding="2">
      <tr>
        <td width="15%"><b>Aporte Federal</b></td>
      <td >  <?php echo "$ ".number_format($res['federal'],2);?></td>
        <td width="21%"><b>Aporte Participaciones</b></td>
     <td>    <?php echo "$ ".number_format($res['paticipantes'],2);?></td>
      </tr>
      <tr>
        <td><b>Aporte Estatal</b></td>
    <td>   <?php echo "$ ".number_format($res['estatal'],2);?></td>
        <td><b>Aporte Cr&eacutedito</b></td>
	<td>	<?php echo "$ ".number_format($res['credito'],2);?></td>

      </tr>
      <tr>
        <td><b>Aporte Municipal</b></td>
      <td>  <?php echo "$ ".number_format($res['municipal'],2);?></td>
        <td><b>Aporte Otros</b></td>
      <td> <?php echo "$ ".number_format($res['otros'],2);?></td>
      </tr>
    </table>

  <br>
   <div align="center" ><h3>Total Programado: <?php echo "$ ".number_format(($res['federal']+$res['estatal']+$res['paticipantes']+$res['credito']+$res['municipal']+$res['otros']),2); ?></h3> </div>






<p>&nbsp;</p>
<p>
</div></div>
