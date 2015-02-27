<?php session_start(); 
date_default_timezone_set('America/Mexico_City');
require_once("../seguridad/deniedacces.php");
require_once("../seguridad/siplan_connection_db.php");
require_once("../seguridad/logout.php");
require('fpdf/fpdf.php');
//$siplan_data_conn; conexion
class PDF extends FPDF
{
	

	
	 function Rotate($angle,$x=-1,$y=-1) { 

        if($x==-1) 
            $x=$this->x; 
        if($y==-1) 
            $y=$this->y; 
        if($this->angle!=0) 
            $this->_out('Q'); 
        $this->angle=$angle; 
        if($angle!=0) 

        { 
            $angle*=M_PI/180; 
            $c=cos($angle); 
            $s=sin($angle); 
            $cx=$x*$this->k; 
            $cy=($this->h-$y)*$this->k; 
             
            $this->_out(sprintf('q %.5f %.5f %.5f %.5f %.2f %.2f cm 1 0 0 1 %.2f %.2f cm',$c,$s,-$s,$c,$cx,$cy,-$cx,-$cy)); 
        } 
    } 
	
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
$this->SetXY(3,24);
$tipo=$_GET['g'];
$tipor=$_GET['gg'];

if ($tipor!="" ){
	$mun1=mysql_query("select * from regiones where id_region=".$tipor);	
	$row1=mysql_fetch_array($mun1);
$this->MultiCell(292,5,"Resumen de Inversión por Region ".$row1['id_region']." ".utf8_decode($row1['nombre']),0,C,0); 
}


if ($tipo!="map" and $tipo!=""  and $tipo!="59"){
	
	$mun1=mysql_query("select * from municipios where id_finanzas=".$tipo);	
	$row1=mysql_fetch_array($mun1);
$this->MultiCell(292,5,"Resumen de Inversión por el Municipio de ".utf8_decode($row1['nombre'])."",0,C,0); 
}
elseif($tipo=="59" ){
$this->MultiCell(292,5,"Resumen de Inversión por Regiones",0,C,0); 

}

elseif($tipo=="map" ){
$this->MultiCell(292,5,"Resumen de Inversión por Municipios 2014",0,C,0); 

}
//$this->SetXY(3,28);
//$this->MultiCell(292,5,"POA de Inversión por Dependencia",0,C,0); 


if($tipo=="map" ){
	$this->Image('../imagenes/mapas/59.jpg',0,30,130,130);
	$this->Ln(5);
	
	}


$this->SetFont('Arial','B',5.5);

if ($tipo!="map" and $tipo!="" and $tipo!="59" or $tipor!=""){
$X=103;
$Y=35;
$this->SetXY($X,$Y);

$this->Cell(25,5,'DEPENDENCIA',1,0,'C');
$this->Cell(12,5,'NO. OBRAS',1,0,'C');
$this->Cell(22,5,'APORTE FEDERAL',1,0,'C');
$this->Cell(22,5,'APORTE ESTATAL',1,0,'C');
$this->Cell(22,5,'APORTE MUNICIPAL',1,0,'C');
$this->Cell(22,5,'PARTICIPANTES',1,0,'C');
$this->Cell(22,5,'CREDITOS ',1,0,'C');
$this->Cell(22,5,'OTROS',1,0,'C');
$this->Cell(22,5,'TOTAL',1,0,'C');


}elseif ( $tipo=="59"){
	$this->SetFont('Arial','B',8);
$X=103;
$Y=35;
$this->SetXY($X,$Y);





}elseif($tipo=="map" ){
	$this->SetFont('Arial','B',9);
	$X=120;
$Y=35;
$this->SetXY($X,$Y);

$this->Cell(12,5,'No.',1,0,'C');
$this->Cell(90,5,'Municipio',1,0,'C');
$this->Cell(40,5,'Total',1,0,'C');

	
	}




