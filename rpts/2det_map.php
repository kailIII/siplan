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
 <style type="text/css" title="currentStyle">
			@import "../media/css/demo_page.css";
			@import "../media/css/demo_table.css";
			.ex_highlight #example2 tbody tr.even:hover, #example2 tbody tr.even td.highlighted {
	background-color: #ECFFB3;
}

.ex_highlight #example2 tbody tr.odd:hover, #example2 tbody tr.odd td.highlighted {
	background-color: #E6FF99;
}

.ex_highlight_row #example2 tr.even:hover {
	background-color: #ECFFB3;
}

.ex_highlight_row #example2 tr.even:hover td.sorting_1 {
	background-color: #DDFF75;
}

.ex_highlight_row #example2 tr.even:hover td.sorting_2 {
	background-color: #E7FF9E;
}

.ex_highlight_row #example2 tr.even:hover td.sorting_3 {
	background-color: #E2FF89;
}

.ex_highlight_row #example2 tr.odd:hover {
	background-color: #E6FF99;
}

.ex_highlight_row #example2 tr.odd:hover td.sorting_1 {
	background-color: #D6FF5C;
}

.ex_highlight_row #example2 tr.odd:hover td.sorting_2 {
	background-color: #E0FF84;
}

.ex_highlight_row #example2 tr.odd:hover td.sorting_3 {
	background-color: #DBFF70;
}
</style>
<style type="text/css">
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
<script type="text/javascript" language="javascript" src="../media/js/jquery.js"></script>
<script type="text/javascript" language="javascript" src="../media/js/jquery.dataTables.js"></script>


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
</script>

<script type="text/javascript" charset="utf-8">



