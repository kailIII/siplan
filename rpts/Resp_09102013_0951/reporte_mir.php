<?php
session_start();
$idProyecto = $_GET['id_proyecto'];

//$idProyecto = 1; //$_GET['id_proyecto']
$pdf = (isset($_GET['pdf']))?$_GET['pdf']:true;// BANDERA PARA ELABORAR EL REPORTE EN PDF O EN HTML SEGÚN SEA EL VALOR
require_once("../seguridad/siplan_connection_db.php");

date_default_timezone_set('America/Mexico_City');
$consulta = "SELECT
proy.no_proyecto as id_proyecto,
proy.estatus as estatus,
proy.nombre as nombre,
proy.uresponsable as u_responsable,
proy.titular as titular,
proy.id_eje as id_eje,
proy.objetivo as pr_objetivo,
eje.eje,
proy.id_linea as id_linea,
linea.nombre as linea,
proy.id_estrategia as id_estrategia,
estra.nombre as estrategia,
proy.pnd_eje as id_pnd_eje,
proy.pnd_objetivo as id_pnd_objetivo,
proy.pnd_estrategia as id_pnd_estrategia,
proy.pnd_linea_accion as id_pnd_linea,
pnd_ejes.pnd_eje as pnd_eje,
pnd_estrategias.pnd_estrategia as pnd_estrategia,
pnd_objetivos.pnd_objetivo as pnd_objetivo,
pnd_lineas_accion.linea_accion as pnd_linea,
proy.ponderacion as ponderacion,
proy.proposito as proposito,
proy.justificacion as justificacion,
proy.clasificacion as id_clasificacion,
clas.clasificacion as clasificacion,
proy.grado as id_grado,
grado.grado,
proy.g_vulnerable as id_gvulnerable,
gpo.descripcion as vulnerable,
proy.beneficiarios_h as ben_h,
proy.beneficiarios_m as ben_m,
proy.inversion,
proy.unidad_medida,
proy.cantidad,
proy.prog_sem,
proy.finalidad as id_finalidad,
finalidad.nombre as finalidad,
proy.funcion as id_funcion,
funcion.nombre as funcion,
proy.subfuncion as id_subfuncion,
subf.nombre as subfuncion,
proy.observaciones
FROM
proyectos proy
inner join eje on(proy.id_eje = eje.id_eje)
inner join linea on (proy.id_linea = linea.id_linea)
inner join estrategias estra on(proy.id_estrategia = estra.id_estrategia)
inner join clasificacion clas on(proy.clasificacion = clas.id_clasificacion)
inner join grado on(proy.grado = grado.id_grado)
inner join grupo_vulnerable as gpo on(proy.g_vulnerable = gpo.id_vulnerable)
inner join finalidad on (proy.finalidad = finalidad.id_finalidad)
inner join funcion on (proy.funcion = funcion.id_funcion)
inner join subfuncion as subf on (proy.subfuncion = subf.id_subfuncion)
inner join pnd_ejes on(proy.pnd_eje = pnd_ejes.id_pnd_eje)
inner join pnd_objetivos on(proy.pnd_objetivo = pnd_objetivos.id_pnd_objetivo)
inner join pnd_estrategias on(proy.pnd_estrategia = pnd_estrategias.id_pnd_estrategia)
inner join pnd_lineas_accion on(proy.pnd_linea_accion = pnd_lineas_accion.id_pnd_linea_accion)
where id_proyecto = $idProyecto;";

$consulta = mysql_query($consulta,$siplan_data_conn) or die (mysql_error());
$resProyecto = mysql_fetch_object($consulta);
ob_start();
if(!$pdf)
{?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Reporte MIR</title>
</head>
<?php } ?>
<style>
html, head, body
{
	font-size:10px;
}
table
{
	width:100%;
	border-left: 0px solid #000000;
	border-right: 0px solid #000000;
}
.subtitulo
{
	color:#FFFFFF;
	/*font-family:"Courier New", Courier, monospace;	*/
	background:#999999;
	font-size:8px; !important;
	font-size:0.625em;
}

