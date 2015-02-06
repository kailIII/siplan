<?php
// se revisa infoirmación en caso de cambio de dependencia
if(isset($_POST['id_dep'])){
	$iddep = $_POST['id_dep'];
	$cons = $conexion->query("SELECT id_sector,id_dependencia,nombre from dependencias WHERE id_dependencia = ".$iddep);
	$rdep = $cons->fetch_assoc();
	$_SESSION['id_dependencia_v3'] = $rdep['id_dependencia'];
	$_SESSION['nombre_dependencia_v3'] =  $rdep['nombre'];
    $_SESSION['sector_dependencia_v3'] =  $rdep['id_sector'];
	$cons->free();
	unset($iddep);
	unset($cons);
	unset($redp);

}
?>
<!DOCTYPE html>
<!--[if IE 8]>
<html xmlns="http://www.w3.org/1999/xhtml" class="ie8 wp-toolbar"  lang="es-ES">
<![endif]-->
<!--[if !(IE 8) ]><!-->
<html xmlns="http://www.w3.org/1999/xhtml" class="wp-toolbar"  lang="es-ES">
<!--<![endif]-->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>.:: SIPLAN ::..</title>
<link rel="shortcut icon" href="imagenes/favicon.ico"/>
<style type="text/css" title="currentStyle">
@import "media/css/demo_page.css";
@import "media/css/demo_table.css";
</style>
<script type="text/javascript" language="javascript" src="media/js/jquery.js"></script>
<script type="text/javascript" language="javascript" src="media/js/jquery.dataTables.js"></script>
<script type="text/javascript" charset="utf-8">
$(document).ready(function() {
$('#example').dataTable(
{
"iDisplayLength": -1,
"oLanguage": {
"sLengthMenu":  'Mostrar <select>'+
'<option value="-1" selected>Todos</option>'+
'<option value="10">10</option>'+
'<option value="20">20</option>'+
'<option value="30">30</option>'+
'<option value="40">40</option>'+
'<option value="50">50</option>'+
'</select> registros',
"sZeroRecords": "No se encontro nada",
"sInfo": "Mostrando _START_ a _END_ de _TOTAL_ registros",
"sInfoEmpty": "Mostrando 0 a 0 de 0 registros",
"sSearch": "Buscar",
"sInfoFiltered": "(filtrado de _MAX_ registros totales)"
}});});
</script>
<link href="estilo/header.css" rel="stylesheet" type="text/css">
<link href="estilo/stylo.css" rel="stylesheet" type="text/css">
<link href="estilo/capturista.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="css/bootstrap.css" media="screen">
<link rel="stylesheet" href="css/bootswatch.min.css">
<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
</head>
<body style="background-color:#fff;">
<div id="wpadminbar" class="nojq nojs" role="navigation">
<a class="screen-reader-shortcut" href="#wp-toolbar" tabindex="1">Abrir la barra de herramientas</a>
<div class="quicklinks" id="wp-toolbar" role="navigation" aria-label="Barra de herramientas en la parte superior." tabindex="0">
<?php
if($_SESSION['ejercicio_v3'] == '2014'){include("administrador/menu2014.php");}
else{include("administrador/menu2015.php");}
?>
</div>
