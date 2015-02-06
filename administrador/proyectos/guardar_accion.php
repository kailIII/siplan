<?php

if(!isset($_SESSION['sesion_activa_v3']) ){header('Location: index.php');exit; }
$consulta_proyectos  = @mysql_query("SELECT count(*) FROM proyectos WHERE id_proyecto = ".$_GET['id_proyecto']." AND id_dependencia = ".$_SESSION['id_dependencia_v3'],$siplan_data_conn);
$res_proy =mysql_result($consulta_proyectos, 0);
if($res_proy==0){
	header("location:main.php");
	exit;
}
$con_pry2 = @mysql_query("SELECT estatus FROM proyectos WHERE id_proyecto =".$_GET['id_proyecto'],$siplan_data_conn);
$res_pry2 =mysql_result($con_pry2,0);
if($res_pry2!=0){
	$direccion = "main.php?token=1f0e3dad99908345f7439f8ffabdffc4&id_componente= ".$_GET['id_componente']."&id_proyecto= ".$_GET['id_proyecto']; 
	header("location:$direccion");
	exit;
}
$id_componente = $_GET['id_componente'];
$id_proyecto= $_GET['id_proyecto'];
$id_dependencia = $_SESSION['id_dependencia_v3'];
$descripcion = $_POST['descripcion'];
$id_tipo = $_POST['tipo_medida'];
$unidad_medida = $_POST['u_medida'];
$cantidad = $_POST['cantidad'];
$ponderacion = $_POST['ponderacion'];
$ped = $_POST['ped'];
if(!isset($_POST['demanda'])){
$demanda = 0;
}else{$demanda = $_POST['demanda']; }
$no_accion = $_POST['no_accion'];
settype($id_componente, "integer");
settype($id_tipo, "integer");
settype($unidad_medida, "integer");
settype($cantidad, "integer");
settype($ponderacion, "integer");
settype($no_accion, "integer");

@mysql_query("INSERT INTO acciones (id_componente,id_proyecto,id_dependencia,descripcion,id_tipo,unidad_medida,cantidad,ponderacion,demanda,no_accion,ped) VALUES ('$id_componente','$id_proyecto','$id_dependencia','$descripcion','$id_tipo','$unidad_medida','$cantidad','$ponderacion','$demanda','$no_accion','$ped')",$siplan_data_conn);
$cons_guardado = mysql_query("SELECT * FROM acciones WHERE id_componente = '$id_componente' AND no_accion = '$no_accion'",$siplan_data_conn) or die (mysql_error());
$res_guardado = mysql_fetch_assoc($cons_guardado);
$id_accion = $res_guardado['id_accion'];
$m1 = $_POST['m1'];
$m2 = $_POST['m2'];
$m3 = $_POST['m3'];
$m4 = $_POST['m4'];
$m5 = $_POST['m5'];
$m6 = $_POST['m6'];
$m7 = $_POST['m7'];
$m8 = $_POST['m8'];
$m9 = $_POST['m9'];
$m10 = $_POST['m10'];
$m11 = $_POST['m11'];
$m12 = $_POST['m12'];
@mysql_query("INSERT INTO metas(id_accion,enero_m,febrero_m,marzo_m,abril_m,mayo_m,junio_m,julio_m,agosto_m,septiembre_m,octubre_m,noviembre_m,diciembre_m) VALUES ('$id_accion','$m1','$m2','$m3','$m4','$m5','$m6','$m7','$m8','$m9','$m10','$m11','$m12')",$siplan_data_conn);
@mysql_query("INSERT INTO resultados(id_accion) VALUES ('$id_accion')",$siplan_data_conn);
$n_indicador = $_POST['nombre_indicador'];
$metodo_cal = $_POST['metodo_calculo'];
$tipo_ind =  $_POST['tipo_indicador'];
$dimension=  $_POST['dimension'];
$frecuencia=  $_POST['frecuencia'];
$sentido=  $_POST['sentido'];
$u_medida_ind  = $_POST['u_medida_indicador'];
$meta_anual  = $_POST['fin_meta'];
$med_verifica  = $_POST['fin_verifica'];
$supuesto  = $_POST['fin_supuesto'];
$consulta_ind ="INSERT INTO indicadores_accion 
(id_accion,objetivo,nombre,metodo_calculo,tipo_indicador,dimension,frecuencia,sentido,u_medida_indicador,meta_anual,medio_verifica,supuesto)
VALUES
('$id_accion','$descripcion','$n_indicador','$metodo_cal','$tipo_ind','$dimension','$frecuencia','$sentido','$u_medida_ind','$meta_anual','$med_verifica','$supuesto')"; 
mysql_query($consulta_ind,$siplan_data_conn) or die (mysql_error());
mysql_free_result($cons_guardado);
unset($_POST);
unset($res_guardado);
$id_usuario = $_SESSION['id_usuario_v3'];
$fecha = date("d-m-Y");
$hora = date("H:i");
$eventi = "Accion agregada";
$ipadd = $_SERVER['REMOTE_ADDR'];
mysql_query("INSERT into historial (id_usuario,fecha,hora,evento,ipaddress) VALUES ('$id_usuario','$fecha','$hora','$eventi','$ipadd')",    $siplan_data_conn) or die (mysql_error());
?>
<script type="text/javascript">
	alert("se ha guardado correctamente la acci\u00f3n");
	location.href="main.php?token=1f0e3dad99908345f7439f8ffabdffc4&id_componente=<?php echo $_GET['id_componente']; ?>&id_proyecto=<?php echo $_GET['id_proyecto']; ?>";
</script>
