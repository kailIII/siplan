<?php



if ($_POST['proyecto']!="" and $_POST['componente']!="" and $_POST['org']!="" and $_POST['mun']!="" and $_POST['loc']!="" and $_POST['modalidad']!="" and $_POST['retencion']!="" and $_POST['u_medida']!="" and $_POST['cantidad']!="" and $_POST['dtpini']!="" and $_POST['dtpfin']!="" and $_POST['descripcion']!="" and $_POST['programa_poa']!="" and $_POST['subprogramas_poa']!="" and $_POST['aporte_federal']!="" and $_POST['aporte_estatal']!="" and $_POST['aporte_municipal']!="" and $_POST['aporte_participaciones']!="" and $_POST['aporte_credito']!="" and $_POST['aporte_otros']!="" and $_POST['ben_h']!="" and $_POST['ben_m']!="" and $_POST['radio']!=""){
include('classes/c_obra.php');
$c=new obras;


$val=$c->guardar_obra($_POST['proyecto'],$_POST['componente'],$_POST['org'],$_POST['mun'],$_POST['loc'],$_POST['modalidad'],$_POST['retencion'],$_POST['u_medida'],$_POST['cantidad'],$_POST['dtpini'],$_POST['dtpfin'],$_POST['descripcion'],$_POST['programa_poa'],$_POST['subprogramas_poa'],$_POST['aporte_federal'],$_POST['aporte_estatal'],$_POST['aporte_municipal'],$_POST['aporte_participaciones'],$_POST['aporte_credito'],$_POST['aporte_otros'],$_POST['ben_h'],$_POST['ben_m'],$_POST['radio'],$_POST['otro_programa']);
if ($val==1){

echo '<script type="text/javascript">';
echo 'alert ("Se ha Guardado correctamente la Obra");';
echo 'window.location="main.php?token=33e75ff09dd601bbe69f351039152189"; ';
echo '</script>';


}else{
echo '<script type="text/javascript">';
echo 'alert ("No se Guardo la Obra, Hubo errores");';
echo 'window.location="main.php?token=33e75ff09dd601bbe69f351039152189"; ';
echo '</script>';
}


}

?>
<script  language="JavaScript" type="text/javascript">
 function mostrar_componente(str)
 {

 if (str=="")
   {
   document.getElementById("dat_comp").innerHTML="";
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
     document.getElementById("dat_comp").innerHTML=xmlhttp.responseText;
     }
   }

 xmlhttp.open("GET","copladez/obras/sac_comp.php?id="+str,true);
 xmlhttp.send();
 }

 function mostrar_loc(str)
 {

 if (str=="")
   {
   document.getElementById("dat_loc").innerHTML="";
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
     document.getElementById("dat_loc").innerHTML=xmlhttp.responseText;
     }
   }

 xmlhttp.open("GET","copladez/obras/sac_loc.php?id="+str,true);
 xmlhttp.send();
 }


 function mostrar_sub(str)
 {

 if (str=="")
   {
   document.getElementById("dat_sub").innerHTML="";
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
     document.getElementById("dat_sub").innerHTML=xmlhttp.responseText;
     }
   }

 xmlhttp.open("GET","copladez/obras/sac_sub.php?id="+str,true);
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
 <script type="text/javascript" language="javascript" src="js/jquery-1.9.1.js"></script>
  <script type="text/javascript" language="javascript" src="js/jquery-ui.js"></script>


 <script type="text/javascript" charset="utf-8">

  $(function() {
    $( "#dtpini" ).datepicker();
  });

    $(function() {
    $( "#dtpfin" ).datepicker();
  });

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

