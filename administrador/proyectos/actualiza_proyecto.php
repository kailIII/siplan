<?php

$id_dependencia = $_SESSION['id_dependencia_v3'];
$fun_f = mysql_query("SELECT id_funf from funcion where id_funcion = ". $_POST['funcion'],$siplan_data_conn);
$funcion = mysql_result($fun_f,0);
$id_eje = $_POST['eje'];
$id_linea = $_POST['linea'];
$id_estrategia = $_POST['estrategia'];
$grado = $_POST['grado'];
$clasificacion = $_POST['clasificacion'];
$nombre = $_POST['nombre'];
$inversion = $_POST['inversion'];
$ponderacion = $_POST['ponderacion'];
$unidad_medida =  $_POST['u_medida'];
$cantidad = $_POST['cantidad'];
$prog_semestral = $_POST['p_semestral'];
$g_vulnerable = $_POST['gvulnerable'];
$beneficiarios_h = $_POST['ben_h'];
$beneficiarios_m = $_POST['ben_m'];
$justificacion = $_POST['justificacion'];
$finalidad = $_POST['finalidad'];
$subfuncion = $_POST['subfuncion']; 
$proposito = $_POST['proposito'];
$observaciones = $_POST['observaciones']; 
$pnd_eje = $_POST['pnd_eje'];
$pnd_objetivo = $_POST['pnd_objetivo'];
$pnd_estrategia = $_POST['pnd_estrategia'];
$pnd_linea = $_POST['pnd_linea'];
$unidad_responsable =  $_POST['u_responsable'];
$titular =  $_POST['titular'];
$objetivo = $_POST['objetivo']; 
$no_proyecto = $_POST['no_proyecto'];
$prog_pres =  $_POST['prog_pres'];
$consulta = "UPDATE proyectos SET  
 id_eje = '$id_eje', 
 id_linea = '$id_linea',
 id_estrategia = '$id_estrategia',
 grado = '$grado', 
 clasificacion = '$clasificacion',
 nombre = '$nombre', 
 inversion = '$inversion', 
 ponderacion = '$ponderacion', 
 unidad_medida = '$unidad_medida', 
 cantidad = '$cantidad', 
 prog_sem = '$prog_semestral',
 g_vulnerable = '$g_vulnerable', 
 beneficiarios_h = '$beneficiarios_h', 
 beneficiarios_m = '$beneficiarios_m', 
 justificacion = '$justificacion',
 finalidad = '$finalidad', 
 funcion = '$funcion', 
 subfuncion = '$subfuncion', 
 proposito = '$proposito',
 observaciones = '$observaciones', 
 pnd_eje = '$pnd_eje',
 pnd_objetivo = '$pnd_objetivo',
 pnd_estrategia = '$pnd_estrategia',
 pnd_linea_accion = '$pnd_linea',
 uresponsable = '$unidad_responsable',
 titular = '$titular',
 objetivo = '$objetivo',
 no_proyecto = '$no_proyecto' ,
 prog_pres = '$prog_pres' 
 WHERE id_proyecto = ".$_POST['id_proyecto'];
  @mysql_query($consulta,$siplan_data_conn) ;
  mysql_query("UPDATE indicadores_proyecto SET proposito_objetivo = '$proposito' WHERE id_proyecto = ".$_POST['id_proyecto'],$siplan_data_conn) or die(mysql_error()); 
$fecha = date("d-m-Y");
$hora = date("H:i");
$ipadd = $_SERVER['REMOTE_ADDR'];
$iduser = $_SESSION['id_usuario_v3'];
$eventi = "actualizacion de proyecto ".$_POST['id_proyecto'];
			    @mysql_query("INSERT into historial (id_usuario,fecha,hora,evento,ipaddress) VALUES ('$iduser','$fecha','$hora','$eventi','$ipadd')",$siplan_data_conn);
 ?>
<script type="text/javascript">
		alert("El proyecto se ha actualizado correctamente");
		location.href="main.php?token=eccbc87e4b5ce2fe28308fd9f2a7baf3";
</script>