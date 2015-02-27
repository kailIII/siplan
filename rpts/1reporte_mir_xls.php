<?php
ini_set('display_errors', '1');
session_start();
function u($c)
{
	return utf8_encode($c);
}
require_once 'PHPExcel_1.7.9/Classes/PHPExcel.php';
require_once("../seguridad/siplan_connection_db.php");
date_default_timezone_set('America/Mexico_City');
$idProyecto = 1;
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
// Create new PHPExcel object
$objPHPExcel = new PHPExcel();

// Set document properties
$objPHPExcel->getProperties()->setCreator("Eric de la Rosa Mejía");


// Add some data

//Agregas el logo  con un nuevo objeto

/* BLOQUE DE FUSION DE COLUMNAS PARA LA PRIMERA TABLA "DATOS DE PROYECTO"*/
$objPHPExcel->setActiveSheetIndex(0)
            ->mergeCells('B6:L6')
		    ->mergeCells('B1:J5')
			->mergeCells('B7:L7')
			->mergeCells('B8:U8')
			->mergeCells('C9:H9')
			->mergeCells('I9:J9')
			->mergeCells('L9:O9')
			->mergeCells('Q9:R9')
			->mergeCells('T9:U9');

$objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue('B6', 'Matriz de Indicadores para Resultados (MIR)')
			->setCellValue('B8', 'DATOS DEL PROYECTO')
			->setCellValue('B9', 'Nombre del Proyecto')
			->setCellValue('C9',  u($resProyecto->nombre))
			->setCellValue('I9', 'Número de Proyecto')
			->setCellValue('K9', $resProyecto->id_proyecto)
			->setCellValue('P9', 'Unidad Responsable')
			->setCellValue('Q9', u($resProyecto->u_responsable))
			->setCellValue('S9', 'Nombre de Titular')
			->setCellValue('T9', u($resProyecto->titular));

$objPHPExcel->getActiveSheet()->getCell('L9')->setValue("Inversion \n $".number_format($resProyecto->inversion,2));
$objPHPExcel->getActiveSheet()->getStyle('L9')->getAlignment()->setWrapText(true);


/* BLOQUE DE FUSION DE COLUMNAS PARA LA SEGUNDA TABLA "ALINEACION"*/
$objPHPExcel->setActiveSheetIndex(0)
            ->mergeCells('B10:U10')
			->mergeCells('B11:J11')
			->mergeCells('k11:P11')
			->mergeCells('Q11:U11')
			->mergeCells('C12:I12')
			->mergeCells('K12:P12')
			->mergeCells('R12:U12')
			->mergeCells('B13:B14')
			->mergeCells('C13:I14')
			->mergeCells('K13:P13')
			->mergeCells('K14:P14')
			->mergeCells('Q13:Q14')
			->mergeCells('R13:U14');

$objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue('B10', 'ALINEACION')
			->setCellValue('B11', 'Plan Nacional de Desarrollo 2013 - 2018')
			->setCellValue('K11', 'Plan Estatal de Desarrollo 2010 - 2006')
			->setCellValue('Q11', 'Objetivo Estratégico de la Dependencia o Entidad')
			->setCellValue('K11', 'Plan Estatal de Desarrollo 2010 - 2006')
			->setCellValue('B12', 'Eje de Política Pública')
			->setCellValue('C12', u($resProyecto->pnd_eje))
			->setCellValue('J12', 'Eje:')
			->setCellValue('K12', u($resProyecto->eje))
			->setCellValue('Q12', 'Dependencia o Entidad')
			->setCellValue('R12', u($resProyecto->eje))	//$_SESSION['nombre_dependencia_v3']
			->setCellValue('B13', 'Objetivo')
			->setCellValue('C13', u($resProyecto->pnd_linea))
			->setCellValue('J13', 'Línea Estratégica')
			->setCellValue('K13', u($resProyecto->linea))
			->setCellValue('J14', 'Estrategia')
			->setCellValue('K14', u($resProyecto->estrategia))
			->setCellValue('Q13', 'Objetivo')
			->setCellValue('R13', u($resProyecto->pr_objetivo));

