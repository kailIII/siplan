<?php
if(!isset($_SESSION['sesion_activa_v3']) ){header('Location: index.php');exit; }
$id_accion = $_GET['id_accion'];
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
@mysql_query("DELETE FROM acciones WHERE id_accion = ".$id_accion,$siplan_data_conn);
@mysql_query("DELETE FROM metas WHERE id_accion = ".$id_accion,$siplan_data_conn);
@mysql_query("DELETE FROM resultados WHERE id_accion = ".$id_accion,$siplan_data_conn);
$id_usuario = $_SESSION['id_usuario_v3'];
$fecha = date("d-m-Y");
$hora = date("H:i");
$eventi = "Accion eliminada id = ".$id_accion;
$ipadd = $_SERVER['REMOTE_ADDR'];
@mysql_query("INSERT into historial (id_usuario,fecha,hora,evento,ipaddress) VALUES ('$id_usuario','$fecha','$hora','$eventi','$ipadd')",    $siplan_data_conn)or die(mysql_error());
?>
 <script type="text/javascript">
	location.href="main.php?token=1f0e3dad99908345f7439f8ffabdffc4&id_componente=<?php echo $_GET['id_componente']; ?>&id_proyecto=<?php echo $_GET['id_proyecto']; ?>";
</script> ?>