var er_dom = /^([0-9]|[a-z]|[$,."'%;:()]|#|[A-Z]|á|é|í|ó|ú|ñ|Ñ|ü|Á|É|Í|Ó|Ú|Ü|\s|\.|-)+$/

    $(".btn_medida").click(function (){
        $(".error").remove();



		 if( $("#proyecto").val() == "" ){
            $("#proyecto").focus().after("<span class='error'>Seleccione Proyecto</span>");
            return false;
        }

		 if( $("#componente").val() == "" ){
            $("#componente").focus().after("<span class='error'>Seleccione Componente</span>");
            return false;
        }


        if( $("#org").val() == "" ){
            $("#org").focus().after("<span class='error'>Seleccione Origen del Recurso</span>");
            return false;
        }





		 if( $("#mun").val() == "" ){
            $("#mun").focus().after("<span class='error'>Seleccione Municipio</span>");
            return false;
        }

		 if( $("#loc").val() == "" ){
            $("#loc").focus().after("<span class='error'>Seleccion Localidad</span>");
            return false;
        }

		 if( $("#modalidad").val() == "" ){
            $("#modalidad").focus().after("<span class='error'>Seleccione Modalidad</span>");
            return false;
        }


		 if( $("#retencion").val() == "" ){
            $("#retencion").focus().after("<span class='error'>Seleccione Retenci&oacute;n</span>");
            return false;
        }

			 if( $("#u_medida").val() == "" ){
            $("#u_medida").focus().after("<span class='error'>Seleccione Medida</span>");
            return false;
        }

			vvalor = document.getElementById("cantidad").value;
		 if(vvalor <= "0.00"){
            $("#cantidad").focus().after("<span class='error'>Ingrese Cantidad</span>");
            return false;
        }






		 if( $("#dtpini").val() == "" ){
            $("#dtpini").focus().after("<span class='error'>Agregue Fecha de Inici&oacute;</span>");
            return false;
        }

		 if( $("#dtpfin").val() == "" ){
            $("#dtpfin").focus().after("<span class='error'>Agregue Fecha de Fin</span>");
            return false;
        }

		//validacion fechas

		var fecha1 = document.getElementById('dtpini').value;
		var fecha2 = document.getElementById('dtpfin').value;
		var dd1=fecha1.substring(0,2);  //01-08-2013
		var mm1=fecha1.substring(3,5);
		var yy1=fecha1.substring(6,10);

		var dd2=fecha2.substring(0,2);  //01-08-2013
		var mm2=fecha2.substring(3,5);
		var yy2=fecha2.substring(6,10);



		var f1 =  new Date(yy1, mm1, dd1);
	    var f2 =  new Date(yy2, mm2, dd2);
      	var r= f1.getTime() - f2.getTime();

	    if (r>0) {
		 $("#dtpini").focus().after("<span class='error'>La Fecha de Inici&oacute; no debe de ser mayor a la fecha de fin</span>");
              return false;
			  }


	//	var $dateStart = $("form#obra input[name=dtpini]").val();
    //     var $dateEnd = $("form#obra input[name=dtpfin]").val();


//		if  ($dateEnd < $dateStart){
//		  $("#dtpini").focus().after("<span class='error'>La Fecha de Inici&oacute; no debe de ser mayor a la fecha de fin</span>");
//		   return false;
//		}




		 if( $("#descripcion").val() == "" ){
            $("#descripcion").focus().after("<span class='error'>Ingrese Descripci&oacute;n</span>");
            return false;
        }



	var obs = document.getElementById('descripcion').value;

			if(!er_dom.test(obs)) {

				 $("#descripcion").focus().after("<span class='error'>Descripci&oacute;n no v&aacute;lida</span>");

      		  return false
    		}


		 if( $("#programa_poa").val() == "" ){
            $("#programa_poa").focus().after("<span class='error'>Seleccione Programa</span>");
            return false;
			        }

					 if( $("#subprogramas_poa").val() == "" ){
            $("#subprogramas_poa").focus().after("<span class='error'>Seleccione Subprograma</span>");
            return false;
        }
		 if( $("#aporte_federal").val() == "$ 0.00" && $("#aporte_estatal").val() == "$ 0.00" &&  $("#aporte_municipal").val() == "$ 0.00" && $("#aporte_participaciones").val() == "$ 0.00" &&  $("#aporte_credito").val() == "$ 0.00" && $("#aporte_otros").val() == "$ 0.00"  ){
            $("#aporte_federal").focus().after("<span class='error'>Ingrese un Aporte ya sea Federal, Estatal, Municipal, Participaciones, Credito u Otros</span>");
            return false;
        }






	 if( $("#ben_h").val() <= "0"  &&  $("#ben_m").val() <= "0"){
            $("#ben_h").focus().after("<span class='error'>Ingrese Beneficiarios </span>");
            return false;
        }


 if( !$("input[name=radio]:checked").val()   ){
            $("#radio").focus().after("<span class='error'>Seleccione una Opcion </span>");
            return false;
        }

			  var t1=obra.radio[1].checked

	  if (t1==true && !$("#otro_programa").val()){

	   $("#otro_programa").focus().after("<span class='error'>Ingrese Programa</span>");
	   return false
	  }



	var otr = document.getElementById('otro_programa').value;


			if(!er_dom.test(otr) && t1==true  ) {

				 $("#otro_programa").focus().after("<span class='error'>Programa no v&aacute;lido</span>");

      		  return false
    		}

		//document.obra.submit();

    });



	  $("#proyecto").change(function(){
        if( $(this).val() != "" ){
            $(".error").fadeOut();
            return false;
        }
    });
	  $("#componente").change(function(){
        if( $(this).val() != "" ){
            $(".error").fadeOut();
            return false;
        }
    });
	  $("#org").change(function(){
        if( $(this).val() != "" ){
            $(".error").fadeOut();
            return false;
        }
    });
	  $("#mun").change(function(){
        if( $(this).val() != "" ){
            $(".error").fadeOut();
            return false;
        }
    });
	  $("#loc").change(function(){
        if( $(this).val() != "" ){
            $(".error").fadeOut();
            return false;
        }
    });
	  $("#modalidad").change(function(){
        if( $(this).val() != "" ){
            $(".error").fadeOut();
            return false;
        }
    });
	  $("#retencion").change(function(){
        if( $(this).val() != "" ){
            $(".error").fadeOut();
            return false;
        }
    });
	  $("#u_medida").change(function(){
        if( $(this).val() != "" ){
            $(".error").fadeOut();
            return false;
        }
    });


	  $("#cantidad").keyup(function(){
        if( $(this).val() != "" ){
            $(".error").fadeOut();
            return false;
        }
    });

	  $("#dtpini").change(function(){
        if( $(this).val() != "" ){
            $(".error").fadeOut();
            return false;
        }
    });


	  $("#dtpfin").change(function(){
        if( $(this).val() != "" ){
            $(".error").fadeOut();
            return false;
        }
    });

	  $("#descripcion").keyup(function(){
        if( $(this).val() != "" ){
            $(".error").fadeOut();
            return false;
        }
    });

	 $("#programa_poa").change(function(){
        if( $(this).val() != "" ){
            $(".error").fadeOut();
            return false;
        }
    });



	  $("#aporte_federal").keyup(function(){
        if( $(this).val() != "" ){
            $(".error").fadeOut();
            return false;
        }
    });


	  $("#ben_h").keyup(function(){
        if( $(this).val() != "" ){
            $(".error").fadeOut();
            return false;
        }
    });

	  $("#ben_m").keyup(function(){
        if( $(this).val() != "" ){
            $(".error").fadeOut();
            return false;
        }
    });

	   $("#radio").change(function(){
        if( $(this).val() != "" ){
            $(".error").fadeOut();
            return false;
        }
    });

		 $("#otro_programa").keyup(function(){
        if( $(this).val() != "" ){
            $(".error").fadeOut();
            return false;
        }
    });




});


