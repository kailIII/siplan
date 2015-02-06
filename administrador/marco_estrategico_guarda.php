<?php
if(!isset($_SESSION)){
?>
<script type="text/javascript">
location.href="index.html";
</script>
<?php
}
$res_poa =trim($_POST["res_poa"]);
$res_poa = addslashes($res_poa);
$actividades = trim($_POST["actividades"]);
$actividades = addslashes($actividades);
$mision = trim($_POST["mision"]);
$mision =  addslashes($mision);
$vision = trim($_POST["vision"]);
$vision = addslashes($vision);
$objetivo = trim($_POST["objetivo"]);
$objetivo = addslashes($objetivo);
$perspectiva = trim($_POST["perspectiva"]);
$perspectiva = addslashes($objetivo);
$accion = $_POST["accion"];
if($accion == 0){
 $consulta_insertar = "insert into marco_estrategico(id_dependencia,res_poa,activ_sustantivas,mision,vision,objetivo_estrategico,perspec_anual,ejercicio) values (".$_SESSION['id_dependencia_v3'].",'$res_poa','$actividades','$mision','$vision','$objetivo','$perspectiva',2014)";
     mysql_query($consulta_insertar,$siplan_data_conn)or die(mysql_error());
	 echo "<script type='text/javascript'>alert('Marco Estrat\u00e9gico guardado correctamente'); window.location='main.php?token=c4ca4238a0b923820dcc509a6f75849b' ;</script>";
}
if($accion == 1){
	if(!isset($_POST['res_poa'])){header('location:main.php?token=eccbc87e4b5ce2fe28308fd9f2a7baf3');exit;}
	$consulta_insertar = "UPDATE marco_estrategico  SET  res_poa ='$res_poa', activ_sustantivas = '$actividades', mision = '$mision', vision = '$vision', objetivo_estrategico = '$objetivo', perspec_anual = '$perspectiva'  WHERE id_dependencia = ".$_SESSION['id_dependencia_v3'];
	mysql_query($consulta_insertar,$siplan_data_conn)or die(mysql_error());
	echo "<script type='text/javascript'>alert('Marco Estrat\u00e9gico actualizado correctamente'); window.location='main.php?token=c4ca4238a0b923820dcc509a6f75849b' ;</script>";
}
?>
