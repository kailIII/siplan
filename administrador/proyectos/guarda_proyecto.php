<?php
$id_dependencia = $_SESSION['id_dependencia_v3'];
$id_eje = $_POST['eje'];
$id_linea = $_POST['linea'];
$id_estrategia = $_POST['estrategia'];
$grado = $_POST['grado'];
$clasificacion = $_POST['clasificacion'];
$nombre = trim($_POST['nombre']);
$nombre = addslashes($nombre);
$inversion = $_POST['inversion'];
$ponderacion = $_POST['ponderacion'];
$unidad_medida =  trim($_POST['u_medida']);
$unidad_medida = addslashes($unidad_medida);
$cantidad = $_POST['cantidad'];
$prog_semestral = $_POST['p_semestral'];
$g_vulnerable = $_POST['gvulnerable'];
$beneficiarios_h = $_POST['ben_h'];
$beneficiarios_m = $_POST['ben_m'];
$subfuncion = $_POST['subfuncion'];
$justificacion = trim($_POST['justificacion']);
$justificacion = addslashes($justificacion);
$finalidad = $_POST['finalidad'];
$funcion = $_POST['funcion'];
$proposito = trim($_POST['proposito']);
$proposito = addslashes($proposito);
$observaciones = trim($_POST['observaciones']);
$observaciones = addslashes($observaciones);
$no_proyecto = $_POST['no_proyecto'];
$u_responsable = trim($_POST['u_responsable']);
$u_responsable = addslashes($u_responsable); 
$titular = trim($_POST['titular']);
$titular = addslashes($titular);
$eje_pnd = $_POST['pnd_eje'];
$objetivo_pnd = $_POST['pnd_objetivo'];
$estrategia_pnd = $_POST['pnd_estrategia'];
$linea_pnd = $_POST['pnd_linea'];
$prog_pres =  $_POST['prog_pres'];
$objetivo = trim($_POST['objetivo']);
$objetivo = addslashes($objetivo);
$id_fun_con = @mysql_query("SELECT id_funcion from funcion where id_finalidad = ".$finalidad." AND id_funf = ".$funcion,$siplan_data_conn);
$r_fun = mysql_result($id_fun_con,0);
$consulta = "Insert INTO proyectos (id_dependencia, id_eje, id_linea,id_estrategia,grado, clasificacion, nombre, inversion, ponderacion, 
unidad_medida, cantidad, prog_sem,g_vulnerable, beneficiarios_h, beneficiarios_m, subfuncion, justificacion, finalidad, funcion, proposito, observaciones, no_proyecto, 
uresponsable,titular,objetivo,pnd_eje,pnd_objetivo,pnd_estrategia,pnd_linea_accion,prog_pres) VALUES ('$id_dependencia','$id_eje','$id_linea','$id_estrategia','$grado','$clasificacion','$nombre','$inversion','$ponderacion','$unidad_medida','$cantidad','$prog_semestral','$g_vulnerable','$beneficiarios_h','$beneficiarios_m','$subfuncion','$justificacion','$finalidad','$r_fun','$proposito','$observaciones','$no_proyecto','$u_responsable','$titular','$objetivo','$eje_pnd','$objetivo_pnd','$estrategia_pnd','$linea_pnd','$prog_pres')";
@mysql_query($consulta,$siplan_data_conn);
$consulta_proyecto = @mysql_query("SELECT id_proyecto FROM proyectos WHERE no_proyecto = ".$no_proyecto." AND id_dependencia = ".$id_dependencia ,$siplan_data_conn);
$resultado = mysql_result($consulta_proyecto,0);
@mysql_query("INSERT into indicadores_proyecto (id_proyecto,proposito_objetivo) VALUES ('$resultado','$proposito')",$siplan_data_conn);
$fecha = date("d-m-Y");
$hora = date("H:i");
$ipadd = $_SERVER['REMOTE_ADDR'];
$iduser = $_SESSION['id_usuario_v3'];
$eventi = "alta de proyecto ".$no_proyecto;
@mysql_query("INSERT into historial (id_usuario,fecha,hora,evento,ipaddress) VALUES ('$iduser','$fecha','$hora','$eventi','$ipadd')",$siplan_data_conn);
?>
<script type="text/javascript">
alert("El proyecto se ha registrado correctamente");
location.href="main.php?token=eccbc87e4b5ce2fe28308fd9f2a7baf3";
</script>