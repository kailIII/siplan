<?php
/**

* @package    SIPLAN
* @subpackage Principal
* @author   José Martín Gamboa Murillo

*/

session_start();
session_cache_expire();
session_destroy();
session_unset();
unset($_SESSION);
header("Expires: Thu, 27 Mar 1980 23:59:00 GMT");
header("Last-Modified: " . gmdate("D, d M Y H:i:s")."GMT");
header("Cache-Control: no-cache, must-revalidate");
header("Pragma: no-cache");
session_start();
$_SESSION['iniciar'] = md5("labor vincit omnia");

?>
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="utf-8">
<title>..:: SIPLAN ::..</title>
<link rel="stylesheet" href="css/bootstrap.css" media="screen">
<link rel="stylesheet" href="css/bootswatch.min.css">
</head>
<body style="background-color:#333;">
<div style="padding-left:5%;padding-right:5%; margin-top:-50px;  background-color:#fff;">
<div class="row"><div class="col-lg-12">
<div class="page-header"><h1 id="forms"><img src="imagenes/logoupla.fw.png" width="343" height="95"></h1>
</div></div></div><div class="row"><div class="col-lg-6"><div class="well bs-component">
<form class="form-horizontal" action="seguridad/login.php" method="post" name="form_login" id="form_login">
<fieldset><legend>SIPLAN</legend>
<div class="form-group"><label for="usuario" class="col-lg-2 control-label">Usuario</label>
<div class="col-lg-10"><input type="text" class="form-control" id="usuario" placeholder="usuario" name="usuario">
</div></div><div class="form-group"><label for="clave" class="col-lg-2 control-label">Password</label>
<div class="col-lg-10"> <input type="password" class="form-control" id="clave" placeholder="clave" name="clave">
</div></div><div class="form-group"> <label for="select" class="col-lg-2 control-label">Ejercicio</label>
<div class="col-lg-10"> <select class="form-control" id="ejercicio" name="ejercicio">
<option value="0">-seleccione-</option>
<option value="2014">2014</option>
<option value="2015">2015</option>
</select></div></div><div class="form-group">
<div class="col-lg-10 col-lg-offset-2">
<button type="button" class="btn btn-success" onclick="validar();"><span class='glyphicon glyphicon-log-in'>&nbsp;Ingresar</button>
</div></div></fieldset></form></div></div>
<div class="col-lg-4 col-lg-offset-1"><div class="well">
<h3>SIPLAN v4.0</h3>
<p>Sistema Integral de Informaci&oacute;n para la Planeaci&oacute;n de Gobierno del Estado de Zacatecas</p><br>
<br>
<?php if(isset($_GET['evento'])){
switch($_GET['evento']){
case '1':
echo "<div class='alert alert-dismissable alert-success'>
<strong><span class='glyphicon glyphicon-ok-circle'>&nbsp;éxito: </strong> Su sesión ha cerrado correctamente.</div>";
break;
case '2':
echo "<div class='alert alert-dismissable alert-warning'>
<strong><span class='glyphicon glyphicon-exclamation-sign'>&nbsp;Atención: </strong> Su nombre usuario
esta actualmente deshabilitado, para dudas comunicarse con su enlace UPLA.</div>";
break;
case '3':
echo "<div class='alert alert-dismissable alert-danger'>
<strong>&nbsp;<span class='glyphicon glyphicon-remove-circle'>&nbsp;Error: </strong> Su nombre de usuario o contraseña son incorrectos,
si el error persiste, comuniquese con el área de informática de la UPLA.</div>";
break;}}?></div></div></div><br><br><br><br></div><br><br>
<p class="text-muted">Unidad de Planeaci&oacute;n - Gobierno del Estado de Zacatecas 2010-2016</p>
<script type="text/javascript" src="js/validar_login.js"></script>
</body>
</html>
