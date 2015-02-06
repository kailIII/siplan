<?php
$consulta_proyectos = mysql_query("SELECT * FROM proyectos WHERE id_dependencia = " . $_SESSION['id_dependencia_v3'], $siplan_data_conn) or die(mysql_error());
$i = 0;
$porcentaje = 0;
while ($res_proyecto1 = mysql_fetch_array($consulta_proyectos)) {
	$numproyectos[$i] = $res_proyecto1['no_proyecto'];
	$i = $i + 1;
	$porcentaje = $porcentaje + $res_proyecto1['ponderacion'];
}
$totalproyectos = count($numproyectos);
$ponderacionmax = 100 - $porcentaje;
$consulta_proyecto = "
SELECT  
proy.no_proyecto as num,
proy.estatus as estatus,
proy.nombre as nombre,
proy.uresponsable as u_responsable,
proy.titular as titular,
proy.id_eje as id_eje,
proy.objetivo as pr_objetivo,
eje.eje,
proy.id_linea as id_linea,
linea.nombre as linea,
proy.id_estrategia as id_estrategia,
estra.nombre as estrategia,
proy.pnd_eje as id_pnd_eje,
proy.pnd_objetivo as id_pnd_objetivo,
proy.pnd_estrategia as id_pnd_estrategia,
proy.pnd_linea_accion as id_pnd_linea,
pnd_ejes.pnd_eje as pnd_eje,
pnd_estrategias.pnd_estrategia as pnd_estrategia,
pnd_objetivos.pnd_objetivo as pnd_objetivo,
pnd_lineas_accion.linea_accion as pnd_linea,
proy.ponderacion as ponderacion,
proy.proposito as proposito,
proy.justificacion as justificacion,
proy.clasificacion as id_clasificacion,
clas.clasificacion as clasificacion,
proy.grado as id_grado,
grado.grado,
proy.g_vulnerable as id_gvulnerable,
gpo.descripcion as vulnerable,
proy.beneficiarios_h as ben_h,
proy.beneficiarios_m as ben_m,
proy.inversion,
proy.unidad_medida,
proy.cantidad,
proy.prog_sem,
proy.finalidad as id_finalidad,
finalidad.nombre as finalidad,
proy.funcion as id_funcion,
fun.nombre as funcion,
proy.subfuncion as id_subfuncion,
subf.nombre as subfuncion,
proy.observaciones
FROM 
proyectos proy
inner join eje on(proy.id_eje = eje.id_eje)
inner join linea on (proy.id_linea = linea.id_linea)
inner join estrategias estra on(proy.id_estrategia = estra.id_estrategia)
inner join clasificacion clas on(proy.clasificacion = clas.id_clasificacion)
inner join grado on(proy.grado = grado.id_grado)
inner join grupo_vulnerable as gpo on(proy.g_vulnerable = gpo.id_vulnerable)
inner join finalidad on (proy.finalidad = finalidad.id_finalidad)
inner join funcion as fun on(proy.funcion = fun.id_funcion)
inner join subfuncion as subf on (proy.subfuncion = subf.id_subfuncion)
inner join pnd_ejes on(proy.pnd_eje = pnd_ejes.id_pnd_eje)
inner join pnd_objetivos on(proy.pnd_objetivo = pnd_objetivos.id_pnd_objetivo)
inner join pnd_estrategias on(proy.pnd_estrategia = pnd_estrategias.id_pnd_estrategia)
inner join pnd_lineas_accion on(proy.pnd_linea_accion = pnd_lineas_accion.id_pnd_linea_accion)
where id_proyecto = " . $_GET['id_proyecto'];

