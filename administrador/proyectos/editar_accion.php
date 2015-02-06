<?php   
/* $f_cap_fin_prog01 = strtotime($_SESSION['fin_prog01'],time()); 
$fecha_actual = strtotime(date("d-m-Y",time()));
if($fecha_actual>$f_cap_fin_prog01){
	echo "<script type='text/javascript'>alert('la fecha de captura ha finalizado');</script>";
	header('Location:main.php');
	exit;
} */
if(!isset($_SESSION['sesion_activa_v3']) ){header('Location: index.php');exit; } 
$consulta_proyectos  = @mysql_query("SELECT count(*) FROM proyectos WHERE id_proyecto = ".$_GET['id_proyecto']." AND id_dependencia = ".$_SESSION['id_dependencia_v3'],$siplan_data_conn);
$res_proy =mysql_result($consulta_proyectos, 0);
if($res_proy==0){
	header("location:main.php");
	exit;
}
$con_pry2 = @mysql_query("SELECT estatus FROM proyectos WHERE id_proyecto =".$_GET['id_proyecto'],$siplan_data_conn);
$res_pry2 =mysql_result($con_pry2,0);
$id_comp = $_GET['id_componente'];
$consulta_acciones = @mysql_query("SELECT * FROM acciones WHERE id_componente =".$id_comp,$siplan_data_conn);
$i=0;
$porcentaje = 0;
while($res_accion = mysql_fetch_array($consulta_acciones)){
		 $numacciones[$i] = $res_accion['no_accion'];
        $i = $i+1;		
		$porcentaje = $porcentaje + $res_accion['ponderacion'];
} 
          $ponderacionmax = 100 - $porcentaje;	
		  $totalacciones = count($numacciones);
