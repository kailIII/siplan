<?php



if(!isset($_SESSION['sesion_activa_v3']) ){header('Location: index.php');exit; }
   $id_proyecto = $_GET['id_proyecto'];
   $consulta_unidad = mysql_query("SELECT * FROM u_medida_prog01",    $siplan_data_conn) or die (mysql_error());
	$consulta_unidad2 = mysql_query("SELECT * FROM u_medida_prog01",$siplan_data_conn) or die (mysql_error());
	$encontrados_unidad = mysql_num_rows($consulta_unidad);
	$a1 = 0;
        while($resunidadmed = mysql_fetch_array($consulta_unidad2)){
    	    $idunidadmedida[$a1] = $resunidadmed['id_unidad'];
		$a1 = $a1+1;
		}	
$consulta_componente1 = mysql_query("SELECT * FROM componentes WHERE id_proyecto = $id_proyecto ",$siplan_data_conn)or die (mysql_error());
$i=0;
$porcentaje = 0;
while($res_componente1 = mysql_fetch_array($consulta_componente1)){
	    $numcomponentes[$i] = $res_componente1['no_componente'];
        $i = $i+1;
		$porcentaje = $porcentaje + $res_componente1['ponderacion'];
} 
$ponderacionmax = 100 - $porcentaje;
$totalcomponentes = count($numcomponentes);
$consulta_comp = "SELECT
componente.no_componente as num,
componente.descripcion as nombre,
componente.unidad_responsable as responsable,
componente.unidad_medida as id_unidad,
u_medida.nombre as unidad,
componente.id_tipo as id_tipo,
t_medida.nombre as tipo,
componente.cantidad as cantidad,
componente.ponderacion as ponderacion,
componente.ped_eje as id_eje,
e.eje as eje,
componente.ped_linea as id_linea,
l.nombre as linea,
componente.ped_estrategia as id_estrategia,
s.nombre as estrategia
From componentes as componente
inner join u_medida_prog01 as u_medida on(componente.unidad_medida = u_medida.id_unidad)
inner join tipo_unidad_prog01 as t_medida on(componente.id_tipo = t_medida.id_tipo_unidad)
inner join eje as e on(componente.ped_eje = e.id_eje)
inner join linea as l on(componente.ped_linea = l.id_linea)
inner join estrategias as s on(componente.ped_estrategia = s.id_estrategia)
Where id_componente =".$_GET['componente'];
$ejecuta_con_comp = mysql_query($consulta_comp,$siplan_data_conn) or die (mysql_error());
$res_consulta_comp = mysql_fetch_assoc($ejecuta_con_comp);
$pondera_componente = $res_consulta_comp['ponderacion'];
$num_componente = $res_consulta_comp['num'];
if($ponderacionmax==0){
	$pondera_global=$pondera_componente;
}else{$pondera_global=$pondera_componente+$ponderacionmax;}
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
from indicadores_componente as ind_com
inner join tipo_indicador as tip_ind on(ind_com.tipo_indicador = tip_ind.id_tipo_indicador)
inner join dimension_indicador as dim_ind on(ind_com.dimension = dim_ind.id_dimension)
inner join sentido_indicador as sen_ind on(ind_com.sentido = sen_ind.id_sentido)
inner join frecuencia_indicador as fre_ind on(ind_com.frecuencia = fre_ind.id_frecuencia)
where id_componente = ".$_GET['componente'];
$exec_con_ind =  mysql_query($consulta_indicadores,$siplan_data_conn) or die (mysql_error());
$res_ind_con = mysql_fetch_assoc($exec_con_ind);
?>
<script type="text/javascript">
   function valida(){	   
   		if (document.getElementById('no_componente').value == ""){
		 alert("falta el número del componente");
		 return false();
	 }
	  if(document.getElementById('no_componente').value != <?php echo $num_componente;?>){
	   var componentesid = new Array(<?php  for($x=0;$x<$totalcomponentes;$x=$x+1){ echo $numcomponentes[$x].",";}  echo "0"; ?>);
    for(x=0;x<componentesid.length;x++){
        if(document.getElementById('no_componente').value == componentesid[x]){
            alert("este numero de componente ya existe porfavor borre el componente o seleccione otro n&uacute;mero");
            document.getElementById('no_componente').value = "";
            return false();
        }
    }
   }
   	var  elemento1 = document.getElementById('no_componente').value;
    var  vuelta1 = elemento1.length;
   for(x=0;  x < vuelta1; x=x+1){
    	var t_val = elemento1.charAt(x);
    	if(isNaN(t_val)){
    		alert("El numero de componente debe ser entero"); 
    		document.getElementById('no_componente').value = "";
    		var elemento1 = "";
    		return false();
    	}
    }
	 if (document.getElementById('descripcion').value == ""){
		 alert("falta la descripción del componente");
		 return false();
	 }
	 if (document.getElementById('u_medida').value == 0){
		 alert("falta la unidad de medida");
		 return false();
	 }	   
	 	 if (document.getElementById('tipo_medida').value == 0){
		 alert("faltael tipo de medida");
		 return false();
	 }	   
	 	 if (document.getElementById('cantidad').value == ""){
		 alert("falta la cantidad ");
		 return false();
	 }	  
	var  elemento2 = document.getElementById('cantidad').value;
   var  vuelta2 = elemento2.length;
   for(x=0;  x < vuelta2; x=x+1){
    	var t_val = elemento2.charAt(x);
    	if(isNaN(t_val)){
    		alert("la cantidad debe ser entero"); 
    		document.getElementById('cantidad').value = "";
    		var elemento2 = "";
    		return false();
    	}
    } 	   
	 	if (document.getElementById('ponderacion').value == ""){
		 alert("falta la ponderacion");
		 return false();
	 }
	   if (document.getElementById('ponderacion').value > <?php echo $pondera_global; ?>){
		 alert("se ha sobrepasado la ponderaci&oacute;n");
		 return false();
	 }
	var  elemento3 = document.getElementById('ponderacion').value;
   var  vuelta3 = elemento3.length;
   for(x=0;  x < vuelta3; x=x+1){
    	var t_val = elemento3.charAt(x);
    	if(isNaN(t_val)){
    		alert("la ponderacion debe ser entero"); 
    		document.getElementById('cantidad').value = "";
    		var elemento3 = "";
    		return false();
    	}
    }
	 if (document.getElementById('u_responsable').value == ""){
		 alert("falta la unidad responsable");
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
    if(document.getElementById('prog_pres').value = 0){
    alert("Seleccione programa presupuestario");
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
	 document.frm_componente.submit();
   }
</script>
<script type="text/javascript">
function tipo_medidas(a){
   	document.getElementById('tipo_medida').length=0;
	document.getElementById('tipo_medida').options[0] = new Option('-seleccione-','0');
	switch(a){
		<?php  
		
		  for($x=0;$x<$encontrados_unidad;$x=$x+1){
			  echo "case \"$idunidadmedida[$x]\":\n";
			  $consulta_tipo_medida = mysql_query("SELECT * FROM tipo_unidad_prog01 WHERE id_unidad = ".$idunidadmedida[$x],$siplan_data_conn) or die (mysql_error());
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

function agregalinea(idprograma){
    document.getElementById('linea').length=0;
    document.getElementById('linea').options[0] = new Option('-seleccione-','0');
    document.getElementById('estrategia').length=0;
    document.getElementById('estrategia').options[0] = new Option('-seleccione-','0');

    switch(idprograma){
    <?php

    for($x=1;$x<6;$x=$x+1){
        $b=1;
        echo "case \"$x\":\n";
        $consulta_linea = mysql_query( " SELECT * FROM linea where id_eje = $x",$siplan_data_conn )or die(mysql_error());
        while($resultado_linea = mysql_fetch_array($consulta_linea)){
            $id_linea = $resultado_linea['id_linea'];
            $linea_desc = html_entity_decode(substr($resultado_linea['nombre'],0,64))."...";
            echo  "document.getElementById('linea').options[$b]=new Option ('$linea_desc','$id_linea');\n";
            $b = $b + 1;
        }
        mysql_free_result($consulta_linea);
        echo "break;\n";
    }
    ?>
    }
}

function agregaestrategia(idsubprograma){

    document.getElementById('estrategia').length=0;
    document.getElementById('estrategia').options[0] = new Option('-seleccione-','0');
    switch(idsubprograma){
    <?php

    for($x=1;$x<36;$x=$x+1){
        $b=1;
        echo "case \"$x\":\n";
        $consulta_estrategia = mysql_query( "SELECT * FROM estrategias where id_linea = $x",$siplan_data_conn )or die(mysql_error());
        while($resultado_estrategia = mysql_fetch_array($consulta_estrategia)){
            $id_estrategia = $resultado_estrategia['id_estrategia'];
            $estrategia_desc = html_entity_decode(substr($resultado_estrategia['nombre'],0,96))."...";
            echo  "document.getElementById('estrategia').options[$b]=new Option ('$estrategia_desc','$id_estrategia');\n";
            $b = $b + 1;
        }
        mysql_free_result($consulta_estrategia);
        echo "break;\n";
    }
    ?>
    }
}
</script>

<div class="wrap">
<h2><span class="glyphicon glyphicon-pencil"></span>&nbsp;Editar Componente</h2>
<br>

<div class="panel panel-default">
<div class="panel-heading"><span class="glyphicon glyphicon-pencil"></span>&nbsp; Edite su Componente</div>
<div class="panel-body" style="background-color: ##F8F8F8;">

<form name="frm_componente" id="frm_componente" method="post" action="main.php?token=<?php echo md5(17);?>&id_componente=<?php echo $_GET['componente'] ?>&id_proyecto=<?php echo $_GET['id_proyecto']?>">
  <p>No. de Componente&nbsp;<input name="no_componente" type="text" id="no_componente" size="3" value="<?php echo $num_componente;?>"></p>
  <p>Descripci&oacute;n</p>
  <p>
    <textarea name="descripcion" id="descripcion" cols="128" rows="5"><?php echo $res_consulta_comp['nombre'];?></textarea>
  </p>
  <p>Unidad Responsable 
    <input name="u_responsable" type="text" id="u_responsable" size="96" value="<?php echo $res_consulta_comp['responsable'];?>">
  </p>
  
  <?php  if($_SESSION['ejercicio_v3'] == "2015" ) { ?>    
<p>Programa Presuopuestario 
  <SELECT name='prog_pres' id='prog_pres'>
  <?php   
       $c_prog_pres =  "select prog_pres from componentes where id_componente = ".$_GET['componente'];
     $e_p_p = mysql_query($c_prog_pres,$siplan_data_conn) or die (mysql_error());
     $r = mysql_result($e_p_p,0);
     
     if($r == ""){
      echo " <option value='0'> SELECCIONE </option>";
     }else{
      $c_p_2 = mysql_query("SELECT * FROM programas_presupuestarios where id= '$r'",$siplan_data_conn) or die (mysql_error());
      $r2 = mysql_fetch_assoc($c_p_2);
      
            echo " <option value='".$r2['id']."'> ".$r2['clave']." - ".$r2['descripcion']." </option>";
      
     }
  $con_tot_prog = mysql_query("SELECT * FROM programas_presupuestarios",$siplan_data_conn) or die (mysql_error());
  while($rpp = mysql_fetch_assoc($con_tot_prog)){
    switch($rpp['id']){
            case 1:
            echo " <option disabled='disabled' style='background-color:#ccc;'>Subsidios: Sector Social y Privado o Entidades Federativas y Municipios </option>";
            break;
            case 3:
            echo " <option disabled='disabled' style='background-color:#ccc;'>Desempeño de las Funciones </option>";
            break;
            case 11:
            echo " <option disabled='disabled' style='background-color:#ccc;'>Administrativos y de Apoyo </option>";
            break;
            case 14:
            echo " <option disabled='disabled' style='background-color:#ccc;'>Compromisos </option>";
            break;
            case 16:
            echo " <option disabled='disabled' style='background-color:#ccc;'>Obligaciones </option>";
            break;
            case 20:
            echo " <option disabled='disabled' style='background-color:#ccc;'>Programas de Gasto Federalizado (Gobierno Federal) </option>";
            break;
        } 

        echo " <option value='".$rpp['id']."'> ".$rpp['clave']." - ".$rpp['descripcion']." </option>";
  }
  
  
  ?>
</SELECT></p>
<?php  } ?>    

  

  <p>Unidad de Medida 
   <select name="u_medida" id="u_medida" onChange="tipo_medidas(this.value)">
   	   <option value="<?php echo $res_consulta_comp['id_unidad'];?>"><?php echo $res_consulta_comp['unidad'];?></option>
            <option value="0">-seleccione-</option>
            <?php  
			     while($res_medida_u = mysql_fetch_array($consulta_unidad)){
					 echo  "<option value=\"".$res_medida_u['id_unidad']."\">".$res_medida_u['nombre']."</option>";
				 }
			 ?>
    </select>
  Tipo de Medida 
   <select name="tipo_medida" id="tipo_medida">
   	<option value="<?php echo $res_consulta_comp['id_tipo'];?>"><?php echo $res_consulta_comp['tipo'];?></option>
  </select>
  Cantidad 
    <input name="cantidad" type="text" id="cantidad"  value="<?php echo $res_consulta_comp['cantidad'];?>"/>
  </p>
  <p>
  Ponderaci&oacute;n 
  <input name="ponderacion" type="text" id="ponderacion" value="<?php echo $pondera_componente;;?>"> no debe ser mayor a <b> <?php echo $pondera_global; ?></b>
  </p>
  <p>
   <input name="proyecto" type="hidden" id="proyecto" value="<?php echo $id_proyecto;?>" />
  </p>
  <hr>
  <b>Alineaci&oacute;n Plan Estatal de Desarrollo 2010-2016</b>
    
    <p>Eje: <?php 
    
       $cons_eje_n =  mysql_query("SELECT p.id_eje as id_eje, e.eje as n_eje FROM proyectos p INNER JOIN eje e on (p.id_eje = e.id_eje) where p.id_proyecto = ".$_GET['id_proyecto'],$siplan_data_conn);
	      $r_cons_eje = mysql_fetch_assoc($cons_eje_n);
		  echo "<b>". $r_cons_eje['n_eje']."</b>"; 
    
	 ?><input type="hidden" name="eje" value ="<?php echo $r_cons_eje['id_eje'] ;?>" />
    <br>
      
        
    
        L&iacute;nea
<br>
        <select name="linea" id="linea" onchange="agregaestrategia(this.value)">
        	<option value="<?php echo $res_consulta_comp['id_linea']; ?>"><?php print(substr($res_consulta_comp['linea'],0,64)."..."); ?></option>
        <?php
               $consulta_linea = mysql_query( " SELECT * FROM linea where id_eje = ".$r_cons_eje['id_eje'] ,$siplan_data_conn )or die(mysql_error());
			   while($r_con_linea = mysql_fetch_assoc($consulta_linea))
			  {
			  	echo "<option value='".$r_con_linea['id_linea']."'>".$r_con_linea['nombre']."</option>";
			  }
			   
        ?>
        </select>
        <br />
        Estrategia
<br>
        <select name="estrategia" id="estrategia">
        	<option value="<?php echo $res_consulta_comp['id_estrategia']; ?>"><?php print(substr($res_consulta_comp['estrategia'],0,64)."..."); ?></option>
        </select>
    </p>
    <hr>
  <h3>Indicador del Componente</h3>
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
<ul class="nav nav-pills">
  
  <li><a href="javascript:valida()"><span class="glyphicon glyphicon-floppy-saved"></span>&nbsp;Guardar</a></li>
  <li><a href="main.php?token=c51ce410c124a10e0db5e4b97fc2af39&id_proyecto=<?php echo $id_proyecto;?>"><span class="glyphicon glyphicon-floppy-remove"></span>&nbsp;Cancelar</a></li>
  
</ul> 


<p>&nbsp;</p>
</div></div></div>