.thead
{
	color:#FFFFFF;
	background:#003300;
	text-align:center;
	border: 4px solid #666666;
	font-size:8px; !important;
	font-size:0.625em;
}

.titulo
{
	color:#000000;
	background:#999999;
	border: 1px solid #000;
	font-size:0.8em;
	font-size:10px; !important;
	text-align:center;

}

.opcion
{
	color:#B80734;
	font-size: 0.625em;
}

td
{
	font-size:0.5em;
	font-size:8px; !important
}
</style>

<page backtop="-15mm"; format="A4"; backbottom="5mm"; >
    <page_header>
    </page_header>
    <page_footer>
     <table class="page_footer">
            <tr>
                <td style="width: 100%; text-align: right">
                 Documento generado el [[date_d]]/[[date_m]]/[[date_y]] a las [[date_h]]:[[date_i]] - Página[[page_cu]]/[[page_nb]]
                </td>
            </tr>
        </table>
    </page_footer>
</page>
<table>
       <tr>
           <td><img src="logoupla.png" width="230" height="43" /></td>
       </tr>
</table>
<table>
 <col style="width: 100%">
	<tr>
         <td class="subtitulo">Matriz de Indicadores para Resultados (MIR)</td>
    </tr>
</table>
<table>
 <col style="width: 100%">
        <tr class="thead">
             <td>DATOS DEL PROYECTO</td>
        </tr>
</table>
<table cellspacing="0" width="100%">
 <col style="width: 5%">
 <col style="width: 16%">
 <col style="width: 5%">
 <col style="width: 4%">
 <col style="width: 15%">
 <col style="width: 5%">
 <col style="width: 16%">
 <col style="width: 5%">
 <col style="width: 29%">
	<thead>
    	<tr>
        	<td colspan="9">Datos del Proyecto</td>
        </tr>
    </thead>
    <tr>
    	<td class="opcion" width="5%">Nombre del Proyecto</td>
        <td width="16%"><?php echo $resProyecto->nombre; ?></td>
        <td class="opcion" width="5%">Número del Proyecto</td>
        <td width="4%"><?php echo $resProyecto->id_proyecto; ?></td>
        <td width="15%"><span class="opcion">Inversión</span><br/><?php echo "$".number_format($resProyecto->inversion,2); ?> </td>
        <td class="opcion" width="5%">Unidad Responsable</td>
        <td width="16%"><?php echo ($resProyecto->u_responsable); ?></td>
        <td class="opcion" width="5%">Nombre del titular</td>
        <td width="29%"><?php echo $resProyecto->titular; ?></td>
    </tr>
</table>
<table>
 <col style="width: 100%">
        <tr class="thead">
             <td>ALINEACIÓN</td>
        </tr>
</table>
<table>
 <col style="width: 33%">
 <col style="width: 33%">
 <col style="width: 34%">
    <tr class="titulo">
    	<td>Plan Nacional de Desarrollo 2013-2018</td>
        <td>Plan Estatal de Desarrollo 2011-2016</td>
        <td>Objetivo estratégico de la Dependencia o Entidad</td>
    </tr>
</table>
<table cellspacing="0">
 <col style="width: 5%">
 <col style="width: 28%">
 <col style="width: 7%">
 <col style="width: 26%">
 <col style="width: 6%">
 <col style="width: 28%">
    <tr>
    	<td class="opcion">Eje de política Pública</td>
        <td><?php echo $resProyecto->pnd_eje; ?></td>
        <td class="opcion">Eje</td>
        <td><?php echo $resProyecto->eje; ?></td>
        <td class="opcion">Dependencia o Entidad</td>
        <td><?php echo $_SESSION['nombre_dependencia_v3']; ?></td>
    </tr>
