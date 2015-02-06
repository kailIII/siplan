<?php
include('classes/c_obra.php');
include('classes/c_funciones.php');
$c=new obras;
$f=new funciones;

$c->entro();

if ($_GET['id_obra']!=""){
if ($_SESSION['id_perfil_v3']==1){
$val=$c->rechazar_obra($_GET['id_obra']);

if ($val==1){

echo '<script type="text/javascript">';
echo 'alert ("Se ha Rechazado correctamente la Obra");';
echo 'window.location="main.php?token=33e75ff09dd601bbe69f351039152189"; ';
echo '</script>';


}else{
echo '<script type="text/javascript">';
echo 'alert ("No se Pudo Rechazado la Obra, Hubo errores");';
echo 'window.location="main.php?token=33e75ff09dd601bbe69f351039152189"; ';
echo '</script>';
}
}else{
echo '<script type="text/javascript">';
echo 'alert ("No se Pudo Rechazado la Obra, Hubo errores");';
echo 'window.location="main.php?token=33e75ff09dd601bbe69f351039152189"; ';
echo '</script>';
}
}

if ($_GET['id_obra_a']!=""){
if ($_SESSION['id_perfil_v3']==3){
$val=$c->aprobar_obra_upla($_GET['id_obra_a']);

if ($val==1){

echo '<script type="text/javascript">';
echo 'alert ("Se Aprobo correctamente la Obra");';
echo 'window.location="main.php?token=33e75ff09dd601bbe69f351039152189"; ';
echo '</script>';

}
else{
echo '<script type="text/javascript">';
echo 'alert ("No Aprobo la Obra, Hubo errores");';
echo 'window.location="main.php?token=33e75ff09dd601bbe69f351039152189"; ';
echo '</script>';
}
}else{
echo '<script type="text/javascript">';
echo 'alert ("No Aprobo la Obra, Hubo errores");';
echo 'window.location="main.php?token=33e75ff09dd601bbe69f351039152189"; ';
echo '</script>';
}
}
include('classes/c_periodo.php');
$pe=new periodo;

date_default_timezone_set('America/Mexico_City');

if ($_POST['dtpini']!="" and ($_POST['dtpfin'])!=""){

$fecha_inicial=strtotime($_POST['dtpini']);
$fecha_terminal = strtotime($_POST['dtpfin']);

if($fecha_terminal >= $fecha_inicial){

if ($_POST['dtpini']!="" and $_POST['dtpfin']!=""){


$valo=$pe->act_periodo($_POST['dtpini'],$_POST['dtpfin']);


if ($valo==1){

echo '<script type="text/javascript">';
echo 'window.location="main.php?token=33e75ff09dd601bbe69f351039152189";';
echo '</script>';


}else{
echo '<script type="text/javascript">';
echo 'alert ("Hubo un Error no se Actualizo");';
echo 'window.location="main.php?token=33e75ff09dd601bbe69f351039152189";';
echo '</script>';
}
}

}else{
echo '<script type="text/javascript">';
echo 'alert ("Verifique las Fechas");';

echo '</script>';

}
}

?>
<script type="text/javascript">
<!--



function confirmDelete(delUrl) {
   if (confirm("Esta Obra sera rechazada y dejara de estar en el POA, desea rechazarla?")) {
     document.location = delUrl;
   }
 }

 //-->
</script>

<script  language="JavaScript" type="text/javascript">
 function mostrar_obras()
 {document.obra.submit();


 }




 function objetoAjax(){
        var xmlhttp=false;
        try {
                xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
        } catch (e) {
                try {
                   xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                } catch (E) {
                        xmlhttp = false;
                }
        }

        if (!xmlhttp && typeof XMLHttpRequest!='undefined') {
                xmlhttp = new XMLHttpRequest();
        }
        return xmlhttp;
}



 </script>

 <style type="text/css" title="currentStyle">
			@import "media/css/demo_page.css";
			@import "media/css/demo_table.css";
</style>

<script type="text/javascript" language="javascript" src="media/js/jquery.js"></script>
<script type="text/javascript" language="javascript" src="media/js/jquery.dataTables.js"></script>

<script type="text/javascript" charset="utf-8">
			$(document).ready(function() {
				$('#example1').dataTable({


				  "iDisplayLength": -1,

        "oLanguage": {
           "sLengthMenu": 'Mostrar <select>'+
            '<option value="10">10</option>'+
            '<option value="25">25</option>'+
			'<option value="50">50</option>'+
			'<option value="100">100</option>'+
            '<option value="-1">Todos</option>'+
            '</select> registros por pagina',
            "sZeroRecords": "No se encontro nada",
            "sInfo": "Mostrando _START_ a _END_ de _TOTAL_ registros",
            "sInfoEmpty": "Mostrando 0 a 0 de 0 registros",
            "sSearch": "Buscar",
            "sInfoFiltered": "(filtrado de _MAX_ registros totales)"

        }
    });
			} );
