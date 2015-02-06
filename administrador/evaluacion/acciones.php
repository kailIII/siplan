<?php

/**
    @author UPLA
    @since 2014
    @version 2014
    @copyright Gobierno del Estado de Zacatecas
**/

    extract($_GET);
    extract($_POST);

    if (!isset( $_POST['idcomponente'])){
      print "
      <script type='text/javascript'>
        location.href= 'main.php';
      </script>";
    }

    $liga = 'main.php?token=b73ce398c39f506af761d2277d853a92&numproyecto='.$_POST['id_proyecto'].'&nombre_proyecto='.$_POST['n_proyecto'];

    print "
    <script type='text/javascript'>
      function resultados(a){
        var miurl = 'administrador/evaluacion/acciones_info.php?accion='+a;
        window.open(miurl,'_blank','width=500,height=460,menubar=no,titlebar=no,resizable=no')
   	  }
    </script>";

    print "
    <div style='margin-left:20px; margin-right:20px;'>
    <h2>Actividades</h2>
    <div id='cuadro_info'><div style='margin-bottom: 20px;'>
    <div id='container' class='ex_highlight_row'>
      <ul id='botones'>
        <li>
          <a href='main.php?token=". md5(E2) ."&idproyecto=". $id_proyecto ."'>
            <img src='imagenes/regresar24x24.png' width='24' height='24' align='middle'>&nbsp;Regresar a Componentes
          </a>
        </li>
      </ul>
    <hr />

    <div id='container' class='ex_highlight_row'>
    <p>Dependencia:<b> ". $_SESSION['nombre_dependencia_v3'] ."</b><br />
       Componente: <b> ". $idcomponente ." - ". $ncomp ."</b><br />";

    $consulta_acciones = '
        SELECT *
        FROM acciones JOIN u_medida_prog01 on (acciones.unidad_medida = u_medida_prog01.id_unidad) WHERE id_componente = '. $idcomponente .' ORDER BY no_accion ASC';
    $res_acciones = mysql_query($consulta_acciones, $siplan_data_conn) or die (mysql_error());

    print "
    N&uacute;mero de Actividades Registradas:&nbsp;<b> ". mysql_num_rows($res_acciones) ."</b>";

    print "
    <script type='text/javascript'>
      function acciones(x){
        document.getElementById('idcomponente').value = x;
        document.accionesform.submit();
      }
    </script>";

    print "
    <hr />
    <div id='container' class='ex_highlight_row'>
    <div id='demo'>
    <table width='99%' cellpadding='0' cellspacing='0' border='0' class='display' id='example'>
      <thead>
        <tr>
    	  <td width='4%'   align='center'><b>No.</b></td>
          <td width='53%'  align='center'><b>Descripci&oacute;n</b></td>
          <td width='16%'  align='center'><b>Unidad de Medida</b></td>
          <td width='9%'   align='center'><b>Cantidad</b></td>
          <td width='9%'   align='center'><b>Ponderaci&oacuten</b></td>
          <td width='9%'   align='center'><b>Resultados</b></td>
        </tr>
      </thead>
      <tbody>";

    while ($resAcc = mysql_fetch_assoc($res_acciones)) {

        print "
        <tr class='gradeA'>
          <td>". $resAcc['no_accion'] ."</td>
          <td>". $resAcc['descripcion'] ."</td>
          <td align='center'>".$resAcc['nombre'] ."</td>
          <td align='center'>". $resAcc['cantidad'] ."</td>
          <td align='center'>". $resAcc['ponderacion'] ."%</td>
          <td align='center'>"; ?>
            <a href='javascript:resultados(<?php echo $resAcc['id_accion'];?>)'>
<?php         print "
              <img src='imagenes/options_2.png' width='23' height='24' />
            </a>
          </td>
        </tr>";

    }
      print "
      </tbody>
      <tfoot>
		<tr>
          <td width='4%'  align='center'><b>No.</b></td>
          <td width='53%' align='center'><b>Descripci&oacute;n</b></td>
          <td width='16%' align='center'><b>Unidad de Medida</b></td>
          <td width='9%'  align='center'><b>Cantidad</b></td>
          <td width='9%'  align='center'><b>Ponderaci&oacuten</b></td>
          <td width='9%'  align='center'><b>Resultados</b></td>
        </tr>
      </tfoot>
    </table>";