$objPHPExcel->getActiveSheet()->getRowDimension(14)->setRowHeight(autoajustarAltoCelda(insertarSaltosDeLinea($resProyecto->pnd_linea,40))+15);
$objPHPExcel->getActiveSheet()->getStyle('C13')->getAlignment()->setWrapText(true);
$objPHPExcel->getActiveSheet()->getRowDimension(14)->setRowHeight(autoajustarAltoCelda(insertarSaltosDeLinea($resProyecto->estrategia,40))+15);
$objPHPExcel->getActiveSheet()->getStyle('K14')->getAlignment()->setWrapText(true);

/* BLOQUE DE FUSION DE COLUMNAS PARA LA TERCER TABLA "CLASIFICACIÓN FUNCIONAL"*/
$objPHPExcel->setActiveSheetIndex(0)
            ->mergeCells('B15:U15')
			->mergeCells('C16:G16')
			->mergeCells('J16:K16')
			->mergeCells('L16:M16')
			->mergeCells('N16:P16')
			->mergeCells('R16:U16');

$objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue('B15', 'CLASIFICACIÓN FUNCIONAL')
			->setCellValue('B16', 'Finalidad')
			->setCellValue('C16', u($resProyecto->finalidad))
			->setCellValue('I16', 'Función')
			->setCellValue('J16', u($resProyecto->funcion))
			->setCellValue('L16', 'Subfunción')
			->setCellValue('N16', u($resProyecto->subfuncion))
			->setCellValue('Q16', 'Proposito')
			->setCellValue('R16', u($resProyecto->proposito));

/* BLOQUE DE FUSION DE COLUMNAS PARA LA CUARTA TABLA "RESULTADOS"*/
$objPHPExcel->setActiveSheetIndex(0)
            ->mergeCells('B17:U17')
			->mergeCells('B18:B20')
			->mergeCells('C18:H20')
			->mergeCells('I18:O18')
			->mergeCells('I19:O20')
			->mergeCells('P18:S20')
			->mergeCells('T18:U20');

$objPHPExcel->setActiveSheetIndex(0)
			->setCellValue('B17', 'RESULTADOS')
            ->setCellValue('B18', 'NIVEL')
			->setCellValue('C18', 'OBJETIVOS')
			->setCellValue('I18', 'INDICADORES')
			->setCellValue('I19', 'Denominación - Método de cálculo - Tipo-Dimensión-Frecuencia - Sentido - Meta Anual')
			->setCellValue('P18', 'MEDIOS DE VERIFICACIÓN')
			->setCellValue('T18', 'SUPUESTOS');
/*********************************************ESTILOS**********************************************************/
/****ESTILO PARA EL NOMBRE DE LA FORMATO***/

$estiloNombreFormato = array(
	'font' => array(
		'bold' => false,
		'name' => 'EurekaSans-Bold',
		'size' => 16,
		'color' => array('argb' => 'FFFFFF'),
	),
	'alignment' => array(
		'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
	),
	'borders' => array(
        'left' => array(
          'style' => PHPExcel_Style_Border::BORDER_THIN,
		  'color' => array(
				'rgb' => '000000',
			),
        ),
        'right' => array(
          'style' => PHPExcel_Style_Border::BORDER_THIN,
		  'color' => array(
				'rgb' => '000000',
			),
        ),
        'vertical' => array(
          'style' => PHPExcel_Style_Border::BORDER_THIN,
		  'color' => array(
				'rgb' => '000000',
			),
        ),
      ),
	'fill' => array(
		'type' => PHPExcel_Style_Fill::FILL_SOLID,
		'rotation' => 90,
		'startcolor' => array(
			'argb' => 'CCCCCC',
		),
	),
);

/****ESTILO PARA LOS TITULOS****/
$estiloTitulos = array(
	'font' => array(
		'bold' => false,
		'size' => 12,
		'color' => array(
		'name' => 'arial',
			'argb' => 'FFFFFF',
		),
	),
	'alignment' => array(
		'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
	),
	'borders' => array(
        'left' => array(
          'style' => PHPExcel_Style_Border::BORDER_THIN,
		  'color' => array(
				'rgb' => '165165165',
			),
        ),
        'right' => array(
          'style' => PHPExcel_Style_Border::BORDER_THIN,
		  'color' => array(
				'rgb' => '165165165',
			),
        ),
        'vertical' => array(
          'style' => PHPExcel_Style_Border::BORDER_THIN,
		  'color' => array(
				'rgb' => '165165165',
			),
        ),
      ),
	'fill' => array(
		'type' => PHPExcel_Style_Fill::FILL_SOLID,
		'rotation' => 90,
		'startcolor' => array(
			'argb' => '003300',
		),
	),
);

