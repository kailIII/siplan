<?php
$consulta_usuario = @mysql_query("SELECT * FROM usuarios WHERE id_usuario = ".$_SESSION['id_usuario_v3'],$siplan_data_conn);
$res_usuario = mysql_fetch_array($consulta_usuario);
?>
<script type="text/javascript">
function validacion(){
	if(document.getElementById('clave_actual').value == ""){
		alert("Ingrese su clave actual");
		return false();
	}
	if(document.getElementById('nueva_clave').value != document.getElementById('repite_clave').value){
		alert("Las claves no coinciden");
		document.getElementById('nueva_clave').value = "";
		document.getElementById('repite_clave').value = "";
		return false();
	}
	document.form_usuario.submit();
}
</script>
<div class="wrap" id="profile-page">
<div id="icon-users" class="icon32"><br></div>
<h2>
Perfil de Usuario</h2><br />
<table width="100%"  align="center" cellpadding="0" cellspacing="0" style="border:solid 1px #DFDFDF; border-radius:4px;">
  <tr bgcolor="#EDEDED">
    <td style="border-bottom:solid 1px #DFDFDF; padding:6px 6px 6px 6px;"><span style="font-family:Tahoma, Geneva, sans-serif; font-size:14px; color:#464646;">Modifica tus datos.</span></td>
  </tr>
  <tr bgcolor="#F8F8F8">
    <td style="padding:5px 5px 5px 5px;">
  <form id="form_usuario" name="form_usuario" method="post" action="main.php?token=<?php echo md5(7);?>">
    <table width="100%" border="0" cellspacing="0" cellpadding="4">
      <tr>
        <td width="2%" rowspan="4" align="center" valign="middle">&nbsp;</td>
        <td width="12%">Nombre de Usuario</td>
        <td width="86%"><input name="user" type="text" disabled="disabled" id="user" value="<?php echo $_SESSION['MM_Username_v3']; ?>" readonly="readonly"></td>
      </tr>
      <tr bgcolor="#E8EEE9">
        <td>Nombre(s)</td>
        <td><input name="nombre" type="text" disabled="disabled" id="nombre" value="<?php echo $_SESSION['nombre_v3']; ?>" size="96" readonly="readonly"></td>
      </tr>
      <tr>
        <td>Cambiar Clave</td>
        <td>Clave actual
          <input type="password" name="clave_actual" id="clave_actual">
Nueva Clave
<input type="password" name="nueva_clave" id="nueva_clave">
Repetir Nueva Clave
<input type="password" name="repite_clave" id="repite_clave"></td>
      </tr>
      <tr bgcolor="#E8EEE9">
        <td>Dependencia</td>
        <td><input name="textfield5" type="text" disabled="disabled" id="textfield" value="<?php echo $_SESSION['id_dependencia_v3']." - ".$_SESSION['nombre_dependencia_v3']; ?>" size="96" readonly="readonly"></td>
      </tr>
      <tr>
        <td rowspan="6" valign="middle">&nbsp;</td>
        <td>&Aacute;rea</td>
        <td><input name="area" type="text" id="textfield5" value="<?php echo $res_usuario['area']; ?>" size="64"></td>
      </tr>
      <tr bgcolor="#E8EEE9">
        <td>Cargo</td>
        <td><input name="cargo" type="text" id="textfield2" value="<?php echo $res_usuario['cargo']; ?>" size="64"></td>
      </tr>
      <tr>
        <td>Tel&eacute;fono</td>
        <td><input name="telefono" type="text" id="textfield8" value="<?php echo $res_usuario['tel_oficina']; ?>" size="64"></td>
      </tr>
      <tr bgcolor="#E8EEE9">
        <td>Extensi&oacute;n</td>
        <td><input name="extension" type="text" id="textfield9" value="<?php echo $res_usuario['extension']; ?>" size="64"></td>
      </tr>
      <tr>
        <td>E-mail</td>
        <td><input name="correo" type="text" id="correo" value="<?php echo $res_usuario['correo']; ?>" size="64"></td>
      </tr>
      <tr>
        <td>Nivel</td>
        <?php
		$consulta_perfil = mysql_query("SELECT perfil from perfiles WHERE id_perfil = ".$res_usuario['id_perfil'],$siplan_data_conn) or die (mysql_error());

		?>
        <td><input name="textfield4" type="text" disabled="disabled" id="textfield3" value="<?php print(mysql_result($consulta_perfil,0));?>" readonly="readonly"></td>
      </tr>
      <tr>
        <td valign="middle">&nbsp;</td>
        <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="5">
          <tr>
            <td width="4%"><div id="guardar_btn"><a href="javascript:validacion();">Guardar</a></div></td>
            <td width="96%"><div id="cancelar_btn"><a href="main.php">Cancelar</a></div></td>
          </tr>
        </table></td>
        </tr>
      <tr>
        <td valign="middle">&nbsp;</td>
        <td colspan="2">&nbsp;</td>
      </tr>
    </table>
  </form>
    </td>
  </tr>
</table>
</div>
