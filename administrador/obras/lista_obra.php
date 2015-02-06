<?php
include('classes/c_obra.php');
include('classes/c_funciones.php');
$c=new obras;
$f=new funciones;

$c->entro();

if ($_GET['id_obra']!=""){
if ($_SESSION['id_perfil_v3']==3){
$val=$c->rechazar_obra_dep($_GET['id_obra']);

if ($val==1){

echo '<script type="text/javascript">';
echo 'alert ("Se ha Rechazado correctamente la Obra");';
echo 'window.location="main.php?token=6364d3f0f495b6ab9dcf8d3b5c6e0b01"; ';
echo '</script>';


}else{
echo '<script type="text/javascript">';
echo 'alert ("No se Pudo Rechazado la Obra, Hubo errores");';
echo 'window.location="main.php?token=6364d3f0f495b6ab9dcf8d3b5c6e0b01"; ';
echo '</script>';
}
}else{
echo '<script type="text/javascript">';
echo 'alert ("No se Pudo Rechazado la Obra, Hubo errores");';
echo 'window.location="main.php?token=6364d3f0f495b6ab9dcf8d3b5c6e0b01"; ';
echo '</script>';
}
}

if ($_GET['id_obra_a']!=""){
if ($_SESSION['id_perfil_v3']==3){
$val=$c->aprobar_obra($_GET['id_obra_a']);

$val1=substr($val,0,1);
$cve=substr($val,1);
if ($val1==1){

echo '<script type="text/javascript">';
echo 'alert ("Se Aprobo correctamente la Obra para Oficio, con Clave de Obra: '.$cve.'");';
echo 'window.location="main.php?token=6364d3f0f495b6ab9dcf8d3b5c6e0b01"; ';
echo '</script>';
}
else{
echo '<script type="text/javascript">';
echo 'alert ("No Aprobo la Obra para Oficio, Hubo errores");';
echo 'window.location="main.php?token=6364d3f0f495b6ab9dcf8d3b5c6e0b01"; ';
echo '</script>';
}
}else{
echo '<script type="text/javascript">';
echo 'alert ("No Aprobo la Obra para Oficio, Hubo errores");';
echo 'window.location="main.php?token=6364d3f0f495b6ab9dcf8d3b5c6e0b01"; ';
echo '</script>';
}
}
?>
<script type="text/javascript">
<!--