/****ESTILO PARA LOS SUBTITULOS****/

 $estiloSubtitulos = array(
	'font' => array(
		'bold' => false,
		'name' => 'arial',
		'size' => 10,
		'color' => array(
			'argb' => '000000',
		),
	),
	'alignment' => array(
		'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
	),
	'borders' => array(
        'left' => array(
          'style' => PHPExcel_Style_Border::BORDER_THIN,
		  'color' => array(
				'rgb' => '000000',
			),
        ),
        'right' => array(
          'style' => PHPExcel_Style_Border::BORDER_THIN,
		  'color' => array(
				'rgb' => '000000',
			),
        ),
        'vertical' => array(
          'style' => PHPExcel_Style_Border::BORDER_THIN,
		  'color' => array(
				'rgb' => '000000',
			),
        ),
      ),
	'fill' => array(
		'type' => PHPExcel_Style_Fill::FILL_SOLID,
		'rotation' => 90,
		'startcolor' => array(
			'argb' => '999999',
		),
	),
);
 /****ESTILO PARA LOS RUBROS****/

  $estiloRubros = array(
	'font' => array(
		'bold' => true,
		'name' => 'arial',
		'size' => 8,
		'color' => array(
			'argb' => '12800000',
		),
	),
	'alignment' => array(
		'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
		'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER,
	),
);

 /****ESTILO PARA CENTRAR LOS TEXTOS***********/

  $estiloTexto = array(
	'font' => array(
		'bold' => false,
		'name' => 'arial',
		'size' => 10,
	),
	'alignment' => array(
		'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
		'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER,
	),
	'borders' => array(
        'left' => array(
          'style' => PHPExcel_Style_Border::BORDER_THIN,
		  'color' => array(
				'rgb' => '000000',
			),
        ),
        'right' => array(
          'style' => PHPExcel_Style_Border::BORDER_THIN,
		  'color' => array(
				'rgb' => '000000',
			),
        ),
        'top' => array(
          'style' => PHPExcel_Style_Border::BORDER_THIN,
		  'color' => array(
				'rgb' => '000000',
			),
        ),
		'bottom' => array(
          'style' => PHPExcel_Style_Border::BORDER_THIN,
		  'color' => array(
				'rgb' => '000000',
			),
        ),
	  ),
	);

/*******************ESTILO TABLAS*****************************/
$estiloTabla = array(
	'font' => array(
		'bold' => false,
		'name' => 'arial',
		'size' => 10,
		'color' => array(
			'argb' => '000000',
		),

	),
	/*'alignment' => array(
		'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
	),*/
	'borders' => array(
        'left' => array(
          'style' => PHPExcel_Style_Border::BORDER_THIN,
		  'color' => array(
				'rgb' => '000000',
			),
        ),
        'right' => array(
          'style' => PHPExcel_Style_Border::BORDER_THIN,
		  'color' => array(
				'rgb' => '000000',
			),
        ),
        'top' => array(
          'style' => PHPExcel_Style_Border::BORDER_THIN,
		  'color' => array(
				'rgb' => '000000',
			),
        ),
		'bottom' => array(
          'style' => PHPExcel_Style_Border::BORDER_THIN,
		  'color' => array(
				'rgb' => '000000',
			),
        ),
      ),
	);

/*******************************ESTILOS DE LAS CELDAS***********************************************************/
$objPHPExcel->getActiveSheet()->getStyle('B6')->applyFromArray($estiloNombreFormato);

$objPHPExcel->getActiveSheet()->getStyle('B8:U8')->applyFromArray($estiloTitulos);
$objPHPExcel->getActiveSheet()->getStyle('B10:U10')->applyFromArray($estiloTitulos);
$objPHPExcel->getActiveSheet()->getStyle('B15:U15')->applyFromArray($estiloTitulos);
$objPHPExcel->getActiveSheet()->getStyle('B17:U17')->applyFromArray($estiloTitulos);
$objPHPExcel->getActiveSheet()->getStyle('B11:U11')->applyFromArray($estiloSubtitulos);
$objPHPExcel->getActiveSheet()->getStyle('B18:U20')->applyFromArray($estiloSubtitulos);

