<?php

$id_proyecto = $_POST['proyecto'];
$cons_pry2  = mysql_query("SELECT estatus FROM proyectos WHERE id_proyecto = ".$id_proyecto,$siplan_data_conn) or die(mysql_error());
$res_pry_2 = mysql_result($cons_pry2,0);
if($res_pry_2!=0){
	$url = "main.php?token=c51ce410c124a10e0db5e4b97fc2af39&id_proyecto= ". $id_proyecto;
	header('location:$url');
	exit;
}
$descripcion = $_POST['descripcion'];
$no_componente = $_POST['no_componente'];
$u_responsable = $_POST['u_responsable'];
$u_medida = $_POST['u_medida'];
$tipo_medida = $_POST['tipo_medida'];
$cantidad =  $_POST['cantidad'];
$ponderacion = $_POST['ponderacion'];
settype($no_componente,"integer");
settype($cantidad,"integer");
settype($ponderacion,"integer");
$ped_eje = $_POST['ped_eje'];
$ped_linea = $_POST['ped_linea'];
$ped_estrategia = $_POST['ped_estrategia'];
$prog_pres = $_POST['prog_pres'];
$consulta = "INSERT INTO componentes (id_proyecto,descripcion,id_tipo,unidad_medida,cantidad,ponderacion,unidad_responsable,no_componente,ped_eje,ped_linea,ped_estrategia,prog_pres) VALUES ('$id_proyecto','$descripcion','$tipo_medida','$u_medida','$cantidad','$ponderacion','$u_responsable','$no_componente','$ped_eje','$ped_linea','$ped_estrategia','$prog_pres')";
mysql_query($consulta,$siplan_data_conn) or die (mysql_error());
$consulta_id_componente = mysql_query("select id_componente from componentes where id_proyecto = ".$id_proyecto." AND no_componente = ".$no_componente,$siplan_data_conn) or die (mysql_error());
$res_compo = mysql_result($consulta_id_componente,0);
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
$consulta_ind ="INSERT INTO indicadores_componente 
(id_componente,objetivo,nombre,metodo_calculo,tipo_indicador,dimension,frecuencia,sentido,u_medida_indicador,meta_anual,medio_verifica,supuesto)
VALUES
('$res_compo','$descripcion','$n_indicador','$metodo_cal','$tipo_ind','$dimension','$frecuencia','$sentido','$u_medida_ind','$meta_anual','$med_verifica','$supuesto')"; 
mysql_query($consulta_ind,$siplan_data_conn) or die (mysql_error());
$fecha = date("d-m-Y");
$hora = date("H:i");
$ipadd = $_SERVER['REMOTE_ADDR'];
$iduser = $_SESSION['id_usuario_v3'];
$eventi = "alta de componente ".$no_componente;
@mysql_query("INSERT into historial (id_usuario,fecha,hora,evento,ipaddress) VALUES ('$iduser','$fecha','$hora','$eventi','$ipadd')",$siplan_data_conn);

 ?>
 <script type="text/javascript">
	alert("El componente se ha registrado correctamente");
	location.href="main.php?token=c51ce410c124a10e0db5e4b97fc2af39&id_proyecto=<?php echo  $id_proyecto; ?>";
</script>
