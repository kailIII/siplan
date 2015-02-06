<?php

if(!isset($_SESSION['sesion_activa_v3']) ){header('Location: index.php');exit; }
$id_componente = $_GET['id_componente'];
$id_proyecto = $_GET['id_proyecto'];
$descripcion = $_POST['descripcion'];
$no_componente = $_POST['no_componente'];
$u_responsable = $_POST['u_responsable'];
$u_medida = $_POST['u_medida'];
$tipo_medida = $_POST['tipo_medida'];
$cantidad =  $_POST['cantidad'];
$ponderacion = $_POST['ponderacion'];
settype($no_componente, "integer");
settype($u_medida, "integer");
settype($tipo_medida, "integer");
settype($cantidad, "integer");
settype($ponderacion, "integer");
$ped_eje =$_POST['eje'];
$ped_linea = $_POST['linea'];
$ped_estrategia =$_POST['estrategia'];
$prog_pres = $_POST['prog_pres'];
@mysql_query("UPDATE componentes SET 
descripcion = '$descripcion',
id_tipo = '$tipo_medida',
unidad_medida = '$u_medida',
cantidad = '$cantidad',
ponderacion = '$ponderacion',
unidad_responsable = '$u_responsable',
no_componente = '$no_componente',  
ped_eje = '$ped_eje',
ped_linea = '$ped_linea',
ped_estrategia = '$ped_estrategia',
prog_pres = '$prog_pres'
WHERE  id_componente = ".$id_componente ,$siplan_data_conn) ;
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
mysql_query("UPDATE indicadores_componente SET
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
supuesto = '$supuesto'

WHERE id_componente = ".$id_componente,$siplan_data_conn) or die (mysql_error());
unset($_POST);
$id_usuario = $_SESSION['id_usuario_v3'];
$fecha = date("d-m-Y");
$hora = date("H:i");
$eventi = "Componente actualizado - id componente= ".$id_componente;
$ipadd = $_SERVER['REMOTE_ADDR'];
mysql_query("INSERT into historial (id_usuario,fecha,hora,evento,ipaddress) VALUES ('$id_usuario','$fecha','$hora','$eventi','$ipadd')",  $siplan_data_conn);
?>
<script type="text/javascript">
	alert("se ha actualizado correctamente el componente");
	location.href="main.php?token=c51ce410c124a10e0db5e4b97fc2af39&id_proyecto=<?php echo $_GET['id_proyecto']; ?>";
</script>
