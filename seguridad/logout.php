<?php
$logoutAction = $_SERVER['PHP_SELF']."?doLogout=true";
if ((isset($_SERVER['QUERY_STRING'])) && ($_SERVER['QUERY_STRING'] != "")){
  $logoutAction .="&". htmlentities($_SERVER['QUERY_STRING']);
}
if ((isset($_GET['doLogout'])) &&($_GET['doLogout']=="true")){
    $fecha = date("d-m-Y");
    $hora = date("H:i");
    $ipadd = $_SERVER['REMOTE_ADDR'];
	$usuario = $_SESSION['id_usuario_v3'];
    $consulta = "INSERT into historial (id_usuario,fecha,hora,evento,ipaddress)  VALUES ('$usuario','$fecha','$hora','fin de sesion','$ipadd')";
    $conexion->query( $consulta);

  $_SESSION['MM_Username_v3'] = NULL;
  $_SESSION['MM_UserGroup_v3'] = NULL;
  $_SESSION['PrevUrl_v3'] = NULL;
  unset($_SESSION['MM_Username_v3']);
  unset($_SESSION['MM_UserGroup_v3']);
  unset($_SESSION['PrevUrl_v3']);
  unset($_SESSION['id_usuario_v3']);
  unset($_SESSION);
  session_unset();
  session_destroy();
  session_cache_expire();
  $logoutGoTo = "index.php?evento=1";

  if ($logoutGoTo) {
    $conexion->close();
    header("Location: $logoutGoTo");
    exit;
  }
}
?>