</table>
<table>
 <col style="width: 5%">
 <col style="width: 28%">
 <col style="width: 33%">
 <col style="width: 6%">
 <col style="width: 24%">
    <tr>
    	<td class="opcion">Objetivo</td>
        <td><?php echo $resProyecto->pnd_linea;?></td>
        <td>
            <table>
            <col style="width: 20%">
            <col style="width: 80%">
                <tr>
                    <td class="opcion">Línea Estratégica</td>
                    <td><?php echo $resProyecto->linea; ?></td>
                </tr>
                <tr>
                    <td class="opcion">Estrategia</td>
                    <td><?php echo $resProyecto->estrategia; ?></td>
                </tr>
            </table>
        </td>
        <td class="opcion">Objetivo</td>
        <td><?php echo $resProyecto->pr_objetivo; ?></td>
   </tr>
</table>
<table>
 <col style="width: 100%">
   <tr class="thead">
     <td>CLASIFICACIÓN FUNCIONAL</td>
   </tr>
</table>
<table cellspacing="0">
 <col style="width: 7%">
 <col style="width: 23%">
 <col style="width: 7%">
 <col style="width: 13%">
 <col style="width: 7%">
 <col style="width: 13%">
 <col style="width: 8%">
 <col style="width: 22%">
    <tr>
    	<td class="titulo">Finalidad</td>
        <td><?php echo $resProyecto->finalidad; ?></td>
        <td class="titulo">Función</td>
        <td><?php echo $resProyecto->funcion; ?></td>
        <td class="titulo">Subfunción</td>
        <td><?php echo $resProyecto->subfuncion; ?></td>
        <td class="titulo">Propósito</td>
        <td><?php echo $resProyecto->proposito; ?></td>
  </tr>
</table>
<table>
 <col style="width: 100%">
   <tr class="thead">
     	<td>RESULTADOS</td>
   </tr>
</table>
<table cellspacing="0" border="1" >
 <col style="width: 10%">
 <col style="width: 20%">
 <col style="width: 40%">
 <col style="width: 20%">
 <col style="width: 10%">
    <tr>
    	<td class="titulo">Nivel</td>
        <td class="titulo">Objetivos</td>
        <td>
        	<table cellspacing="0" cellpadding="0">
            <col style="width: 100%">
            	<tr>
                	<td class="titulo">Indicadores</td>
                </tr>
                <tr>
                    <td class="titulo">Denominación - Método de cálculo - Tipo - Dimensión-Frecuencia - Sentido - Meta Anual</td>
                </tr>
            </table>
        </td>
        <td class="titulo">Medios de Verificación</td>
        <td class="titulo">Supuestos</td>
    </tr>
<?php
$consulta = "SELECT
			ip.fin_objetivo,
			ip.nombre_fin,
			ip.metodo_fin,
			ip.dimension_fin,
			ip.tipo_fin,
			ip.frecuencia_fin,
			ip.sentido_fin,
			ip.u_medida_fin,
			ip.meta_fin,
			ip.proposito_objetivo,
			ip.proposito_nombre,
			ip.proposito_metodo,
			ip.proposito_tipo,
			ip.proposito_dimension,
			ip.proposito_frecuencia,
			ip.proposito_sentido,
			ip.proposito_unidad_medida,
			ip.proposito_meta,
			ip.medio_verifica_fin,
			ip.supuesto_fin,
			ip.medio_verifica_pro,
			ip.supuesto_pro,
			ip.completado
			FROM
			indicadores_proyecto AS ip
			WHERE
			ip.id_proyecto =  $idProyecto;";
