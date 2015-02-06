<?php

$id_proyecto = $_GET['id_proyecto'];

$consulta_proyecto = @mysql_query("SELECT * FROM proyectos WHERE id_proyecto = ".$id_proyecto,$siplan_data_conn);
$res_proyecto = mysql_fetch_array($consulta_proyecto);
if($res_proyecto['estatus']==1){
	header("location:main.php?token=eccbc87e4b5ce2fe28308fd9f2a7baf3");
	exit;
}



extract($_POST);




$consulta = "UPDATE indicadores_proyecto SET
fin_objetivo = '".$fin_objetivo."',
nombre_fin = '".$fin_nombre."',
metodo_fin = '".$fin_metodo."',
tipo_fin = '$fin_tipo',
dimension_fin = '$fin_dimension',
frecuencia_fin = '$fin_frecuencia',
sentido_fin = '$fin_sentido',
u_medida_fin = '".$fin_u_medida."',
meta_fin = '$fin_meta',
proposito_objetivo = '".$pro_objetivo."',
proposito_nombre = '".$pro_nombre."',
proposito_metodo = '".$pro_metodo."',
proposito_tipo = '$pro_tipo',
proposito_dimension = '$pro_dimension',
proposito_frecuencia = '$pro_frecuencia',
proposito_sentido = '$pro_sentido',
proposito_unidad_medida = '".$pro_u_medida."',
proposito_meta = '$pro_meta',
medio_verifica_fin = '".$fin_verifica."',
supuesto_fin ='".$fin_supuesto."',
medio_verifica_pro = '".$pro_verifica."',
supuesto_pro = '".$pro_supuesto."',
completado = 1
WHERE 
id_proyecto = ".$id_proyecto; 

$consulta2 = "INSERT into indicadores_proyecto 
(id_proyecto,fin_objetivo,nombre_fin,metodo_fin,tipo_fin,
dimension_fin,
frecuencia_fin, 
sentido_fin,
u_medida_fin,
meta_fin,
proposito_objetivo,
proposito_nombre,
proposito_metodo,
proposito_tipo,
proposito_dimension,
proposito_frecuencia,
proposito_sentido,
proposito_unidad_medida,
proposito_meta,
medio_verifica_fin,
supuesto_fin,
medio_verifica_pro,
supuesto_pro,
completado)
VALUES
('$id_proyecto','".$fin_objetivo."',
'".$fin_nombre."',
'".$fin_metodo."',
'$fin_tipo',
'$fin_dimension',
'$fin_frecuencia',
'$fin_sentido',
'".$fin_u_medida."',
'$fin_meta',
 '".$pro_objetivo."',
 '".$pro_nombre."',
 '".$pro_metodo."',
 '$pro_tipo',
 '$pro_dimension',
 '$pro_frecuencia',
 '$pro_sentido',
 '".$pro_u_medida."',
 '$pro_meta',
 '".$fin_verifica."',
'".$fin_supuesto."',
 '".$pro_verifica."',
 '".$pro_supuesto."',1)";

$res = mysql_query("SELECT count(*) FROM indicadores_proyecto WHERE id_proyecto = ".$id_proyecto,$siplan_data_conn) or die ("eror cons1: ".mysql_error());

if(mysql_result($res, 0) == 1) {

	mysql_query($consulta,$siplan_data_conn)  or die ("eror cons2: ".mysql_error());

}else{

	mysql_query($consulta2,$siplan_data_conn)  or die ("eror cons3: ".mysql_error());
}






mysql_query("UPDATE proyectos SET proposito = '".$pro_objetivo."' WHERE id_proyecto = ".$id_proyecto ,$siplan_data_conn);
$fecha = date("d-m-Y");
$hora = date("H:i");
$ipadd = $_SERVER['REMOTE_ADDR'];
$iduser = $_SESSION['id_usuario_v3'];
$eventi = "actualizacion de indicador ".$id_proyecto;
			    @mysql_query("INSERT into historial (id_usuario,fecha,hora,evento,ipaddress) VALUES ('$iduser','$fecha','$hora','$eventi','$ipadd')",  $siplan_data_conn);
 ?>
<script type="text/javascript">
		alert("El indicador se ha actualizado correctamente");
		location.href="main.php?token=eccbc87e4b5ce2fe28308fd9f2a7baf3";
</script>


?>