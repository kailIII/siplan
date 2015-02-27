<?php session_start(); 
date_default_timezone_set('America/Mexico_City');
require_once("../seguridad/deniedacces.php");
require_once("../seguridad/siplan_connection_db.php");
require_once("../seguridad/logout.php");
require('fpdf/fpdf.php');
//$siplan_data_conn; conexion
class PDF extends FPDF
{
	
	
//Cabecera de página
function Header()
{
$this->SetMargins(3,3);
$this->SetFont('Arial','B',13);
////////////////Logos//////////////////////////////////////////////
$this->Image('logoupla.jpg',5,5,81,17);

$this->SetXY(3,3);
$this->MultiCell(292,5,"UNIDAD DE PLANEACIÓN",0,C,0); 
$this->SetXY(3,9);
$this->MultiCell(292,5,"Dirección de Planeación",0,C,0); 
$this->SetXY(3,17);
$this->MultiCell(292,5,"Programa Operativo Anual de Inversión 2014",0,C,0); 
$this->SetFont('Arial','',10);
$this->SetXY(3,22);
$this->MultiCell(292,5,"Resumen de Inversion",0,C,0); 


$this->SetFont('Arial','B',10);
$this->SetXY(3,28);
$this->MultiCell(30,5,"Dependencia",0,L,0); 
$this->SetFont('Arial','',10);
$this->SetXY(33,28);
$resultado_dep = mysql_query("SELECT * FROM dependencias WHERE acronimo = '".$_GET['dep']."'") or die (mysql_error());
$res_dep = mysql_fetch_array($resultado_dep);
$this->MultiCell(115,5,utf8_decode($res_dep['nombre']),0,L,0); 
$this->SetFont('Arial','B',10);
$this->SetXY(148,28);

$resultado_sec = mysql_query("SELECT * FROM municipios WHERE id_finanzas = ".$_GET['mp']) or die (mysql_error());
$res_sec = mysql_fetch_array($resultado_sec);
$this->MultiCell(25,5,"Municipio ",0,L,0); 
$this->SetFont('Arial','',10);
$this->SetXY(170,28);
$this->MultiCell(10,5,$res_sec['id_finanzas'],0,C,0); 
$this->SetFont('Arial','',10);
$this->SetXY(180,28);
$this->MultiCell(170,5,utf8_decode($res_sec['nombre']),0,L,0); 

  switch ($_GET['s']){
		   case 1:
		   $status = "Estatus: Sin Aprobar";
		  
		   break;
		   case 2:
		   $status = "Estatus: Aprob. Dependencia";
		 
		   break;
		   case 3:
		   $status = "Estatus: Aprob. UPLA";
		  
		   break;   
		    case 4:
		   $status = "Estatus: Con Oficio de Ejec.";
		 
		   break; 
	   }

$this->SetXY(288,28);
$this->MultiCell(65,5,($status),0,L,0); 



$this->SetFont('Arial','B',5);

$this->SetXY(3,35);
$this->MultiCell(25,5,'',1,'C',0);

$this->SetXY(28,35);
$this->MultiCell(20,5,'',1,'C',0);

$this->SetXY(48,35);
$this->MultiCell(23,5,'',1,'C',0);

$this->SetXY(71,35);
$this->MultiCell(40,5,'',1,'C',0);

$this->SetXY(111,35);
$this->MultiCell(20,5,'',1,'C',0);

$this->SetXY(131,35);
$this->MultiCell(20,5,'',1,'C',0);

$this->SetXY(151,35);
$this->MultiCell(140,5,'ESTRUCTURA FINANCIERA 2014 (PESOS) PROGRAMADA',1,'C',0);
$this->SetXY(291,35);
$this->MultiCell(30,5,'METAS TOTALES',1,'C',0);
$this->SetXY(321,35);
$this->MultiCell(16,5,'BENEFICIARIOS',1,'C',0);
$this->SetXY(337,35);
$this->MultiCell(16,5,'PED',1,'C',0);




$X=3;
$Y=40;
$this->SetXY($X,$Y);



$this->Cell(25,5,'SECTOR.',1,0,'C');
$this->Cell(20,5,'DEP..',1,0,'C');
$this->Cell(23,5,'FONDO O MOD. DE INV.',1,0,'C');
$this->Cell(40,5,'DESCRIPCIÓN DE LA OBRA O ACCIÓN',1,0,'C');
$this->Cell(20,5,'MUNICIPIO',1,0,'C');
$this->Cell(20,5,'LOCALIDAD',1,0,'C');
$this->Cell(20,5,'TOTAL',1,0,'C');
$this->Cell(20,5,'FEDERAL',1,0,'C');
$this->Cell(20,5,'ESTATAL',1,0,'C');
$this->Cell(20,5,'MUNICIPAL',1,0,'C');
$this->Cell(20,5,'PARTICIP.',1,0,'C');
$this->Cell(20,5,'CREDITO',1,0,'C');
$this->Cell(20,5,'OTROS',1,0,'C');
$this->Cell(20,5,'MEDIDA',1,0,'C');
$this->Cell(10,5,'PROG.',1,0,'C');
$this->Cell(8,5,'HOMB.',1,0,'C');
$this->Cell(8,5,'MUJ.',1,0,'C');
$this->Cell(16,5,'EJE, LÍNEA, ESTR.',1,0,'C');



$X=30;
$Y=40;


$this->SetXY($X,$Y);



	$this->Ln(5);
}

//Pie de página
function Footer()
{
	//Posición: a 1,5 cm del final
	$this->SetY(-15);
	//Arial italic 8
	$this->SetFont('Arial','I',7);
	//Número de página
	$this->Cell(0,10,'Página '.$this->PageNo().'/{nb}',0,0,'C');
	
	$this->SetY(-10);
	$this->Cell(50,5,'Fecha de Impresón: '.date('d/m/Y'),0,0,'C');
	
	
	//date('Y/m/d')
}
}