$consulta = mysql_query($consulta,$siplan_data_conn) or die (mysql_error());
$resProyecto = mysql_fetch_object($consulta);
?>
    <tr>
    	<td><?php echo "FIN"; ?></td>
        <td><?php echo $resProyecto->fin_objetivo; ?></td>
        <td>
        	<?php echo "<strong>NOMBRE: </strong>".$resProyecto->nombre_fin.
			           "<br/><strong>MÉTODO DE CALCULO: </strong>".$resProyecto->metodo_fin.
					   "<br/><strong>TIPO: </strong>".$resProyecto->tipo_fin.
					   "<br/><strong>DIMENSIÓN: </strong>".$resProyecto->dimension_fin.
					   "<br/><strong>FRECUENCIA: </strong>".$resProyecto->frecuencia_fin.
					   "<br/><strong>SENTIDO: </strong>".$resProyecto->sentido_fin.
					   "<br/><strong>UNIDAD DE MEDIDA: </strong>".$resProyecto->u_medida_fin.
					   "<br/><strong>META ANUAL: </strong>".$resProyecto->meta_fin; ?>
        </td>
        <td><?php echo $resProyecto->medio_verifica_fin; ?></td>
        <td><?php echo $resProyecto->supuesto_fin; ?></td>
    </tr>
    <tr>
    	<td><?php echo "PROPOSITO"; ?></td>
        <td><?php echo $resProyecto->proposito_objetivo; ?></td>
        <td>
        	<?php echo "<strong>NOMBRE: </strong>".$resProyecto->proposito_nombre.
			           "<br/><strong>MÉTODO DE CALCULO: </strong>".$resProyecto->proposito_metodo.
					   "<br/><strong>TIPO: </strong>".$resProyecto->proposito_tipo.
					   "<br/><strong>DIMENSIÓN: </strong>".$resProyecto->proposito_dimension.
					   "<br/><strong>FRECUENCIA: </strong>".$resProyecto->proposito_frecuencia.
					   "<br/><strong>SENTIDO: </strong>".$resProyecto->proposito_sentido.
					   "<br/><strong>UNIDAD DE MEDIDA: </strong>".$resProyecto->proposito_unidad_medida.
					   "<br/><strong>META ANUAL: </strong>".$resProyecto->proposito_meta; ?>
        </td>
        <td><?php echo $resProyecto->medio_verifica_pro; ?></td>
        <td><?php echo $resProyecto->supuesto_pro; ?></td>
    </tr>
<?php
$consulta = "SELECT
			ic.id_componente,
			ic.objetivo,
			ic.nombre,
			ic.metodo_calculo,
			ic.tipo_indicador,
			ic.dimension,
			ic.frecuencia,
			ic.u_medida_indicador,
			ic.meta_anual,
			ic.medio_verifica,
			ic.supuesto,
			ic.sentido,
			c.id_proyecto,
			c.id_componente,
			c.descripcion
			FROM
			indicadores_componente AS ic
			Inner Join componentes AS c ON ic.id_componente = c.id_componente AND c.id_proyecto = $idProyecto;";
