<?php session_start();
date_default_timezone_set('America/Mexico_City');
require_once("seguridad/deniedacces.php");
//include("seguridad/siplan_connection_db.php");
require_once("seguridad/logout.php");
class funciones{

function sac_mun($mun ){
$consulta_mun = mysql_query("SELECT * FROM municipios where id_finanzas=".$mun ) or die (mysql_error());
$res_mun = mysql_fetch_array($consulta_mun);
return $res_mun['nombre'];
}

function sac_sector($sec){
$consulta_sec = mysql_query("SELECT * FROM sectores where id_sector=".$sec ) or die (mysql_error());
$res_sec = mysql_fetch_array($consulta_sec);
return $res_sec['sector'];
}


function sac_noproyecto($idp){
$consulta_nop = mysql_query("SELECT * FROM proyectos where id_proyecto=".$idp ) or die (mysql_error());
$res_nop = mysql_fetch_array($consulta_nop);
return $res_nop['no_proyecto'];
}

function sac_org($org){
$consulta_org = mysql_query("SELECT * FROM origen where s08c_origen='".$org."'" ) or die (mysql_error());
$res_org = mysql_fetch_array($consulta_org);
return $res_org['c08c_tipori'];
}

function fechanueva($fechavieja){

	if ($fechavieja!="0000-00-00"){

    list($a,$m,$d)=explode("-",$fechavieja);
    return $d."-".$m."-".$a;
	}else{
		return "No hay";
		}}


		function fechames($fechav){

			if ($fechav!="0000-00-00"){

    list($a,$m,$d)=explode("-",$fechav);
    return $d."-".mes($m)."-".$a;
	}else{
		return "No hay";
		}

}

	function fechamesyr($fechav){

			if ($fechav!="0000-00-00"){

    list($a,$m,$d)=explode("-",$fechav);
    return mes($m)."-".$a;
	}else{
		return "No hay";
		}

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


?>
