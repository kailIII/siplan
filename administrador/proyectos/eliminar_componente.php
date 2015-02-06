<?php
extract($_GET);
$cons_pry2  = @mysql_query("SELECT estatus FROM proyectos WHERE id_proyecto = ".$id_proyecto,$siplan_data_conn);
$res_pry_2 = mysql_result($cons_pry2,0);
if($res_pry_2!=0){
	$url = "main.php?token=c51ce410c124a10e0db5e4b97fc2af39&id_proyecto= ". $id_proyecto;
	header('location:$url');
	exit;
}
@mysql_query("DELETE FROM componentes WHERE id_componente = ".$id_componente,$siplan_data_conn);
$id_usuario = $_SESSION['id_usuario_v3'];
$fecha = date("d-m-Y");
$hora = date("H:i");
$eventi = "Componente eliminado id = ".$id_componente;
$ipadd = $_SERVER['REMOTE_ADDR'];
mysql_query("INSERT into historial (id_usuario,fecha,hora,evento,ipaddress) VALUES ('$id_usuario','$fecha','$hora','$eventi','$ipadd')",  $siplan_data_conn)or die(mysql_error());
?>
  <script type="text/javascript">
	alert("se ha eliminado correctamente el componente");
	location.href="main.php?token=c51ce410c124a10e0db5e4b97fc2af39&id_proyecto=<?php echo $id_proyecto;?>";
</script>