$objPHPExcel->getActiveSheet()->getStyle('B16')->applyFromArray($estiloSubtitulos);
$objPHPExcel->getActiveSheet()->getStyle('I16')->applyFromArray($estiloSubtitulos);
$objPHPExcel->getActiveSheet()->getStyle('L16')->applyFromArray($estiloSubtitulos);
$objPHPExcel->getActiveSheet()->getStyle('Q16')->applyFromArray($estiloSubtitulos);

$objPHPExcel->getActiveSheet()->getStyle('B9')->applyFromArray($estiloRubros);
$objPHPExcel->getActiveSheet()->getStyle('I9')->applyFromArray($estiloRubros);
$objPHPExcel->getActiveSheet()->getStyle('L9')->applyFromArray($estiloRubros);
$objPHPExcel->getActiveSheet()->getStyle('P9')->applyFromArray($estiloRubros);
$objPHPExcel->getActiveSheet()->getStyle('S9')->applyFromArray($estiloRubros);
$objPHPExcel->getActiveSheet()->getStyle('B12')->applyFromArray($estiloRubros);
$objPHPExcel->getActiveSheet()->getStyle('B13')->applyFromArray($estiloRubros);
$objPHPExcel->getActiveSheet()->getStyle('J12')->applyFromArray($estiloRubros);
$objPHPExcel->getActiveSheet()->getStyle('J13')->applyFromArray($estiloRubros);
$objPHPExcel->getActiveSheet()->getStyle('J14')->applyFromArray($estiloRubros);
$objPHPExcel->getActiveSheet()->getStyle('Q12')->applyFromArray($estiloRubros);
$objPHPExcel->getActiveSheet()->getStyle('Q13')->applyFromArray($estiloRubros);

/***********************TAMAÑOS DE LAS CELDAS***********************************************/
$objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(4);
$objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(15);
$objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(5);
$objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(5);
$objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(5);
$objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(5);
$objPHPExcel->getActiveSheet()->getColumnDimension('G')->setWidth(5);
$objPHPExcel->getActiveSheet()->getColumnDimension('H')->setWidth(1);
$objPHPExcel->getActiveSheet()->getColumnDimension('I')->setWidth(7);
$objPHPExcel->getActiveSheet()->getColumnDimension('K')->setWidth(6);


$objPHPExcel->getActiveSheet()->getColumnDimension('C')->setAutoSize(true);
$objPHPExcel->getActiveSheet()->getRowDimension('31')->setCollapsed(true);
$objPHPExcel->getActiveSheet()->getDefaultColumnDimension(0)->setWidth(15);

/***************************AUTOAJUSTAR CONTENIDO A TAMAÑO DE CELDA*************************/
$objPHPExcel->getActiveSheet()->getStyle('B9')->getAlignment()->setWrapText(true);
$objPHPExcel->getActiveSheet()->getStyle('P9')->getAlignment()->setWrapText(true);
$objPHPExcel->getActiveSheet()->getStyle('B12')->getAlignment()->setWrapText(true);
$objPHPExcel->getActiveSheet()->getStyle('J13')->getAlignment()->setWrapText(true);
$objPHPExcel->getActiveSheet()->getStyle('J16')->getAlignment()->setWrapText(true);
$objPHPExcel->getActiveSheet()->getStyle('L12')->getAlignment()->setWrapText(true);
$objPHPExcel->getActiveSheet()->getStyle('L13')->getAlignment()->setWrapText(true);
$objPHPExcel->getActiveSheet()->getStyle('L14')->getAlignment()->setWrapText(true);
$objPHPExcel->getActiveSheet()->getStyle('Q12')->getAlignment()->setWrapText(true);
$objPHPExcel->getActiveSheet()->getStyle('R12')->getAlignment()->setWrapText(true);
$objPHPExcel->getActiveSheet()->getStyle('R13')->getAlignment()->setWrapText(true);
$objPHPExcel->getActiveSheet()->getStyle('C16')->getAlignment()->setWrapText(true);
$objPHPExcel->getActiveSheet()->getStyle('J16')->getAlignment()->setWrapText(true);
$objPHPExcel->getActiveSheet()->getStyle('N16')->getAlignment()->setWrapText(true);
$objPHPExcel->getActiveSheet()->getStyle('R16')->getAlignment()->setWrapText(true);

