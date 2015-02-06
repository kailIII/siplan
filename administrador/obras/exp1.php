<?php session_start();


$id=$_POST['idobra'];
$idg=$_GET['idobra'];

if ( $id!="" and $_SESSION['id_dependencia_v3']!="" or $idg!="" and $_SESSION['id_dependencia_v3']!="" ){
//include('obras/classes/c_obra.php');
//include('obras/classes/c_funciones.php');
require_once("../../seguridad/deniedacces.php");
require_once("../../seguridad/siplan_connection_db.php");
require_once("../../seguridad/logout.php");

}
//$c=new obras;
//$f=new funciones;

if ($idg!="")
{

	?>
    <style type="text/css" title="currentStyle">
			@import "media/css/demo_page.css";
			@import "media/css/demo_table.css";

</style>

<script type="text/javascript" language="javascript" src="media/js/jquery.js"></script>
<script type="text/javascript" language="javascript" src="media/js/jquery.dataTables.js"></script>
<script type="text/javascript" charset="utf-8">
			$(document).ready(function() {
				$('#example<?php echo $id; ?>').dataTable({
				 "sDom": '<f>rt<lip><"clear">',

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
			} );
</script>
	 <div id="obras" >
<div id="container" class="ex_highlight_row">
<div id="demo">



<table  width="98%" cellpadding="0" cellspacing="0" border="0" class="display" id="example<?php echo $id; ?>" style="margin-bottom:10px; margin-left:-10px; margin-right:-10px; margin-top:10px;" >
 <thead>
    <tr >
    <td  align="center"  width="auto"><b>Archivo</b></td>
    <td  align="center" width="auto"><b>Tipo</b></td>
    <td   align="center" width="auto"><b>Estado</b></td>
    <td  align="center"  width="auto"><b>Fecha</b></td>
     <td  align="center"  width="auto"><b>Obs. Dep.</b></td>
    <td  align="center"  width="auto"><b>Obs. Presup.</b></td>
     <td  align="center"  width="auto"><b>Eliminar</b></td>
     <td  align="center"  width="auto"><b>Validar</b></td>
     <td  align="center"  width="auto"><b>Rechazar</b></td>
   </tr>
    </thead>
  <tbody>
  <?php
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
		   $css_color = "gradeX odd ";
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
  ?>

    <tr class=" <?php echo $css_color;  ?>"  style="font-size:12.3px" >
    <td align="justify"> <a target="_blank" title="Ver Archivo"  style="text-decoration:none;" href="rpts/ver_pdf.php?idg=<?php echo $resobr['id_pdf']; ?>"> <?php echo $resobr['nom_pdf']; ?></a></td>
    <td align="center"><?php echo ($resobr['tipo_pdf']); ?></td>
	<td  align="center"><?php echo $resobr['status_pdf'];?></td>
    <td  align="center"><?php echo fechadia($resobr['fecha_hora_pdf']);?></td>
    <td  align="center"><?php if ($resobr['obsc_pdf']!=""){ echo '<a class="tooltip" style="color:#000; cursor:pointer;"> '.substr($resobr['obsc_pdf'],0,8).'..<span class="custom critical"><em>Observaciónes de la Dependencia</em>'.$resobr['obsc_pdf'].'</span></a>';
	}?></td>
      <td  align="justify"><?php if ($resobr['obsp_pdf']!=""){ echo '<a class="tooltip" style="color:#000; cursor:pointer;"> '.substr($resobr['obsp_pdf'],0,8).'..<span class="custom critical"><em>Observaciónes de Presupuestal</em>'.$resobr['obsp_pdf'].'</span></a>'; }?></td>
        <td  align="center">



        <a href="javascript: fn_eliminar(<? echo $resobr['id_pdf']?>);"  style="text-decoration:none; color:#000"  style="cursor: pointer;"  ><b>
	<img src="imagenes/delete_2.png" width="24px" height="24px" title="Eliminar"/>
    </b>
   </a>
 	</td>
       <td  align="center">   <a href="javascript: fn_aprobar(<? echo $resobr['id_pdf']?>);"  style="text-decoration:none; color:#000"  style="cursor: pointer;"  ><b>
	<img src="imagenes/ok.png" width="24px" height="24px" title="Validar"/>
    </b>
   </a></td>
        <td  align="center"><a href="javascript: fn_rechazar(<? echo $resobr['id_pdf']?>);"  style="text-decoration:none; color:#000"	style="cursor: pointer;"  ><b>
	<img src="imagenes/close_delete_2.png" width="24px" height="24px" title="Rechazar"/>
    </b>
   </a></td>
    </tr>
    <?php // $i++;


	 }
	 	//cerrar conexion */

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
    <td  align="center"  width="auto"><b>Obs. Presup.</b></td>
     <td  align="center"  width="auto"><b>Eliminar</b></td>
     <td  align="center"  width="auto"><b>Validar</b></td>
     <td  align="center"  width="auto"><b>Rechazar</b></td>
  </tr>
  </tfoot>
  </table>
</div>
</div>
</div>
	<?php
	 exit();
	}



if ($_POST['del']=="1"){
  $con_o=" delete from pdf where id_pdf=".$id." limit 1";
	$consulta_obr=mysql_query($con_o);

	if ($consulta_obr){
		echo "Se Elimino Correctamente";
		} else{
		echo "Hubo Errores, No se Elimino";
			}
	  exit();

 }


if ($_POST['ap']=="2"){

    $con_o=" update pdf set status_pdf='Validado' where id_pdf=".$id." limit 1";
	$consulta_obr=mysql_query($con_o);

	if ($consulta_obr){
		echo "Se Valido Correctamente";
		} else{
		echo "Hubo Errores, No se Valido";
			}
	   exit();

  }


  if ($_POST['res']=="3"){

     $con_o=" update pdf set status_pdf='Rechazado', obsp_pdf='".$_POST['obs']."' where id_pdf=".$id." limit 1";
	$consulta_obr=mysql_query($con_o);

	if ($consulta_obr){
		echo "Se Rechazo Correctamente";
		} else{
		echo "Hubo Errores, No se Rechazo";
			}
	   exit();

  }