$execute_consulta = mysql_query($consulta_proyecto, $siplan_data_conn) or die(mysql_error());
$res_consulta = mysql_fetch_assoc($execute_consulta);
$ponderacion_actual = $res_consulta['ponderacion'];
if ($ponderacionmax == 0) {
	$ponderacionmax = $ponderacion_actual;
} else {$ponderacionmax = $ponderacionmax + $ponderacion_actual;
}
?>
<script type="text/javascript">
	function regresa(){
    location.href="main.php?token=e4da3b7fbbce2345d7772b0674a318d5";
}
function valida(){  
     if(document.getElementById('no_proyecto').value == ""){
        alert ("falta el n\u00famero del proyecto");
        return false();
    }   
    var proyectosid = new Array(<?php
		for ($x = 0; $x < $totalproyectos; $x = $x + 1) {
			echo $numproyectos[$x] . ",";
		}  echo "0";
 ?>);
    for(x=0;x<proyectosid.length;x++){
        if(document.getElementById('no_proyecto').value == proyectosid[x]){
        	if(document.getElementById('no_proyecto').value != <?php echo $res_consulta['num']; ?>){
            alert("este n\u00famero de proyecto ya existe porfavor borre el proyecto o seleccione otro n\u00famero");
            document.getElementById('no_proyecto').value = "";
            return false();
           }
        }
    }
    if(document.getElementById('no_proyecto').value == ""){
        alert ("falta el n\u00famero del proyecto");
        return false();
    }
   var  elemento1 = document.getElementById('no_proyecto').value;
   var  vuelta1 = elemento1.length;
   for(x=0;  x < vuelta1; x=x+1){
    	var t_val = elemento1.charAt(x);
    	if(isNaN(t_val)){
    		alert("El n\u00famero de proyecto debe ser entero"); 
    		document.getElementById('no_proyecto').value = "";
    		var elemento1 = "";
    		return false();
    	}
    }
    var  elemento2 = document.getElementById('ponderacion').value;
   var  vuelta2 = elemento2.length;
   for(x=0;  x < vuelta2; x=x+1){
    	var t_val2 = elemento2.charAt(x);
    	if(isNaN(t_val2)){
    		alert("La Ponderaci\u00f3n debe ser entero"); 
    		document.getElementById('ponderacion').value = "";
    		var elemento2 = "";
    		return false();
    	}
    }
    var  elemento3 = document.getElementById('ben_h').value;
   var  vuelta3 = elemento3.length;
   for(x=0;  x < vuelta3; x=x+1){
    	var t_val3 = elemento3.charAt(x);
    	if(isNaN(t_val3)){
    		alert("Beneficiarios hombres debe ser entero"); 
    		document.getElementById('ben_h').value = "";
    		var elemento3 = "";
    		return false();
    	}
    } 
    var  elemento4 = document.getElementById('ben_m').value;
   var  vuelta4 = elemento4.length;
   for(x=0;  x < vuelta4; x=x+1){
    	var t_val4 = elemento4.charAt(x);
    	if(isNaN(t_val4)){
    		alert("Beneficiarios mujeres debe ser entero"); 
    		document.getElementById('ben_m').value = "";
    		var elemento4 = "";
    		return false();
    	}
    }
    var  elemento5 = document.getElementById('cantidad').value;
   var  vuelta5 = elemento5.length;
   for(x=0;  x < vuelta5; x=x+1){
    	var t_val5 = elemento5.charAt(x);
    	if(isNaN(t_val5)){
    		alert("Cantidad de unidad de medida debe ser entero"); 
    		document.getElementById('cantidad').value = "";
    		var elemento5 = "";
    		return false();
    	}
    }
    
    var  elemento6 = document.getElementById('p_semestral').value;
   var  vuelta6 = elemento6.length;
   for(x=0;  x < vuelta6; x=x+1){
    	var t_val6 = elemento6.charAt(x);
    	if(isNaN(t_val6)){
    		alert("Programado Semestral debe ser entero"); 
    		document.getElementById('p_semestral').value = "";
    		var elemento6 = "";
    		return false();
    	}
    }
    if(document.getElementById('u_responsable').value == ""){
        alert ("falta la unidad responsable del proyecto");
        return false();
    } 
    if(document.getElementById('titular').value == ""){
        alert ("falta el nombre del titular");
        return false();
    }
    if(document.getElementById('objetivo').value == ""){
        alert ("falta el objetivo del proyecto");
        return false();
    }
    if(document.getElementById('eje').value == 0){
        alert ("seleccione el eje del proyecto");
        return false();
    }
    if(document.getElementById('linea').value == 0){
        alert ("seleccione la linea del proyecto");
        return false();
    }
    if(document.getElementById('estrategia').value == 0){
        alert ("seleccione la estrategia del proyecto");
        return false();
    }
    if(document.getElementById('ponderacion').value == ""){
        alert ("falta la ponderaci\u00f3n del proyecto");
        return false();
    }
    if(document.getElementById('ponderacion').value > <?php echo $ponderacionmax; ?>){
        alert ("sobrepasa la ponderaci\u00f3n m\u00e1xima del proyecto");
        return false();
    }
    if(document.getElementById('proposito').value == ""){
        alert ("falta el prop\u00f3sito del proyecto");
        return false();
    }
    if(document.getElementById('justificacion').value == ""){
        alert ("falta la justificaci\u00f3n del proyecto");
        return false();
    }
    if(document.getElementById('clasificacion').value == 0){
        alert ("seleccione la clasificaci\u00f3n del proyecto");
        return false();
    }
    if(document.getElementById('grado').value == 3){
        alert ("seleccione el grado del proyecto");
        return false();
    }
    if(document.getElementById('gvulnerable').value == 0){
        alert ("seleccione el grupo vulnerable del proyecto");
        return false();
    }
    if(document.getElementById('ben_h').value == ""){
        alert ("falta beneficiarios hombres del proyecto");
        return false();
    }
    if(document.getElementById('ben_m').value == ""){
        alert ("falta beneficiarios mujeres del proyecto");
        return false();
    }
    if(document.getElementById('inversion').value == ""){
        alert ("falta la inversi\u00f3n del proyecto");
        return false();
    }
    if(document.getElementById('u_medida').value == ""){
        alert ("falta la unidad de medida del proyecto");
        return false();
    }
    if(document.getElementById('cantidad').value == ""){
        alert ("falta programado anual del proyecto");
        return false();
    }  
     if(document.getElementById('p_semestral').value == ""){
        alert ("falta el programado semestral");
        return false();
    }
    if(document.getElementById('finalidad').value == 0){
        alert ("seleccione la finalidad del proyecto");
        return false();
    }
    if(document.getElementById('funcion').value == 0){
        alert ("seleccione la funci\u00f3n del proyecto");
        return false();
    }
    if(document.getElementById('subfuncion').value == 0){
        alert ("seleccione la subfuinci\u00f3n del proyecto");
        return false();
    } 
    if(document.getElementById('grado').value == 0){
        alert ("seleccione el grado del proyecto");
        return false();
    }
     if(document.getElementById('pnd_eje').value == 0){
        alert ("seleccione el eje pnd del proyecto");
        return false();
    }
     if(document.getElementById('pnd_objetivo').value == 0){
        alert ("seleccione el objetivo pnd del proyecto");
        return false();
    }
     if(document.getElementById('pnd_estrategia').value == 0){
        alert ("seleccione la estrategia pnd del proyecto");
        return false();
    }
     if(document.getElementById('pnd_linea').value == 0){
        alert ("seleccione la l\u00ednea pnd del proyecto");
        return false();
    }
   document.proyecto.submit();
}
function agregalinea(idprograma){
    document.getElementById('linea').length=0;
    document.getElementById('linea').options[0] = new Option('-seleccione-','0');
    document.getElementById('estrategia').length=0;
    document.getElementById('estrategia').options[0] = new Option('-seleccione-','0');
    switch(idprograma){
    <?php
	for ($x = 1; $x < 6; $x = $x + 1) {
		$b = 1;
		echo "case \"$x\":\n";
		$consulta_linea = mysql_query(" SELECT * FROM linea where id_eje = $x", $siplan_data_conn) or die(mysql_error());
		while ($resultado_linea = mysql_fetch_array($consulta_linea)) {
			$id_linea = $resultado_linea['id_linea'];
			$linea_desc = html_entity_decode(substr($resultado_linea['nombre'], 0, 64)) . "...";
			echo "document.getElementById('linea').options[$b]=new Option ('$linea_desc','$id_linea');\n";
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
	for ($x = 1; $x < 36; $x = $x + 1) {
		$b = 1;
		echo "case \"$x\":\n";
		$consulta_estrategia = mysql_query("SELECT * FROM estrategias where id_linea = $x", $siplan_data_conn) or die(mysql_error());
		while ($resultado_estrategia = mysql_fetch_array($consulta_estrategia)) {
			$id_estrategia = $resultado_estrategia['id_estrategia'];
			$estrategia_desc = html_entity_decode(substr($resultado_estrategia['nombre'], 0, 96)) . "...";
			echo "document.getElementById('estrategia').options[$b]=new Option ('$estrategia_desc','$id_estrategia');\n";
			$b = $b + 1;
		}
		mysql_free_result($consulta_estrategia);
		echo "break;\n";
	}
    ?>
    		}
}
function agregafuncion(idfinalidad){
    document.getElementById('funcion').length=0;
    document.getElementById('funcion').options[0] = new Option('-seleccione-','0');
    document.getElementById('subfuncion').length=0;
    document.getElementById('subfuncion').options[0] = new Option('-seleccione-','0');
    document.getElementById('id_finalidad').value = idfinalidad;
    switch(idfinalidad){
    <?php
	for ($x = 1; $x < 5; $x = $x + 1) {
		$b = 1;
		echo "case \"$x\":\n";
		$consulta_funcion = mysql_query(" SELECT * FROM funcion where id_finalidad = $x", $siplan_data_conn) or die(mysql_error());
		while ($resultado_funcion = mysql_fetch_array($consulta_funcion)) {
			$id_funcion = $resultado_funcion['id_funcion'];
			$fun_finanzas = $resultado_funcion['id_funf'];
			$funcion_desc = html_entity_decode($resultado_funcion['nombre']);
			echo "document.getElementById('funcion').options[$b]=new Option ('$funcion_desc','$id_funcion');\n";
			$b = $b + 1;
		}
		mysql_free_result($consulta_funcion);
		echo "break;\n";
	}
    ?>
		}
		}
</script>
<script type="text/javascript" src="js/agrega_subfuncion.js"></script>
<script type="text/javascript" src="js/combos_pnd.js"></script>


<div class="wrap">
<h2><span class="glyphicon glyphicon-pencil"></span>&nbsp;Editar Proyecto</h2>
<br>

<div class="panel panel-default">
<div class="panel-heading"><span class="glyphicon glyphicon-pencil"></span>&nbsp; Edite su Proyecto</div>
<div class="panel-body" style="background-color: ##F8F8F8;">



<tr bgcolor="">
<td style="padding:5px 5px 5px 5px;">  	


<form id="proyecto" name="proyecto" method="post" action="main.php?token=<?php echo md5(9); ?>">
    <p>Num. Proyecto
        <input name="no_proyecto" type="text" id="no_proyecto" value="<?php  print_r($res_consulta['num']); ?>" size="4" maxlength="3"   />
        Nombre
        <input name="nombre" type="text" id="nombre" value="<?php echo $res_consulta['nombre']; ?>" size="100" />
    </p>
    <p>Inversi&oacute;n Aproximada
        <input name="inversion" type="text" id="inversion" value="<?php echo $res_consulta['inversion']; ?>" />
     </p>
     
<?php  if($_SESSION['ejercicio_v3'] == "2015" ) { ?>    
<p>Programa Presuopuestario 
	<SELECT name='prog_pres' id='prog_pres'>
	<?php   
	     $c_prog_pres =  "select prog_pres from proyectos where id_proyecto = ".$_GET['id_proyecto'];
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
    
    <p>Unidad Responsable
        <input name="u_responsable" type="text" id="u_responsable" value="<?php echo $res_consulta['u_responsable']; ?>" size="100" />
    </p>
     <p>Nombre del Titular: 
        <input name="titular" type="text" id="titular" value="<?php echo $res_consulta['titular']; ?>" size="100" />
    </p>
    <hr>
    <b>Alineaci&oacute;n Plan Estatal de Desarrollo 2010-2016</b>
    <p>Eje
    <br>
        <select name="eje" id="eje" onchange="agregalinea(this.value)">
        	<option value="<?php echo $res_consulta['id_eje']; ?>"><?php echo $res_consulta['eje']; ?></option>
            <?php
			echo "<option value='0'>-seleccione-</option>";
			$consulta_n_eje = mysql_query("SELECT * FROM eje", $siplan_data_conn) or die(mysql_error());
			$i = 1;
			while ($res_n_eje1 = mysql_fetch_array($consulta_n_eje)) {
				echo "<option value=\"" . $i . "\"> " . $res_n_eje1['eje'] . "</option>";
				$i++;
			}
            ?>
        </select>
        <br />
        L&iacute;nea
<br>
        <select name="linea" id="linea" onchange="agregaestrategia(this.value)">
        	<option value="<?php echo $res_consulta['id_linea']; ?>"><?php print(substr($res_consulta['linea'], 0, 64) . "..."); ?></option>
        </select>
        <br />
        Estrategia
<br>
        <select name="estrategia" id="estrategia">
        	<option value="<?php echo $res_consulta['id_estrategia']; ?>"><?php print(substr($res_consulta['estrategia'], 0, 64) . "..."); ?></option>
        </select>
    </p>
    <hr>
    <b> Alineaci&oacute;n Plan Nacional de Desarrollo 2013-2018</b>

<p>Meta Nacional
<select name="pnd_eje" id="pnd_eje" onchange="llena_combo_objetivo(this.value)">
	<option value="<?php echo $res_consulta['id_pnd_eje']; ?>"><?php echo $res_consulta['pnd_eje']; ?></option>
    <option value='0'>-seleccione-</option>
    <option value="1">1-M&eacute;xico en Paz</option>
    <option value="2">2-M&eacute;xico Incluyente</option>
    <option value="3">3-M&eacute;xico con Educaci&oacute;n de Calidad</option>
    <option value="4">4-M&eacute;xico Pr&oacute;spero</option>
    <option value="5">5-M&eacute;xico con Responsabilidad Global</option>
    <option value="6">6-No Aplica</option>
</select></p>

<p>Objetivo
<select name="pnd_objetivo" id="pnd_objetivo" onchange="llena_combo_estrategia_pnd(this.value)">
    <option value="<?php echo $res_consulta['id_pnd_objetivo']; ?>"><?php print(substr($res_consulta['pnd_objetivo'], 0, 64) . "..."); ?></option>
</select></p>

<p>Estrategia
<select name="pnd_estrategia" id="pnd_estrategia" onchange="llena_combo_lineas_pnd(this.value)">
    <option value="<?php echo $res_consulta['id_pnd_estrategia']; ?>"><?php print(substr($res_consulta['pnd_estrategia'], 0, 64) . "..."); ?></option>
</select></p>

<p>Linea de Acci&oacute;n
<select name="pnd_linea" id="pnd_linea">
    <option value="<?php echo $res_consulta['id_pnd_linea']; ?>"><?php print(substr($res_consulta['pnd_linea'], 0, 64) . "..."); ?></option>
</select></p>

    <hr>
    <b>Objetivo Estrat&eacute;gico </b>
    <p>Dependencia o Entidad: 
        <input type="text" size="64" value="<?php echo $_SESSION['nombre_dependencia_v3']; ?>" enabled="false"/> 
    </p>
    <p>Objetivo<br />
        <textarea name="objetivo" id="objetivo" cols="100" rows="5"><?php echo $res_consulta['pr_objetivo']; ?></textarea>
    </p>
    <hr>
    <p>Ponderaci&oacute;n 
        <input name="ponderacion" type="text" id="ponderacion" size="5" maxlength="3"  value="<?php echo $res_consulta['ponderacion']; ?>" /> debe ser menor o igual a <b><?php echo $ponderacionmax; ?></b>
    </p>
    
    <p>Prop&oacute;sito<br />
        <label for="proposito"></label>
        <textarea name="proposito" id="proposito" cols="100" rows="5"><?php echo $res_consulta['proposito']; ?></textarea>
    </p>
    <p>Justificaci&oacute;n<br />
        <textarea name="justificacion" id="justificacion" cols="100" rows="5"><?php echo $res_consulta['justificacion']; ?></textarea>
    </p>
    <p>Clasificaci&oacute;n
        <select name="clasificacion" id="clasificacion">
        	<option value="<?php echo $res_consulta['id_clasificacion']; ?>"><?php echo $res_consulta['clasificacion']; ?></option>
            <?php
			$consulta_n_clasificacion = mysql_query("SELECT * FROM clasificacion", $siplan_data_conn) or die(mysql_error());
			$num = mysql_num_rows($consulta_n_clasificacion);
			echo "<option value='0'>-seleccione-</option>";
			$i = 1;
			while ($res_n_clasificacion = mysql_fetch_array($consulta_n_clasificacion)) {
				$nclas = html_entity_decode($res_n_clasificacion['clasificacion']);
				echo "<option value=\"" . $i . "\"> " . $nclas . "</option>";
				$i++;
			}
			mysql_free_result($consulta_n_clasificacion);
            ?>
        </select>
        Grado
        <select name="grado" id="grado">
        	<option value="<?php echo $res_consulta['id_grado']; ?>"><?php echo $res_consulta['grado']; ?></option>
            <?php
			$consulta_n_grado = mysql_query("SELECT * FROM grado ", $siplan_data_conn) or die(mysql_error());
			$num = mysql_num_rows($consulta_n_grado);
			echo "<option value='0'>-seleccione-</option>";
			$i = 1;
			while ($res_n_grado = mysql_fetch_array($consulta_n_grado)) {
				echo "<option value=\"" . $i . "\"> " . html_entity_decode($res_n_grado['grado']) . "</option>";
				$i++;
			}
			mysql_free_result($consulta_n_grado);
            ?>
        </select>
        Grupo Vulnerable
        <select name="gvulnerable" id="gvulnerable">
        	<option value="<?php echo $res_consulta['id_gvulnerable']; ?>"><?php echo $res_consulta['vulnerable']; ?></option>
            <?php
			$consulta_n_vulnera = mysql_query("SELECT * FROM grupo_vulnerable", $siplan_data_conn) or die(mysql_error());
			$num = mysql_num_rows($consulta_n_vulnera);
			echo "<option value='0'>-seleccione-</option>";
			$i = 1;
			while ($res_n_vulnera = mysql_fetch_array($consulta_n_vulnera)) {
				echo "<option value=\"" . $i . "\"> " . html_entity_decode($res_n_vulnera['descripcion']) . "</option>";
				$i++;
			}
			mysql_free_result($consulta_n_vulnera);
            ?>
        </select>
    </p>
    <p>Beneficiarios Hombres
        <input name="ben_h" type="text" id="ben_h" value="<?php echo $res_consulta['ben_h']; ?>" />
        Beneficiarios Mujeres
        <input name="ben_m" type="text" id="ben_m" value="<?php echo $res_consulta['ben_m']; ?>" />
    </p>
    <p>
        Unidad de Medida
        <input name="u_medida" type="text" id="u_medida" value="<?php echo $res_consulta['unidad_medida']; ?>" />
        Programado Anual
        <input name="cantidad" type="text" id="cantidad" value="<?php echo $res_consulta['cantidad']; ?>" />
         Prog. Semestral
        <input name="p_semestral" type="text" id="p_semestral" value="<?php echo $res_consulta['prog_sem']; ?>" />
    </p>
    <p>Finalidad
        <select name="finalidad" id="finalidad" onchange="agregafuncion(this.value)">
          <option value="<?php echo $res_consulta['id_finalidad']; ?>"><?php echo $res_consulta['finalidad']; ?></option>
            <?php
			$consulta_n_finalidad = mysql_query("SELECT * FROM finalidad ", $siplan_data_conn) or die(mysql_error());
			echo "<option value='0'>-seleccione-</option>";
			$i = 1;
			while ($res_n_finalidad = mysql_fetch_array($consulta_n_finalidad)) {
				echo "<option value=\"" . $i . "\"> " . html_entity_decode($res_n_finalidad['nombre']) . "</option>";
				$i++;
			}
            ?>
        </select>
        <input type="hidden" name="id_finalidad" id="id_finalidad"  />
        <input type="hidden" name="id_proyecto" id="id_proyecto" value="<?php echo $_GET['id_proyecto']; ?>"  />
    </p>
    <p>
        Funci&oacute;n
        <select name="funcion" id="funcion" onchange="agregasubfuncion(this.value)">
            <option value="<?php echo $res_consulta['id_funcion']; ?>"><?php echo $res_consulta['funcion']; ?></option>
        </select>
    </p>
    <p>Subfunci&oacute;n

        <select name="subfuncion" id="subfuncion">
           <option value="<?php echo $res_consulta['id_subfuncion']; ?>"><?php echo $res_consulta['subfuncion']; ?></option>
        </select>
    </p>
    <p>Observaciones<br />
        <label for="observaciones"></label>
        <textarea name="observaciones" id="observaciones" cols="100" rows="5"><?php echo $res_consulta['observaciones']; ?></textarea>
    </p>
</form>
<br>
<ul class="nav nav-pills">
  
  <li><a href="javascript:valida()"><span class="glyphicon glyphicon-floppy-saved"></span>&nbsp;Guardar</a></li>
  <li><a href="main.php?token=eccbc87e4b5ce2fe28308fd9f2a7baf3"><span class="glyphicon glyphicon-floppy-remove"></span>&nbsp;Cancelar</a></li>
  
</ul> 
   

<p>&nbsp;</p>
<p>

  
  
  </div></div> 
 <p>&nbsp;</p>
</div>
</div>

</div></div>