function confirmDelete(delUrl) {
   if (confirm("Estas Seguro que Quieres Rechazarlo?")) {
     document.location = delUrl;
   }
 }

 function sel() {
  alert("Selecciona un Proyecto");
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

.porto {
display: inline;
float: left;
list-style: none outside none;

}
.porto li {
display: inline;
float: left;
float: left;
margin-left: 30px;
margin-right: 10px
}
.pop_m{
background: rgba(0, 0, 0, 0.5);/*semi transparencia*/
display: none;
height: 100%;
left: 0;
overflow: hidden;
position: fixed;
top: 0;
width: 100%;
z-index: 9999
}
.pop_contenido{
	margin-top: 100px;
	z-index: 9999;

/*height: 300px;
left: 15%;
margin-left: -175px;
margin-top: -150px;
position: fixed;
top: 50%;
width: 80%;
z-index: 9999*/
}
.pop_m p{
color: #FFFFFF;
text-align: center;
text-shadow: 0 1px 0 #444444
}
.pop_contenido img{

}
a.cerrar{
color: #fff;
cursor: pointer;
display: inline;
float: right;
font-size: 1.em;
margin-right:40px;
}
</style>

<script type="text/javascript" language="javascript" src="media/js/jquery.js"></script>
<script type="text/javascript" language="javascript" src="media/js/jquery.dataTables.js"></script>
<script type="text/javascript" >
$(document).ready(function () {
$('.porto a').click(function (event) {
$(this).next('div').css({
display: 'block'
});
event.preventDefault();
});


$('.porto a.cerrar').click(function (event) {
$('div.pop_m').css({
display: 'none'
});
event.preventDefault();
});


$('.porto a.print').click(function (event) {

window.open($(this).attr("href"));


event.preventDefault();
});



});

function closes (){
	$('div.pop_m').css({
display: 'none'
});
//event.preventDefault();
	}
</script>

<script type="text/javascript" charset="utf-8">
			$(document).ready(function() {
				$('#example2').dataTable({


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
 <link rel="stylesheet" href="css/jquery-ui.css" />
<div style="margin-left:20px; margin-right:20px; margin-bottom:20px;">
<h2>Inversi&oacute;n</h2>
<div id="cuadro_info">

<div id="container" class="ex_highlight_row">
<ul id="botones">
   	<?php  if ($_POST['proyecto']!="" ){
$p="?p=".$_POST['proyecto'];

	}



 if ($_POST['chkapro']!="" and strlen($p)==0 ){
$s="?s=".$_POST['chkapro'];

	}elseif (strlen($_POST['chkapro'])>0 and strlen($p)>0){
	$s="&s=".$_POST['chkapro'];
	}
	?>
    <li>
    <?php if ($p!="0" and $p!=""){ ?>
    <a href="rpts/reporte_obra_inv.php<?php echo $p.$s ?>" target="_blank"><img src="imagenes/printer24x24.png" width="24" height="24" align="middle">Reporte de Inversi&oacute;n y Disponible Imprimir</a>
    <?php }else{?>
    <a href="#" onclick="sel();" ><img src="imagenes/printer24x24.png" width="24" height="24" align="middle">Reporte de Inversi&oacute;n y Disponible Imprimir</a>
     <?php }?>
    </li>
    <li>
      <?php if ($p!="0" and $p!=""){ ?>
    <a href="rpts/reporte_obra_inv_xls.php<?php echo $p.$s ?>" target="_blank"><img src="imagenes/excel24x24.png" width="24" height="24" align="middle">Reporte de Inversi&oacute;n y Disponible Exportar XLS</a>
    <?php }else{?>
      <a href="#" onclick="sel();" ><img src="imagenes/excel24x24.png" width="24" height="24" align="middle">Reporte de Inversi&oacute;n y Disponible Exportar XLS</a>
     <?php }?>
    </li>
	<li><a href="rpts/reporte_obras_gral.php<?php if ($p==""){ echo "?s=3"; }else{ echo $p."&s=3";}  ?>" target="_blank"><img src="imagenes/printer24x24.png" width="24" height="24" align="middle">Reporte General Imprimir</a></li>
    <li><a href="rpts/reporte_obras_xls.php<?php if ($p==""){ echo "?s=3"; }else{ echo $p."&s=3";}   ?>" target="_blank"><img src="imagenes/excel24x24.png" width="24" height="24" align="middle">Reporte General Exportar XLS</a></li>
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
				     $f_p=$res_cons_proy['id_proyecto'];
				}


				else{
                echo "<option value=\"".$res_cons_proy['id_proyecto']."\"> ".$res_cons_proy['no_proyecto']."-".($res_cons_proy['nombre'])."</option>";
               }

	}?>

      </select>

 <b>Seleccione componente y accion: <?php  ?></b>
   <select name="chkapro" id="chkapro" onchange="mostrar_obras()">

  	<?php

  		if($_POST['proyecto']!=0){

			if($_POST['proyecto']!=""){



	  		$consulta_num_pca = mysql_query("SELECT * FROM estados_financieros where s02c_depend = ".$_SESSION['id_dependencia_v3'] ." AND s06c_proyec = ".$f->sac_noproyecto( $_POST['proyecto'])." GROUP BY s11c_compon, s25c_accion",$siplan_data_conn) or die (mysql_error());
		  //	$b=1;
		  	echo "<option value = >--General--</option>";
			while($res_pca = mysql_fetch_array($consulta_num_pca)){
			//	$arreglo[]=$res_pca['s06c_proyec']."/".$res_pca['s11c_compon']."/".$res_pca['s25c_accion'];

				if ($_POST['chkapro']==$res_pca['s11c_compon']."-".$res_pca['s25c_accion']){
					echo "<option value=".$res_pca['s11c_compon']."-".$res_pca['s25c_accion']."  selected='selected'>".$res_pca['s11c_compon']."-".$res_pca['s25c_accion']."</option>";


				}

				else{
				echo "<option value=".$res_pca['s11c_compon']."-".$res_pca['s25c_accion'].">".$res_pca['s11c_compon']."-".$res_pca['s25c_accion']."</option>";
				}
			//	$b=$b+1;
			}
			}
  		}
  	?>
  </select>



 </form>




<hr>
<div id="obras" >
<div id="container" class="ex_highlight_row">
<div id="demo">
<table width="100%" cellpadding="0" cellspacing="0" border="0" class="display" id="example2">
 <thead>
    <tr>
	   <td width="3%"><div align="center"><b>No. Proy.</b> </div></td>
     <td width="3%"><div align="center"><b>No. Obra</b> </div></td>
       <td width="5%"><div align="center"><b>Clave</b> </div></td>
         <td width="5%"><div align="center"><b>Oficio de Ejecuci&oacute;n</b> </div></td>
 <td width="3%"><div align="center"><b>Prio.</b> </div></td>
	 <td width="27%"><div align="center"><b>Descripci&oacute;n</b></div></td>
   <td width="3%"><div align="center"><b>Exp.</b></div></td>
	 	<td width="3%"><div align="center"><b>Info.</b></div></td>
	 <td width="5%"><div align="center"><b>Origen</b></div></td>

	<td width="5%"><div align="center"><b>Ap. Oficio</b></div></td>
	<td width="5%"><div align="center"><b>Editar</b></div></td>
	<td width="5%"><div align="center"><b>Rechazar</b></div></td>
  </tr>
  </thead>
  <tbody>
  <?php
  $i=0;
    //$consulta_obras = mysql_query("SELECT * FROM obras WHERE id_dependencia= ".$_SESSION['id_dependencia_v3'] ,$siplan_data_conn)or die (mysql_error());


	  if ($_POST['proyecto']=="0" or $_POST['proyecto']=="" ){

	 $consulta_obras = mysql_query("SELECT * FROM obras WHERE id_dependencia= ".$_SESSION['id_dependencia_v3']." and status_obra>='3' order by id_proyecto, consxdep asc " ,$siplan_data_conn)or die (mysql_error());

  }else{


    $consulta_obras = mysql_query("SELECT * FROM obras WHERE id_dependencia= ".$_SESSION['id_dependencia_v3']. " and id_proyecto=".$_POST['proyecto']." and status_obra>='3' order by id_proyecto, consxdep asc " ,$siplan_data_conn)or die (mysql_error());


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


	     $consulta_comp = mysql_query("SELECT * FROM poa02_origen WHERE id_proyecto= ".$resobras['id_proyecto']." and id_obra=".$id_obra ,$siplan_data_conn)or die (mysql_error());

	   $res_comp = mysql_fetch_assoc($consulta_comp);



	  if ( $resobras['status_obra']>="4" ){
	  $ds='style=" pointer-events: none;
   cursor: default;"';
	  }else{
	  $ds="";
	  }


 if ($resobras['obra']!=""){
	    $consulta_ofi = mysql_query("SELECT
oficio_aprobacion.no_oficio,
obras.obra,
oficio_aprobacion.tipo
FROM
oficio_aprobacion
INNER JOIN detalle_oficio ON detalle_oficio.id_oficio = oficio_aprobacion.id_oficio
INNER JOIN obras ON obras.id_proyecto = detalle_oficio.id_proyecto AND obras.id_obra = detalle_oficio.id_poa02 where obras.obra=".$resobras['obra']." and oficio_aprobacion.tipo='0'" ,$siplan_data_conn)or die (mysql_error());

	   $res_ofi = mysql_fetch_assoc($consulta_ofi);
	  }
  ?>
 <tr class="<?php echo $css_color; ?>">
   <td><?php echo $res_proy['no_proyecto']; ?></td>
    <td><?php echo $resobras['consxdep']; ?></td>
     <td><?php echo $resobras['obra']; ?></td>
      <td><?php if ($resobras['obra']!=""){ echo  $res_ofi['no_oficio'];}  ?></td>
<td><?php echo $resobras['prioridad']; ?></td>
	<td><?php echo $resobras['descripcion']; ?></td>

    <?php

$con_o="SELECT  status_pdf from pdf where id_obra=".$resobras['id_obra']." order by fecha_hora_pdf desc, id_pdf desc limit 1";

  $consulta_obr=mysql_query($con_o);
  $resobr = mysql_fetch_array($consulta_obr);
	$imgt=$resobr['status_pdf'];
	switch($imgt) {

		case "Rechazado" :
		$img="icon_rojo_f.png";
		break;

		case "Validado" :
		$img="icon_verde_f.png";
		break;

		case "En Revisión" :
		$img="icon_azul_f.png";
		break;

		default:
		$img="icon_ama_f.png";

	}



 ?>

    <td valign="middle" class="porto" ><div align="center">

       <a href="#"   style="text-decoration:none; color:#000"	onclick="$('#datoss_<?php echo $resobras['id_obra'];?>').load('administrador/obras/exp.php?idobra=<?php echo $resobras['id_obra'];?>');"  style="cursor: pointer;"  >
        <img src="imagenes/<?php echo $img; ?>" width="24px" height="24px" title="Expediente <?php echo $imgt; ?>"/></a>
       <div class="pop_m"><div  style="margin-top:50px; color:#FFF; font-size:1.3em; font-weight:bold"><?php ?> Expediente de la Obra: <?php echo $resobras['descripcion']; ?> </div>
<div class="pop_contenido" style="margin-top:30px">

<div id="datoss<?php echo "_".$resobras['id_obra']; ?>">
</div>

<a class="cerrar"><img src="imagenes/delete_2.png" width="24px" height="24px" title="Cerrar"  />Cerrar</a>
</div>
</div>

      </div></td>
    <td valign="middle"><div align="center"><a href="rpts/mostrar_obra_fuente.php?d=<?php echo $id_obra;?>" TARGET="_blank"><img src="imagenes/info.png" width="24" height="24" title="Informaci&oacute;n"></a></div></td>


	<td valign="middle"><div align="center">
      <?php if( $resobras['status_obra']=="3" ){ ?>
    <a href="main.php?token=<?php print(md5(34));?>&d=<?php echo $id_obra."&p=".$resobras['id_proyecto']."&f_p=".$f_p;?>" ><img src="imagenes/1.png" width="24" height="24" title="Origen del Recurso"></a>

     <?php } elseif( $resobras['status_obra']=="4" ){ ?>
  <a href="main.php?token=<?php print(md5(34));?>&d=<?php echo $id_obra."&p=".$resobras['id_proyecto']."&f_p=".$f_p;?>" ><img src="imagenes/1.png" width="24" height="24" title="Origen del Recurso"></a>
    <?php }?>
    </div></td>


	<td valign="middle">
	<?php if ($res_comp['monto']>0 and  $resobras['status_obra']=="3" and  $resobras['prioridad']>=1){ ?>
	<div align="center"><a href="main.php?token=<?php print(md5(32));?>&id_obra_a=<?php echo $id_obra;?>">

	<img src="imagenes/ok.png" width="24" height="24" title="Aprobar Oficio"></a></div>
	<?php } elseif( $res_comp['monto']<=0 or  $resobras['prioridad']<=0 ){ ?>
	<div align="center"><img src="imagenes/ok_disabled.png" width="24" height="24"></div>
    <?php } elseif( $resobras['status_obra']=="4" or  $resobras['prioridad']<=0 ){ ?>
	<div align="center"><img src="imagenes/ok_disabled.png" width="24" height="24"></div>
	<?php }?>
	</td>

    <td valign="middle"><div align="center"><a <?php ?> href="main.php?token=<?php print(md5(39));?>&id_obra=<?php echo $id_obra;?>">

	<img src="imagenes/pencil_edit24x24.png" width="24" height="24" title="Editar">

	</a></div></td>

    <td valign="middle"><div align="center">
	<?php if ($res_comp['monto']>0) {?>
		<img src="imagenes/close_delete_disable.png" width="24" height="24" title="Rechazar">
	<?php }elseif($res_comp['monto']<=0){?>

	<a <?php  ?> href=javascript:confirmDelete('main.php?token=<?php print(md5(32));?>&id_obra=<?php echo $id_obra."')";?> >
	<img src="imagenes/close_delete_2.png" width="24" height="24" title="Rechazar">
	</a>
	<?php }?>

	</div></td>
 </tr>
    <?php } ?>
    </tbody>
    <tfoot>
      <tr>
	   <td width="3%"><div align="center">No. Proy.</div></td>
      <td width="3%"><div align="center">No. Obra</div></td>
       <td width="5%"><div align="center">Clave </div></td>
         <td width="5%"><div align="center">Oficio de Aprobaci&oacute;n </div></td>
 <td width="3%"><div align="center"><b>Prio.</b> </div></td>
	   	<td width="27%"><div align="center">Descripci&oacute;n</div></td>
   <td width="3%"><div align="center">Exp.</div></td>
		<td width="3%"><div align="center">Info.</div></td>
		<td width="5%"><div align="center">Origen</div></td>

	<td width="5%"><div align="center">Ap. Oficio</div></td>
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