//-->
</script>
<div style="margin-left:20px; margin-right:20px; margin-bottom:20px;">
<h2>Agregar Obra </h2>
<h3>Datos Generales</h3>

Dependencia: <b><?php echo $_SESSION['nombre_dependencia_v3'];?></b>	Sector: <b><?php echo $_SESSION['sector_dependencia_v3'];?></b>
<div id="cuadro_info">




<form id="obra" name="obra" method="post" action="" onsubmit="" >
    <p>Proyecto
	<select name="proyecto" id="proyecto"  onchange="mostrar_componente(this.value)" >
       <option value="" selected="selected">-seleccione-</option>

		    <?php
            $consulta_proy = mysql_query("SELECT * FROM proyectos WHERE id_dependencia =".$_SESSION['id_dependencia_v3']." order by no_proyecto asc" ,$siplan_data_conn) or die (mysql_error());
            while($res_proy = mysql_fetch_array($consulta_proy)){
                echo "<option value=\"".$res_proy['id_proyecto']."\"> ".($res_proy['no_proyecto']."-".$res_proy['nombre'])."</option>";
                $i++;
            }
            ?>
        </select>
		 </p>
		 <div id="dat_comp" ><p>Componente

<select name="componente" id="componente">
       <option value="" selected="selected">-seleccione-</option>


        </select>
 </p>
 </div>
		    <p>Origen del Recurso
	<select name="org" id="org"   >
       <option value="" selected="selected">-seleccione-</option>

		    <?php
            $consulta_org = mysql_query("SELECT * FROM origen where s08c_origen like '14%' order by s08c_origen asc" ,$siplan_data_conn) or die (mysql_error());
            while($res_org = mysql_fetch_array($consulta_org)){
                echo "<option value=\"".$res_org['s08c_origen']."\"> ".($res_org['s08c_origen']." ".$res_org['c08c_tipori'])."</option>";
                $i++;
            }
            ?>
        </select>
		 </p>


		  <p>Municipio
	<select name="mun" id="mun"  onchange="mostrar_loc(this.value)"  >
       <option value="" selected="selected">-seleccione-</option>

		    <?php
            $consulta_mun = mysql_query("SELECT * FROM municipios order by nombre asc" ,$siplan_data_conn) or die (mysql_error());
            while($res_mun = mysql_fetch_array($consulta_mun)){
                echo "<option value=\"".$res_mun['id_municipio']."\"> ".(($res_mun['nombre']))."</option>";
                $i++;
            }
            ?>
        </select>
		 </p>
		  <div id="dat_loc" >
		  <p>Localidad

