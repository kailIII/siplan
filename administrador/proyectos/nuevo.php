<script type="text/javascript">
function regresa(){
    location.href="main.php?token=e4da3b7fbbce2345d7772b0674a318d5";
}
function valida(){
<?php

$consulta_proyecto1 = mysql_query("SELECT * FROM proyectos WHERE id_dependencia = ".$_SESSION['id_dependencia_v3'],$siplan_data_conn)or die (mysql_error());
$i=0;
$porcentaje = 0;
$numproyectos[$i] = 0;
while($res_proyecto1 = mysql_fetch_array($consulta_proyecto1)){
        $numproyectos[$i] = $res_proyecto1['no_proyecto'];
        $i = $i+1;
        $porcentaje = $porcentaje + $res_proyecto1['ponderacion'];
}

$totalproyectos = count($numproyectos);
 
$ponderacionmax = 100 - $porcentaje;
?>  
     if(document.getElementById('no_proyecto').value == ""){
        alert ("falta el numero del proyecto");
        return false();
    }
    
    var proyectosid = new Array(<?php for($x=0;$x<$totalproyectos;$x=$x+1){
        echo $numproyectos[$x].",";
    }  echo "0"; ?>);
    for(x=0;x<proyectosid.length;x++){
        if(document.getElementById('no_proyecto').value == proyectosid[x]){
            alert("este n\u00famero de proyecto ya existe porfavor borre el proyecto o seleccione otro n\u00famero");
            document.getElementById('no_proyecto').value = "";
            return false();
        }
    }

    if(document.getElementById('no_proyecto').value == ""){
        alert ("falta el numero del proyecto");
        return false();
    }
    
   
   var  elemento1 = document.getElementById('no_proyecto').value;
   var  vuelta1 = elemento1.length;
   for(x=0;  x < vuelta1; x=x+1){
    	var t_val = elemento1.charAt(x);
    	if(isNaN(t_val)){
    		alert("El numero de proyecto debe ser entero"); 
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
    		alert("La Ponderacion debe ser entero"); 
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
        alert ("falta el proposito del proyecto");
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
        alert ("falta la inversion del proyecto");
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
        alert ("seleccione la linea pnd del proyecto");
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

    for($x=1;$x<6;$x=$x+1){
        $b=1;
        echo "case \"$x\":\n";
        $consulta_linea = mysql_query( " SELECT * FROM linea where id_eje = $x",$siplan_data_conn )or die(mysql_error());
        while($resultado_linea = mysql_fetch_array($consulta_linea)){
            $id_linea = $resultado_linea['id_linea'];
            $linea_desc = html_entity_decode($resultado_linea['nombre']);
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

function agregafuncion(idfinalidad){

    document.getElementById('funcion').length=0;
    document.getElementById('funcion').options[0] = new Option('-seleccione-','0');
    document.getElementById('subfuncion').length=0;
    document.getElementById('subfuncion').options[0] = new Option('-seleccione-','0');
    document.getElementById('id_finalidad').value = idfinalidad;
    switch(idfinalidad){
    <?php

    for($x=1;$x<5;$x=$x+1){
        $b=1;

        echo "case \"$x\":\n";
        $consulta_funcion = mysql_query( " SELECT * FROM funcion where id_finalidad = $x",$siplan_data_conn )or die(mysql_error());
        while($resultado_funcion = mysql_fetch_array($consulta_funcion)){
            $id_funcion = $resultado_funcion['id_funf'];
            $funcion_desc =html_entity_decode($resultado_funcion['nombre']);
            echo  "document.getElementById('funcion').options[$b]=new Option ('$funcion_desc','$id_funcion');\n";
            $b = $b + 1;
        }

        mysql_free_result($consulta_funcion);
        echo "break;\n";
    }
    ?>
    }
}

function agregasubfuncion(idfuncion){

    document.getElementById('subfuncion').length=0;
    document.getElementById('subfuncion').options[0] = new Option('-seleccione-','0');
    var idfinalidad = document.getElementById('id_finalidad').value;
    var clave_subfondo = idfinalidad+idfuncion;

    switch(clave_subfondo){
    <?php

    for($x=1;$x<5;$x=$x+1){

        for($a=1;$a<10;$a=$a+1){
            $b=1;
            $consulta_subfuncion = mysql_query( " SELECT * FROM subfuncion where id_finalidad = $x and id_funcion_f = $a",$siplan_data_conn )or die(mysql_error());
            $encontrados_subf = mysql_num_rows($consulta_subfuncion);
            if($encontrados_subf>0){
                $identificador = $x."".$a;
                echo "case \"$identificador\":\n";
                while($resultado_subfuncion = mysql_fetch_array($consulta_subfuncion)){
                    $id_subfuncion = $resultado_subfuncion['id_subfuncion'];
                    $subfuncion_desc = html_entity_decode($resultado_subfuncion['nombre']);
                    echo  "document.getElementById('subfuncion').options[$b]=new Option ('$subfuncion_desc','$id_subfuncion');\n";
                    $b = $b + 1;
                }
                mysql_free_result($consulta_subfuncion);
                echo "break;\n";
            }
        }
    }
    ?>
    }
}
</script>
<script>
	var ponderacion_max = <?php echo $ponderacionmax; ?>;
	if(ponderacion_max == 0){
		alert("no se pueden agregar proyectos, ponderacion al 100%");
		location.href = "main.php?token=eccbc87e4b5ce2fe28308fd9f2a7baf3";
	}
	
</script>
<script type="text/javascript" src="js/combos_pnd.js"></script>
<div class="wrap">
<h2><span class="glyphicon glyphicon-plus"></span>&nbsp;Agregar Proyecto</h2>
<br>

<div class="panel panel-default">
<div class="panel-heading"><span class="glyphicon glyphicon-plus"></span>&nbsp; Agregar un proyecto</div>
<div class="panel-body">

<form id="proyecto" name="proyecto" method="post" action="main.php?token=<?php echo md5(5);?>">
    <p>Num. Proyecto
        <input name="no_proyecto" type="text" id="no_proyecto" value="" size="4" maxlength="3"   />
        Nombre
        <input name="nombre" type="text" id="nombre" value="" size="100" />
    </p>
    <p>Inversi&oacute;n Aproximada
        <input name="inversion" type="text" id="inversion" value="" />
     </p>
     <?php  if($_SESSION['ejercicio_v3'] == "2015" ) { ?>    
<p>Programa Presuopuestario 
	<SELECT name='prog_pres' id='prog_pres'>
        <option>-Seleccione-</option>
	<?php   
	   
		
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
        <input name="u_responsable" type="text" id="u_responsable" value="" size="100" />
    </p>
     <p>Nombre del Titular
        <input name="titular" type="text" id="titular" value="" size="100" />
    </p>
    <hr>
    <b>Alineaci&oacute;n Plan Estatal de Desarrollo 2010-2016</b>
    <p>Eje
    <br>
        <select name="eje" id="eje" onchange="agregalinea(this.value)">
            <?php
            echo "<option value='0'>-seleccione-</option>";
            $consulta_n_eje = mysql_query("SELECT * FROM eje" ,$siplan_data_conn) or die (mysql_error());
            $i=1;
            while($res_n_eje1 = mysql_fetch_array($consulta_n_eje)){
                echo "<option value=\"". $i ."\"> ".$res_n_eje1['eje']."</option>";
                $i++;
            }
            ?>
        </select>
        <br />
        L&iacute;nea
<br>
        <select name="linea" id="linea" onchange="agregaestrategia(this.value)">
            <?php
            echo "<option value='0'>-seleccione-</option>";           
            ?>
        </select>
        <br />
        Estrategia
<br>
        <select name="estrategia" id="estrategia">
            <?php
            echo "<option value='0'>-seleccione-</option>";
            ?>
        </select>
    </p>
    <hr>
    <b> Alineaci&oacute;n Plan Nacional de Desarrollo 2013-2018</b>

<p>Meta Nacional
<select name="pnd_eje" id="pnd_eje" onchange="llena_combo_objetivo(this.value)">
    <option value="0">-Seleccione-</option>
    <option value="1">1-M&eacute;xico en Paz</option>
    <option value="2">2-M&eacute;xico Incluyente</option>
    <option value="3">3-M&eacute;xico con Educaci&oacute;n de Calidad</option>
    <option value="4">4-M&eacute;xico Pr&oacute;spero</option>
    <option value="5">5-M&eacute;xico con Responsabilidad Global</option>
    <option value="6">6-No Aplica</option>
</select></p>

<p>Objetivo
<select name="pnd_objetivo" id="pnd_objetivo" onchange="llena_combo_estrategia_pnd(this.value)">
    <option value="0">-Seleccione-</option>
</select></p>

<p>Estrategia
<select name="pnd_estrategia" id="pnd_estrategia" onchange="llena_combo_lineas_pnd(this.value)">
    <option value="0">-Seleccione-</option>
</select></p>

<p>Linea de Acci&oacute;n
<select name="pnd_linea" id="pnd_linea">
    <option value="0">-Seleccione-</option>
</select></p>

    <hr>
    <b>Objetivo Estrat&eacute;gico </b>
    <p>Dependencia o Entidad: 
        <input type="text" size="64" value="<?php echo $_SESSION['nombre_dependencia_v3']; ?>" enabled="false"/> 
    </p>
    <p>Objetivo<br />
        <textarea name="objetivo" id="objetivo" cols="100" rows="5"></textarea>
    </p>
    <hr>
    <p>Ponderaci&oacute;n 
        <input name="ponderacion" type="text" id="ponderacion" size="5" maxlength="3"  value="" /> debe ser menor o igual a <b><?php echo $ponderacionmax; ?></b>
    </p>
    
    <p>Prop&oacute;sito<br />
        <label for="proposito"></label>
        <textarea name="proposito" id="proposito" cols="100" rows="5"></textarea>
    </p>
    <p>Justificaci&oacute;n<br />
        <textarea name="justificacion" id="justificacion" cols="100" rows="5"></textarea>
    </p>
    <p>Clasificaci&oacute;n
        <select name="clasificacion" id="clasificacion">
            <?php
            $consulta_n_clasificacion = mysql_query("SELECT * FROM clasificacion",$siplan_data_conn) or die (mysql_error());
            $num = mysql_num_rows($consulta_n_clasificacion);
            echo "<option value='0'>-seleccione-</option>";
            $i=1;
            while($res_n_clasificacion = mysql_fetch_array($consulta_n_clasificacion)){
            	$nclas = html_entity_decode($res_n_clasificacion['clasificacion']);
                echo "<option value=\"". $i ."\"> ".$nclas."</option>";
                $i++;
            }
            mysql_free_result($consulta_n_clasificiacion);
            ?>
        </select>
        Grado
        <select name="grado" id="grado">
            <?php
            $consulta_n_grado = mysql_query("SELECT * FROM grado ",$siplan_data_conn) or die (mysql_error());
            $num = mysql_num_rows($consulta_n_grado);
            echo "<option value='0'>-seleccione-</option>";
            $i=1;
            while($res_n_grado = mysql_fetch_array($consulta_n_grado)){
                echo "<option value=\"". $i ."\"> ".html_entity_decode($res_n_grado['grado'])."</option>";
                $i++;
            }
            mysql_free_result($consulta_n_grado);
            ?>
        </select>
        Grupo Vulnerable
        <select name="gvulnerable" id="gvulnerable">
            <?php
            $consulta_n_vulnera = mysql_query("SELECT * FROM grupo_vulnerable",$siplan_data_conn) or die (mysql_error());
            $num = mysql_num_rows($consulta_n_vulnera);
            echo "<option value='0'>-seleccione-</option>";
            $i=1;
            while($res_n_vulnera = mysql_fetch_array($consulta_n_vulnera)){
                echo "<option value=\"". $i ."\"> ".html_entity_decode($res_n_vulnera['descripcion'])."</option>";
                $i++;
            }
            mysql_free_result($consulta_n_vulnera);
            ?>
        </select>
    </p>
    <p>Beneficiarios Hombres
        <input name="ben_h" type="text" id="ben_h" value="" />
        Beneficiarios Mujeres
        <input name="ben_m" type="text" id="ben_m" value="" />
    </p>
    <p>
        Unidad de Medida
        <input name="u_medida" type="text" id="u_medida" value="" />
        Programado Anual
        <input name="cantidad" type="text" id="cantidad" value="" />
         Prog. Semestral
        <input name="p_semestral" type="text" id="p_semestral" value="" />
    </p>
    <p>Finalidad
        <select name="finalidad" id="finalidad" onchange="agregafuncion(this.value)">
            <?php
            $consulta_n_finalidad = mysql_query("SELECT * FROM finalidad ",$siplan_data_conn) or die (mysql_error());
            echo "<option value='0'>-seleccione-</option>";
            $i=1;
            while($res_n_finalidad = mysql_fetch_array($consulta_n_finalidad)){
                echo "<option value=\"". $i ."\"> ".html_entity_decode($res_n_finalidad['nombre'])."</option>";
                $i++;
            }
            ?>
        </select>
        <input type="hidden" name="id_finalidad" id="id_finalidad"  />
        <input type="hidden" name="id_proyecto" id="id_proyecto" value=""  />
    </p>
    <p>
        Funci&oacute;n
        <select name="funcion" id="funcion" onchange="agregasubfuncion(this.value)">
            <?php
            echo "<option value='0'>-seleccione-</option>";
            
            ?>
        </select>
    </p>
    <p>Subfunci&oacute;n

        <select name="subfuncion" id="subfuncion">
            <?php
            echo "<option value='0'>-seleccione-</option>";
           
            ?>
        </select>
    </p>
    <p>Observaciones<br />
        <label for="observaciones"></label>
        <textarea name="observaciones" id="observaciones" cols="100" rows="5"></textarea>
    </p>
</form>

<ul class="nav nav-pills">
  
  <li><a href="javascript:valida()"><span class="glyphicon glyphicon-floppy-saved"></span>&nbsp;Guardar</a></li>
  <li><a href="main.php?token=eccbc87e4b5ce2fe28308fd9f2a7baf3"><span class="glyphicon glyphicon-floppy-remove"></span>&nbsp;Cancelar</a></li>
  
</ul> 
  </div>
</div></div>
