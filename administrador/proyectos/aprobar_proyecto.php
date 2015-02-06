<?php

@mysql_query("UPDATE proyectos SET estatus='1' WHERE id_proyecto =  ".$_GET['id_proyecto'],$siplan_data_conn);
$fecha = date("d-m-Y");
$hora = date("H:i");
$ipadd = $_SERVER['REMOTE_ADDR'];
$iduser = $_SESSION['id_usuario_v3'];
$eventi = "aprobacion de proyecto por dependencia, id proyecto:   ".$_GET['id_proyecto'];
mysql_query("INSERT into historial (id_usuario,fecha,hora,evento,ipaddress) VALUES ('$iduser','$fecha','$hora','$eventi','$ipadd')",    $siplan_data_conn)or die(mysql_error());
?>
<script type="text/javascript">
		alert("El proyecto se ha aprobado");
		location.href="main.php?token=eccbc87e4b5ce2fe28308fd9f2a7baf3";
</script>