<select name="loc" id="loc">
       <option value="" selected="selected">-seleccione-</option>

        </select>
 </p>
		  </div>


	  <p>Modalidad
      <select name="modalidad" id="modalidad">
        <option value="" selected="selected">-seleccione-</option>
        <option value="1">Administraci&oacute;n</option>
        <option value="2">Contrato</option>
        <option value="3">Mixto</option>
      </select>
      Retenci&oacute;n
      <select name="retencion" id="retencion">
         <option value="" selected="selected">-seleccione-</option>
        <option value="1">Ninguna</option>
        <option value="2">Al millar</option>
        <option value="3">5 al millar</option>
        <option value="4">1 y 5 al millar</option>
      </select>
      <input name="pagina" type="hidden" id="pagina" value="2" />
    </p>

<p>Unidad de medida
         <select name="u_medida" id="u_medida">
        <option value="" selected="selected">-seleccione-</option>
        <?php
	  $res_unidad = mysql_query("SELECT * FROM unidad_medida_prog02 order by descripcion asc",$siplan_data_conn)or die(mysql_error());
	  while($res_cons_unidad = mysql_fetch_array($res_unidad)){
	  echo "<option value=\"".$res_cons_unidad['id_unidad']."\">".$res_cons_unidad['descripcion']."</option>";   }?>
      </select>
      Cantidad

      <input type="text" name="cantidad" id="cantidad" class="right  numeric2" />
    </p>


	<p>Fecha de Inici&oacute;: <input type="text" id="dtpini" class="dtpini"  name="dtpini" value="<?php //echo $p->per_ini();?>"  size="12" maxlength="12" readonly="readonly"/>
