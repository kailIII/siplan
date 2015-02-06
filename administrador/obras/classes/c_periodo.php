<?php session_start();
date_default_timezone_set('America/Mexico_City');
require_once("seguridad/deniedacces.php");
//include("seguridad/siplan_connection_db.php");
require_once("seguridad/logout.php");
class periodo{

function act_periodo($fini, $ffin){
 $consulta1 = "update configuracion set valor='".$fini."' where id_configuracion='cap_obras/per_ini'";
mysql_query($consulta1) or die (mysql_error());
  $consulta2 = "update configuracion set valor='".$ffin."' where id_configuracion='cap_obras/per_fin'";
mysql_query($consulta2) or die (mysql_error());

   $fecha = date("d-m-Y");
               $hora = date("H:i");
               $ipadd = $_SERVER['REMOTE_ADDR'];
			   $iduser = $_SESSION['id_usuario'];
			   $eventi = "actualizo periodo cap_obras/ini_fin";
			    mysql_query("INSERT into historial (id_usuario,fecha,hora,evento,ipaddress) VALUES ('$iduser','$fecha','$hora','$eventi','$ipadd')")or die(mysql_error());
				return ('1');

}

function per_fin(){

  $consulta2 = "select * from configuracion  where id_configuracion='cap_obras/per_fin'";
$dat=mysql_query($consulta2) or die (mysql_error());
  $ms=mysql_fetch_array($dat);
				return ($ms['valor']);

}
function per_ini(){
 $consulta1 = "select * from configuracion where id_configuracion='cap_obras/per_ini'";
$dat=mysql_query($consulta1) or die (mysql_error());
$ms=mysql_fetch_array($dat);


				return ($ms['valor']);

}

}




?>
