<?php
date_default_timezone_set('America/Mexico_City');
session_start();
if($_SESSION['iniciar'] != md5("labor vincit omnia")){
    header('Location: ../index.php');
    exit;
}else{
    unset($_SESSION['iniciar']);
}
$ejercicio = $_POST['ejercicio'];
switch($ejercicio){
case '2014':
$bd = "siplan";
break;
case '2015':
$bd = "siplan2015";
break;
}
include('siplan_connection_db.php');
$cnx = new conectar();
$cnx->inicializar("localhost","siplan_consultas","siplan",$bd);
$conexion=$cnx->conectarse();
$conexion->query("SET NAMES utf8");
$usuario = $_POST['usuario'];
$cve=md5($_POST['clave']);
$consulta = "SELECT count(*) FROM usuarios WHERE usuario = '$usuario' AND password = '$cve'";
$resultado = $conexion->query($consulta);
$row = $resultado->fetch_array();
if($row[0] == 0){
session_destroy();
header('Location: ../index.php?evento=3');
exit;
}else{
include('reg_vars.php');
$fecha = date("d-m-Y");
$hora = date("H:i");
$ipadd = $_SERVER['REMOTE_ADDR'];
$iduser = $_SESSION['id_usuario_v3'];
$conexion->query("INSERT INTO historial (id_usuario,fecha,hora,evento,ipaddress) VALUES ('$iduser','$fecha','$hora','inicio de sesion','$ipadd')");

$conexion->close();
$_SESSION['iniciar'] = md5("opus relinque");
header('Location:../main.php');
}