$consulta = mysql_query($consulta,$siplan_data_conn) or die (mysql_error());
while($resProyecto = mysql_fetch_object($consulta))
{
?>
    <tr>
    	<td><?php echo "COMPONENTE"; ?></td>
        <td><?php echo $resProyecto->descripcion; ?></td>
        <td>
        	<?php echo "<strong>NOMBRE: </strong>".$resProyecto->nombre.
			           "<br/><strong>MÉTODO DE CALCULO: </strong>".$resProyecto->metodo_calculo.
					   "<br/><strong>TIPO: </strong>".$resProyecto->tipo_indicador.
					   "<br/><strong>DIMENSIÓN: </strong>".$resProyecto->dimension.
					   "<br/><strong>FRECUENCIA: </strong>".$resProyecto->frecuencia.
					   "<br/><strong>SENTIDO: </strong>".$resProyecto->sentido.
					   "<br/><strong>UNIDAD DE MEDIDA: </strong>".$resProyecto->u_medida_indicador.
					   "<br/><strong>META ANUAL: </strong>".$resProyecto->meta_anual; ?>
        </td>
        <td><?php echo $resProyecto->medio_verifica; ?></td>
        <td><?php echo $resProyecto->supuesto; ?></td>
    </tr>
			<?php
        $consultaAcciones = "SELECT
						ia.nombre,
						ia.metodo_calculo,
						ia.tipo_indicador,
						ia.dimension,
						ia.frecuencia,
						ia.sentido,
						ia.u_medida_indicador,
						ia.meta_anual,
						a.descripcion
						FROM
						acciones AS a
						Inner Join indicadores_accion AS ia ON a.id_accion = ia.id_accion AND a.id_componente =
						".$resProyecto->id_componente."
						AND a.id_proyecto = $idProyecto;";
        $consultaAcciones = mysql_query($consultaAcciones,$siplan_data_conn) or die (mysql_error());
        while($acciones = mysql_fetch_object($consultaAcciones))
        {
        ?>
            <tr>
                <td><?php echo "ACTIVIDAD"; ?></td>
                <td><?php echo $acciones->descripcion; ?></td>
                <td>
                    <?php echo "<strong>NOMBRE: </strong>".$acciones->nombre.
                               "<br/><strong>MÉTODO DE CALCULO: </strong>".$acciones->metodo_calculo.
                               "<br/><strong>TIPO: </strong>".$acciones->tipo_indicador.
                               "<br/><strong>DIMENSIÓN: </strong>".$acciones->dimension.
                               "<br/><strong>FRECUENCIA: </strong>".$acciones->frecuencia.
                               "<br/><strong>SENTIDO: </strong>".$acciones->sentido.
                               "<br/><strong>UNIDAD DE MEDIDA: </strong>".$acciones->u_medida_indicador.
                               "<br/><strong>META ANUAL: </strong>".$acciones->meta_anual; ?>
                </td>
                <td><?php echo $resProyecto->medio_verifica; ?></td>
                <td><?php echo $resProyecto->supuesto; ?></td>
            </tr>
        <?php
        }
        ?>
<?php
}
?>
</table>
<?php if(!$pdf)
{?>
</body>
</html>
<?php
}
	$salida = ob_get_contents();
	//ob_end_flush();
	$salida = ob_get_clean();
	if($pdf)
	{
		/*$dompdf = new DOMPDF();
		$dompdf->load_html(utf8_decode($salida));
		$dompdf->set_paper("legal","landscape");
		$dompdf->render();
		$canvas = $dompdf->get_canvas();
		$font = Font_Metrics::get_font("helvetica", "bold");
		$canvas->page_text(20, 585, "Reporte MIR Pag {PAGE_NUM} de {PAGE_COUNT}",$font, 7, array(0,0,0));
		$canvas->page_text(450, 585, "Fecha del reporte: ".date('d-m-Y | h:i:s a'),$font, 7, array(0,0,0));
		$dompdf->stream("sample.pdf",array("Attachment" => 0));*/
		//return $dompdf->output();

		require_once('html2pdf.class.php');
		try
		{
			$html2pdf = new HTML2PDF('L', 'A4', 'es',true,"UTF-8", array(3,16,3,5)); //array(0,15,1,1));
			//  $html2pdf = new HTML2PDF('P', 'A4', 'es');
			//$html2pdf = new HTML2PDF('L', 'A4', 'es',true,"UTF-8", array(3,16,3,1));
			$html2pdf->pdf->SetDisplayMode('fullpage');
			//$html2pdf->pdf
			//$html2pdf->pdf->SetProtection(array('print'), 'spipu');
			//$html2pdf->createIndex();
			$html2pdf->writeHTML($salida, isset($_GET['vuehtml']));
			$html2pdf->Output('reporte.pdf');
		}
		catch(HTML2PDF_exception $e)
		{
			echo $e;
			exit;
		}
	}
	else
	{
		echo $salida;
	}
?>