/*			$(document).ready(function() {
				$('#example2').dataTable({
//				"sDom": '"clear"&gt;',

				  "iDisplayLength": -1,

        "oLanguage": {
           "sLengthMenu": '',
            "sZeroRecords": "No se encontro nada",
            "sInfo": "Mostrando _START_ a _END_ de _TOTAL_ registros",
            "sInfoEmpty": "Mostrando 0 a 0 de 0 registros",

            "sInfoFiltered": "(filtrado de _MAX_ registros totales)"

        }//,

	//	"bSort": false

    });
			} );*/



 $(document).ready(function() {
    /*
     * Insert a 'details' column to the table
     */

    var nCloneTh = document.createElement( 'th' );
    var nCloneTd = document.createElement( 'td' );
    nCloneTd.innerHTML = '<img src="../imagenes/open.png">';
    nCloneTd.className = "center";

    $('#example2 thead tr').each( function () {
        this.insertBefore( nCloneTh, this.childNodes[0] );
    } );

    $('#example2 tbody tr').each( function () {
        this.insertBefore(  nCloneTd.cloneNode( true ), this.childNodes[0] );
    } );

    /*
     * Initialse DataTables, with no sorting on the 'details' column
     */
    var oTable = $('#example2').dataTable( {
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


    var oTable1 = $('#example3').dataTable( {
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


    /* Add event listener for opening and closing details
     * Note that the indicator for showing which row is open is not controlled by DataTables,
     * rather it is done here
     */
    $('#example2 tbody td img').live('click', function () {
        var nTr = $(this).parents('tr')[0];
        if ( oTable.fnIsOpen(nTr) )
        {
            /* This row is already open - close it */
            this.src = "../imagenes/open.png";
            oTable.fnClose( nTr );
        }
        else
        {
            /* Open this row */
            this.src = "../imagenes/close.png";
            oTable.fnOpen( nTr, fnFormatDetails(oTable1,oTable, nTr), 'details' );
        }
    } );
} );



</script>




<?php

if ($mp!="59"){
/* consulta anterior
$query="SELECT dependencias.acronimo, (dependencias.id_dependencia) as nd, Sum(aportes.federal) AS SumaDefederal, Sum(aportes.estatal) AS SumaDeestatal, Sum(aportes.municipal) AS SumaDemunicipal, Sum(aportes.participantes) AS SumaDeparticipantes, Sum(aportes.credito) AS SumaDecredito, Sum(aportes.otros) AS SumaDeotros, Sum(aportes.federal+aportes.estatal+aportes.municipal+aportes.participantes+aportes.credito+aportes.otros) AS total, Count(dependencias.acronimo) AS CuentaDeacronimo
FROM regiones INNER JOIN (municipios INNER JOIN (dependencias INNER JOIN (obras INNER JOIN aportes ON obras.id_obra = aportes.id_obra) ON dependencias.id_dependencia = obras.id_dependencia) ON municipios.id_finanzas = obras.municipio) ON regiones.id_region = municipios.id_region where obras.municipio=".$mp." and obras.status_obra>=3
 GROUP BY dependencias.id_dependencia";

 */

 $query="SELECT dependencias.acronimo, (dependencias.id_dependencia) as nd, Sum(aportes.federal) AS SumaDefederal, Sum(aportes.estatal) AS SumaDeestatal, Sum(aportes.municipal) AS SumaDemunicipal, Sum(aportes.participantes) AS SumaDeparticipantes, Sum(aportes.credito) AS SumaDecredito, Sum(aportes.otros) AS SumaDeotros, Sum(aportes.federal+aportes.estatal+aportes.municipal+aportes.participantes+aportes.credito+aportes.otros) AS total, Count(dependencias.acronimo) AS CuentaDeacronimo
FROM (dependencias INNER JOIN obras ON dependencias.id_dependencia = obras.id_dependencia) INNER JOIN aportes ON obras.id_obra = aportes.id_obra where obras.municipio=".$mp." and obras.status_obra>=3
 GROUP BY dependencias.id_dependencia";


}
elseif($mp=="59") {
	$query="SELECT regiones.id_region, (regiones.nombre) as nomreg, dependencias.acronimo, (dependencias.id_dependencia) as nd,  Sum(aportes.federal+aportes.estatal+aportes.municipal+aportes.participantes+aportes.credito+aportes.otros) AS total
FROM regiones INNER JOIN (municipios INNER JOIN (dependencias INNER JOIN (obras INNER JOIN aportes ON obras.id_obra = aportes.id_obra) ON dependencias.id_dependencia = obras.id_dependencia) ON municipios.id_finanzas = obras.municipio) ON regiones.id_region = municipios.id_region where obras.status_obra>=3
 GROUP BY regiones.id_region";

	}

$consulta_obras = mysql_query($query);// or die (mysql_error());

$mun=mysql_query("select * from municipios where id_finanzas=".$mp);
	$row=mysql_fetch_array($mun);

switch($_SESSION["id_perfil_v3"]){
	case 1:
	echo "<link href='../administrador/stylo.css' rel='stylesheet' type='text/css' media='all'>";
	break;

	case 2:
	echo "<link href='../capturista/stylo.css' rel='stylesheet' type='text/css' media='all'>";
	break;

	case 3:
	echo "<link href='../copladez/stylo.css' rel='stylesheet' type='text/css' media='all'>";
	break;
}

?>



<div  id="obras" >
<div id="container" class="ex_highlight_row">
<div id="demo">
<?php if ($mp!="59"){
?>
<div align="center"><h3>Resumen de Inversi&oacute;n de <?php echo $row['nombre']; ?></h3></div>

<table width="100%" cellpadding="0" cellspacing="0" border="0" class="display" id="example2">
 <thead>
    <tr    >
	   <td  width="auto"><div align="center">Dependencia</div></td>
	<td  width="auto"><div align="center"> No. Obras</div></td>
    <td width="auto"><div align="center"> Aporte Federal</div></td>
	<td width="auto"><div align="center"> Aporte Estatal</div></td>
	<td width="auto"><div align="center"> Aporte Municipal</div></td>
	<td width="auto"><div align="center"> Aporte Participantes</div></td>
	<td width="auto"><div align="center"> Aporte Creditos</div></td>
	<td width="auto"><div align="center"> Aporte Otros</div></td>
	<td width="auto"><div align="center"> Total</div></td>
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
  $consulta_obras=mysql_query($query);
    while ($resobras = mysql_fetch_assoc($consulta_obras)) {


  ?>
 <tr   style="cursor: pointer;" >
   <td align="justify"><?php echo $resobras['acronimo']; ?></td>
    <td align="center" class="porto">


<a href="#"  style="text-decoration:none; color:#000"	onclick="$('#datoss_<?php echo $resobras['acronimo'];?>').load('obras.php?dep=<?php echo $resobras['acronimo']."&mp=".$_GET['mp'];?>');"  style="cursor: pointer;"  ><b>
	<?php echo number_format($resobras['CuentaDeacronimo'],2); ?>
    </b>
   </a>
<div class="pop_m">
<p style="margin-top:70px; position:absolute; margin-left:30%;font-size:1.5em"><?php ?> Obras Del Municipio de <?php echo $row['nombre'];?> y la Dependencia <?php echo $resobras['acronimo']; ?></p>
<div class="pop_contenido">

<div id="datoss<?php echo "_".$resobras['acronimo']; ?>">
</div>

<a class="print"  style="  text-decoration:none; color:white;

font-size: 1.em" target="_blank"  href="reporte_obras_gral_res.php?dep=<?php echo $resobras['acronimo']."&mp=".$_GET['mp'];?>">Imprimir</a><a class="cerrar">Cerrar</a>
</div>
</div>




    </td>
	<td align="right"><?php echo "$".number_format($resobras['SumaDefederal'],2); ?></td>
	<td align="right"><?php echo "$".number_format($resobras['SumaDeestatal'],2); ?></td>
	<td align="right"><?php echo "$".number_format($resobras['SumaDemunicipal'],2); ?></td>
	<td align="right"><?php echo "$".number_format($resobras['SumaDeparticipantes'],2); ?></td>
	<td align="right"><?php echo "$".number_format($resobras['SumaDecredito'],2); ?></td>
	<td align="right"><?php echo "$".number_format($resobras['SumaDeotros'],2); ?></td>
	<td abbr="right"><?php echo "$".number_format($resobras['total'],2); ?></td>



 </tr>
    <?php $tt=$tt+$resobras['total'];
	$fd=$fd+$resobras['SumaDefederal'];
	$st=$st+$resobras['SumaDeestatal'];
	$mn=$mn+$resobras['SumaDemunicipal'];
	$pt=$pt+$resobras['SumaDeparticipantes'];
	$cr=$cr+$resobras['SumaDecredito'];
	$ot=$ot+$resobras['SumaDeotros'];
	$cp=$cp+$resobras['CuentaDeacronimo']; } ?>
    </tbody>
    <tfoot>
      <tr bgcolor="#999999">
	 <td width="auto"><div align="center"></div></td>
    <td width="auto"><div align="center">Total:</div></td>
	<td width="auto"><div align="center"> <?php echo $cp; ?></div></td>
    <td width="auto"><div align="right"> <?php echo "$".number_format($fd,2) ?></div></td>
	<td width="auto"><div align="right"><?php echo "$".number_format($st,2) ?></div></td>
	<td width="auto"><div align="right"><?php echo "$".number_format($mn,2) ?></div></td>
	<td width="auto"><div align="right"> <?php echo "$".number_format($pt,2) ?></div></td>
	<td width="auto"><div align="right"> <?php echo "$".number_format($cr,2) ?></div></td>
	<td width="auto"><div align="right"> <?php echo "$".number_format($ot,2) ?></div></td>
	<td width="auto"><div align="right"><?php echo "$".number_format($tt,2) ?></div></td>
	  </tr>
  </tfoot>
  </table>
  </div>
  <?php }
elseif($mp=="59") {
?>
<div align="center"><h3>Resumen de Inversi&oacute;n por Regiones</h3></div>
<table width="100%" cellpadding="0" cellspacing="0" border="0" class="display" id="example3">
 <thead>
    <tr    >
	<td  width="auto"><div align="center">No.</div></td>
    <td width="auto"><div align="center"> Region</div></td>
	<td width="auto"><div align="right"> Total</div></td>
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
  $consulta_obras=mysql_query($query);
    while ($resobras = mysql_fetch_assoc($consulta_obras)) {


  ?>
 <tr  onclick="$('#datos').load('det_mapr.php?mp=<?php echo $resobras['id_region']; ?>');" style="cursor: pointer;" >
   <td align="justify"><?php echo $resobras['id_region']; ?></td>
    <td align="center"><?php echo $resobras['nomreg']; ?></td>

	<td align="right"><?php echo "$".number_format($resobras['total'],2); ?></td>



 </tr>
    <?php $tt=$tt+$resobras['total'];
	 } ?>
    </tbody>
    <tfoot>
      <tr bgcolor="#999999">

	<td width="auto"><div align="center"></div></td>
     <td width="auto"><div align="center">Total:</div></td>
   	<td width="auto"><div align="right"><?php echo "$".number_format($tt,2) ?></div></td>
	  </tr>
  </tfoot>
  </table>
  </div>
  <?php }?>
  </div>

 </div>

 <?php
  if($mp!="59") {
 $chart = new VerticalBarChart(410,310); //1200,350 8400,2250

/*	 $quer="SELECT municipios.id_finanzas, localidades.id_marginacion, COUNT( municipios.id_finanzas ) AS total
FROM municipios
INNER JOIN localidades ON municipios.id_municipio = localidades.id_municipio
WHERE municipios.id_finanzas =".$mp." group by localidades.id_marginacion";*/

		 $quer="SELECT Sum(aportes.federal+aportes.estatal+aportes.municipal+aportes.participantes+aportes.credito+aportes.otros) AS total, localidades.id_marginacion
		FROM (localidades INNER JOIN (obras INNER JOIN aportes ON obras.id_obra = aportes.id_obra) ON localidades.id_finanzas = obras.localidad) INNER JOIN municipios ON (municipios.id_finanzas = obras.municipio) AND (localidades.id_municipio = municipios.id_municipio) where obras.municipio=".$mp." and obras.status_obra>=3 GROUP BY localidades.id_marginacion";

$consulta_obrasm = mysql_query($quer);// or die (mysql_error());

//$rowm = mysql_fetch_array($consulta_obrams);
	$dataSet = new XYDataSet();
	while($rowm = mysql_fetch_array($consulta_obrasm))

	{
	if($rowm['id_marginacion']=="1"){
		$nam1="Muy Bajo";
}
if($rowm['id_marginacion']=="2"){
		$nam1="Bajo";
}
if($rowm['id_marginacion']=="3"){
		$nam1="Medio";
}
if($rowm['id_marginacion']=="4"){
		$nam1="Alto";
}
if($rowm['id_marginacion']=="5"){
		$nam1="Muy Alto";
}
?>



<?php
	$dataSet->addPoint(new Point( $nam1, (number_format($rowm['total'],2,".",""))));
	/*}elseif($row['id_marginacion']=="2"){
	$dataSet->addPoint(new Point("Bajo", (number_format($rowm['total'],2,".",""))));
	}elseif($row['id_marginacion']=="3"){
	$dataSet->addPoint(new Point("Medio", (number_format($rowm['total'],2,".",""))));
	}elseif($row['id_marginacion']=="4"){
	$dataSet->addPoint(new Point("Alto", (number_format($rowm['total'],2,".",""))));
	}elseif($row['id_marginacion']=="5"){
	$dataSet->addPoint(new Point("Muy Alto", (number_format($rowm['total'],2,".",""))));
	}*/
	}
	$chart->setDataSet($dataSet);

	$chart->setTitle("Grado de Marginación");
$chart->render("tmp/ma.png");
}

 if($mp=="59") {
	 $regg=mysql_query("select * from regiones");
//	$row=mysql_fetch_array($mun);
	 $rre=1;
		while($rowrr = mysql_fetch_array($regg)){
 $chart = new VerticalBarChart(410,310); //1200,350 8400,2250

/*	 $quer="SELECT municipios.id_finanzas, localidades.id_marginacion, COUNT( municipios.id_finanzas ) AS total
FROM municipios
INNER JOIN localidades ON municipios.id_municipio = localidades.id_municipio
WHERE municipios.id_finanzas =".$mp." group by localidades.id_marginacion";*/

 $quer="SELECT Sum(aportes.federal+aportes.estatal+aportes.municipal+aportes.participantes+aportes.credito+aportes.otros) AS total, localidades.id_marginacion
FROM regiones INNER JOIN ((localidades INNER JOIN (obras INNER JOIN aportes ON obras.id_obra = aportes.id_obra) ON localidades.id_finanzas = obras.localidad) INNER JOIN municipios ON (localidades.id_municipio = municipios.id_municipio) AND (obras.municipio = municipios.id_finanzas)) ON regiones.id_region = municipios.id_region where regiones.id_region=".$rowrr['id_region']." and obras.status_obra>=3 GROUP BY localidades.id_marginacion";

;

$consulta_obrasm = mysql_query($quer);// or die (mysql_error());

//$rowm = mysql_fetch_array($consulta_obrams);
	$dataSet = new XYDataSet();
	while($rowm = mysql_fetch_array($consulta_obrasm))

	{
	if($rowm['id_marginacion']=="1"){
		$nam1="Muy Bajo";
}
if($rowm['id_marginacion']=="2"){
		$nam1="Bajo";
}
if($rowm['id_marginacion']=="3"){
		$nam1="Medio";
}
if($rowm['id_marginacion']=="4"){
		$nam1="Alto";
}
if($rowm['id_marginacion']=="5"){
		$nam1="Muy Alto";
}
?>



<?php
	$dataSet->addPoint(new Point( $nam1, (number_format($rowm['total'],2,".",""))));
	/*}elseif($row['id_marginacion']=="2"){
	$dataSet->addPoint(new Point("Bajo", (number_format($rowm['total'],2,".",""))));
	}elseif($row['id_marginacion']=="3"){
	$dataSet->addPoint(new Point("Medio", (number_format($rowm['total'],2,".",""))));
	}elseif($row['id_marginacion']=="4"){
	$dataSet->addPoint(new Point("Alto", (number_format($rowm['total'],2,".",""))));
	}elseif($row['id_marginacion']=="5"){
	$dataSet->addPoint(new Point("Muy Alto", (number_format($rowm['total'],2,".",""))));
	}*/
	}
	$chart->setDataSet($dataSet);


	$chart->setTitle("Grado de Marginación Region ".$rowrr['id_region']." ".$rowrr['nombre']);

$chart->render("tmp/ma".$rre.".png");
$rre=$rre+1;
echo '<img alt="Line chart"  src="tmp/ma'.($rre-1).'.png" style="border: 1px solid gray;"/>';
 }

}if($mp!="59") {

 /*anterior
    $quer="SELECT localidades.id_marginacion, dependencias.acronimo, (dependencias.id_dependencia) AS nd, Sum(aportes.federal+aportes.estatal+aportes.municipal+aportes.participantes+aportes.credito+aportes.otros) AS total FROM (regiones INNER JOIN (dependencias INNER JOIN (municipios INNER JOIN (obras INNER JOIN aportes ON obras.id_obra = aportes.id_obra) ON municipios.id_finanzas = obras.municipio) ON dependencias.id_dependencia = obras.id_dependencia) ON regiones.id_region = municipios.id_region) INNER JOIN localidades ON (localidades.id_finanzas = obras.localidad) AND (municipios.id_municipio = localidades.id_municipio) WHERE obras.municipio=".$mp." and obras.status_obra>=3 GROUP BY  dependencias.id_dependencia, localidades.id_marginacion";*/

	    $quer="SELECT localidades.id_marginacion, dependencias.acronimo, (dependencias.id_dependencia) AS nd, Sum(aportes.federal+aportes.estatal+aportes.municipal+aportes.participantes+aportes.credito+aportes.otros) AS total FROM (dependencias INNER JOIN (municipios INNER JOIN (obras INNER JOIN aportes ON obras.id_obra = aportes.id_obra) ON municipios.id_finanzas = obras.municipio) ON dependencias.id_dependencia = obras.id_dependencia) INNER JOIN localidades ON (municipios.id_municipio = localidades.id_municipio) AND (obras.localidad = localidades.id_finanzas) WHERE obras.municipio=".$mp." and obras.status_obra>=3 GROUP BY  dependencias.id_dependencia, localidades.id_marginacion";



$consulta_obrasm = mysql_query($quer);// or die (mysql_error());

//$rowm = mysql_fetch_array($consulta_obrams);
$nc=mysql_num_rows($consulta_obrasm);
}
?>
<script>

//var variablejs = "<?php echo $nc; ?>" ;
//document.write("VariableJS = " + variablejs);
</script>

<script type="text/javascript" charset="utf-8">

function fnFormatDetails ( oTable1,oTable, nTr )
{


    var sOut = '<table cellpadding="5"  cellspacing="0" border="0" style="padding-left:50px; ">';
	sOut += '<tr bgcolor="#008000" style="color:white;"><td colspan="2" align="center">Grado de Marginaci&oacute;n</td></tr>';

		var nc = "<?php echo $nc; ?>" ;
	//	sOut += '<tr ><td>Nivel</td><td>Total</td></tr>';
		for (var i=0;i<nc;i++)
{
	 var aData = oTable1.fnGetData( i );
	 var aData1 = oTable.fnGetData( nTr );


	if (aData[0]==aData1[1]){

	if (aData[1]=="1")	{
    sOut += '<tr ><td>Muy Bajo</td><td>'+aData[2]+'</td></tr>';
	}
	else if (aData[1]=="2")	{
    sOut += '<tr><td>Bajo</td><td>'+aData[2]+'</td></tr>';
	}
	else if (aData[1]=="3")	{
    sOut += '<tr><td>Medio</td><td>'+aData[2]+'</td></tr>';
	}
	else if (aData[1]=="4")	{
    sOut += '<tr><td>Alto</td><td>'+aData[2]+'</td></tr>';
	}
	else if (aData[1]=="5")	{
    sOut += '<tr><td>Muy Alto</td><td>'+aData[2]+'</td></tr>';
	}

	}
}


    sOut += '</table>';

    return sOut;
}
</script>


    <?php
	//while($rowm = mysql_fetch_array($consulta_obrasm))

	//{

		if($mp!="59") {
?>

<table style="display:none;" width="100%" cellpadding="0" cellspacing="0" border="0" class="display" id="example3">
 <thead>
    <tr     >
	   <td  width="auto"><div align="center">Dependencia</div></td>
	<td  width="auto"><div align="center">marginacion</div></td>
  	<td width="auto"><div align="center"> Total</div></td>
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
  $consulta_obras=mysql_query($quer);
    while ($resobras = mysql_fetch_assoc($consulta_obrasm)) {


  ?>
 <tr   style="cursor: pointer;" >
   <td align="justify"><?php echo $resobras['acronimo']; ?></td>
    <td align="right"><?php echo ($resobras['id_marginacion']); ?></td>
	<td abbr="right"><?php echo "$".number_format($resobras['total'],2); ?></td>



 </tr>
    <?php  } ?>
    </tbody>
    <tfoot>

  </tfoot>
  </table>
  <?php //}?>

<br />
<?php echo '<img alt="Line chart"  src="tmp/ma.png?d='.rand().'" style="border: 1px solid gray;"/>'; ?>
 <?php //}
	}?>
</br>
<a href="mostrar_mapa.php?g=map">Atras</a>
<div style="margin-left:150px; margin-top:-0px;"
<ul id="botones">
       <li><a href="reporte_resumen_map.php?g=<?php echo $mp;?>" target="_blank"><img src="../imagenes/printer24x24.png" width="24" height="24" align="middle">Imprimir</a></li>

</ul>
</div>
</br>

<?php mysql_close($siplan_data_conn); ?>