Fecha de Fin: <input type="text" id="dtpfin" name="dtpfin"  class="dtpfin" value="<?php //echo $p->per_fin();?>" size="12"   maxlength="12" readonly="readonly" />
</p>

 <p>Descripci&oacute;n de la Obra</p>
 <p>
      <textarea name="descripcion" id="descripcion" cols="128" rows="5"></textarea>
    </p>


	<h3><p>Apertura Programatica</p></h3>
    <p>Programa POA
      <select name="programa_poa" id="programa_poa"  onchange="mostrar_sub(this.value)" >
       <option value="" selected="selected">-seleccione-</option>
        <?php
$res_progpoa = mysql_query("SELECT * FROM programas_poa order by clave asc",$siplan_data_conn)or die(mysql_error());
	  while($res_cons_progpoa = mysql_fetch_array($res_progpoa)){

	  echo "<option value=\"".$res_cons_progpoa['id_programa_poa']."\">".$res_cons_progpoa['clave']." ".$res_cons_progpoa['descripcion']."</option>";  }?>
      </select>
	  </p>
	    <div id="dat_sub" >
	  <p>
      Subprograma POA
      <select name="subprogramas_poa" id="subprogramas_poa">
	    <option value="" selected="selected">-seleccione-</option>
      </select>
    </p>
	</div>




	 <h3><p>Aportes</p></h3>
    <table width="80%" border="0">
      <tr>
        <td width="15%">Aporte Federal</td>
        <td width="21%"><input name="aporte_federal" type="text" id="aporte_federal" value="0" class="right currency" /></td>
        <td width="21%">Aporte Participaciones</td>
        <td width="43%"><input name="aporte_participaciones" type="text" id="aporte_participaciones" value="0" class="right currency" /></td>
      </tr>
      <tr>
        <td>Aporte Estatal</td>
        <td><input name="aporte_estatal" type="text" id="aporte_estatal" value="0" class="right currency" /></td>
        <td>Aporte Cr&eacutedito</td>
        <td><input name="aporte_credito" type="text" id="aporte_credito" value="0" class="right currency" /></td>
      </tr>
      <tr>
        <td>Aporte Municipal</td>
        <td><input name="aporte_municipal" type="text" id="aporte_municipal" value="0" class="right currency" /></td>
        <td>Aporte Otros</td>
        <td><input name="aporte_otros" type="text" id="aporte_otros" value="0" class="right currency" /></td>
      </tr>
    </table>
   <h3> <p>Beneficiarios</p></h3>
    <p>Beneficiarios Hombres
         <input name="ben_h" type="text" id="ben_h" value="" class="right  numeric" />
       Beneficiarios Mujeres

      <input name="ben_m" type="text" id="ben_m" value="" class="right  numeric" />
       </p>
   <h3> <p>Programa</p> </h3>
    <p>
      <input type="radio" name="radio" id="radio" value="1" />
     Sumar
      <input type="radio" name="radio" id="radio" value="2" />
      Otro
      <input name="otro_programa" type="text" id="otro_programa" size="28" />
    </p>
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
$ds="";
}else{

		$ds='disabled="disabled"  style=" pointer-events: none;
   cursor: default;"';
	}
?>

	<button class="btn_medida" type="submit" <?php  echo $ds;?>  value="Guardar"><img src="imagenes/save_as24x24.png"  id="botones" style="width:24px; height:24px; " align="center"/>Guardar</button>

	 </form>
 <a style="position:absolute; margin-left:120px; margin-top:-31px;"href="main.php?token=33e75ff09dd601bbe69f351039152189"><button   value="Cancelar"><img src="imagenes/cancel24x24.png"  id="botones" style="width:24px; height:24px;  " align="center"/>Cancelar</button></a>





</div></div>