</script>
 <script type="text/javascript" charset="utf-8">

  $(function() {
    $( "#dtpini" ).datepicker();
  });

    $(function() {
    $( "#dtpfin" ).datepicker();
  });

  </script>
<script type="text/javascript" charset="utf-8">
<!-- Begin
function mostrarp(){

document.getElementById('periodo').style.display='block';
document.getElementById('a').style.display='block';
document.getElementById('b').style.display='none';
}

function mostrarc(){
document.getElementById('periodo').style.display='none';
document.getElementById('a').style.display='none';
document.getElementById('b').style.display='block';
}



// End -->
</script>

<link rel="stylesheet" href="css/jquery-ui.css" />

  <script type="text/javascript" language="javascript" src="js/jquery-ui.js"></script>
<div style="margin-left:20px; margin-right:20px; margin-bottom:20px;">
<h2>POA Obras <br /> <img id="b" src="imagenes/calendar.gif" title="Mostrar Per&iacute;odo" onclick="mostrarp();"/>
<img id="a" style="display:none;" src="imagenes/close.jpg" title="Ocultar Per&iacute;odo" onclick="mostrarc();"/></h2>


<div id="periodo" style="display:none;" >
 <div id="form_container" align="left">

	<form id="form_pe" name="form_pe" class="appnitro"  method="post" >
<h3>Per&iacute;odo Captura de Obras </h3>

<p>Fecha de Inici&oacute;: <input type="text" id="dtpini"  name="dtpini" value="<?php echo $pe->per_ini();?>"  size="12" maxlength="12" readonly="readonly"/></p>
<p>Fecha de Fin: <input type="text" id="dtpfin" name="dtpfin"  value="<?php echo $pe->per_fin();?>" size="12" maxlength="12" readonly="readonly" /></p>

<input id="btn_save"  type="submit" name="btn_save" value="Actualizar" />

 	</form>
	</div>
</div>
<div id="cuadro_info">

<div id="container" class="ex_highlight_row">
<ul id="botones">
   <?php
$res_ini = mysql_query("select * from configuracion where id_configuracion='cap_obras/per_ini'",$siplan_data_conn) or die (mysql_error());
$ms_ini=mysql_fetch_array($res_ini);

$res_fin = mysql_query("select * from configuracion where id_configuracion='cap_obras/per_fin'",$siplan_data_conn) or die (mysql_error());
$ms_fin=mysql_fetch_array($res_fin);

date_default_timezone_set('America/Mexico_City');

$fecha_actual = strtotime(date("d-m-Y"));
$fecha_inicial=strtotime($ms_ini['valor']);
$fecha_terminal = strtotime($ms_fin['valor']);


if($fecha_actual >= $fecha_inicial and $fecha_actual <= $fecha_terminal  or $_SESSION['extraordinario_v3']==1 ){
?>



    <li><a href="main.php?token=<?php print(md5(29));?>"><img src="imagenes/agregar.png" width="24" height="24" align="middle">Agregar Obra</a></li>

    <?php }else{
		?>
 <li style=" background-color:#CCC"><a  style=" background-color:#CCC; border:#666; color:#000;  pointer-events: none;
   cursor: default;"><img src="imagenes/agregar_disable.png" width="24" height="24" align="middle">Agregar Obra</a></li>
	<?php }  if ($_POST['proyecto']!="" ){
$p="?p=".$_POST['proyecto'];

	}



 if ($_POST['chkapro']!="" and strlen($p)==0 ){
$s="?s=".$_POST['chkapro'];

	}elseif ($_POST['chkapro']>0 and strlen($p)>0){
	$s="&s=".$_POST['chkapro'];
	}
	?>
    <li><a href="rpts/reporte_obras_gral.php<?php echo $p.$s ?>" target="_blank"><img src="imagenes/printer24x24.png" width="24" height="24" align="middle">Imprimir</a></li>
    <li><a href="rpts/reporte_obras_xls.php<?php echo $p.$s ?>" target="_blank"><img src="imagenes/excel24x24.png" width="24" height="24" align="middle">Exportar XLS</a></li>
