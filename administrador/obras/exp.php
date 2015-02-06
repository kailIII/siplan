<?php session_start();

$id=$_GET['idobra'];

if ( $id!="" and $_SESSION['id_dependencia_v3']!=""){
//include('obras/classes/c_obra.php');
//include('obras/classes/c_funciones.php');
require_once("../../seguridad/deniedacces.php");
require_once("../../seguridad/siplan_connection_db.php");
require_once("../../seguridad/logout.php");

}
//$c=new obras;
//$f=new funciones;
?>
<?php

?>
 <style type="text/css" title="currentStyle">
			@import "media/css/demo_page.css";
			@import "media/css/demo_table.css";
	#progressbox<?php echo $id; ?> {
	border: 1px solid #3C3;
	padding: 1px;
	position:relative;
	width:400px;
	border-radius: 3px;
	margin: 10px;
	display:none;
	text-align:left;
}
#progressbar<?php echo $id; ?> {
	height:20px;
	border-radius: 3px;
	background-color: #3C3;
	width:1%;
}
		.tooltip {
			border-bottom: 1px  #000000; color: #000000; outline: none; /*dotted #000*/
			cursor: help; text-decoration: none;
			position: relative;
		}
		.tooltip span {
			margin-left: -999em;
			position: absolute;
		}
		.tooltip:hover span {
			border-radius: 5px 5px; -moz-border-radius: 5px; -webkit-border-radius: 5px;
			box-shadow: 5px 5px 5px rgba(0, 0, 0, 0.1); -webkit-box-shadow: 5px 5px rgba(0, 0, 0, 0.1); -moz-box-shadow: 5px 5px rgba(0, 0, 0, 0.1);
			font-family: Calibri, Tahoma, Geneva, sans-serif;
			position: absolute; left: 1em; top: 2em; z-index: 99;
			margin-left: 0; width: 170px;
		}
		.tooltip:hover img {
			border: 0; margin: -10px 0 0 -55px;
			float: left; position: absolute;
		}
		.tooltip:hover em {
			font-family: Candara, Tahoma, Geneva, sans-serif; font-size: 1.2em; font-weight: bold;
			display: block; padding: 0.2em 0 0.6em 0;
		}
		.classic { padding: 0.8em 1em; }
		.custom { padding: 0.5em 0.8em 0.8em 0.5em; }
		* html a:hover { background: transparent; }
		.classic {background: #FFFFAA; border: 1px solid #FFAD33;  }
		.critical { background: #FFCCAA; border: 1px solid #FF3334;	}
		.help { background: #9FDAEE; border: 1px solid #2BB0D7;	}
		.info { background: #9FDAEE; border: 1px solid #2BB0D7;	}
		.warning { background: #FFFFAA; border: 1px solid #FFAD33; }
</style>

<script type="text/javascript" language="javascript" src="media/js/jquery.js"></script>
<script type="text/javascript" language="javascript" src="media/js/jquery.dataTables.js"></script>

<script type="text/javascript" charset="utf-8">

function fn_eliminar(idp){
	var respuesta = confirm("Desea eliminar este archivo?");
	if (respuesta){
		$.ajax({
			url: 'capturista/obras/exp1.php',
			data: 'idobra='+idp+'&del='+'1',
			type: 'post',
			success: function(data){
				if(data!="")
					alert(data);
			fn_buscar(idp)
			}
		});
	}
}

function fn_rechazar(idp){
	var respuesta = confirm("Estas seguro que quiere rechazar el archivo?");
	if (respuesta){
		 obs=prompt('Ingrese una Observación es Opcional','');

		$.ajax({
			url: 'capturista/obras/exp1.php',
			data: 'idobra='+idp+'&res='+'3'+'&obs='+obs,
			type: 'post',
			success: function(data){
				var idd=idp;
				if(data!="")
					alert(data);
				fn_buscar(idd)
			}
		});
	}
}

function fn_aprobar(idp){
//	var respuesta = confirm("Desea eliminar este archivo?");
//	if (respuesta){
		$.ajax({
			url: 'capturista/obras/exp1.php',
			data: 'idobra='+idp+'&ap='+'2',
			type: 'post',
			success: function(data){
				var idd=idp;
				if(data!="")
					alert(data);
				fn_buscar(idd)
			}
		});
//	}
}

function fn_buscar(idp){
	//var str = $("#frm_buscar").serialize();
	$.ajax({
		url: 'capturista/obras/exp1.php',
		data: 'idobra='+<?php echo $id; ?>,
		type: 'get',
		success: function(data){
			//$("#responds").html("");
			$("#responds<?php echo $id; ?>").html(data);
		}
	});
}

function mostrarp(){

document.getElementById('periodo<?php echo $id; ?>').style.display='block';
document.getElementById('a<?php echo $id; ?>').style.display='block';
document.getElementById('b<?php echo $id; ?>').style.display='none';
}

function mostrarc(){
document.getElementById('periodo<?php echo $id; ?>').style.display='none';
document.getElementById('a<?php echo $id; ?>').style.display='none';
document.getElementById('b<?php echo $id; ?>').style.display='block';
}


</script>

   <link rel="stylesheet" href="css/jquery-ui.css" />

  <script type="text/javascript" language="javascript" src="js/jquery-ui.js"></script>
  <script type="text/javascript" src="js/jquery.form.min.js"></script>
<script type="text/javascript">
<!--

$(document).ready(function() {


				$('#example<?php echo $id; ?>').dataTable({
					 "sDom": '<f>rt<lip><"clear">',
//				"sDom": '"clear"&gt;',

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

        },
			"bSort": false
    });


	var options = {
			target:   '#output<?php echo $id; ?>',   // target element(s) to be updated with server response
			beforeSubmit:  beforeSubmit<?php echo $id; ?>,  // pre-submit callback
			success:       afterSuccess<?php echo $id; ?>,  // post-submit callback
			uploadProgress: OnProgress<?php echo $id; ?>, //upload progress callback
			resetForm: true ,       // reset the form after successful submit



		};

	 $('#MyUploadForm<?php echo $id; ?>').submit(function() {
			$(this).ajaxSubmit(options);
			// always return false to prevent standard browser submit and page navigation


	//	$('#MyUploadForm').delay( 7000 ).fadeOut();
//		$("#responds").html('').Slo;
//window.setTimeout(mostrarc(),5000);

//	$("#responds").delay( 5000 ).append(mostrarc());
//$('responds').delay(5000).fadeOut().load('capturista/obras/exp1.php?idobra=<?php echo $id; ?>');

//	$('#responds').load('capturista/obras/exp1.php?idobra=<?php echo $id; ?>');

						return false;
		});


//function after succesful file upload (when server response)
function afterSuccess<?php echo $id; ?>()
{
	$('#submit-btn<?php echo $id; ?>').show(); //hide submit button
	$('#loading-img<?php echo $id; ?>').hide(); //hide submit button
	$('#progressbox<?php echo $id; ?>').delay( 1000 ).fadeOut(); //hide progress bar

}



//function to check file size before uploading.
function beforeSubmit<?php echo $id; ?>(){
    //check whether browser fully supports all File API
   if (window.File && window.FileReader && window.FileList && window.Blob)
	{	var er_dom = /^([0-9]|[a-z]|[$,."'%;:()]|#|[A-Z]|á|é|í|ó|ú|ñ|Ñ|ü|Á|É|Í|Ó|Ú|Ü|\s|\.|-)+$/
			 $(".error").remove();

		 if( $("#nombre<?php echo $id; ?>").val() == "" ){
            $("#nombre<?php echo $id; ?>").focus().after("<span class='error'>Ingrese Nombre</span>");
            return false;
        }

	   var nom = document.getElementById('nombre<?php echo $id; ?>').value;
		 if(!er_dom.test(nom)) {
    	 $("#nombre<?php echo $id; ?>").focus().after("<span class='error'>Nombre no v&aacute;lido</span>");
		 return false
    		}


		 if( $("#archivo<?php echo $id; ?>").val() == "" ){
            $("#archivo<?php echo $id; ?>").focus().after("<span class='error'>Seleccione el Documento</span>");
            return false;
        }


		var fileName = document.getElementById('archivo<?php echo $id; ?>').value;
		var fileTypes=['pdf'];

if (fileName!=""){
dots = fileName.split(".")
//get the part AFTER the LAST period.
fileType = "." + dots[dots.length-1];


if (fileType!=".pdf"){
//alert("Please only upload files that end in types: \n\n" + (fileTypes.join(" .")) + "\n\nPlease select a new file and try again.");
 $("#archivo<?php echo $id; ?>").focus().after("<span class='error'>No es un Documento PDF</span>");
    return false;
}
}
var fileName = document.getElementById('archivo<?php echo $id; ?>');
var file =fileName.files[0];
   if (file.type!="application/pdf"){
	    $("#archivo<?php echo $id; ?>").focus().after("<span class='error'>No es un Documento PDF</span>");
    return false;

	   }

  if (file.size > 2000000) { // 2mb
   $("#archivo<?php echo $id; ?>").focus().after("<span class='error'>Es demasiado grande el archivo, tamaño maximo 2MB</span>");
    return false;

        }


			 if( $("#cbo_tipo<?php echo $id; ?>").val() == "" ){
            $("#cbo_tipo<?php echo $id; ?>").focus().after("<span class='error'>Seleccione tipo de Documento</span>");
            return false;
        }


		if( $("#obs<?php echo $id; ?>").val() != "" ){
		  var obs = document.getElementById('obs<?php echo $id; ?>').value;
		 if(!er_dom.test(obs)) {
    	 $("#obs<?php echo $id; ?>").focus().after("<span class='error'>Observaci&oacute;n no v&aacute;lida</span>");
		 return false
    		}
		}
	/*	var fsize = $('#FileInput')[0].files[0].size; //get file size
		var ftype = $('#FileInput')[0].files[0].type; // get file type


		//allow file types
		switch(ftype)
        {
            case 'image/png':
			case 'image/gif':
			case 'image/jpeg':
			case 'image/pjpeg':
			case 'text/plain':
			case 'text/html':
			case 'application/x-zip-compressed':
			case 'application/pdf':
			case 'application/msword':
			case 'application/vnd.ms-excel':
			case 'video/mp4':
                break;
            default:
                $("#output").html("<b>"+ftype+"</b> Unsupported file type!");
				return false
        }

		//Allowed file size is less than 5 MB (1048576)
		if(fsize>5242880)
		{
			$("#output").html("<b>"+bytesToSize(fsize) +"</b> Too big file! <br />File is too big, it should be less than 5 MB.");
			return false
		}*/

		$('#submit-btn<?php echo $id; ?>').hide(); //hide submit button
		$('#loading-img<?php echo $id; ?>').show(); //hide submit button
	//	$("#output").html("");
	}
	else
	{
		//Output error to older unsupported browsers that doesn't support HTML5 File API
		$("#output<?php echo $id; ?>").after("<span class='error'>Actualize su navegador, o cambie de Navegador</span>");
		return false;
	}
}

//progress bar function
function OnProgress<?php echo $id; ?>(event, position, total, percentComplete)
{
    //Progress bar
	$('#progressbox<?php echo $id; ?>').show();
    $('#progressbar<?php echo $id; ?>').width(percentComplete + '%') //update progressbar percent complete
    $('#statustxt<?php echo $id; ?>').html(percentComplete + '%'); //update status text
    if(percentComplete>50)
        {
            $('#statustxt<?php echo $id; ?>').css('color','#000'); //change status text to white after 50%
        }

		$('#output<?php echo $id; ?>').delay( 2000 ).fadeIn();
		$('#output<?php echo $id; ?>').delay( 4000 ).fadeOut();
	$('#responds<?php echo $id; ?>').load('capturista/obras/exp1.php?idobra=<?php echo $id; ?>');
}

//function to format bites bit.ly/19yoIPO
function bytesToSize(bytes) {
   var sizes = ['Bytes', 'KB', 'MB', 'GB', 'TB'];
   if (bytes == 0) return '0 Bytes';
   var i = parseInt(Math.floor(Math.log(bytes) / Math.log(1024)));
   return Math.round(bytes / Math.pow(1024, i), 2) + ' ' + sizes[i];
}

});

$("#nombre<?php echo $id; ?>").keyup(function(){
        if( $(this).val() != "" ){
            $(".error").fadeOut();
            return false;
        }
    });


	 $("#archivo<?php echo $id; ?>").change(function(){
        if( $(this).val() != "" ){
            $(".error").fadeOut();
            return false;
        }
    });


	 $("#cbo_tipo<?php echo $id; ?>").change(function(){
        if( $(this).val() != "" ){
            $(".error").fadeOut();
            return false;
        }
 });

   $("#obs<?php echo $id; ?>").keyup(function(){
        if( $(this).val() != "" ){
            $(".error").fadeOut();
            return false;
        }
    });



//-->
</script>

<div id="obras"  style=" border-radius: 15px; background-color:white;	 -moz-border-radius: 5px 10px;    overflow:auto; width: 95%; height :450px; align:center;" >







<div id="periodo<?php echo $id; ?>" style="display:none;" >
 <div id="cuadro_info" align="center" style="width:550px">



    <form  id="MyUploadForm<?php echo $id; ?>" method="post" action="presupuestal/obras/archivo.php" enctype="multipart/form-data"  >
<table align="center" width="50%" border="0">
<tr>
    <td colspan="2"><div align="center">
      <h3>Subir Documento</h3>
    </div></td>

  </tr>
  <tr>
    <td><div align="justify">Nombre</div></td>
    <td><div align="justify">
      <input type="text" id="nombre<?php echo $id; ?>" name="nombre<?php echo $id; ?>" size="75" maxlength="140">
    </div></td>
  </tr>
  <tr>
    <td><div align="justify">Ubicación</div></td>
    <td><div align="justify">
      <input type="file" name="archivo<?php echo $id; ?>" id="archivo<?php echo $id; ?>" accept="application/pdf" >
    </div></td>
  </tr>
  <tr>
    <td><div align="justify">Tipo</div></td>
    <td><div align="justify">
      <select name="cbo_tipo<?php echo $id; ?>" id="cbo_tipo<?php echo $id; ?>">
        <option selected="selected"  value="">Seleccione</option>
        <option value="Ejecución">Ejecución</option>
        <option value="Ampliación">Ampliación</option>

      </select>
    </div></td>
  </tr>
  <tr>
    <td><div align="justify">Observación</div></td>
    <td><div align="justify">
      <textarea name="obs<?php echo $id; ?>" id="obs<?php echo $id; ?>" cols="75" rows="3"></textarea>
    </div></td>
     <input type="hidden" name="ido" id="ido" readonly="readonly" value="<?php echo $_GET['idobra']; ?>" >
  </tr>
  <tr>
    <td colspan="2"><div align="center">
      <input type="submit" id="submit-btn<?php echo $id; ?>" value="Guardar archivo">
    </div></td>
  </tr>


   <tr>
    <td colspan="2"><div align="center">
    <img src="imagenes/ajax-loader.gif" id="loading-img<?php echo $id; ?>" style="display:none;" alt="Espere un momento..."/>
    </div></td>
  </tr>
</table>
</form>
    <div id="progressbox<?php echo $id; ?>" ><div id="progressbar<?php echo $id; ?>"></div ><div id="statustxt<?php echo $id; ?>">0%</div></div>
<div id="output<?php echo $id; ?>"></div>

	</div>
</div>
  <div id="responds<?php echo $id; ?>">
  <div id="obras" >
<div id="container" class="ex_highlight_row">
<div id="demo">

 <div id="cuadro_info" align="center" style="width:98%">
 <img style="text-align:right; cursor:pointer; margin-left:85%" src="imagenes/delete_2.png" width="24px" height="24px" title="Cerrar" onclick="closes();"  />
<table  width="98%" cellpadding="0" cellspacing="0" border="0" class="display" id="example<?php echo $id; ?>" style="margin-bottom:10px; margin-left:-10px; margin-right:-10px; margin-top:10px;" >
 <thead>
    <tr >
    <td  align="center"  width="auto"><b>Archivo</b></td>
    <td  align="center" width="auto"><b>Tipo</b></td>
    <td   align="center" width="auto"><b>Estado</b></td>
    <td  align="center"  width="auto"><b>Fecha</b></td>
     <td  align="center"  width="auto"><b>Obs. Dep.</b></td>
    <td  align="center"  width="auto"><b>Obs. UPLA</b></td>

   </tr>
    </thead>
  <tbody>
  <?php


	    $con_o="SELECT id_pdf, id_obra, nom_pdf, tipo_pdf, status_pdf, fecha_hora_pdf, obsc_pdf, obsp_pdf from pdf where id_obra=".$_GET['idobra']." order by fecha_hora_pdf asc";


  $consulta_obr=mysql_query($con_o);
  $i=0;

	    while ($resobr = mysql_fetch_array($consulta_obr)) {


  switch ($resobr['status_pdf']){
		   case "En Revisión":
		   $css_color = "gradeB odd";
		   break;
		   case "Validado":
		  $css_color = "gradeA odd";
		   break;
		   case "Rechazado":
		   $css_color = "gradeX odd";
		   break;

	   }


		/*   if ($i%2==0){
		   $css_color = "gradeA even";
		  // break;
		//    case 4:
		//   $status = "Con Oficio de Ejec.";
		   }else{
		   $css_color = "gradeA odd";
		   }*/
		//   break;
	//   }

if (strlen($resobr['obsc_pdf'])>15){
		$my="..";
		}else{$my="";}

		if (strlen($resobr['obsp_pdf'])>15){
		$my1="..";
		}else{$my1="";}
  ?>

    <tr class=" <?php echo $css_color;  ?>"  style="font-size:12.3px" >
    <td align="justify"> <a target="_blank" style="text-decoration:none;" title="Ver Archivo" href="rpts/ver_pdf.php?idg=<?php echo $resobr['id_pdf']; ?>"> <?php echo $resobr['nom_pdf']; ?></a></td>
    <td align="center"><?php echo ($resobr['tipo_pdf']); ?></td>
	<td  align="center"><?php echo $resobr['status_pdf'];?></td>
    <td  align="center"><?php echo fechadia($resobr['fecha_hora_pdf']);?></td>
   <td  align="justify"><?php if ($resobr['obsc_pdf']!=""){ echo '<a class="tooltip" style="color:#000; cursor:pointer;"> '.substr($resobr['obsc_pdf'],0,15).$my.'<span class="custom critical"><em>Observaciónes de la Dependencia</em>'.$resobr['obsc_pdf'].'</span></a>';
	}?></td>
      <td  align="justify"><?php if ($resobr['obsp_pdf']!=""){ echo '<a class="tooltip" style="color:#000; cursor:pointer;"> '.substr($resobr['obsp_pdf'],0,15).$my1.'<span class="custom critical"><em>Observaciónes UPLA</em>'.$resobr['obsp_pdf'].'</span></a>'; }?></td>

    </tr>
    <?php // $i++;


	 }
	 	//cerrar conexion */
	function fechadia($fechav){

			if ($fechav!="0000-00-00 00:00:00"){

    list($a,$m,$d)=explode("-",$fechav);
	$h=substr($d,3);
	$d=substr($d,0,2);
    return $d."-".mes($m)."-".$a." ".$h;
	}else{
		return "No hay";
		}}

		function mes($mes){
if ($mes=="01") $mes="Ene";
if ($mes=="02") $mes="Feb";
if ($mes=="03") $mes="Mar";
if ($mes=="04") $mes="Abr";
if ($mes=="05") $mes="May";
if ($mes=="06") $mes="Jun";
if ($mes=="07") $mes="Jul";
if ($mes=="08") $mes="Ago";
if ($mes=="09") $mes="Sep";
if ($mes=="10") $mes="Oct";
if ($mes=="11") $mes="Nov";
if ($mes=="12") $mes="Dic";
 return $mes;
}
	 mysql_close($siplan_data_conn);
	/*  if ($css_color!="gradeA even"){
		   $css_color = "gradeA even";
		  // break;
		//    case 4:
		//   $status = "Con Oficio de Ejec.";
		   }else{
		   $css_color = "gradeA odd";
		   }*/?>


    </tbody>
    <tfoot>
      <tr>
	 <td  align="center"  width="auto"><b>Archivo</b></td>
    <td  align="center" width="auto"><b>Tipo</b></td>
    <td   align="center" width="auto"><b>Estado</b></td>
    <td  align="center"  width="auto"><b>Fecha</b></td>
     <td  align="center"  width="auto"><b>Obs. Dep.</b></td>
    <td  align="center"  width="auto"><b>Obs. UPLA</b></td>

  </tr>
  </tfoot>
  </table>
</div>
</div>
</div>
</div>

</div>


























 </div>



