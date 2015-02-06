<script type="text/javascript" src="js/valida_form_indicador_proyecto.js"></script>
<?php
  $id_proyecto = $_GET['id_proyecto'];
  $consulta_proyecto = @mysql_query("SELECT count(*) FROM proyectos WHERE id_proyecto = ".$id_proyecto." AND estatus = 1",$siplan_data_conn);
  $res_proyecto = mysql_result($consulta_proyecto,0);
  $consulta_indicador = @mysql_query("SELECT
ind_proy.fin_objetivo as fin_objetivo,
ind_proy.nombre_fin as fin_nombre,
ind_proy.metodo_fin as fin_metodo,
ind_proy.tipo_fin as id_tipo_fin,
tipo_ind_fin.tipo_indicador as tipo_indicador,
ind_proy.dimension_fin  as id_fin_dimension,
dim_fin.dimension as fin_dimension,
ind_proy.frecuencia_fin as id_fin_frecuencia,
frec_fin.frecuencia as fin_frecuencia,
ind_proy.sentido_fin as id_fin_sentido,
sen_fin.sentido as sentido_fin,
ind_proy.u_medida_fin as fin_u_medida,
ind_proy.meta_fin as fin_meta,
ind_proy.proposito_objetivo as proposito_objetivo,
ind_proy.proposito_nombre as proposito_nombre,
ind_proy.proposito_metodo as proposito_metodo,
ind_proy.proposito_tipo as id_proposito_tipo,
tipo_ind_pro.tipo_indicador as proposito_tipo,
ind_proy.proposito_dimension as id_proposito_dimension,
dim_pro.dimension as proposito_dimension,
ind_proy.proposito_frecuencia as id_proposito_frecuencia,
frec_pro.frecuencia as proposito_frecuencia,
ind_proy.proposito_sentido as id_proposito_sentido,
sen_pro.sentido as proposito_sentido,
ind_proy.proposito_unidad_medida as proposito_u_medida,
ind_proy.proposito_meta as proposito_meta,
ind_proy.medio_verifica_fin as medio_verifica_fin,
ind_proy.supuesto_fin as supuesto_fin,
ind_proy.medio_verifica_pro as medio_verifica_pro,
ind_proy.supuesto_pro as supuesto_pro  
from
indicadores_proyecto as ind_proy
inner join tipo_indicador as tipo_ind_fin on(ind_proy.tipo_fin = tipo_ind_fin.id_tipo_indicador)
inner join dimension_indicador as dim_fin on(ind_proy.dimension_fin = dim_fin.id_dimension)
inner join frecuencia_indicador as frec_fin on(ind_proy.frecuencia_fin = frec_fin.id_frecuencia)
inner join sentido_indicador as sen_fin on(ind_proy.sentido_fin = sen_fin.id_sentido)
inner join tipo_indicador as tipo_ind_pro on(ind_proy.proposito_tipo = tipo_ind_pro.id_tipo_indicador)
inner join dimension_indicador as dim_pro on(ind_proy.proposito_dimension = dim_pro.id_dimension)
inner join frecuencia_indicador as frec_pro on(ind_proy.proposito_frecuencia = frec_pro.id_frecuencia)
inner join sentido_indicador as sen_pro on(ind_proy.proposito_sentido = sen_pro.id_sentido)
where id_proyecto  = ".$id_proyecto,$siplan_data_conn);
  $res_indicador = mysql_fetch_assoc($consulta_indicador);
?>

<div class="wrap">
<h2><span class="glyphicon glyphicon-pencil"></span>&nbsp;Editar Indicador</h2>
<br>

<div class="panel panel-default">
<div class="panel-heading"><span class="glyphicon glyphicon-pencil"></span>&nbsp; Edite su Indicador</div>
<div class="panel-body" style="background-color: ##F8F8F8;">
<form id="indicador" name="indicador" method="post" action="main.php?token=<?php echo md5(92);?>&id_proyecto=<?php echo $_GET['id_proyecto'];?>">
<table width="100%" cellspacing="0" cellpadding="2" style="border:solid 1px #ccc;">
  <tr bgcolor="#D2EECA">
    <td colspan="5"><div align="center"><h3>Resultados</h3></div></td>
  </tr>
  <tr bgcolor="#E8EDE9">
    <td rowspan="2"><b><div align="center">NIVEL</div></b></td>
    <td rowspan="2"><b><div align="center">OBJETIVOS</div></b></td>
    <td><b><div align="center">INDICADORES</div></b></td>
    <td rowspan="2"><b><div align="center">MEDIOS DE VERIFICACI&Oacute;N</div></b></td>
    <td rowspan="2"><b><div align="center">SUPUESTOS</div></b></td>
  </tr>
  <tr bgcolor="#E8EDE9">
    <td><b><span style="font-size: 9px;">Denominaci&oacute;n-M&eacute;todo de c&aacute;lculo-Tipo-Dimensi&oacute;n-Frecuencia-Sentido-Meta anual</span></b></td>
  </tr>
  <tr>
    <td style="border-bottom: solid 1px #ccc; border-right:solid 1px #ccc;">Fin</td>
    <td style="border-bottom: solid 1px #ccc; border-right:solid 1px #ccc;"><textarea name="fin_objetivo" id="fin_objetivo" cols="32" rows="5"><?php echo $res_indicador['fin_objetivo']; ?></textarea></td>
    <td style="border-bottom: solid 1px #ccc; border-right:solid 1px #ccc;">
    	Nombre:<br><textarea name="fin_nombre" id="fin_nombre" cols="50" rows="2"><?php echo $res_indicador['fin_nombre']; ?></textarea><br>
    	M&eacute;todo de c&aacute;lculo:<br><textarea name="fin_metodo" id="fin_metodo" cols="50" rows="2"><?php echo $res_indicador['fin_metodo']; ?></textarea><br>
    	Tipo: <select name="fin_tipo" id="fin_tipo">
    		<?php 
    		echo "<option value='".$res_indicador['id_tipo_fin']."'>".$res_indicador['tipo_indicador']."</option>";
    		$consulta_tipo_indicador = @mysql_query("SELECT * FROM tipo_indicador",$siplan_data_conn);
				while($res_indicador0 = mysql_fetch_array($consulta_tipo_indicador)){
		echo "<option value='".$res_indicador0['id_tipo_indicador']."'>".$res_indicador0['tipo_indicador']."</option>\n";
	} ?>
	</select><br>
    	Dimensi&oacute;n: <select name="fin_dimension" id="fin_dimension">
    		<?php 
    	echo "<option value='".$res_indicador['id_fin_dimension']."'>".$res_indicador['fin_dimension']."</option>";
    		$consulta_tipo_indicador = @mysql_query("SELECT * FROM dimension_indicador",$siplan_data_conn);
				while($res_indicador1 = mysql_fetch_array($consulta_tipo_indicador)){
		echo "<option value='".$res_indicador1['id_dimension']."'>".$res_indicador1['dimension']."</option>\n";
	} ?></select><br>
    	Frecuencia: <select name="fin_frecuencia" id="fin_frecuencia" ><?php
    	echo "<option value='".$res_indicador['id_fin_frecuencia']."'>".$res_indicador['fin_frecuencia']."</option>"; 
    		$consulta_tipo_indicador = @mysql_query("SELECT * FROM frecuencia_indicador",$siplan_data_conn);
				while($res_indicador2 = mysql_fetch_array($consulta_tipo_indicador)){
		echo "<option value='".$res_indicador2['id_frecuencia']."'>".$res_indicador2['frecuencia']."</option>";
	} ?></select><br>
        Sentido: <select name="fin_sentido" id="fin_sentido"><?php 
        echo "<option value='".$res_indicador['id_fin_sentido']."'>".$res_indicador['sentido_fin']."</option>";
    		$consulta_tipo_indicador = @mysql_query("SELECT * FROM sentido_indicador",$siplan_data_conn);
				while($res_indicador3 = mysql_fetch_array($consulta_tipo_indicador)){
		echo "<option value='".$res_indicador3['id_sentido']."'>".$res_indicador3['sentido']."</option>";
	} ?></select><br>
        Unidad de Medida: <input type="text" name="fin_u_medida" id="fin_u_medida" value="<?php echo $res_indicador['fin_u_medida']; ?>"><br>
        Meta Anual: <input type="text" name="fin_meta" id="fin_meta" value="<?php echo $res_indicador['fin_meta']; ?>">
    </td>
    <td style="border-bottom: solid 1px #ccc; border-right:solid 1px #ccc;"><textarea name="fin_verifica" id="fin_verifica" cols="32" rows="5"><?php echo $res_indicador['medio_verifica_fin']; ?></textarea></td>
    <td style="border-bottom: solid 1px #ccc;"><textarea name="fin_supuesto" id="fin_supuesto" cols="32" rows="5"><?php echo $res_indicador['supuesto_fin']; ?></textarea></td>
  </tr>
  <tr>
    <td style="border-right:solid 1px #ccc;">Prop&oacute;sito</td>
    <td style="border-right:solid 1px #ccc;"><textarea name="pro_objetivo" id="pro_objetivo" cols="32" rows="5"><?php echo $res_indicador['proposito_objetivo']; ?></textarea></td>
    <td style="border-right:solid 1px #ccc;">Nombre:<br><textarea name="pro_nombre" id="pro_nombre" cols="50" rows="2"><?php echo $res_indicador['proposito_nombre']; ?></textarea><br>
    	M&eacute;todo de c&aacute;lculo:<br><textarea name="pro_metodo" id="pro_metodo"  cols="50" rows="2"><?php echo $res_indicador['proposito_metodo']; ?></textarea><br>
    	Tipo: <select name="pro_tipo" id="pro_tipo">
    		<?php 
    		echo "<option value='".$res_indicador['id_proposito_tipo']."'>".$res_indicador['proposito_tipo']."</option>";
    		$consulta_tipo_indicador = @mysql_query("SELECT * FROM tipo_indicador",$siplan_data_conn);
				while($res_indicador5 = mysql_fetch_array($consulta_tipo_indicador)){
		echo "<option value='".$res_indicador5['id_tipo_indicador']."'>".$res_indicador5['tipo_indicador']."</option>";
	} ?></select><br>
    	Dimensi&oacute;n: <select name="pro_dimension" id="pro_dimension"><?php 
    	echo "<option value='".$res_indicador['id_proposito_dimension']."'>".$res_indicador['proposito_dimension']."</option>";
    		$consulta_tipo_indicador = @mysql_query("SELECT * FROM dimension_indicador",$siplan_data_conn);
				while($res_indicador6 = mysql_fetch_array($consulta_tipo_indicador)){
		echo "<option value='".$res_indicador6['id_dimension']."'>".$res_indicador6['dimension']."</option>";
	} ?></select><br>
    	Frecuencia: <select name="pro_frecuencia" id="pro_frecuencia"><?php 
    	echo "<option value='".$res_indicador['id_proposito_frecuencia']."'>".$res_indicador['proposito_frecuencia']."</option>";
    		$consulta_tipo_indicador = @mysql_query("SELECT * FROM frecuencia_indicador",$siplan_data_conn);
				while($res_indicador7 = mysql_fetch_array($consulta_tipo_indicador)){
		echo "<option value='".$res_indicador7['id_frecuencia']."'>".$res_indicador7['frecuencia']."</option>";
	} ?></select><br>
        Sentido: <select name="pro_sentido" id="pro_sentido"><?php 
        echo "<option value='".$res_indicador['id_proposito_sentido']."'>".$res_indicador['proposito_sentido']."</option>";
    		$consulta_tipo_indicador = @mysql_query("SELECT * FROM sentido_indicador",$siplan_data_conn);
				while($res_indicador8 = mysql_fetch_array($consulta_tipo_indicador)){
		echo "<option value='".$res_indicador8['id_sentido']."'>".$res_indicador8['sentido']."</option>";
	} ?></select><br>
        Unidad de Medida: <input type="text" name="pro_u_medida" id="pro_u_medida" value="<?php echo $res_indicador['proposito_u_medida']; ?>" ><br>
        Meta Anual: <input type="text" name="pro_meta" id="pro_meta" value="<?php echo $res_indicador['proposito_meta']; ?>"></td>
    <td style="border-right:solid 1px #ccc;"><textarea name="pro_verifica" id="pro_verifica"  cols="32" rows="5"><?php echo $res_indicador['medio_verifica_pro']; ?></textarea></td>
    <td><textarea name="pro_supuesto" id="pro_supuesto" cols="32" rows="5"><?php echo $res_indicador['supuesto_pro']; ?></textarea></td>
  </tr>
</table>
</form>

<ul class="nav nav-pills">
  <?php if($res_proyecto==0){ ?> 
  <li><a href="javascript:valida()"><span class="glyphicon glyphicon-floppy-saved"></span>&nbsp;Guardar</a></li>
   <?php }?>
  <li><a href="main.php?token=eccbc87e4b5ce2fe28308fd9f2a7baf3"><span class="glyphicon glyphicon-floppy-remove"></span>&nbsp;Cancelar</a></li>
  


</div></div></div>
<p>&nbsp;</p> 