</ul>
<hr>
<form id="obra" name="obra" method="post" action="" onsubmit="" >
 <b>Seleccione proyecto:</b>

     <select name="proyecto" id="proyecto"  onchange="mostrar_obras()">
        <option value="" >-seleccione-</option>
		 <option value="0">--Mostrar todas las obras--</option>
        <?php

	  $res_proy = mysql_query("SELECT * FROM proyectos WHERE id_dependencia = ".$_SESSION['id_dependencia_v3']." order by no_proyecto asc",$siplan_data_conn)or die(mysql_error());

	  while($res_cons_proy = mysql_fetch_array($res_proy)){


	  	if ($_POST['proyecto']==$res_cons_proy['id_proyecto']){
				   echo "<option value=\"".$res_cons_proy['id_proyecto']."\" selected='selected'> ".$res_cons_proy['no_proyecto']."-".($res_cons_proy['nombre'])."</option>";
				}


				else{
                echo "<option value=\"".$res_cons_proy['id_proyecto']."\"> ".$res_cons_proy['no_proyecto']."-".($res_cons_proy['nombre'])."</option>";
               }

	}?>

      </select>
	  <b>Estado</b>
	   <select name="chkapro" id="chkapro"  onchange="mostrar_obras()">

		<?php if ($_POST['chkapro']==""){?>
		 <option value="" selected="selected">--Mostrar todas--</option>
		 <?php }else{?>
		  <option value="">--Mostrar todas las obras--</option>
		  <?php }?>

		 <?php if ($_POST['chkapro']=="1"){?>
		  <option value="1" selected="selected">Sin Aprobar</option>
		 <?php }else{?>
		  <option value="1">Sin Aprobar</option>
		  <?php }?>
		  <?php if ($_POST['chkapro']=="2"){?>
		   <option value="2" selected="selected">Aprob. Dependencia</option>
		   <?php }else{?>
		    <option value="2">Aprob. Dependencia</option>
		  <?php }?>

		  <?php if ($_POST['chkapro']=="3"){?>
		  <option value="3" selected="selected">Aprob. UPLA</option>
		 <?php }else{?>
		  <option value="3">Aprob. UPLA</option>
		  <?php }?>
		  <?php if ($_POST['chkapro']=="4"){?>
		   <option value="4" selected="selected">Con Oficio de Ejec.</option>
		   <?php }else{?>
		    <option value="4">Con Oficio de Ejec.</option>
		  <?php }?>

      </select>

	<!-- <b>Aprob. Dependencia</b>	<input id="chkapro" name="chkapro"  type="checkbox" value="2" onchange="mostrar_obras()" <?php if ($_POST['chkapro']=="2"){ echo 'checked="checked"';} ?> /> -->


 </form>