	$this->Ln(5);
	if ($tipo!="map" and $tipo!=""){
		$X=103;
	$this->SetX($X);
}elseif($tipo=="map" ){
   $X=120;
	$this->SetX($X);	}
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
$pdf=new PDF('L');//,'mm','Legal');  //$pdf=new PDF('L','mm','Legal');  oficio array(215.90,340) 21.59 x 35.56 es del tamaño legal
//$pdf=new PDF();
$pdf->AliasNbPages();

$pdf->AddPage();



$pdf->SetFont('Arial','',9);




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







$id_dependencia = $_SESSION['id_dependencia_v3'];

$tipo=$_GET['g'];
$tipor=$_GET['gg'];

	

if ($tipo!="map" and $tipo!="" and $tipo!="59"){
$consulta_obras = mysql_query("SELECT dependencias.acronimo,dependencias.id_dependencia, Sum(aportes.federal) AS SumaDefederal, Sum(aportes.estatal) AS SumaDeestatal, Sum(aportes.municipal) AS SumaDemunicipal, Sum(aportes.participantes) AS SumaDeparticipantes, Sum(aportes.credito) AS SumaDecredito, Sum(aportes.otros) AS SumaDeotros, Sum(aportes.federal+aportes.estatal+aportes.municipal+aportes.participantes+aportes.credito+aportes.otros) AS total, Count(dependencias.acronimo) AS CuentaDeacronimo
FROM regiones INNER JOIN (municipios INNER JOIN (dependencias INNER JOIN (obras INNER JOIN aportes ON obras.id_obra = aportes.id_obra) ON dependencias.id_dependencia = obras.id_dependencia) ON municipios.id_finanzas = obras.municipio) ON regiones.id_region = municipios.id_region where obras.municipio=".$tipo." and obras.status_obra>=3
 GROUP BY dependencias.id_dependencia" ,$siplan_data_conn);// or die (mysql_error());
}

elseif($tipo=="59" ){
	$consulta_obras = mysql_query("SELECT regiones.id_region, (regiones.nombre) as nomreg, dependencias.acronimo, (dependencias.id_dependencia) as nd,  Sum(aportes.federal+aportes.estatal+aportes.municipal+aportes.participantes+aportes.credito+aportes.otros) AS total
FROM regiones INNER JOIN (municipios INNER JOIN (dependencias INNER JOIN (obras INNER JOIN aportes ON obras.id_obra = aportes.id_obra) ON dependencias.id_dependencia = obras.id_dependencia) ON municipios.id_finanzas = obras.municipio) ON regiones.id_region = municipios.id_region where obras.status_obra>=3
 GROUP BY regiones.id_region" ,$siplan_data_conn);
}

elseif($tipor!="" ){
	
	$consulta_obras = mysql_query("SELECT regiones.id_region, (regiones.nombre) as nomreg, dependencias.acronimo, (dependencias.id_dependencia) as nd, Sum(aportes.federal) AS SumaDefederal, Sum(aportes.estatal) AS SumaDeestatal, Sum(aportes.municipal) AS SumaDemunicipal, Sum(aportes.participantes) AS SumaDeparticipantes, Sum(aportes.credito) AS SumaDecredito, Sum(aportes.otros) AS SumaDeotros, Sum(aportes.federal+aportes.estatal+aportes.municipal+aportes.participantes+aportes.credito+aportes.otros) AS total, Count(dependencias.acronimo) AS CuentaDeacronimo
FROM regiones INNER JOIN (municipios INNER JOIN (dependencias INNER JOIN (obras INNER JOIN aportes ON obras.id_obra = aportes.id_obra) ON dependencias.id_dependencia = obras.id_dependencia) ON municipios.id_finanzas = obras.municipio) ON regiones.id_region = municipios.id_region where regiones.id_region=".$tipor." and obras.status_obra>=3
 GROUP BY dependencias.id_dependencia" ,$siplan_data_conn);
}


elseif($tipo=="map" ){
	$consulta_obras = mysql_query("SELECT municipios.nombre, municipios.id_finanzas, Sum(aportes.federal) AS SumaDefederal, Sum(aportes.estatal) AS SumaDeestatal, Sum(aportes.municipal) AS SumaDemunicipal, Sum(aportes.participantes) AS SumaDeparticipantes, Sum(aportes.credito) AS SumaDecredito, Sum(aportes.otros) AS SumaDeotros, Sum(aportes.federal+aportes.estatal+aportes.municipal+aportes.participantes+aportes.credito+aportes.otros) AS total, Count(dependencias.acronimo) AS CuentaDeacronimo
FROM regiones INNER JOIN (municipios INNER JOIN (dependencias INNER JOIN (obras INNER JOIN aportes ON obras.id_obra = aportes.id_obra) ON dependencias.id_dependencia = obras.id_dependencia) ON municipios.id_finanzas = obras.municipio) ON regiones.id_region = municipios.id_region where obras.status_obra>=3 GROUP BY obras.municipio order by municipios.id_finanzas asc" ,$siplan_data_conn);
}
	//aqui
//	 $consulta_obras = mysql_query("SELECT * FROM obras WHERE id_dependencia= ".$_SESSION['id_dependencia_v3']." and status_obra=".$_GET['s'] ,$siplan_data_conn)or die (mysql_error());
	 



	   

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
	$cp=0;

if ($tipo!="map" and $tipo!="" and $tipo!="59" or  $tipor!=""){
$result1a=mysql_query($consulta_obras,$siplan_data_conn);
$nn=mysql_num_rows($consulta_obras);
if ($tipor!=""){
	$pdf->Image('tmp/mar'.$tipor.'.png',2,40,109,90);
	}
else{
$pdf->Image('tmp/ma.png',2,40,109,90); //aqui -10,40,122,90
}

$X=103;
$Y=40;
$pdf->SetXY($X,$Y);
$pdf->SetWidths(array(25,12,22,22,22,22,22,22,22));
$pdf->SetAligns(array(C,C,R,R,R,R,R,R,R));
$pdf->SetFont('Arial','',7);
while($row = mysql_fetch_array($consulta_obras))

	{
	
	
	$X=103;
	$pdf->SetX($X);
	
	$pdf->Row(array($row['acronimo'],number_format($row['CuentaDeacronimo']),"$ ".number_format($row['SumaDefederal'],2),"$ ".number_format($row['SumaDeestatal'],2),"$ ".number_format($row['SumaDemunicipal'],2),"$ ".number_format($row['SumaDeparticipantes'],2),"$ ".number_format($row['SumaDecredito'],2),"$ ".number_format($row['SumaDeotros'],2),"$ ".number_format($row['total'],2)));

if ($tipo!="map" and $tipo!="" and $tipo!="59" ){
$quer="SELECT localidades.id_marginacion, dependencias.acronimo, (dependencias.id_dependencia) AS nd, Sum(aportes.federal+aportes.estatal+aportes.municipal+aportes.participantes+aportes.credito+aportes.otros) AS total FROM (regiones INNER JOIN (dependencias INNER JOIN (municipios INNER JOIN (obras INNER JOIN aportes ON obras.id_obra = aportes.id_obra) ON municipios.id_finanzas = obras.municipio) ON dependencias.id_dependencia = obras.id_dependencia) ON regiones.id_region = municipios.id_region) INNER JOIN localidades ON (localidades.id_finanzas = obras.localidad) AND (municipios.id_municipio = localidades.id_municipio) WHERE obras.municipio=".$tipo." and dependencias.acronimo='".$row['acronimo']."' and obras.status_obra>=3 GROUP BY  dependencias.id_dependencia, localidades.id_marginacion";
$nnam="Total Por Municipio:";
}
if($tipor!=""){
	$quer="SELECT localidades.id_marginacion, dependencias.acronimo, (dependencias.id_dependencia) AS nd, Sum(aportes.federal+aportes.estatal+aportes.municipal+aportes.participantes+aportes.credito+aportes.otros) AS total FROM (regiones INNER JOIN (dependencias INNER JOIN (municipios INNER JOIN (obras INNER JOIN aportes ON obras.id_obra = aportes.id_obra) ON municipios.id_finanzas = obras.municipio) ON dependencias.id_dependencia = obras.id_dependencia) ON regiones.id_region = municipios.id_region) INNER JOIN localidades ON (localidades.id_finanzas = obras.localidad) AND (municipios.id_municipio = localidades.id_municipio) WHERE regiones.id_region=".$tipor." and dependencias.acronimo='".$row['acronimo']."' and obras.status_obra>=3 GROUP BY  dependencias.id_dependencia, localidades.id_marginacion";
$nnam="Total Por Region:";
	}

$consulta_obrasm = mysql_query($quer,$siplan_data_conn);

$pdf->SetWidths(array(50));
$pdf->SetAligns(array(C));
$X=103;
$pdf->SetX($X);
$pdf->SetFont('Arial','B',6);
$pdf->Row(array("Grado de Marginación"));

/*$pdf->SetWidths(array(25,25));
$pdf->SetAligns(array(C,C));
$X=103;
$pdf->SetX($X);
$pdf->SetFont('Arial','B',6);
$pdf->Row(array("Nivel","Total"));*/
$pdf->SetFont('Arial','',7);
while($rowm = mysql_fetch_array($consulta_obrasm))

	{

$pdf->SetWidths(array(25,25));
$pdf->SetAligns(array(C,C));
$X=103;
$pdf->SetX($X);
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
$pdf->Row(array($nam1,"$ ".number_format($rowm['total'],2)));
	}
$pdf->SetWidths(array(25,12,22,22,22,22,22,22,22));
$pdf->SetAligns(array(C,C,R,R,R,R,R,R,R));
	
		$tt=$tt+$row['total'];
	$fd=$fd+$row['SumaDefederal'];
	$st=$st+$row['SumaDeestatal'];
	$mn=$mn+$row['SumaDemunicipal'];
	$pt=$pt+$row['SumaDeparticipantes'];
	$cr=$cr+$row['SumaDecredito'];
	$ot=$ot+$row['SumaDeotros'];
	$cp=$cp+$row['CuentaDeacronimo'];
	
	}
	$X=103;
	$pdf->SetX($X);
	$pdf->SetFont('Arial','B',6);
	$pdf->Row(array($nnam,$cp,"$ ".number_format($fd,2),"$ ".number_format($st,2),"$ ".number_format($mn,2),"$ ".number_format($pt,2),"$ ".number_format($cr,2),"$ ".number_format($ot,2),"$ ".number_format($tt,2)));
	$X=$pdf->GetX();
	$Y=$pdf->GetY();
	
	$pdf->Ln(5);
	//$pdf->Image('tmp/ma.png',3,100,99,80);

}
elseif ($tipo=="59"){
$result1a=mysql_query($consulta_obras,$siplan_data_conn);
$nn=mysql_num_rows($consulta_obras);
 //aqui -10,40,122,90
$X=103;
$Y=35;
$pdf->SetXY($X,$Y);
$pdf->SetWidths(array(10,40,30));
$pdf->SetAligns(array(C,C,C));
$pdf->SetFont('Arial','B',8);
$g=1;

$pdf->Row(array("No.","Region","Total"));
$pdf->SetFont('Arial','',8);
$pdf->SetAligns(array(C,C,R));
while($row = mysql_fetch_array($consulta_obras))

	{
	
	
	$X=103;
	$pdf->SetX($X);
	
	$pdf->Row(array($row['id_region'],utf8_decode($row['nomreg']),"$ ".number_format($row['total'],2)));

$pdf->SetWidths(array(10,40,30));
$pdf->SetAligns(array(C,C,R));
	
		$tt=$tt+$row['total'];
	$fd=$fd+$row['SumaDefederal'];
	$st=$st+$row['SumaDeestatal'];
	$mn=$mn+$row['SumaDemunicipal'];
	$pt=$pt+$row['SumaDeparticipantes'];
	$cr=$cr+$row['SumaDecredito'];
	$ot=$ot+$row['SumaDeotros'];
	$cp=$cp+$row['CuentaDeacronimo'];
	$g=$g+1;

	}
	$X=103;
	$pdf->SetX($X);
	$pdf->SetFont('Arial','B',8);
	$pdf->Row(array("","Total Por Region:","$ ".number_format($tt,2)));
	$X=$pdf->GetX();
	$Y=$pdf->GetY();
	
	$pdf->Ln(5);
	//$pdf->Image('tmp/ma.png',3,100,99,80);

}

elseif($tipo=="map" ){
	$X=120;
$Y=40;
$pdf->SetXY($X,$Y);
$pdf->SetWidths(array(12,90,40));
$pdf->SetAligns(array(C,L,R,));
$pdf->SetFont('Arial','',8);
$totaedo=0;
while($row = mysql_fetch_array($consulta_obras))

	{
	
	$X=120;
	$pdf->SetX($X);
	
	$pdf->Row(array($row['id_finanzas'],utf8_decode($row['nombre']),"$ ".number_format($row['total'],2)));


	
		$totaedo=$totaedo+$row['total'];
	
	
	}
	$X=120;
	$pdf->SetX($X);
	$pdf->SetFont('Arial','B',8);
	$pdf->Row(array("","Total General","$ ".number_format($totaedo,2)));
	
}
	
	
	//$pdf->SetXY(23,135);
//$pdf->MultiCell(82,5,"TOTAL POA OBRAS: ".number_format($cp),0,L,0);
//$pdf->SetXY(105,135);

//$pdf->MultiCell(82,5,"Total de Inversión: $ ".number_format($tt,2),0,L,0);
//	$pdf->SetFont('Arial','B',9);
	
	if ($tipo!="map" and $tipo!="" and $tipo!="59"){
	$pdf->Image('../imagenes/mapas/'.$tipo.'.jpg',30,125,70,80);
//	$this->AddPage();
	
}//else7

if ($tipo=="59"){
	$pdf->SetY(35);
	$pdf->AddPage();
	$gx=$pdf->GetX();
	$gy=$pdf->GetY();
	
	$pdf->Image('tmp/ma1.png',20,$gy,109,90);
	$pdf->Image('tmp/ma2.png',153,$gy,109,90);
	
	$pdf->Image('tmp/ma3.png',20,$gy+80,109,90);
	$pdf->Image('tmp/ma4.png',153,$gy+80,109,90);

	$pdf->AddPage();
	$gx=$pdf->GetX();
	$gy=$pdf->GetY();
	
	$pdf->Image('tmp/ma5.png',20,$gy+5,109,90);
	$pdf->Image('tmp/ma6.png',153,$gy+5,109,90);
	
	$pdf->Image('tmp/ma7.png',20,$gy+80,109,90);
	$pdf->Image('tmp/ma8.png',153,$gy+80,109,90);
	
	$pdf->AddPage();
	$gx=$pdf->GetX();
	$gy=$pdf->GetY();
	
	$pdf->Image('tmp/ma9.png',20,$gy+5,109,90);
	$pdf->Image('tmp/ma10.png',153,$gy+5,109,90);
	
	$pdf->Image('tmp/ma11.png',20,$gy+80,109,90);
	$pdf->Image('tmp/ma12.png',153,$gy+80,109,90);
	
	}
//	$pdf->SetFont('Arial','I',10);
	$currentx = $pdf->GetX();
$currenty = $pdf->GetY();
$newx = $currentx + 20;
$newy = $currenty + 100;
$pdf->SetXY($newx, $newy);
//$pdf->RoundedRect(60, 200, 68, 46, 5, '13', 'DF');
	//$pdf->MultiCell(100,5,"Multicell",0,C,0);

//$pdf->MultiCell(200,5, 'Total de Obras: '.number_format($nn),0,L,0); // the new x will be the previous x plus the width of multicell:

// next cell should appear to the right and at the top of multicell
	//$pdf->SetFont('Arial','I',7);
	
//$pdf->Text(11,198,'Número de Obras: '.$nn);
	//$pdf->Output();
	
	$pdf->Output('Municipios.pdf','I');

?>
