<?php
include('classes/c_funciones.php');
include('classes/c_obra.php');
$c=new obras;
$f=new funciones;

$id_obra=$_GET['d'];

if ($_GET['idd']!=""){
if ($_SESSION['id_perfil_v3']==3){
$val=$c->borrar_recurso($_GET['idd'],$_GET['d'],$_GET['p']);


$id1 = $val;
	$dat1 = explode("-", $id1);
 $val1 = $dat1[0];
	$val2 = $dat1[1];
 	$val3 = $dat1[2];
	$ff_p=$_GET['fp'];



if ($val1=="1"){

echo '<script type="text/javascript">';
echo 'alert ("Se ha Borrado correctamente el Recurso");';
echo 'window.location="main.php?token=e369853df766fa44e1ed0ff613f563bd&d='.$val2.'&p='.$val3.'&f_p='.$ff_p.'"; ';
echo '</script>';


}else{
echo '<script type="text/javascript">';
echo 'alert ("No se Pudo Borrar el Recurso, Hubo errores");';
echo 'window.location="main.php?token=e369853df766fa44e1ed0ff613f563bd&d='.$val2.'&p='.$val3.'&f_p='.$ff_p.'"; ';
echo '</script>';
}
}else{
echo '<script type="text/javascript">';
echo 'alert ("No se Pudo Borrar el Recurso, Hubo errores");';
echo 'window.location="main.php?token=6364d3f0f495b6ab9dcf8d3b5c6e0b01"; ';
echo '</script>';
}
}



if ($id_obra!="" and $_SESSION['id_dependencia_v3']!=""){



$res=$c->abrir_obra($id_obra,$_SESSION['id_dependencia_v3']);

if ($res){

}else{
echo '<script type="text/javascript">';
echo 'alert ("Hubo errores");';
echo 'window.close();';
echo 'window.location="main.php?token=6364d3f0f495b6ab9dcf8d3b5c6e0b01"; ';
echo '</script>';
}


}


if ($_POST['proycompacc']!="" and $_POST['partida']!="" and $_POST['origen']!="" and $_POST['monto']!="" and $_POST['idobra']!="" and $_POST['proy']!="" ){



$val=$c->guardar_origen_recurso($_POST['proycompacc'],$_POST['partida'],$_POST['origen'],$_POST['monto'],$_POST['idobra'],$_POST['proy']);
$id1 = $val;
	$dat1 = explode("-", $id1);
	$val1 = $dat1[0];
	$val2 = $dat1[1];
	$val3 = $dat1[2];
	$ff_p=$_POST['proyecto'];
if ($val1==0){

echo '<script type="text/javascript">';
echo 'alert ("Se ha Guardado correctamente el Recurso");';
echo 'window.location="main.php?token=e369853df766fa44e1ed0ff613f563bd&d='.$val2.'&p='.$val3.'&f_p='.$ff_p.'"; ';
echo '</script>';


}elseif($val1==1){
echo '<script type="text/javascript">';
echo 'alert ("No se tiene presupuesto suficiente para la obra.");';
echo 'window.location="main.php?token=e369853df766fa44e1ed0ff613f563bd&d='.$val2.'&p='.$val3.'&f_p='.$ff_p.'"; ';
echo '</script>';
}elseif($val1==2){
echo '<script type="text/javascript">';
echo 'alert ("La partida y el origen de ese monto ya esta asignado");';
echo 'window.location="main.php?token=e369853df766fa44e1ed0ff613f563bd&d='.$val2.'&p='.$val3.'&f_p='.$ff_p.'"; ';
echo '</script>';
}

elseif($val1==2){
echo '<script type="text/javascript">';
echo 'alert ("La partida y el origen de ese monto ya esta asignado");';
echo 'window.location="main.php?token=e369853df766fa44e1ed0ff613f563bd&d='.$val2.'&p='.$val3.'&f_p='.$ff_p.'"; ';
echo '</script>';
}

elseif($val1==3){
echo '<script type="text/javascript">';
echo 'alert ("No es posible asignar la obra");';
echo 'window.location="main.php?token=e369853df766fa44e1ed0ff613f563bd&d='.$val2.'&p='.$val3.'&f_p='.$ff_p.'"; ';
echo '</script>';
}


elseif($val1==4){
echo '<script type="text/javascript">';
echo 'alert ("La partida y el origen de ese monto ya esta asignado a la obra");';
echo 'window.location="main.php?token=e369853df766fa44e1ed0ff613f563bd&d='.$val2.'&p='.$val3.'&f_p='.$ff_p.'"; ';
echo '</script>';
}


elseif($val1==5){
echo '<script type="text/javascript">';
echo 'alert ("No es posible tener una obra en dos componentes");';
echo 'window.location="main.php?token=e369853df766fa44e1ed0ff613f563bd&d='.$val2.'&p='.$val3.'&f_p='.$ff_p.'"; ';
echo '</script>';
}

elseif($val1==6){
echo '<script type="text/javascript">';
echo 'alert ("Este componente ya esta asignada a la obra");';
echo 'window.location="main.php?token=e369853df766fa44e1ed0ff613f563bd&d='.$val2.'&p='.$val3.'&f_p='.$ff_p.'"; ';
echo '</script>';
}


else{
echo '<script type="text/javascript">';
echo 'alert ("No se Guardo el Recurso, Hubo errores");';
echo 'window.location="main.php?token=6364d3f0f495b6ab9dcf8d3b5c6e0b01"; ';
echo '</script>';
}


}

