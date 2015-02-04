<?php
date_default_timezone_set('America/Mexico_City');
session_start();
if($_SESSION['iniciar'] != md5("labor vincit omnia")){
header('Location: ../index.php');
exit;
}else{
unset($_SESSION['iniciar']);
}
switch($_POST['ejercicio']){
    case '2014':
    $bd = "siplan";
    break;
    case '2015':
    $bd = "siplan2015";
    break;

}
include('siplan_connection_db.php');
$cnx = new conectar();
$cnx->inicializar("localhost","siplan_consultas","tr15t4n14",$bd);
$conexion=$cnx->conectarse();
$cve=md5($_POST['clave']);
$consulta = "SELECT count(*) FROM usuarios WHERE usuario = '".$_POST['usuario']."' AND password = '".$cve."'";
$resultado = $conexion->query($consulta);
$row = $resultado->fetch_array(MYSQLI_NUM);

if($row[0]===0){
session_destroy();
header('Location: ../index.php');
exit;
}