/***************************SE ESTABLECE LOGO***********************************************/
$objDrawing = new PHPExcel_Worksheet_Drawing();
$objDrawing->setName('Logo');
$objDrawing->setDescription('Logo');
$objDrawing->setPath('logoupla.png');
$objDrawing->setWidth(150);
$objDrawing->setHeight(100);
$objDrawing->setCoordinates('B1');
$objDrawing->setWorksheet($objPHPExcel->getActiveSheet());

// Rename worksheet
$objPHPExcel->getActiveSheet()->setTitle('MIR');

/*******************************ESTABLECE AREA DE IMPRESION Y LOS AJUSTES***********************************/
//$objPHPExcel->getActiveSheet()->getPageSetup()->setPrintArea('A1:U25');
$objPHPExcel->getActiveSheet()->getStyle('C13:I14')
->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_TOP);


/******************************AJUSTA LA ESCALA DEL DOCUMENTO*********************************/
$objPHPExcel->getActiveSheet()->getPageSetup()->setScale(55);

/******************************AJUSTAR MARGENES***********************************************/
$objPHPExcel->getActiveSheet()->getPageMargins()->setTop(0);
$objPHPExcel->getActiveSheet()->getPageMargins()->setRight(0);
$objPHPExcel->getActiveSheet()->getPageMargins()->setLeft(0);
$objPHPExcel->getActiveSheet()->getPageMargins()->setBottom(0);


/*******************************ESTABLECE ORIENTACION DE LA HOJA******************************/
$objPHPExcel->getActiveSheet()->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);

//BLOQUE DE CODIGO PARA CONSTRUIR LOS DATOS DE LOS RESULTADOS**********************************/
/*******BLOQUE PARA CONSTRUIR LA FILA DE "FIN DEL PROYECTO"*******/
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
/***********************************FILA DE FIN*********************************************************/
$objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue('B21', 'FIN')
			->setCellValue('C21', $resProyecto->fin_objetivo)
			->setCellValue('I21', textFormateadoIndicadores(formarArreglo(array($resProyecto->nombre_fin,
																				$resProyecto->metodo_fin,
																				$resProyecto->tipo_fin,
																				$resProyecto->dimension_fin,
																				$resProyecto->frecuencia_fin,
																				$resProyecto->sentido_fin,
																				$resProyecto->u_medida_fin,
																				$resProyecto->meta_fin))))
	        ->setCellValue('P21', $resProyecto->medio_verifica_fin)
		    ->setCellValue('T21', $resProyecto->supuesto_fin);

$objPHPExcel->setActiveSheetIndex(0)
			->mergeCells('C21:H21')
			->mergeCells('J16:K16')
			->mergeCells('I21:O21')
			->mergeCells('P21:S21')
			->mergeCells('T21:U21');

$objPHPExcel->getActiveSheet()->getStyle('B21')->applyFromArray($estiloTexto);
$objPHPExcel->getActiveSheet()->getStyle('C21:H21')->applyFromArray($estiloTexto);
$objPHPExcel->getActiveSheet()->getStyle('I21:O21')->applyFromArray($estiloTabla);
$objPHPExcel->getActiveSheet()->getStyle('P21:S21')->applyFromArray($estiloTexto);
$objPHPExcel->getActiveSheet()->getStyle('T21:U21')->applyFromArray($estiloTexto);

$objPHPExcel->getActiveSheet()->getStyle('I21')->getAlignment()->setWrapText(true);
$objPHPExcel->getActiveSheet()->getRowDimension('21')->setRowHeight(140);
$objPHPExcel->getActiveSheet()->getRowDimension('21')->setCollapsed(true);
//$objPHPExcel->getActiveSheet()->getDefaultColumnDimension(0)->setWidth(15);

/**************************************************FILA DE PROPOSITO**********************************************/

$objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue('B22', 'PROPOSITO')
			->setCellValue('C22', $resProyecto->fin_objetivo)
			->setCellValue('I22', textFormateadoIndicadores(formarArreglo(array($resProyecto->proposito_nombre,
																				$resProyecto->proposito_metodo,
																				$resProyecto->proposito_tipo,
																				$resProyecto->proposito_dimension,
																				$resProyecto->proposito_frecuencia,
																				$resProyecto->proposito_sentido,
																				$resProyecto->proposito_unidad_medida,
																				$resProyecto->proposito_meta))))
	        ->setCellValue('P22', $resProyecto->medio_verifica_pro)
		    ->setCellValue('T22', $resProyecto->supuesto_pro);

