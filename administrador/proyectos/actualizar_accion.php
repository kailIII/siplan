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
$id_accion = $_GET['id_accion'];
$descripcion = $_POST['descripcion'];
$id_tipo = $_POST['tipo_medida'];
$unidad_medida = $_POST['u_medida'];
$cantidad = $_POST['cantidad'];
$ponderacion = $_POST['ponderacion'];
$demanda = $_POST['demanda'];
$no_accion = $_POST['no_accion'];
$ped = $_POST['ped'];
settype($id_componente, "integer");
settype($id_tipo, "integer");
settype($unidad_medida, "integer");
settype($cantidad, "integer");
settype($ponderacion, "integer");
settype($no_accion, "integer");

if(!isset($_POST['demanda']) || $demanda = ''){
	$demanda = 0;
}



@mysql_query("UPDATE acciones SET 
descripcion = '$descripcion',
id_tipo = '$id_tipo',
unidad_medida = '$unidad_medida',
cantidad = '$cantidad',
ponderacion = '$ponderacion',
demanda = '$demanda',
no_accion = '$no_accion', ped = '$ped'  WHERE  id_accion = ".$id_accion ,$siplan_data_conn);

  
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

 
@mysql_query("UPDATE  metas SET 
enero_m = '$m1',
febrero_m = '$m2',
marzo_m = '$m3',
abril_m = '$m4',
mayo_m = '$m5',
junio_m = '$m6',
julio_m = '$m7',
agosto_m = '$m8',
septiembre_m = '$m9',
octubre_m = '$m10',
noviembre_m = '$m11',
diciembre_m  = '$m12' 
WHERE id_accion =".$id_accion,$siplan_data_conn);
$nombre= $_POST['nombre_indicador'];
$metodo_calculo= $_POST['metodo_calculo'];
$tipo_indicador = $_POST['tipo_indicador'];
$dimension = $_POST['dimension'];
$frecuencia = $_POST['frecuencia'];
$sentido = $_POST['sentido'];
$u_medida_indicador= $_POST['u_medida_indicador'];
$meta_anual= $_POST['fin_meta'];
$medio_verifica= $_POST['fin_verifica'];
$supuesto= $_POST['fin_supuesto'];

@mysql_query("UPDATE indicadores_accion SET
objetivo = 'descripcion',
nombre = '$nombre',
metodo_calculo = '$metodo_calculo',
tipo_indicador = '$tipo_indicador',
dimension = '$dimension',
frecuencia = '$frecuencia',
sentido = '$sentido',
u_medida_indicador = '$u_medida_indicador',
meta_anual = '$meta_anual',
medio_verifica = '$medio_verifica',
supuesto = '$supuesto',
WHERE id_accion = ".$id_accion,$siplan_data_conn);
unset($_POST);
$id_usuario = $_SESSION['id_usuario_v3'];
$fecha = date("d-m-Y");
$hora = date("H:i");
$eventi = "Accion actualizada - id accion= ".$id_accion;
$ipadd = $_SERVER['REMOTE_ADDR'];
@mysql_query("INSERT into historial (id_usuario,fecha,hora,evento,ipaddress) VALUES ('$id_usuario','$fecha','$hora','$eventi','$ipadd')",$siplan_data_conn);
?>
<script type="text/javascript">
	alert("se ha actualizado correctamente la acci\u00f3n");
	location.href="main.php?token=1f0e3dad99908345f7439f8ffabdffc4&id_componente=<?php echo $_GET['id_componente']; ?>&id_proyecto=<?php echo $_GET['id_proyecto']; ?>";
</script>
