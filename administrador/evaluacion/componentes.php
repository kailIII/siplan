<?php

/**
    @author UPLA
    @since 2014
    @version 2014
    @copyright Gobierno del Estado de Zacatecas
**/

    extract($_GET);
    extract($_POST);

    if (!isset( $_GET['idproyecto'])){
      print "
      <script type='text/javascript'>
        location.href= 'main.php?token=43ec517d68b6edd3015b3edc9a11367b';
      </script>";
    }

    $consulta_proyectos = 'SELECT * FROM proyectos WHERE id_dependencia = '. $_SESSION['id_dependencia_v3'] .' AND id_proyecto = '. $idproyecto;
    $resultado_proyecto = mysql_query($consulta_proyectos,$siplan_data_conn) or die (mysql_error());
    $res_proyecto = mysql_fetch_assoc($resultado_proyecto);

    print "
    <div style='margin-left:20px; margin-right:20px;'>
    <h2>Componentes</h2>
    <div id='cuadro_info'><div style='margin-bottom: 30px;'>
    <div id='container' class='ex_highlight_row'>
      <ul id='botones'>
        <li>
          <a href='main.php?token=". md5(E0) ."'>
            <img src='imagenes/regresar24x24.png' width='24' height='24' align='middle'>&nbsp;Regresar a Proyectos
          </a>
        </li>
      </ul>
    <hr />
    <p>Dependencia:<b> ". $_SESSION['nombre_dependencia_v3'] ."</b><br />
       Proyecto: <b> ". $res_proyecto['no_proyecto'] ." - ". $res_proyecto['nombre'] ."</b><br />";

    $consulta_componentes = '
        SELECT * FROM componentes
        JOIN u_medida_prog01 on (componentes.unidad_medida = u_medida_prog01.id_unidad) WHERE id_proyecto = ' . $_GET['idproyecto'] .' ORDER BY no_componente ASC';
    $res_componentes = mysql_query($consulta_componentes,$siplan_data_conn) or die (mysql_error());

    print "
    N&uacute;mero de Componentes Registrados:&nbsp;<b>" . mysql_num_rows($res_componentes) ."</b></p>
    <hr />

    <script type='text/javascript'>
        function acciones(x,y){
            document.getElementById('idcomponente').value = x;
   	        document.getElementById('ncomp').value = y;
    	    document.accionesform.submit();
        }
    </script>

    <div id='container' class='ex_highlight_row'>
    <div id='demo'>
    <table width='99%' cellpadding='0' cellspacing='0' border='0' class='display' id='example'>
     <thead>
       <tr>
    	<td width='5%'  align='center'><b>No.</b></td>
        <td width='49%' align='center'><b>Descripci&oacute;n</b></td>
        <td width='20%' align='center'><b>Unidad de Medida</b></td>
        <td width='8%'  align='center'><b>Cantidad</b></td>
        <td width='9%'  align='center'><b>Ponderaci&oacute;n</b></td>
        <td width='9%'  align='center'><b>Actividades</b></td>
       </tr>
     </thead>
     <tbody>";

     $ponderado = 0;
	 while ($resCom = mysql_fetch_assoc($res_componentes)) {

         $consulta_acciones = mysql_query('SELECT * FROM acciones WHERE ID_COMPONENTE = '. $resCom['id_componente'], $siplan_data_conn) or die (mysql_error());
	     $resultado_acciones = mysql_num_rows($consulta_acciones);

       print "
       <tr class='gradeA'>
         <td align='center'>". $resCom['no_componente'] ."</td>
         <td align='left'>".   $resCom['descripcion'] ."</td>
         <td align='center'>". $resCom['nombre'] ."</td>
         <td align='center'>". $resCom['cantidad'] ."</td>
         <td align='center'>". $resCom['ponderacion'] ."%</td>
         <td align='center'>"; ?>
            <a href='javascript:acciones("<?php echo $resCom['id_componente'];?>","<?php echo $resCom['descripcion']; ?>")'>
<?php         print "
              <img src='imagenes/options_2.png' width='24' height='24' />
            </a>
         </td>";
     }

     print "
     </tbody>
     <tfoot>
       <tr>
     	 <td width='5%'  align='center'><b>No.</b></td>
         <td width='49%' align='center'><b>Descripci&oacute;n</b></td>
         <td width='20%' align='center'><b>Unidad de Medida</b></td>
         <td width='8%'  align='center'><b>Cantidad</b></td>
         <td width='9%'  align='center'><b>Ponderaci&oacute;n</b></td>
         <td width='9%'  align='center'><b>Actividades</b></td>
       </tr>
     </tfoot>
    </table>

    <form id='accionesform' name='accionesform' method='post' action='main.php?token=". md5(E3) ."'>
      <input type='hidden' name='idcomponente' id='idcomponente' />
      <input type='hidden' name='ncomp' id='ncomp' />
      <input type='hidden' name='id_proyecto' id='id_proyecto' value='". $idproyecto ."' />
      <input type='hidden' name='n_proyecto'  id='n_propyecto' value='". $nombre_proyecto ."' />
    </form>

    </div>
    </div>
    </div>
    </div>
    </div>
    </div>";
?>