$objPHPExcel->setActiveSheetIndex(0)
			->mergeCells('C22:H22')
			->mergeCells('J16:K16')
			->mergeCells('I22:O22')
			->mergeCells('P22:S22')
			->mergeCells('T22:U22');

$objPHPExcel->getActiveSheet()->getStyle('B22')->applyFromArray($estiloTexto);
$objPHPExcel->getActiveSheet()->getStyle('C22:H22')->applyFromArray($estiloTexto);
$objPHPExcel->getActiveSheet()->getStyle('I22:O22')->applyFromArray($estiloTabla);
$objPHPExcel->getActiveSheet()->getStyle('P22:S22')->applyFromArray($estiloTexto);
$objPHPExcel->getActiveSheet()->getStyle('T22:U22')->applyFromArray($estiloTexto);

$objPHPExcel->getActiveSheet()->getStyle('I22')->getAlignment()->setWrapText(true);
$objPHPExcel->getActiveSheet()->getRowDimension('22')->setRowHeight(140);
$objPHPExcel->getActiveSheet()->getRowDimension('22')->setCollapsed(true);
//$objPHPExcel->getActiveSheet()->getDefaultColumnDimension(0)->setWidth(15);

/****************************************CODIGO PARA GENERAR COMPONENTES Y ACTIVIDAD*******************************************/
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
			c.id_componente
			FROM
			indicadores_componente AS ic
			Inner Join componentes AS c ON ic.id_componente = c.id_componente AND c.id_proyecto = $idProyecto;";
$resComponente = mysql_query($consulta,$siplan_data_conn) or die (mysql_error());
$fila = 23; //APARTIR DE AQUI SE PONE COMO VARIABLE SEGUN EL NUMERO DE COMPONENTES Y ACTIVIDADES DEL PROYECTO
while($componente = mysql_fetch_object($resComponente))
{

$objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue('B'.$fila, 'COMPONENTE')
			->setCellValue('C'.$fila, $componente->objetivo)
			->setCellValue('I'.$fila, textFormateadoIndicadores(formarArreglo(array($componente->nombre,
																					$componente->metodo_calculo,
																					$componente->tipo_indicador,
																					$componente->dimension,
																					$componente->frecuencia,
																					$componente->sentido,
																					$componente->u_medida_indicador,
																					$componente->meta_anual))))
	        ->setCellValue('P'.$fila, $componente->medio_verifica)
		    ->setCellValue('T'.$fila, $componente->supuesto);

$objPHPExcel->setActiveSheetIndex(0)
			->mergeCells('C'.$fila.':H'.$fila)
			->mergeCells('I'.$fila.':O'.$fila)
			->mergeCells('P'.$fila.':S'.$fila)
			->mergeCells('T'.$fila.':U'.$fila);

$objPHPExcel->getActiveSheet()->getStyle('B'.$fila)->applyFromArray($estiloTexto);
$objPHPExcel->getActiveSheet()->getStyle('C'.$fila.':H'.$fila)->applyFromArray($estiloTexto);
$objPHPExcel->getActiveSheet()->getStyle('I'.$fila.':O'.$fila)->applyFromArray($estiloTabla);
$objPHPExcel->getActiveSheet()->getStyle('P'.$fila.':S'.$fila)->applyFromArray($estiloTexto);
$objPHPExcel->getActiveSheet()->getStyle('T'.$fila.':U'.$fila)->applyFromArray($estiloTexto);


			$objPHPExcel->getActiveSheet()->getStyle('I'.$fila)->getAlignment()->setWrapText(true);
			$objPHPExcel->getActiveSheet()->getRowDimension($fila)->setRowHeight(140);
			$objPHPExcel->getActiveSheet()->getRowDimension($fila)->setCollapsed(true);
$fila++;

/*******************************BLOQUE DE LAS ACTIVIDADES DE UNA ACCION***********************************************/
 	 $consultaAcciones = "SELECT
						ia.nombre,
						ia.metodo_calculo,
						ia.tipo_indicador,
						ia.dimension,
						ia.frecuencia,
						ia.sentido,
						ia.u_medida_indicador,
						ia.meta_anual
						FROM
						acciones AS a
						Inner Join indicadores_accion AS ia ON a.id_accion = ia.id_accion AND a.id_componente =
						".$componente->id_componente."
						AND a.id_proyecto = $idProyecto;";
        $consultaAcciones = mysql_query($consultaAcciones,$siplan_data_conn) or die (mysql_error());
        while($acciones = mysql_fetch_object($consultaAcciones))
        {
			$objPHPExcel->setActiveSheetIndex(0)
							->setCellValue('B'.$fila, 'ACCIONES')
							->setCellValue('C'.$fila, $acciones->nombre)
							->setCellValue('I'.$fila, textFormateadoIndicadores(formarArreglo(array($acciones->nombre,
																									$acciones->metodo_calculo,
																									$acciones->tipo_indicador,
																									$acciones->dimension,
																									$acciones->frecuencia,
																									$acciones->sentido,
																									$acciones->u_medida_indicador,
																									$acciones->meta_anual))))
							->setCellValue('P'.$fila, $componente->medio_verifica)
							->setCellValue('T'.$fila, $componente->supuesto);

			$objPHPExcel->setActiveSheetIndex(0)
						->mergeCells('C'.$fila.':H'.$fila)
						->mergeCells('I'.$fila.':O'.$fila)
						->mergeCells('P'.$fila.':S'.$fila)
						->mergeCells('T'.$fila.':U'.$fila);

			$objPHPExcel->getActiveSheet()->getStyle('B'.$fila)->applyFromArray($estiloTexto);
			$objPHPExcel->getActiveSheet()->getStyle('C'.$fila.':H'.$fila)->applyFromArray($estiloTexto);
			$objPHPExcel->getActiveSheet()->getStyle('I'.$fila.':O'.$fila)->applyFromArray($estiloTabla);
			$objPHPExcel->getActiveSheet()->getStyle('P'.$fila.':S'.$fila)->applyFromArray($estiloTexto);
			$objPHPExcel->getActiveSheet()->getStyle('T'.$fila.':U'.$fila)->applyFromArray($estiloTexto);

			$objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue('W'.$fila, autoajustarAltoCelda($acciones->nombre)+140);

			$objPHPExcel->getActiveSheet()->getStyle('I'.$fila)->getAlignment()->setWrapText(true);
			$objPHPExcel->getActiveSheet()->getRowDimension($fila)->setRowHeight(autoajustarAltoCelda($acciones->nombre)+140);
			$objPHPExcel->getActiveSheet()->getRowDimension($fila)->setCollapsed(true);
			$fila++;
		}
//$objPHPExcel->getActiveSheet()->getDefaultColumnDimension(0)->setWidth(15);
}



