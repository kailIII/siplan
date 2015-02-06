<?php
ini_set("display_errors", "1");
session_start();
if($_SESSION['iniciar'] != md5("opus relinque")){
	unset($_SESSION);
	session_cache_expire();
	session_destroy();
	session_unset();
 header("Location: index.php?evento=3");
}


if(isset($_GET['ejercicio'])){

	switch($_GET['ejercicio']){
		case 2014:
		$_SESSION['ejercicio_v3']='2014';
		break;

		case 2015:
		$_SESSION['ejercicio_v3']='2015';
		break;
	}
}
header ("Expires: Thu, 27 Mar 1980 23:59:00 GMT");
header ("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
header ("Cache-Control: no-cache, must-revalidate"); //no guardar en CACHE
header ("Pragma: no-cache");
date_default_timezone_set('America/Mexico_City');

$ejercicio = $_SESSION['ejercicio_v3'];
switch($ejercicio){
case '2014':
$bd = "siplan";
break;
case '2015':
$bd = "siplan2015";
break;
}

$perfil_usr = $_SESSION["id_perfil_v3"];
switch($perfil_usr){
 case 1:
    $bd_usr = "adm_siplan";
    $cve_bd = "siplan";
    break;
case 2:
    $bd_usr = "siplan_capturas";
    $cve_bd = "siplan";
    break;
case 3:
    $bd_usr = "siplan_full";
    $cve_bd = "siplan";
    break;
case 4:
    $bd_usr = "siplan_full";
    $cve_bd = "siplan";
    break;
case 5:
    $bd_usr = "siplan_consultas";
    $cve_bd = "siplan";
    break;

}

//REALIZAMOS LA CONEXIÒN A LA BASE DE DATOS

include('seguridad/siplan_connection_db.php');
$cnx = new conectar();
$cnx->inicializar("localhost",$bd_usr,$cve_bd,$bd);
$conexion=$cnx->conectarse();

// SE ASIGNA CODIFICACIÓN A UTILIZAR
$conexion->query("SET NAMES utf8");

//------------------ conectados ----------- //
//el archivo logout nos sirve para elimnar variables y salir del sistema
require_once("seguridad/logout.php");
//cargamos el contenido dependiendo del perfil
switch($perfil_usr){
case 1:
require_once("administrador/header.php");
break;
case 2:
require_once("capturista/header.php");
break;
case 3:
require_once("planeacion/header.php");
break;
case 4:
require_once("presupuestal/header.php");
break;
case 5:
require_once("consultas/header.php");
break;
case 6:
require_once("banco_proyectos/header_usr.php");
break;
case 7:
require_once("banco_proyectos/header.php");
break;
}
switch($perfil_usr){
case 1:
require_once("administrador/contenido.php");
break;
case 2:
require_once("capturista/contenido.php");
break;
case 3:
require_once("planeacion/contenido.php");
break;
case 4:
require_once("presupuestal/contenido.php");
break;
case 5:
require_once("consultas/contenido.php");
break;
case 6:
require_once("banco_proyectos/contenido_usr.php");
break;
case 7:
require_once("banco_proyectos/contenido.php");
break;
}
$conexion->close();
?>
</body>
</html>
