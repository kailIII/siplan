<?php
  $id_usuario = $_SESSION['id_usuario_v3'];
  $clave_actual =md5( $_POST['clave_actual']);
  $consulta = @mysql_query("SELECT * FROM usuarios WHERE id_usuario = ".$id_usuario,$siplan_data_conn);
  $resultado = mysql_fetch_array($consulta);
  if($clave_actual != $resultado["password"]){
	  echo "<script type='text/javascript'>
	  	alert('Su contrase\u00f1a no es correcta');
		location.href='main.php?token=7b774effe4a349c6dd82ad4f4f21d34c';
	  </script>";
  }
  $area = $_POST["area"];
	   $cargo = $_POST["cargo"];
	   $telefono = $_POST["telefono"];
	   $extension = $_POST["extension"];
	   $correo = $_POST["correo"];
if($_POST["nueva_clave"] == ""){
        $consulta_usuario = "UPDATE usuarios SET area = '$area',cargo='$cargo', tel_oficina = '$telefono',extension='$extension',correo='$correo' WHERE  id_usuario = '$id_usuario'";
		$eventi  = "actualiza info";
  }else {
	  $nueva_clave = md5($_POST["nueva_clave"]);
	  $consulta_usuario = "UPDATE usuarios SET password = '$nueva_clave',area = '$area',cargo='$cargo', tel_oficina = '$telefono',extension='$extension',correo='$correo' WHERE  id_usuario = '$id_usuario'";
	  $eventi = "cambio pass";
}
@mysql_query($consulta_usuario,$siplan_data_conn);
$fecha = date("d-m-Y");
$hora = date("H:i");
$ipadd = $_SERVER['REMOTE_ADDR'];
@mysql_query("INSERT into historial (id_usuario,fecha,hora,evento,ipaddress) VALUES ('$id_usuario','$fecha','$hora','$eventi','$ipadd')",$siplan_data_conn);
?>
<script type="text/javascript">
alert("Sus datos han sido actualizados");
location.href="main.php?token=1679091c5a880faf6fb5e6087eb1b2dc"
</script>
