<?php

/**
    @author UPLA
    @since 2014
    @version 2014
    @copyright Gobierno del Estado de Zacatecas
**/

    extract($_GET);
    extract($_POST);

    $seleccion = $select; //print "seleccion:" . $seleccion;
	if ($seleccion == null){
	   if(date('m')== 4)  $seleccion = 1;
	   if(date('m')== 7)  $seleccion = 2;
	   if(date('m')== 10) $seleccion = 3;
	   if(date('m')== 1)  $seleccion = 4;
	}

	?>

    <body>
    <div style='margin-left:20px; margin-right:20px;'>
      <h2>Evaluar</h2>
        <div id='cuadro_info'> <div style='margin-bottom: 20px;'>
        <div id='container' class='ex_highlight_row'>
          <ul id='botones'>
            <li>
             <a href='main.php?token=<?php print(md5(E0)); ?>'>
                <img src='imagenes/regresar24x24.png' width='24' height='24' align='middle'>&nbsp;Regresar
             </a>
            </li>
            <li>
            <form id='form1' name='form1' method='post' action='main.php?token=<?php echo md5(E1).'&idproyecto='.$idproyecto; ?>'>
      	    <div align='center'><b>Trimestre:
              <select name='select' id = 'select' >
                <option value='1' <?php if($seleccion == 1) echo "selected"; ?>>Ene - Mar</option>
                <option value='2' <?php if($seleccion == 2) echo "selected"; ?>>Abr - Jun</option>
                <option value='3' <?php if($seleccion == 3) echo "selected"; ?>>Jul - Sep</option>
                <option value='4' <?php if($seleccion == 4) echo "selected"; ?>>Oct - Dic</option>
              </select>
            <input type='submit' name='Submit' value='Ver' />
            </div>
            </form>
            </li>
          </ul>
    <hr />

    <?php

    if ($seleccion == 4)  {
		$trimestre = 4;
		$periodo = 'Cuarto';
		$anual = DATE('o');
	} else if ($seleccion == 1)  {
		$trimestre = 1;
		$periodo = 'Primer';
		$anual = DATE('o');
	} else if ($seleccion == 2)  {
		$trimestre = 2;
		$periodo = "Segundo";
		$anual = DATE('o');
	} else if ($seleccion == 3)  {
		$trimestre = 3;
		$periodo = 'Tercer';
		$anual = DATE('o');
	}

	$consulta_componentes = "SELECT * FROM componentes WHERE id_proyecto = " . $idproyecto;
	$ejecuta_cons_componentes = mysql_query($consulta_componentes, $siplan_data_conn) or die (mysql_error());

	//Nombre del proyecto y observación
	$consulta_nomProyecto = "SELECT nombre, no_proyecto FROM proyectos WHERE id_proyecto = " . $idproyecto;
	$ejecuta_cons_nomProyecto = mysql_query($consulta_nomProyecto, $siplan_data_conn) or die (mysql_error());
	$nombre_Proy = mysql_fetch_array($ejecuta_cons_nomProyecto);

    ?>
     <?php


     if ($trimestre){

    if ($_SESSION['id_perfil_v3'] == 1){
        print "<form name='tabla' method='post' action='administrador/evaluacion/guardar_evaluacion.php?trimestre=$seleccion'>";
    }
    if ($_SESSION['id_perfil_v3'] == 2){
        print "<form name='tabla' method='post' action='capturista/evaluacion/guardar_evaluacion.php?trimestre=$seleccion'>";
    }
    if ($_SESSION['id_perfil_v3'] == 3){
        print "<form name='tabla' method='post' action='planeacion/evaluacion/guardar_evaluacion.php?trimestre=$seleccion'>";
    }

    ?>

    <!--<form name='tabla' method='post' action='administrador/evaluacion/guardar_evaluacion.php?trimestre=<?php echo $seleccion ?>' >-->
    <input type='hidden' name='selecHidden' value='<?php $seleccion?>'/>

    <table bgcolor='#A2CD5A' align = 'center' width='1044' height='183' border='1'>


      <tr>
       <td  align ="center" width='480' height='26' scope='col'><div align='center'><b>Nombre del Proyecto</b></div></td>
       <td  align ='center' width='500' scope='col'><div align='center'><b>Observaci&oacute;n del Proyecto <?php echo $periodo; ?> Trimestre </b></div></td>
      </tr>


      <tr>
        <td height='61'  align = 'center'>
            <b><?php echo $nombre_Proy['no_proyecto']. " - " .$nombre_Proy['nombre']; ?></b>
        </td>
        <td  align = 'center'>
          <?php /*id='Proyecto1'*/

          $consulta_Observacion_Acc = "SELECT  observacion FROM observaciones WHERE id_proyecto = " . $idproyecto;

          $consulta_Observacion = "SELECT  id_observacion, observacion FROM observaciones WHERE id_proyecto = " . $idproyecto .
                            " AND trimestre = " . $trimestre . " AND anual = " . $anual . "
                              AND id_accion = 0";
          $ejecuta_cons_Observaciones = mysql_query($consulta_Observacion, $siplan_data_conn) or die (mysql_error());
          $observacion = mysql_fetch_array($ejecuta_cons_Observaciones);
	      mysql_free_result($ejecuta_cons_Observaciones);

          echo "<textarea style='width:300px; height:130px;' id='ObsProyecto' name='ObsProyecto'>" . $observacion['observacion']."</textarea>";

          if ($observacion['id_observacion'])
             echo "<input type='hidden' name='idObsProyecto' value=" . $observacion['id_observacion'] ?>";
        </td>
      </tr>
      <tr><td colspan="2">&nbsp;</td></tr>
    </table>
     <?php

    ?>
    <input type='hidden' name='ID_PROYECTO' value='<?php echo $idproyecto;?>'/>

    <table bgcolor='#F0F0F0' align = 'center' width='1044' height='92' border='1'>
      <tr>
        <th  width='150' scope='col'>Componentes</th>
        <th colspan='2' scope='col'>Actividades</th>
        <th colspan='3' scope='col'>Meses</th>
        <th colspan='9' scope='col'>Observaciones</th>
      </tr>
      <tr>
        <td align = 'center' scope='row'><div align='center'><b>Descripci&oacute;n</b></div></td>
        <td align = 'center' colspan='2'><div align='center'><b>Descripci&oacute;n</b></div></td>

    	<?php
    	static $enum = array(
        1 =>'Enero', 2 =>'Febrero', 3 =>'Marzo', 4 =>'Abril', 5 =>'Mayo', 6 =>'Junio',
        7 =>'Julio', 8 =>'Agosto',  9 =>'Septiembre', 10 =>'Octubre', 11 =>'Noviembre', 12 =>'Diciembre'
        );

        static $enumResul = array(
        1 =>'enero_r', 2 =>'febrero_r', 3 =>'marzo_r', 4 =>'abril_r', 5 =>'mayo_r', 6 =>'junio_r',
        7 =>'julio_r', 8 =>'agosto_r',  9 =>'septiembre_r', 10 =>'octubre_r', 11 =>'noviembre_r', 12 =>'diciembre_r'
        );

        static $enumTri = array(
         1 =>'Primer Trimestre',  2 =>'Segundo Trimestre',
         3 =>'Tercer Trimestre',  4 =>'Cuarto Trimestre'
        );

        /*static $enumTri = array(
         4 =>'Observaci&oacute;n Primer Trimestre',  7 =>'Observaci&oacute;n Segundo Trimestre',
        10 =>'Observaci&oacute;nN Tercer Trimestre', 13 =>'Observaci&oacute;n Cuarto Trimestre'
        );*/

    	$meses = 0;

    	if ($trimestre == 4) $meses = 10;
    	if ($trimestre == 1) $meses = 1;
    	if ($trimestre == 2) $meses = 4;
    	if ($trimestre == 3) $meses = 7;

    	for ($ii = $meses; $ii <= $meses + 2; $ii++){
    	  echo "<td width='10' ><div align='center'>". $enum[$ii] ."</div></td>";

    	} //echo" <td width='10' ><div align='center'>". $enumTri[$meses+3]."</div></td>";

        echo" <td width='10' ><div align='center'><b>". $enumTri[$trimestre]."</div></td>";
	   ?>
      </tr>

       <?php

            $x=0;
            while($cons_componentes = mysql_fetch_array($ejecuta_cons_componentes)){
       ?>

      <tr>

      <?php
            $consulta_acciones = 'SELECT res.id_resultado, acc.id_accion , acc.descripcion, acc.no_accion, ';
        	switch($trimestre){
        		case 4:
        			$consulta_acciones = $consulta_acciones.'
        			met.octubre_m, met.noviembre_m, met.diciembre_m,
        			res.octubre_r, res.noviembre_r, res.diciembre_r';
        			break;
        		case 3:
        			$consulta_acciones = $consulta_acciones.'
        			met.julio_m, met.agosto_m, met.septiembre_m,
        			res.julio_r, res.agosto_r, res.septiembre_r';
        			break;
        		case 2:
        			$consulta_acciones = $consulta_acciones.'
        			met.abril_m, met.mayo_m, met.junio_m,
        			res.abril_r, res.mayo_r, res.junio_r';
        			break;
        		case 1:
        			$consulta_acciones = $consulta_acciones.'
        			met.enero_m, met.febrero_m, met.marzo_m,
        			res.enero_r, res.febrero_r, res.marzo_r';
        			break;
        	}

     	    $consulta_acciones = $consulta_acciones."
                FROM acciones acc
			         LEFT JOIN resultados res ON res.id_accion = acc.id_accion
			         LEFT JOIN metas AS met   ON met.id_accion = acc.id_accion
                WHERE id_componente =". $cons_componentes['id_componente'];

	        $ejecuta_cons_acciones = mysql_query($consulta_acciones,$siplan_data_conn) or die (mysql_error());
	        $rows_cons_acciones= mysql_num_rows($ejecuta_cons_acciones);
      ?>
    <th bgcolor="#BCEE68" rowspan='<?php echo $rows_cons_acciones*2; ?>' scope='row' ><b>
       <?php echo $cons_componentes['no_componente'] . " - " . $cons_componentes['descripcion'];?>
    </th>
    <?php
    $y=0;

    while($cons_acciones = mysql_fetch_array($ejecuta_cons_acciones)){ ?>
    <td bgcolor='#CAFF70' align ='center' width='62' rowspan='2'>
    	<input type='hidden' name='<?php echo 'id_accion_'.$x.'-'.$y;?>' value='<?php echo $cons_acciones[0];?>'/>
        <input type='hidden' name='<?php echo $cons_acciones[0] ?>' value=='<?php echo $cons_acciones[0] . '-' .$cons_componentes['id_componente'] . '-' .$cons_componentes['id_proyecto'];?>'>
      <?php echo $cons_acciones['no_accion'] . " - " . $cons_acciones[2];?>

    </td>
    <td align = 'center' width='56' rowspan='2'><div align='right'>
      <table  align = 'center' width='50' border='1'>
        <tr>
          <td height='50' scope='row'><div align='right'><b>Programadas</b></div></td>
        </tr>
        <tr>
          <td align = 'center' height='50' scope='row'><b>Realizadas</b></td>
        </tr>
      </table>
    </div></td>

	<?php
	$consulta_observacion_acc="
            SELECT observacion
            FROM observaciones
            WHERE trimestre = " . $trimestre . " AND anual = " . $anual . " AND id_accion = ".$cons_acciones['id_accion'];

    $ejecuta_cons_observaciones_acc = mysql_query($consulta_observacion_acc,$siplan_data_conn) or die (mysql_error());
	$res_consulta_obs_acc = mysql_fetch_array($ejecuta_cons_observaciones_acc);

	//$index=2;
    $index=4;
    for($i=0; $i<3; $i++){
    	$ArrayMeses[] = $cons_acciones[$index];

		$mNom = 'textField_'.$x.'_'.$y.'_'.($i+1);
		//echo"<td  align ='center' ><input style='width:60px; height:30px;' type='text' name=".$mNom." id=".$mNom." value=".$cons_acciones[$index]." readonly /></td>";
	    echo"<td  bgcolor='#CAFF70' align ='center' >" . $cons_acciones[$index] . " </td>";
		$index++;
    }

    //$textNombre =$x.'-'.$y.'-'.$trimestre;
    $textNombre =$x.'-'.$y.'-'.$trimestre;
	echo "<td  align ='left'>
    <textarea
        id='obs[" .$cons_acciones[1] . "]'
        name='obs[" . $cons_acciones[1] . "]'>" . $res_consulta_obs_acc['observacion']."</textarea></td>";

	?>
  </tr>
  <tr>

   <?php
   		//$index =5;
        $index = 7;
        $indexA=4;
   		$con = $meses;
   		for($i=0; $i<3; $i++){
   			$mNom = $enumResul[($con)];
   			//echo $cons_acciones[$index];
			echo"
            <td height='50' align ='center'>";
            if (($cons_acciones[$indexA] == 0) && ($_SESSION["id_dependencia_v3"] != 4) ){
                 echo "
            <input style='width:60px; height:20px;' align='center'  type='text' name='valores[" . $cons_acciones[1]. "][".$mNom."]' id='valores[" . $cons_acciones[0]. "][".$mNom."]' value='$cons_acciones[$index]' readonly disabled='disabled''></td>";
            } else {
                 echo "
            <input style='width:60px; height:20px;' align='center'  type='text' name='valores[" . $cons_acciones[1]. "][".$mNom."]' id='valores[" . $cons_acciones[0]. "][".$mNom."]' value='$cons_acciones[$index]'></td>";
	    	}
   			$index++;
            $indexA++;
   			$con++;
   		}
   		//echo "<td></td>";
   ?>
  </tr>
  <?php

  			$y++;
    	}
    	$x++;
	}


?>
</table>
<p align='center'>
   <input type='hidden' name='trimestre' value='<?php echo $trimestre; ?>'>
   <input type='hidden' name='anual' value='<?php echo $anual;?>'>
   <input type='hidden' name='proyecto' value='<?php echo $ID_PROYECTO;?>'>
   <input type='submit' name='botonsito' value='Guardar' /></p>
</form>

 <?php	}	?>

