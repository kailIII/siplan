<?php

/**
    @author UPLA
    @since 2014
    @version 2014
    @copyright Gobierno del Estado de Zacatecas
**/

    extract($_GET);
    extract($_POST);

    $consulta_proyectos = '
        SELECT
            p.id_proyecto, p.no_proyecto, p.nombre, e.eje, l.nombre as linea, es.nombre as estrategia,
            p.ponderacion, p.beneficiarios_h, p.beneficiarios_m, d.nombre as dependencia

        FROM
            proyectos p left join eje e on p.id_eje = e.id_eje
                        left join linea l on p.id_linea = l.id_linea
                        left join estrategias es on p.id_estrategia = es.id_estrategia
                        left join dependencias d on p.id_dependencia = d.id_dependencia

        WHERE p.id_dependencia = '. $_SESSION['id_dependencia_v3'].'

        ORDER BY p.no_proyecto ASC';

    $res_proyectos = mysql_query($consulta_proyectos, $siplan_data_conn) or die (mysql_error());

    print "
    <div style='margin-left:20px; margin-right:20px; margin-bottom: 20px;'>
    <h2>Listado de Proyectos Registrados</h2>
    <div id='cuadro_info'> <div style='margin-bottom: 30px;'>
    <div id='container' class='ex_highlight_row'>
    <p>Dependencia:<b> " . $_SESSION['nombre_dependencia_v3'] ."</b><br>
       N&uacute;mero de Proyectos Registrados:&nbsp;<b> ". mysql_num_rows($res_proyectos) ."</b>
    </p><hr />
    <div id='container' class='ex_highlight_row'>
    <div id='demo'>
      <table width='100%' cellpadding='0' cellspacing='0' border='0' class='display' id='example'>
        <thead>
          <tr>
            <td width='2%'  align='center'><b>Num </b></td>
            <td width='38%' align='center'><b>Nombre</b></td>
            <td width='5%'  align='center'><b>Eje</b></td>
            <td width='5%'  align='center'><b>L&iacute;nea</b></td>
            <td width='5%'  align='center'><b>Estrat&eacute;gia</b></td>
            <td width='5%'  align='center'><b>%</b></td>
            <td width='10%' align='center'><b>Ben. H</b></td>
            <td width='10%' align='center'><b>Ben. M</b></td>
            <td width='10%' align='center'><b>Componentes</b></td>
            <td width='10%' align='center'><b>Evaluar</b></td>
          </tr>
        </thead>
        <tbody>";

    while ($resReq = mysql_fetch_assoc($res_proyectos)) {

        $res = ($counter % 2);
        $counter = $counter + 1;

        $eje = substr($resReq['eje'], 0, 1);
        $linea = substr($resReq['linea'], 2, 1);
        $estrategia = substr($resReq['estrategia'], 4, 1);

          print "
          <tr class='gradeA'>
            <td align='center'>". $resReq['no_proyecto'] ."</td>
            <td align='left'>".   $resReq['nombre'] ."</td>
            <td align='center'>". $eje ."</td>
            <td align='center'>". $linea ."</td>
            <td align='center'>". $estrategia ."</td>
            <td align='center'>". $resReq['ponderacion'] ."</td>
            <td align='center'>". $resReq['beneficiarios_h'] ."</td>
            <td align='center'>". $resReq['beneficiarios_m'] ."</td>
            <td align='center'>
                <a href='main.php?token=". md5(E2)."&idproyecto=". $resReq['id_proyecto']."&nombre_proyecto=". $resReq['nombre'] ."'>
    	       <img src='./imagenes/options_2.png' width='24' height='24' alt='Ver Componentes'></a>
            </td>
            <td align='center'>
                <a href='main.php?token=". md5(E1). "&idproyecto=". $resReq['id_proyecto'] ."'>
                <img src='./imagenes/evaluar.jpg' width='28' height='24' alt='Evaluar'></a>
            </td>
          </tr>";

    }
        print "
        </tbody>
        <tfoot>
	      <tr>
            <td width='2%'  align='center'><b>Num </b></td>
            <td width='38%' align='center'><b>Nombre</b></td>
            <td width='5%'  align='center'><b>Eje</b></td>
            <td width='5%'  align='center'><b>L&iacute;nea</b></td>
            <td width='5%'  align='center'><b>Estrat&eacute;gia</b></td>
            <td width='5%'  align='center'><b>%</b></td>
            <td width='10%' align='center'><b>Ben. H</b></td>
            <td width='10%' align='center'><b>Ben. M</b></td>
            <td width='10%' align='center'><b>Componentes</b></td>
            <td width='10%' align='center'><b>Evaluar</b></td>
          </tr>
        </tfoot>
      </table>
	</div>
    </div>
    </div>
    </div>
    </div>";
?>