//Creación del objeto de la clase heredada
$pdf=new PDF('L','mm','Legal');  //$pdf=new PDF('L','mm','Legal');  oficio array(215.90,340) 21.59 x 35.56 es del tamaño legal
//$pdf=new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial','',6);

function limpiar($String){
$String = str_replace('á',"Á",$String);
$String = str_replace('í',"Í",$String);
$String = str_replace('é',"É",$String);
$String = str_replace('ó',"Ó",$String);
$String = str_replace('ú',"Ú",$String);
$String = str_replace("ñ","Ñ",$String);
$String = str_replace("ý","Ý",$String);

$String = str_replace('Á',"á",$String);
$String = str_replace('Í',"í",$String);
$String = str_replace('É',"é",$String);
$String = str_replace('Ó',"ó",$String);
$String = str_replace('Ú',"ú",$String);
$String = str_replace("Ñ","ñ",$String);
$String = str_replace("Ý","ý",$String);


return $String;
}

if($fecha!=""){


	}





$pdf->SetWidths(array(25,20,23,40,20,20,20,20,20,20,20,20,20,20,10,8,8,16));
$pdf->SetAligns(array(L,C,L,L,C,C,R,R,R,R,R,R,R,C,C,C,C,C));

$id_dependencia = $_SESSION['id_dependencia_v3'];



 if ($_GET['dep']!="" and $_GET['mp']!="" ){
	 
	 
		
	$consulta_obras = mysql_query("SELECT (dependencias.acronimo) as nom_dep, sectores.id_sector, sectores.sector,obras.prioridad, (obras.descripcion) as nom_obra, (proyectos.nombre) as nom_proy, eje.eje, (linea.nombre) as nom_linea, (estrategias.nombre) as nom_estr, municipios.id_finanzas, (municipios.nombre) as nom_mun, localidades.id_localidad, (localidades.id_finanzas) as idlfin, (localidades.nombre) as nom_loc, regiones.id_region, (regiones.nombre) as nom_reg, obras.ben_h, obras.ben_m, obras.cantidad, (unidad_medida_prog02.descripcion) as nom_med, obras.fecha_inicio, obras.fecha_fin, (programas_poa.clave) as cvprg, (programas_poa.descripcion) nom_ppoa, (subprogramas_poa.clave) as  cvsprg, (subprogramas_poa.descripcion) as sppoa, obras.obra, (componentes.descripcion) as nom_com,  (origen.c08c_tipori) as nom_origen,origen.s08c_origen, obras.modalidad, obras.retencion, aportes.federal, aportes.estatal, aportes.municipal, aportes.participantes, aportes.credito, aportes.otros, obras.programa, obras.otro_prog,proyectos.id_proyecto,componentes.id_componente,unidad_medida_prog02.id_unidad,subprogramas_poa.id_subprograma_poa,programas_poa.id_programa_poa, obras.ben_h, obras.ben_m, obras.id_obra,obras.municipio, obras.localidad , proyectos.no_proyecto
FROM origen INNER JOIN (((programas_poa INNER JOIN (subprogramas_poa INNER JOIN (unidad_medida_prog02  INNER JOIN ((componentes INNER JOIN (sectores INNER JOIN (regiones INNER JOIN (municipios INNER JOIN ((dependencias INNER JOIN obras ON dependencias.id_dependencia = obras.id_dependencia) INNER JOIN (eje INNER JOIN proyectos ON eje.id_eje = proyectos.id_eje) ON (proyectos.id_proyecto = obras.id_proyecto) AND (dependencias.id_dependencia = proyectos.id_dependencia)) ON municipios.id_finanzas = 
obras.municipio) ON regiones.id_region = municipios.id_region) ON sectores.id_sector = dependencias.id_sector) ON (proyectos.id_proyecto = componentes.id_proyecto) AND (componentes.id_componente = obras.id_componente)) INNER JOIN localidades ON municipios.id_municipio = localidades.id_municipio) ON (unidad_medida_prog02.id_unidad = obras.u_medida) AND (unidad_medida_prog02.id_unidad = obras.u_medida)) ON subprogramas_poa.id_subprograma_poa = obras.subprograma_poa) ON (programas_poa.id_programa_poa = subprogramas_poa.id_programa_poa) AND (programas_poa.id_programa_poa = obras.programa_poa)) INNER JOIN linea ON (linea.id_linea = proyectos.id_linea) AND (eje.id_eje = linea.id_eje)) INNER JOIN estrategias ON (estrategias.id_estrategia = proyectos.id_estrategia) AND (linea.id_linea = estrategias.id_linea)) ON origen.s08c_origen = obras.origen INNER JOIN aportes ON obras.id_obra = aportes.id_obra where  dependencias.acronimo='".$_GET['dep']."' and obras.municipio=".$_GET['mp']." and obras.status_obra>=3  group by obras.id_obra ORDER BY dependencias.id_dependencia, proyectos.no_proyecto, obras.id_obra",$siplan_data_conn) or die (mysql_error());

	
  }



	   

function fechamesyr($fechav){
			
			if ($fechav!="0000-00-00"){
		
    list($a,$m,$d)=explode("-",$fechav);
    return mes($m)."-".$a;
	}else{
		return "No hay";
		}
			
}
		
		
		
		
		
		
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

	
	$tt=0;
	$fd=0;
	$st=0;
	$mn=0;
	$pt=0;
	$cr=0;
	$ot=0;

$result1a=mysql_query($consulta_obras,$siplan_data_conn);
$nn=mysql_num_rows($consulta_obras);

while($row = mysql_fetch_array($consulta_obras))

	{
	
	
	
	
	   //sumar aporte programados
 $sumar_aportes = mysql_query("select  (federal + estatal + municipal + participantes + credito + otros ) as totalp  from aportes where id_obra = ".$row['id_obra'],$siplan_data_conn) or die (mysql_error());
	$sum_aporte= mysql_fetch_array($sumar_aportes);
	$totalp= number_format($sum_aporte['totalp'],2);
 //termina suamr aportes programasdos
 
  //PED*
  $PED=substr($row['nom_estr'],0,5);
  $p1=="";
	$p2=="";
 //PED 
  if ($row['programa']=='1'){
	  $p1='Si';
	   $p2='';}
	  if ($row['programa']=='2'){
	  $p2='Si';
	   $p1='';}
	 
	    $consulta_munz = mysql_query("SELECT * FROM municipios where id_finanzas=".$row['municipio'] ,$siplan_data_conn) or die (mysql_error());
			   $res_munz = mysql_fetch_array($consulta_munz);
 $consulta_loc = mysql_query("SELECT * FROM localidades WHERE id_municipio =".$res_munz['id_municipio']." and id_finanzas=".$row['localidad'] ,$siplan_data_conn) or die (mysql_error());
  $res_loc = mysql_fetch_array($consulta_loc);

	$pdf->Row(array( utf8_decode($row['sector']),utf8_decode($row['nom_dep']),$row['nom_origen'],utf8_decode($row['nom_obra']),utf8_decode($row['nom_mun']),utf8_decode($row['nom_loc']),$totalp,number_format($row['federal'],2),number_format($row['estatal'],2),number_format($row['municipal'],2),number_format($row['participantes'],2),number_format($row['credito'],2),number_format($row['otros'],2),utf8_decode($row['nom_med']),$row['cantidad'],$row['ben_h'],$row['ben_m'],$PED));
		$tt=$tt+$sum_aporte['totalp'];
	$fd=$fd+$row['federal'];
	$st=$st+$row['estatal'];
	$mn=$mn+$row['municipal'];
	$pt=$pt+$row['participantes'];
	$cr=$cr+$row['credito'];
	$ot=$ot+$row['otros'];
	
	}
	$pdf->SetFont('Arial','B',6);
	$pdf->Row(array("","","","","","Total",number_format($tt,2),number_format($fd,2),number_format($st,2),number_format($mn,2),number_format($pt,2),number_format($cr,2),number_format($ot,2),"","","","",""));
	
	$pdf->SetFont('Arial','I',10);
	$currentx = $pdf->GetX();
$currenty = $pdf->GetY();
$newx = $currentx + 20;
$newy = $currenty + 5;
$pdf->SetXY(11, $newy);
$pdf->MultiCell(200,5, 'Total de Obras: '.number_format($nn),0,L,0); // the new x will be the previous x plus the width of multicell:

// next cell should appear to the right and at the top of multicell
	//$pdf->SetFont('Arial','I',7);
	
//$pdf->Text(11,198,'Número de Obras: '.$nn);
	//$pdf->Output();
	
	$pdf->Output('Avances Físico-Finaciero.pdf','I');

?>
