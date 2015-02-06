<?php
if(!isset($_SESISON)){
  echo "<script type='text/javascript'>loctaion.href='index.html';</script>";
}
$consulta_marco = "SELECT * FROM marco_estrategico WHERE id_dependencia = ".$_SESSION['id_dependencia_v3'];
$res_consulta = mysql_query($consulta_marco,$siplan_data_conn) or die (mysql_error());
$info_consulta = mysql_fetch_array($res_consulta);
$encontrado = mysql_num_rows($res_consulta);
?>
<script type="text/javascript">
  function regresar() {
    alert("no se realizaron cambios");
    window.location = "main.php?token=eccbc87e4b5ce2fe28308fd9f2a7baf3";
  }
  function guardar(){
    document.marco_estrategico.submit();
  }
</script>
<style type="text/css">

ul.botones li{
display: inline;
}
</style>

<div class="wrap">
<div id="icon-edit" class="icon32 icon32-posts-post"><br /></div><h2>Marco Estratégico</h2>
<div id="cuadro_info">
<ul class="botones">
	 <li><a href="main.php?token=eccbc87e4b5ce2fe28308fd9f2a7baf3"><img src="imagenes/regresar24x24.png" width="24" height="24" align="middle"> Regresar a Proyectos</a></li>
    <li><a href="rpts/marco_estrategico.php" target="_blank"><img src="imagenes/printer24x24.png" width="24" height="24" align="middle">Imprimir</a></li>
</ul>
<table width="100%"  align="center" cellpadding="0" cellspacing="0" style="border:solid 1px #DFDFDF; border-radius:4px;">
  <tr bgcolor="#EDEDED">
    <td style="border-bottom:solid 1px #DFDFDF; border-right:solid 1px #DFDFDF; padding:6px 6px 6px 6px;"><span style="font-family:Tahoma, Geneva, sans-serif; font-size:14px; color:#464646;">Llenar/Editar Marco Estratégico</span></td>
  </tr>
  <tr bgcolor="#F8F8F8">
    <td style="padding:5px 5px 5px 5px;">
<form id="marco_estrategico" name="marco_estrategico" method="post" action="main.php?token=<?php echo md5(2); ?>">
<h3>Resultado y vinculaci&oacute;n del Programa Operativo Anual <?php print($_SESSION['ejercicio_v3'] - 1); ?>:</h3>
    <textarea name="res_poa" cols="128" rows="3"  id="res_poa"><?php echo $info_consulta["res_poa"]; ?></textarea>

<h3>Actividades Sustantivas:</h3>

    <textarea name="actividades" cols="128" rows="3"  id="actividades"><?php echo $info_consulta["activ_sustantivas"]; ?></textarea>

  <h3>Misi&oacute;n:</h3>
    <textarea name="mision" cols="128" rows="3" id="mision"><?php echo $info_consulta["mision"]; ?></textarea>

  <h3>Visi&oacute;n:</h3>
    <textarea name="vision" cols="128" rows="3" id="vision"><?php echo $info_consulta["vision"]; ?></textarea>

  <h3>Objetivo Estrat&eacute;gico:</h3>
    <textarea name="objetivo" cols="128" rows="3"  id="objetivo"><?php echo $info_consulta["objetivo_estrategico"]; ?></textarea>

  <h3>Perspectivas <?php echo $_SESSION['ejercicio_v3'];?></h3>
    <textarea name="perspectiva" cols="128" rows="3" id="perspectiva"><?php echo $info_consulta["perspec_anual"]; ?></textarea>
    <input name="accion" type="hidden" id="accion" value="<?php echo $encontrado; ?>" />

</form>

<ul class="botones">
    <li><a href="javascript:guardar()"><img src="imagenes/save_as24x24.png" width="24" height="24" align="middle">Guardar</a></li>
    <li><a href="javascript:regresar()"><img src="imagenes/cancel24x24.png" width="24" height="24" align="middle">Cancelar</a></li>
</ul>
</td>
</tr>
</table>
</div></div>
<br>