?>
<script type="text/javascript">
<!--



function confirmDelete(delUrl) {
   if (confirm("Estas Seguro que Quieres Eliminarlo?")) {
     document.location = delUrl;
   }
 }

 //-->
</script>
<script  language="JavaScript" type="text/javascript">
 function mostrar_partida(str)
 {

 if (str=="")
   {
   document.getElementById("dat_part").innerHTML="";
   return;
   }
 if (window.XMLHttpRequest)
   {// code for IE7+, Firefox, Chrome, Opera, Safari
   xmlhttp=new XMLHttpRequest();
   }
 else
   {// code for IE6, IE5
   xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
   }
 xmlhttp.onreadystatechange=function()
   {
   if (xmlhttp.readyState==4 && xmlhttp.status==200)
     {
     document.getElementById("dat_part").innerHTML=xmlhttp.responseText;
     }
   }

 xmlhttp.open("GET","planeacion/obras/sac_partida.php?id="+str,true);
 xmlhttp.send();
 }

 function mostrar_org(str)
 {

 if (str=="")
   {
   document.getElementById("dat_org").innerHTML="";
   return;
   }
 if (window.XMLHttpRequest)
   {// code for IE7+, Firefox, Chrome, Opera, Safari
   xmlhttp=new XMLHttpRequest();
   }
 else
   {// code for IE6, IE5
   xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
   }
 xmlhttp.onreadystatechange=function()
   {
   if (xmlhttp.readyState==4 && xmlhttp.status==200)
     {
     document.getElementById("dat_org").innerHTML=xmlhttp.responseText;
     }
   }

 xmlhttp.open("GET","planeacion/obras/sac_org.php?id="+str,true);
 xmlhttp.send();
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

   <link rel="stylesheet" href="css/jquery-ui.css" />
  <style type="text/css" title="currentStyle">
			@import "media/css/demo_page.css";
			@import "media/css/demo_table.css";
</style>

<script type="text/javascript" language="javascript" src="media/js/jquery.js"></script>
<script type="text/javascript" language="javascript" src="media/js/jquery.dataTables.js"></script>

<script type="text/javascript" charset="utf-8">
			$(document).ready(function() {
				$('#example3').dataTable({


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




  <script type="text/javascript">



$(function(){
	$('.numeric').numeric();
	$('.currency').numeric({prefix:'$ ', cents: true});
	$('.numeric2').numeric({prefix:'', cents: true});
	$('.euros').numeric({prefix:'\u20AC '});
	$('.tags').numeric({prefix: '\u20AC '});
});

//PLUGIN
(function($) {
	$.fn.numeric = function(options) {
		var options = $.extend({
			prefix: '',
			cents: false,
		}, options);

		var format = function(cnt, cents) {
			cnt = cnt.toString().replace(/\$|\u20AC|\,/g,'');
			if (isNaN(cnt))
				return 0;
			var sgn = (cnt == (cnt = Math.abs(cnt)));
			cnt = Math.floor(cnt * 100 + 0.5);
			cvs = cnt % 100;
			cnt = Math.floor(cnt / 100).toString();
			if (cvs < 10)
			cvs = '0' + cvs;
			for (var i = 0; i < Math.floor((cnt.length - (1 + i)) / 3); i++)
				cnt = cnt.substring(0, cnt.length - (4 * i + 3)) + ',' + cnt.substring(cnt.length - (4 * i + 3));

			return (((sgn) ? '' : '-') + cnt) + ( cents ?  '.' + cvs : '');
		};

		var keypress = function(e) {
			var i = 0;
			var val = this.value;
			if ((i = val.indexOf('.')) != -1) {
				if (e.which!=8 && e.which!=0 && (e.which<48 || e.which>57))
					return false;
			} else {
				if (e.which!=8 && e.which!=190 && e.which != 46 && e.which!=0 && (e.which<48 || e.which>57))
					return false;
			}
			return true;
		};

		return this.each(function(i, e) {
			var self = $(this);
			if (self.is(':input')) {
				$(this).blur(function() {
					this.value = options.prefix + format(this.value, options.cents);
				}).keypress(keypress);

				this.value = options.prefix + format(this.value, options.cents);
			} else {
				self.html(options.prefix + format(self.html(), options.cents));
			}

		});
	};
}(jQuery));

</script>

<script type="text/javascript">
<!--

$(document).ready(function () {
 var er_dom = /^([0-9]|[a-z]|[$,."';:()]|#|[A-Z]|á|é|í|ó|ú|ñ|Ñ|ü|Á|É|Í|Ó|Ú|Ü|\s|\.|-)+$/


    $(".btn_medida").click(function (){
        $(".error").remove();



		 if( $("#proycompacc").val() == "" ){
            $("#proycompacc").focus().after("<span class='error'>Seleccione Proy. / Comp. / Acc.</span>");
            return false;
        }

		 if( $("#partida").val() == "" ){
            $("#partida").focus().after("<span class='error'>Seleccione Partida</span>");
            return false;
        }


        if( $("#origen").val() == "" ){
            $("#origen").focus().after("<span class='error'>Seleccione Origen</span>");
            return false;
        }

			 if( $("#monto").val() == "$ 0.00"  ){
            $("#monto").focus().after("<span class='error'>Ingrese un monto</span>");
            return false;
        }





		//document.obra.submit();

    });



	  $("#proycompacc").change(function(){
        if( $(this).val() != "" ){
            $(".error").fadeOut();
            return false;
        }
    });
	  $("#patida").change(function(){
        if( $(this).val() != "" ){
            $(".error").fadeOut();
            return false;
        }
    });
	  $("#origen").change(function(){
        if( $(this).val() != "" ){
            $(".error").fadeOut();
            return false;
        }
    });


	  $("#monto").keyup(function(){
        if( $(this).val() != "" ){
            $(".error").fadeOut();
            return false;
        }
    });




});


//-->
</script>

<div style="margin-left:20px; margin-right:20px; margin-bottom:20px;">
<h2>Agregar Origen de Recursos</h2>

<p>Descripci&oacute;n de la Obra: <b><?php echo ($res['nom_obra']);?></b></p>
<div id="cuadro_info">

<p><h3>Agregar Recursos</h3>
  </p>
  <form id="obra" name="obra" method="post" action="" onsubmit="" >
  <input type="hidden" name="idobra" value="<?php echo $_GET['d']; ?>">
	<input type="hidden" name="proy" value="<?php echo $_GET['p']; ?>">
  <p>
  Proy. / Comp. / Acc.

  <select name="proycompacc" id="proycompacc" onclick="mostrar_partida(this.value)">

  	<?php
	  	$consulta_num_pca = mysql_query("SELECT * FROM estados_financieros where s02c_depend = ".$_SESSION['id_dependencia_v3'] ." AND s06c_proyec = ".$f->sac_noproyecto($_GET['p'])." GROUP BY s11c_compon, s25c_accion",$siplan_data_conn) or die (mysql_error());

		while($res_pca = mysql_fetch_array($consulta_num_pca)){
			//$arreglo[]=$res_pca['s06c_proyec']."/".$res_pca['s11c_compon']."/".$res_pca['s25c_accion'];
			echo "<option value=\"".$res_pca['s07c_partid']."-".$res_pca['s06c_proyec']."-".$res_pca['s11c_compon']."-".$res_pca['s25c_accion']."\">".$res_pca['s06c_proyec']."/".$res_pca['s11c_compon']."/".$res_pca['s25c_accion']."</option>";

		}

  	?>
  </select>

   <div id="dat_part" ><p>Partida

<select name="partida" id="partida">
       <option value="" selected="selected">-seleccione-</option>


        </select>
 </p>
 </div>


    <div id="dat_org" ><p>Origen

<select name="origen" id="origen">
       <option value="" selected="selected">-seleccione-</option>


        </select>
 </p>
 </div>


   </p>
  <p>
  Monto
  <label for="textfield"></label>
  <input type="text" name="monto" id="monto" value="0"  class="right currency">
  </p>

	  <hr />
   <p><b>Monto Asignado a la obra:</b>
  	<?php
  	   $consultar_montos = mysql_query("SELECT * FROM poa02_origen WHERE id_obra = ".$id_obra." and id_proyecto=".$_GET['p'],$siplan_data_conn) or die (mysql_error());
	   $monto = 0.00;

	 while($res_montos = mysql_fetch_array($consultar_montos)){
	   	   $monto = $monto + $res_montos['monto'];
	   	}
	   echo "$ ".number_format($monto,2);


  	?>
  	</p>
    <hr />


  <p>
    <!--<input type="button" name="addorigen" id="addorigen" value="Agregar Origen" onclick="envia_form()">
    <input type="button" name="finalizar" id="finalizar" value="Volver a las Obras" onclick="regresa_obras()">!-->
  </p>
<button class="btn_medida" type="submit"  value="Guardar"><img src="imagenes/save_as24x24.png"  id="botones" style="width:24px; height:24px; " align="center"/>Agregar Origen</button>
	 <input type="hidden" name="proyecto" value="<?php echo $_GET['f_p']; ?>">
	 </form>
      <form id="volve" name="volve" method="post" action="main.php?token=6364d3f0f495b6ab9dcf8d3b5c6e0b01"  >
  <input type="hidden" name="proyecto" value="<?php echo $_GET['f_p']; ?>">
 <a style="position:absolute; margin-left:145px; margin-top:-34px;"><button   value="Cancelar"><img src="imagenes/cancel24x24.png"  id="botones" style="width:24px; height:24px;  " align="center"/>Volver a las Obras</button></a>
 </form>

<p> Listado de la obra con su monto que se le ha asignado</p>

<hr>
<div id="obras" >
<div id="container" class="ex_highlight_row">
<div id="demo">
<table width="100%" cellpadding="0" cellspacing="0" border="0" class="display" id="example3">
 <thead>
    <tr>

     <td width="5%"><div align="center"><b>Clave de Obra</b> </div></td>
	 <td width="27%"><div align="center"><b>Partida</b></div></td>
	 	<td width="7%"><div align="center"><b>Origen</b></div></td>
		 <td width="5%"><div align="center"><b>Proyecto</b> </div></td>
	 <td width="7%"><div align="center"><b>Componente</b></div></td>
  	<td width="7%"><div align="center"><b>Accion</b></div></td>
	<td width="7%"><div align="center"><b>Monto</b></div></td>
	<td width="7%"><div align="center"><b>Acciones</b></div></td>
  </tr>
  </thead>
  <tbody>
  <?php
  $i=0;
    //$consulta_obras = mysql_query("SELECT * FROM obras WHERE id_dependencia= ".$_SESSION['id_dependencia_v3'] ,$siplan_data_conn)or die (mysql_error());

	// $consultar_montos2 = mysql_query("SELECT * FROM poa02_origen WHERE id_poa02 = ".$res_obras['obra'],$siplan_data_conn) or die (mysql_error());
	// while ($respoa02origens = mysql_fetch_array($consultar_montos2)) {



	 $consulta_obras = mysql_query("SELECT * FROM poa02_origen WHERE id_obra = ".$id_obra." and id_proyecto=".$_GET['p'],$siplan_data_conn)or die (mysql_error());



   while ($resobras = mysql_fetch_assoc($consulta_obras)) {

	  if ( $resobras['status_obra']>="4" ){
	  $ds='style=" pointer-events: none;
   cursor: default;"';
	  }else{
	  $ds="";
	  }
  ?>
 <tr class="<?php echo $css_color; ?>">
   <td ><?php echo $resobras['id_poa02']; ?></td>
    <td align="middle" ><?php echo $resobras['s07c_partid']; ?></td>
	<td align="middle"><?php echo $resobras['s08c_origen']; ?></td>


    <td align="middle"><?php echo $resobras['s06c_proyec'];?></td>
	 <td align="middle"><?php echo $resobras['s11c_compon'];?></td>
	  <td align="middle"><?php echo $resobras['s25c_accion'];?></td>
	   <td align="middle"><?php echo "$ ".number_format($resobras['monto'],2);?></td>

    <td align="middle"><div align="center">
	<a <?php  ?> href=javascript:confirmDelete('main.php?token=<?php print(md5(34));?>&idd=<?php echo $resobras['id_obra_origen']."&d=".$_GET['d']."&p=".$_GET['p']."&fp=".$_GET['f_p']."')";?> >


	<img src="imagenes/delete_2.png" width="24" height="24" title="Eliminar">

	</a></div></td>
 </tr>
    <?php } ?>
    </tbody>
    <tfoot>
      <tr>
	   <td width="5%"><div align="center">Clave de Obra</div></td>
	 <td width="27%"><div align="center">Partida</div></td>
	 	<td width="7%"><div align="center">Origen</div></td>
		 <td width="5%"><div align="center">Proyecto </div></td>
	 <td width="7%"><div align="center">Componente</div></td>
  	<td width="7%"><div align="center">Accion</div></td>
	<td width="7%"><div align="center">Monto</div></td>
	<td width="7%"><div align="center">Acciones</div></td>
  </tr>
  </tfoot>
  </table>
  </div></div>

 </div>






<p>&nbsp;</p>
<p>
</div></div>