// Redirect output to a client’s web browser (Excel2007)
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="Reporte-MIR.xlsx"');
header('Cache-Control: max-age=0');
header("Content-Type: text/html; charset=UTF-8");
$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
$objWriter->save('php://output');
exit;

function textFormateadoIndicadores(array $campos)
{		/**********************BLOQUE PARA DEEFINIR TEXTO ENRIQUECIDO***********************/
	$objRichText = new PHPExcel_RichText();
	foreach($campos as $rubro=>$contenido)
	{
		//$objRichText->createText($rubro.": ");
		$objRichText->createText(strtoupper(str_replace("_"," ",$rubro)).": ");
		$objPayable = $objRichText->createTextRun($contenido."\n");
		$objPayable->getFont()->setBold(true);
	}
	return $objRichText;
}

function formarArreglo($texto)
{
	$arreglo = array();
	$arreglo["nombre"] = u($texto[0]);
	$arreglo["metodo_de_calculo"] = u($texto[1]);
	$arreglo["tipo"] = u($texto[2]);
	$arreglo["dimension"] = u($texto[3]);
	$arreglo["frecuencia"] = u($texto[4]);
	$arreglo["sentido"] = u($texto[5]);
	$arreglo["unidad_de_medida"] = u($texto[6]);
	$arreglo["meta_anual"] = u($texto[7]);
	return $arreglo;
}
function insertarSaltosDeLinea($texto,$noCaracteres)//FUNCION PARA CORTAR UN STRING CADA n CARACTERES E INSERTAR UN SALTO DE LINEA
{
	return wordwrap($texto,$noCaracteres,'\n');
}

function autoajustarAltoCelda($texto, $width=5) {
    $rc = 0;
    $line = explode("\n", $texto);
    foreach($line as $source) {
        $rc += intval((strlen($source) / $width) +1);
    }
    return $rc;
}
?>