<hr>
<div id="obras" >
<div id="container" class="ex_highlight_row">
<div id="demo">
<table width="100%" cellpadding="0" cellspacing="0" border="0" class="display" id="example1">
 <thead>
    <tr>
	   <td width="5%"><div align="center"><b>No. Proy.</b> </div></td>
     <td width="5%"><div align="center"><b>No. Obra</b> </div></td>
   <td width="5%"><div align="center"><b>Prio.</b> </div></td>
	 <td width="27%"><div align="center"><b>Descripci&oacute;n</b></div></td>
	<td width="5%"><div align="center"> <b>Municipio</b></div></td>
	<td width="9%"><div align="center"><b>Origen</b></div></td>
	<td width="10%"><div align="center"><b>Estatus</b></div></td>

	<td width="3%"><div align="center"><b>Info.</b></div></td>
	<td width="5%"><div align="center"><b>Aprobar</b></div></td>
	<td width="5%"><div align="center"><b>Editar</b></div></td>
	<td width="5%"><div align="center"><b>Rechazar</b></div></td>
  </tr>
  </thead>
  <tbody>
  <?php
  $i=0;
    //$consulta_obras = mysql_query("SELECT * FROM obras WHERE id_dependencia= ".$_SESSION['id_dependencia_v3'] ,$siplan_data_conn)or die (mysql_error());


	  if ($_POST['proyecto']=="0" or $_POST['proyecto']=="" ){
	if ($_POST['chkapro']!=""){
	 $consulta_obras = mysql_query("SELECT * FROM obras WHERE id_dependencia= ".$_SESSION['id_dependencia_v3']." and status_obra=".$_POST['chkapro']." order by id_proyecto, consxdep asc " ,$siplan_data_conn)or die (mysql_error());
	}
	else{
   $consulta_obras = mysql_query("SELECT * FROM obras WHERE id_dependencia= ".$_SESSION['id_dependencia_v3']." order by id_proyecto, consxdep asc " ,$siplan_data_conn)or die (mysql_error());
   }
  }else{

  if ($_POST['chkapro']!=""){
    $consulta_obras = mysql_query("SELECT * FROM obras WHERE id_dependencia= ".$_SESSION['id_dependencia_v3']. " and id_proyecto=".$_POST['proyecto']." and status_obra=".$_POST['chkapro']." order by id_proyecto, consxdep asc " ,$siplan_data_conn)or die (mysql_error());
  }else{
    $consulta_obras = mysql_query("SELECT * FROM obras WHERE id_dependencia= ".$_SESSION['id_dependencia_v3']. " and id_proyecto=".$_POST['proyecto']." order by id_proyecto, consxdep asc " ,$siplan_data_conn)or die (mysql_error());
	}

	}

    while ($resobras = mysql_fetch_assoc($consulta_obras)) {
	  $id_obra= $resobras['id_obra'];
	  $i++;

	  switch ($resobras['status_obra']){
		   case 1:
		   $status = "Sin Aprobar";
		   $css_color = "gradeX";
		   break;
		   case 2:
		   $status = "Aprob. Dependencia";
		   $css_color = "gradeB";
		   break;
		   case 3:
		   $status = "Aprob. UPLA";
		   $css_color = "gradeA";
		   break;
		    case 4:
		   $status = "Con Oficio de Ejec.";
		   $css_color = "gradeA";
		   break;
	   }

	     $consulta_proy = mysql_query("SELECT * FROM proyectos WHERE id_proyecto= ".$resobras['id_proyecto'] ,$siplan_data_conn)or die (mysql_error());

	   $res_proy = mysql_fetch_assoc($consulta_proy);

	  if ($resobras['status_obra']<="1" or $resobras['status_obra']>="4" ){
	  $ds='style=" pointer-events: none;
   cursor: default;"';
	  }else{
	  $ds="";
	  }
  ?>
 <tr class="<?php echo $css_color; ?>">
   <td><?php echo $res_proy['no_proyecto']; ?></td>
    <td><?php echo $resobras['consxdep']; ?></td>
<td><?php echo $resobras['prioridad']; ?></td>
	<td><?php echo $resobras['descripcion']; ?></td>
    <td> <?php echo ($f->sac_mun($resobras['municipio'])); ?></td>

    <td><div align="center"><?php echo $resobras['origen']." ".utf8_encode($f->sac_org($resobras['origen'])); ?></div></td>
    <td><div align="center"><?php echo $status; ?></div></td>

    <td valign="middle"><div align="center"><a href="rpts/mostrar_obra.php?d=<?php echo $id_obra;?>" TARGET="_blank"><img src="imagenes/info.png" width="24" height="24" title="Informaci&oacute;n"></a></div></td>
    <td valign="middle"><div align="center"><a <?php echo $ds; ?> href="main.php?token=<?php print(md5(28));?>&id_obra_a=<?php echo $id_obra;?>">
	<?php if ($resobras['status_obra']=="2"){ ?>
	<img src="imagenes/ok.png" width="24" height="24" title="Aprobar">
	<?php } elseif($resobras['status_obra']<="1" or $resobras['status_obra']>="3"){ ?>
	<img src="imagenes/ok_disabled.png" width="24" height="24">
	<?php }?>
	</a></div></td>



    <td valign="middle"><div align="center">
	<a <?php echo $ds; ?> href="main.php?token=<?php print(md5(31));?>&id_obra=<?php echo $id_obra;?>">
	<?php if ($resobras['status_obra']=="3"){ ?>
	<img src="imagenes/pencil_edit24x24.png" width="24" height="24" title="Editar">
	<?php } elseif($resobras['status_obra']<="1" or $resobras['status_obra']>="4"){ ?>
	<img src="imagenes/pencil_edit24x24_disable.png" width="24" height="24">
	<?php }?>

	</a></div></td>



    <td valign="middle"><div align="center">
	<a <?php echo $ds; ?> href=javascript:confirmDelete('main.php?token=<?php print(md5(28));?>&id_obra=<?php echo $id_obra."')";?> >
	<?php if ($resobras['status_obra']=="3"){ ?>
	<img src="imagenes/close_delete_2.png" width="24" height="24" title="Rechazar">
	<?php } elseif($resobras['status_obra']<="1" or $resobras['status_obra']>="4"){ ?>
	<img src="imagenes/close_delete_disable.png" width="24" height="24" title="Rechazar">
	<?php }?>
	</a></div></td>


 </tr>
    <?php } ?>
    </tbody>
    <tfoot>
      <tr>
	   <td width="5%"><div align="center">No. Proy.</div></td>
      <td width="5%"><div align="center">No. Obra</div></td>
   <td width="5%"><div align="center"><b>Prio.</b> </div></td>
	   	<td width="27%"><div align="center">Descripci&oacute;n</div></td>
	<td width="5%"><div align="center"> Municipio</div></td>
	<td width="9%"><div align="center">Origen</div></td>
	<td width="10%"><div align="center">Estatus</div></td>
	<td width="3%"><div align="center">Info.</div></td>
	<td width="5%"><div align="center">Aprobar</div></td>
	<td width="5%"><div align="center">Editar</div></td>
	<td width="5%"><div align="center">Rechazar</div></td>
  </tr>
  </tfoot>
  </table>
  </div></div>

 </div>
 </div>

  <p>&nbsp;</p>
</div>
</div>
