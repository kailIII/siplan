<?php	
if(!isset($_SESSION['sesion_activa_v3'])){
	header("Location: index.php");
	exit;	
}
$idproyecto = $_GET['id_proyecto'];
//---------------------------verificamos que el proyecto le corresponda a la dependencia -----------------//
$consulta_proyecto = @mysql_query("SELECT count(*) FROM proyectos WHERE id_proyecto= '$idproyecto' AND id_dependencia = ".$_SESSION['id_dependencia_v3'],$siplan_data_conn);
$resultado_p=mysql_result($consulta_proyecto,0);
if($resultado_p==0){
header("LOCATION:main.php?token=eccbc87e4b5ce2fe28308fd9f2a7baf3");
exit;
	}
	/*----------------------verificamos que no existan componentes del proyecto --------------------------------*/
	$consulta_componentes = mysql_query("SELECT * FROM componentes where id_proyecto = '$idproyecto' ",$siplan_data_conn) or die(mysql_error());
	$resultado_componentes =  mysql_num_rows($consulta_componentes);
if($resultado_componentes == 0){
	@mysql_query("DELETE FROM proyectos WHERE id_proyecto = '$idproyecto'",$siplan_data_conn); 
	@mysql_query("DELETE FROM indicadores_proyecto WHERE id_proyecto = '$idproyecto'",$siplan_data_conn);
	?>
	<script type="text/javascript">
		alert("El proyecto se ha eliminado correctamente");
		location.href = "main.php?token=eccbc87e4b5ce2fe28308fd9f2a7baf3";
	</script>
<?php }else{?>	
	<script type="text/javascript">
		alert("El proyecto no se puede eliminar, contiene componentes");
		location.href = "main.php?token=eccbc87e4b5ce2fe28308fd9f2a7baf3";
</script>
<?php	
}
?>