$cons_unidad_medida= @mysql_query("SELECT * FROM u_medida_prog01",$siplan_data_conn);		  
$encontrados_unidad = mysql_num_rows($cons_unidad_medida);
$i = 0;
while($res_umed = mysql_fetch_array($cons_unidad_medida)){
	$idunidadmedida[$i] = $res_umed['id_unidad'];
	$n_unidad[$i] = $res_umed['nombre'];
	$i++;
}	
mysql_free_result($consulta_acciones);	  
$consulta = @mysql_query("SELECT 
t1.id_accion as id_accion,
t1.no_accion as no_accion,
t1.demanda as demanda,
t1.descripcion as descripcion,
t1.unidad_medida as id_u_med,
t2.nombre as u_medida,
t1.id_tipo as id_t_med,
t3.nombre as tipo_unidad,
t1.cantidad as cantidad,
t1.ponderacion as ponderacion
FROM acciones as t1
inner join u_medida_prog01 as t2 on(t2.id_unidad = t1.unidad_medida)
inner join tipo_unidad_prog01 as t3 on(t3.id_tipo_unidad = t1.id_tipo)
where id_componente = ".$_GET['id_componente']." and id_accion = ".$_GET['id_accion']."
order by no_accion ASC",$siplan_data_conn);
$res_consulta = mysql_fetch_assoc($consulta);
$pondera_accion = $res_consulta['ponderacion'];
$consulta_indicadores = "select 
ind_com.nombre as n_indicador,
ind_com.metodo_calculo as m_calculo,
ind_com.tipo_indicador as id_tipo_ind,
tip_ind.tipo_indicador as tipo_indicador,
ind_com.dimension as id_dim,
dim_ind.dimension as dimension,
ind_com.sentido as id_sentido,
sen_ind.sentido as sentido,
ind_com.frecuencia as id_frecuencia,
fre_ind.frecuencia as frecuencia,
ind_com.u_medida_indicador as u_medida,
ind_com.meta_anual as meta,
ind_com.medio_verifica as medio,
ind_com.supuesto as supuesto
from indicadores_accion as ind_com
inner join tipo_indicador as tip_ind on(ind_com.tipo_indicador = tip_ind.id_tipo_indicador)
inner join dimension_indicador as dim_ind on(ind_com.dimension = dim_ind.id_dimension)
inner join sentido_indicador as sen_ind on(ind_com.sentido = sen_ind.id_sentido)
inner join frecuencia_indicador as fre_ind on(ind_com.frecuencia = fre_ind.id_frecuencia)
where id_accion = ".$_GET['id_accion'];
$exec_con_ind =  @mysql_query($consulta_indicadores,$siplan_data_conn);
$res_ind_con = mysql_fetch_assoc($exec_con_ind);
if($ponderacionmax==0){
	$pondera_global=$pondera_accion;
}else{$pondera_global=$pondera_accion+$ponderacionmax;}
?>
<script type="text/javascript">
function tipo_medidas(a){
	document.getElementById('tipo_medida').length=0;
	document.getElementById('tipo_medida').options[0] = new Option('-seleccione-','0');
	switch(a){
		<?php  		
		  for($x=0;$x<$encontrados_unidad;$x=$x+1){
			  echo "case \"$idunidadmedida[$x]\":\n";			
			  $consulta_tipo_medida = @mysql_query("SELECT * FROM tipo_unidad_prog01  WHERE id_unidad = ".$idunidadmedida[$x],$siplan_data_conn);
			  $b = 1;
			  while($res_tipo_medida = mysql_fetch_array($consulta_tipo_medida)){
				   $id_tipo = $res_tipo_medida['id_tipo_unidad'];
					$tipo_desc = $res_tipo_medida['nombre'];
    						echo  "document.getElementById('tipo_medida').options[$b]=new Option ('$tipo_desc','$id_tipo');\n";
							$b = $b + 1;
			  }
			  mysql_free_result($consulta_tipo_medida);
			  echo "break;\n";
		  }
		?>
	}
}
</script>
<script type="text/javascript">
   function valida(){
   	    if (document.getElementById('no_accion').value == ""){
		 alert("Falta el n\u00famero de acci\u00f3n");
		 return false();
	   }
   	      if (document.getElementById('no_accion').value == 0){
		 alert(" El n\u00famero de acci\u00f3n no puede ser 0");
		 document.getElementById('no_accion').value = "";
		 return false();
	   }   
   	   var  elemento1 = document.getElementById('no_accion').value;
       var  vuelta1 = elemento1.length;
       for(x=0;  x < vuelta1; x=x+1){
    	var t_val = elemento1.charAt(x);
    	if(isNaN(t_val)){
    		alert("El n\u00famero de acci\u00f3n debe ser entero"); 
    		document.getElementById('no_accion').value = "";
    		var elemento1 = "";
    		return false();
    	}
    }
if(document.getElementById('no_accion').value != <?php echo $res_consulta ['no_accion']; ?>){
   	    var no_acciones = new Array(<?php  for($x=0;$x<$totalacciones;$x=$x+1){ echo $numacciones[$x].",";}  echo "0"; ?>);
        for(x=0;x<no_acciones.length;x++){
	        if(document.getElementById('no_accion').value == no_acciones[x]){
	            alert("Este n\u00famero de acci\u00f3n ya existe porfavor borre la acci\u00f3n o seleccione otro n\u00famero");
	            document.getElementById('no_accion').value = "";
	            return false();
	        }
   		 }
 }
	 if (document.getElementById('descripcion').value == ""){
		 alert("Falta la descripci\u00f3n de la acci\u00f3n");
		 return false();
	 }


if (document.getElementById('ped').value == "0"){
     alert("falta la dimension del indicador");
     return false();
   }

   
	 if (document.getElementById('u_medida').value == 0){
		 alert("Falta la unidad de medida");
		 return false();
	 }
	 	 if (document.getElementById('tipo_medida').value == 0){
		 alert("Falta el tipo de medida");
		 return false();
	 }
	 	 if (document.getElementById('cantidad').value == ""){
		 alert("Falta la cantidad ");
		 return false();
	    }
	 var  elemento2 = document.getElementById('cantidad').value;
       var  vuelta2 = elemento2.length;
       var punto = 0;
       for(x=0;  x < vuelta2; x=x+1){
    	var t_val = elemento2.charAt(x);
    	if(isNaN(t_val)){
    		if(t_val!="."){
    		alert("El n\u00famero de acci\u00f3n no debe contener texto"); 
    		document.getElementById('no_accion').value = "";
    		var elemento1 = "";
    		return false();
    		}
    		if(t_val=="."){
    			 punto = punto+1;
    		}if(punto>1){alert("Solo se puede poner una separaci\u00f3n decimal en la cantidad"); return false()}
    	}
    }   
	 	if (document.getElementById('ponderacion').value == ""){
		 alert("Falta la ponderaci\u00f3n");
		 return false();
	   }
       var  elemento3 = document.getElementById('ponderacion').value;
       var  vuelta3 = elemento3.length;
       for(x=0;  x < vuelta3; x=x+1){
    	var t_val = elemento3.charAt(x);
    	if(isNaN(t_val)){
    		alert("La ponderaci\u00f3n debe ser entero"); 
    		document.getElementById('ponderacion').value = "";
    		var elemento3 = "";
    		return false();
    	}
    }
		  if (document.getElementById('ponderacion').value > <?php echo $pondera_global; ?>){
		 alert("Se ha sobrepasado la ponderaci\u00f3n");
		 return false();
	 } 
	suma_meses = 0;
	 parseInt(suma_meses);
	 for(y=1;y<13;y++){
	 	var mes = "m"+y;
	 	 if (document.getElementById(mes).value == ""){
		    document.getElementById(mes).value = "0";
	   } 
	  var cantidad_acciones =  document.getElementById(mes).value;
	   parseInt(cantidad_acciones);
	   suma_meses = suma_meses + cantidad_acciones; 
	   var  elementon= document.getElementById(mes).value;
       var  vueltan = elementon.length;
       for(z=0;  z < vueltan; z=z+1){
    	var t_val_n = elementon.charAt(z);
    	if(isNaN(t_val_n)){
    		alert("Las metas deben ser enteros"); 
    		document.getElementById(mes).value = "";
    		var elementon = "";
    		return false();
    	}
    }	   
	
}
if(suma_meses == 0){
	alert("Debe tener al menos 1 meta al a\u00f1o en cualquier mes");
	return false();
} 
if (document.getElementById('nombre_indicador').value == ""){
		 alert("falta el nombre del indicador");
		 return false();
	 }
	 if (document.getElementById('metodo_calculo').value == ""){
		 alert("falta el metodo de calculo del indicador");
		 return false();
	 }
	 if (document.getElementById('tipo_indicador').value == "0"){
		 alert("falta el tipo de indicador");
		 return false();
	 }
	 if (document.getElementById('dimension').value == "0"){
		 alert("falta la dimension del indicador");
		 return false();
	 }
	 if (document.getElementById('frecuencia').value == "0"){
		 alert("falta la frecuencia del indicador");
		 return false();
	 }
	 if (document.getElementById('sentido').value == "0"){
		 alert("falta el sentido del indicador");
		 return false();
	 }
	  if (document.getElementById('u_medida_indicador').value == ""){
		 alert("falta la unidad de medida del indicador");
		 return false();
	 }	
	  if (document.getElementById('fin_meta').value == ""){
		 alert("falta la meta anual del indicador");
		 return false();
	 }	
	  if (document.getElementById('fin_verifica').value == ""){
		 alert("falta el medio de verificacion del indicador");
		 return false();
	 }	
	  if (document.getElementById('fin_supuesto').value == ""){
		 alert("falta el supuesto del indicador");
		 return false();
	 }	
	   	document.accion.submit();
   }
</script>
<div style="margin-left:20px; margin-right:20px;">
<h2>Editar  Actividad</h2>
<div id="cuadro_info">
<form id="accion" name="accion" method="post" action="main.php?token=<?php echo md5(23);?>&id_accion=<?php echo $_GET['id_accion']; ?>&id_componente=<?php echo $id_comp;?>&id_proyecto=<?php echo $_GET['id_proyecto']; ?> ">
	<input type="hidden" id="key" name="key" value="<?php echo $_SESSION['key_v3']; ?>" />
  <p>
    <label for="demanda">Demanda</label>
    <input name="demanda" type="checkbox" id="demanda" value="1" <?php if($res_consulta['demanda']==1){ echo "checked='checked'"; } ?> />
  </p>
  <p>No. de la Acci&oacute;n: <input name="no_accion" type="text" id="no_accion" value="<?php echo $res_consulta['no_accion']; ?>" /> </p>
  <p>Descripci&oacute;n
      <br />
      <textarea name="descripcion" id="descripcion" cols="128" rows="3" ><?php echo $res_consulta['descripcion']; ?></textarea>
  </p>
  <hr>
  <p><h4>Relación con el PED 2010 - 2016</h4>
  <?php  $cons_ped = mysql_query("SELECT c.ped_eje, c.ped_linea,e.eje,l.nombre FROM componentes c 
  inner join eje e on (c.ped_eje = e.id_eje) 
  inner join linea l on (c.ped_linea = l.id_linea)
   WHERE id_componente = ".$_GET['id_componente'],$siplan_data_conn) or die (mysql_error());
     $res_eje = mysql_fetch_assoc($cons_ped); 
   ?>
  <br>Eje:<b> <?php  echo $res_eje['eje']; ?></b>
  <br>Linea:<b><?php echo $res_eje['nombre'];  ?></b>
  <br>Estrategia: <select name="ped" id="ped"> <?php  
   $cons_ped = mysql_query("SELECT  a.ped, e.nombre FROM acciones a inner join estrategias e on(a.ped = e.id_estrategia) WHERE id_accion = ".$_GET['id_accion'],$siplan_data_conn);
   $rped = mysql_fetch_assoc($cons_ped);
   echo "<option value='".$rped['ped']."'>".$rped['nombre']."</option>";

  $cons_estrategias = mysql_query("SELECT id_estrategia,nombre FROM estrategias WHERE id_linea = ".$res_eje['ped_linea'],$siplan_data_conn); 
  while($r_est = mysql_fetch_assoc($cons_estrategias)){
  	echo "<option value='".$r_est['id_estrategia']."'>".$r_est['nombre']."</option>";
  } 
  ?>
  </select>
  </p>
  <p>Unidad de Medida
    <select name="u_medida" id="u_medida" onchange="tipo_medidas(this.value)">
        <option value="<?php echo $res_consulta['id_u_med']; ?>"><?php echo $res_consulta['u_medida']; ?></option>
        <option value="0">-seleccione-</option>
        <?php  
			     for($x=0;$x<$encontrados_unidad;$x=$x+1){
					 echo  "<option value='$idunidadmedida[$x]'>".$n_unidad[$x]."</option>";
				 }
			 ?>
      </select>
    Tipo de Medida
  <select name="tipo_medida" id="tipo_medida">
  	<option value="<?php echo $res_consulta['id_t_med']; ?>"><?php echo $res_consulta['tipo_unidad']; ?></option>
  </select>
  </p>
  <p>Cantidad
      <input name="cantidad" type="text" id="cantidad" value="<?php echo $res_consulta['cantidad']; ?>" />
    Ponderaci&oacute;n
  <input name="ponderacion" type="text" id="ponderacion" value="<?php echo $pondera_accion; ?>" />
  debe ser menor o igual a <b><?php echo $pondera_global; ?></b>
  </p>
  <?php  
  $cons_metas = @mysql_query("SELECT * FROM metas WHERE id_accion = ".$_GET['id_accion'],$siplan_data_conn);
  $res_metas = mysql_fetch_assoc($cons_metas);
  ?>
  <p>Metas</p>
  <table width="50%"  cellpadding="1" cellspacing="0" style="border-radius: 5px;">
    <tr bgcolor="#99CC66">
      <td >Enero</td>
      <td >Febrero</td>
      <td >Marzo</td>
      <td >Abril</td>
    </tr>
    <tr bgcolor = "#DFFFBF">
      <td><input name="m1" type="text" id="m1" size="12" value ="<?php echo $res_metas['enero_m']; ?>"  /></td>
      <td><input name="m2" type="text" id="m2" size="12" value ="<?php echo $res_metas['febrero_m']; ?>"  /></td>
      <td><input name="m3" type="text" id="m3" size="12" value ="<?php echo $res_metas['marzo_m']; ?>"  /></td>
      <td><input name="m4" type="text" id="m4" size="12" value ="<?php echo $res_metas['abril_m']; ?>"  /></td>
    </tr>
    <tr bgcolor="#99CC66">
      <td>Mayo</td>
      <td>Junio</td>
      <td>Julio</td>
      <td>Agosto</td>
    </tr>
    <tr bgcolor = "#DFFFBF">
      <td><input name="m5" type="text" id="m5" size="12"  value ="<?php echo $res_metas['mayo_m']; ?>" /></td>
      <td><input name="m6" type="text" id="m6" size="12" value ="<?php echo $res_metas['junio_m']; ?>" /></td>
      <td><input name="m7" type="text" id="m7" size="12"  value ="<?php echo $res_metas['julio_m']; ?>" /></td>
      <td><input name="m8" type="text" id="m8" size="12" value ="<?php echo $res_metas['agosto_m']; ?>"  /></td>
    </tr>
    <tr bgcolor="#99CC66">
      <td>Septiembre</td>
      <td >Octubre</td>
      <td>Noviembre</td>
      <td>Diciembre</td>
    </tr>
    <tr bgcolor = "#DFFFBF">
      <td><input name="m9" type="text" id="m9" size="12"  value ="<?php echo $res_metas['septiembre_m']; ?>" /></td>
      <td><input name="m10" type="text" id="m10" size="12"  value ="<?php echo $res_metas['octubre_m']; ?>" /></td>
      <td><input name="m11" type="text" id="m11" size="12" value ="<?php echo $res_metas['noviembre_m']; ?>"  /></td>
      <td><input name="m12" type="text" id="m12" size="12" value ="<?php echo $res_metas['diciembre_m']; ?>" /></td>
    </tr>
  </table>
  <p></p>
  <hr>
  <h3>Indicador de la Acci&oacute;n</h3>
  <p>Nombre del Indicador<br>
    <textarea name="nombre_indicador" id="nombre_indicador" cols="75" rows="3"><?php echo $res_ind_con['n_indicador'];?></textarea>
  </p>
  <p>M&eacute;todo de C&aacute;lculo<br>  
    <textarea name="metodo_calculo" id="metodo_calculo" cols="75" rows="3"><?php echo $res_ind_con['m_calculo'];?></textarea>
  </p>
  <p>
  Tipo: <select name="tipo_indicador" id="tipo_indicador">
    		<?php 
    		echo "<option value='".$res_ind_con['id_tipo_ind']."'>".$res_ind_con['tipo_indicador']."</option>\n";
    		    $consulta_tipo_indicador = @mysql_query("SELECT * FROM tipo_indicador",$siplan_data_conn);
				while($res_indicador0 = mysql_fetch_array($consulta_tipo_indicador)){
		echo "<option value='".$res_indicador0['id_tipo_indicador']."'>".$res_indicador0['tipo_indicador']."</option>\n";
	} ?>
	</select><br>
    	Dimensi&oacute;n: <select name="dimension" id="dimension">
    		<?php 
    	echo "<option value='".$res_ind_con['id_dim']."'>".$res_ind_con['dimension']."</option>\n";
    		$consulta_tipo_indicador = @mysql_query("SELECT * FROM dimension_indicador",$siplan_data_conn);
				while($res_indicador1 = mysql_fetch_array($consulta_tipo_indicador)){
		echo "<option value='".$res_indicador1['id_dimension']."'>".$res_indicador1['dimension']."</option>\n";
	} ?></select><br>
    	Frecuencia: <select name="frecuencia" id="frecuencia" ><?php
    	echo "<option value='".$res_ind_con['id_frecuencia']."'>".$res_ind_con['frecuencia']."</option>\n"; 
    		$consulta_tipo_indicador = @mysql_query("SELECT * FROM frecuencia_indicador",$siplan_data_conn);
				while($res_indicador2 = mysql_fetch_array($consulta_tipo_indicador)){
		echo "<option value='".$res_indicador2['id_frecuencia']."'>".$res_indicador2['frecuencia']."</option>";
	} ?></select><br>
        Sentido: <select name="sentido" id="sentido"><?php 
        echo "<option value='".$res_ind_con['id_sentido']."'>".$res_ind_con['sentido']."</option>\n";
    		$consulta_tipo_indicador = @mysql_query("SELECT * FROM sentido_indicador",$siplan_data_conn);
				while($res_indicador3 = mysql_fetch_array($consulta_tipo_indicador)){
		echo "<option value='".$res_indicador3['id_sentido']."'>".$res_indicador3['sentido']."</option>";
	} ?></select></p>
	<p>
        Unidad de Medida: <br><input type="text" name="u_medida_indicador" id="u_medida_indicador" value="<?php echo $res_ind_con['u_medida'];?>"><br>
        Meta Anual:<br> <input type="text" name="fin_meta" id="fin_meta" value="<?php echo $res_ind_con['meta']; ?>"><br>
    Medio de Verificaci&oacute;n<br>
    <textarea name="fin_verifica" id="fin_verifica" cols="75" rows="3"><?php echo $res_ind_con['medio']; ?></textarea><br>
    Supuesto<br>
    <textarea name="fin_supuesto" id="fin_supuesto" cols="75" rows="3"><?php echo $res_ind_con['supuesto']; ?></textarea>
  </p>
</form>
<ul id="botones">
    <?php if($res_pry2==0){ ?>
    <li><a href="javascript:valida()"><img src="imagenes/save_as24x24.png" width="24" height="24" align="middle">Actualizar</a></li>
    <?php } ?>
     <li><a href="main.php?token=1f0e3dad99908345f7439f8ffabdffc4&id_componente=<?php echo $_GET['id_componente'];?>&id_proyecto=<?php echo $_GET['id_proyecto']?>"><img src="imagenes/cancel24x24.png" width="24" height="24" align="middle">Cancelar</a></li>
</ul>
<p>&nbsp;</p>
</div></div>
