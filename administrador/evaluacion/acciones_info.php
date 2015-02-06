<?php

/**
    @author UPLA
    @since 2014
    @version 2014
    @copyright Gobierno del Estado de Zacatecas
**/

    extract($_GET);
    extract($_POST);

    $meses = array(
    1 =>'Enero', 2 =>'Febrero', 3 =>'Marzo', 4 =>'Abril', 5 =>'Mayo', 6 =>'Junio',
    7 =>'Julio', 8 =>'Agosto', 9 =>'Septiembre', 10 =>'Octubre', 11 =>'Noviembre', 12 =>'Diciembre');

    $metas = array(
    1 =>'enero_m', 2 =>'febrero_m', 3 =>'marzo_m', 4 =>'abril_m', 5 =>'mayo_m', 6 =>'junio_m',
    7 =>'julio_m', 8 =>'agosto_m', 9 =>'septiembre_m', 10 =>'octubre_m', 11 =>'noviembre_m', 12 =>'diciembre_m');

    $resultados = array(
    1 =>'enero_r', 2 =>'febrero_r', 3 =>'marzo_r', 4 =>'abril_r', 5 =>'mayo_r', 6 =>'junio_r',
    7 =>'julio_r', 8 =>'agosto_r', 9 =>'septiembre_r', 10 =>'octubre_r', 11 =>'noviembre_r', 12 =>'diciembre_r');

    require('../../seguridad/siplan_connection_db.php');

    $id_accion = $_GET['accion'];

    $consulta_metas = 'SELECT * FROM metas WHERE ID_ACCION = ' . $id_accion;
    $ejecuta_consulta = mysql_query($consulta_metas, $siplan_data_conn) or die (mysql_error());
    $resultado = mysql_fetch_array($ejecuta_consulta);

    $consulta_accion = mysql_query('SELECT * FROM acciones WHERE ID_ACCION = ' . $id_accion, $siplan_data_conn)or die(mysql_error());
    $resultado_accion = mysql_fetch_array($consulta_accion);

    $consulta_resultados = mysql_query('SELECT * FROM resultados WHERE ID_ACCION = ' . $id_accion, $siplan_data_conn)or die(mysql_error());
    $res_resultados = mysql_fetch_array($consulta_resultados);

    print "
    <!doctype html>
    <html>
    <head>
    <meta http-equiv='content-type' content='text/html; charset=utf-8' />
    <title>.::: siplan :::.</title>
    <link rel='shortcut icon' href='../../imagenes/favicon.ico'/>
      <style type='text/css'>
        body {
          font-family:Arial, Helvetica, sans-serif;
          font-size:14px;
          color:#333;
  		}
   	  </style>";

   print "
    <table width='100%' border='1' cellpadding='3' cellspacing='0' class='display' id='example'>
      <tr>
        <th colspan='3' align='left' border='1'><p><b>Actividad<br />".
        $resultado_accion['descripcion']."</b>
        </th>
      </tr>
      <tr>
        <td aling='center' width='10%' bgcolor='#F7F7F7'><b>Mes</b></td>
        <td align='center' width='40%' bgcolor='#F7F7F7'><b>Meta</b></td>
        <td align='center' width='40%' bgcolor='#F7F7F7'><b>Resultado</b></td>
      </tr>";

      for ($i = 1; $i <= 12; $i++){

        if($i % 2)
          $color = "bgcolor='#DFFFBF'";
        else
          $color = "bgcolor='#F5F5F5'";

      print "
      <tr $color>
        <td><b>". $meses[$i]. "</td>
        <td align='center'>&nbsp;". $resultado[$metas[$i]] ."</td>
        <td align='center'>&nbsp;". $res_resultados[$resultados[$i]] ."</td>
      </tr>";

    }
        exit;
      print "
      <tr bgcolor='#99CC66'>
        <td><b>Enero</td>
        <td align='center'>&nbsp;". $resultado['enero_m'] ."</td>
        <td align='center'>&nbsp;". $res_resultados['enero_r'] ."</td>
      </tr>
      <tr bgcolor='#DFFFBF'>
        <td><b>Febrero</td>
        <td align='center'>&nbsp;". $resultado['febrero_m'] ."</td>
        <td align='center'>&nbsp;". $res_resultados['febrero_r'] ."</td>
      </tr>
      <tr bgcolor='#99CC66'>
        <td><b>Marzo</td>
        <td align='center'>&nbsp;". $resultado['marzo_m'] ."</td>
        <td align='center'>&nbsp;". $res_resultados['marzo_r'] ."</td>
      </tr>
      <tr bgcolor='#DFFFBF'>
        <td><b>Abril</td>
        <td align='center'>&nbsp;". $resultado['abril_m'] ."</td>
        <td align='center'>&nbsp;". $res_resultados['abril_r'] ."</td>
      </tr>
      <tr bgcolor='#99CC66'>
        <td><b>Mayo</td>
        <td align='center'>&nbsp;". $resultado['mayo_m'] ."</td>
        <td align='center'>&nbsp;". $res_resultados['mayo_r'] ."</td>
      </tr>
      <tr bgcolor='#DFFFBF'>
        <td><b>Junio</td>
        <td align='center'>&nbsp;". $resultado['junio_m'] ."</td>
        <td align='center'>&nbsp;". $res_resultados['junio_r'] ."</td>
      </tr>
      <tr bgcolor='#99CC66'>
        <td><b>Julio</td>
        <td align='center'>&nbsp;". $resultado['julio_m'] ."</td>
        <td align='center'>&nbsp;". $res_resultados['julio_r'] ."</td>
      </tr>
      <tr bgcolor='#DFFFBF'>
        <td><b>Agosto</td>
        <td align='center'>&nbsp;". $resultado['agosto_m'] ."</td>
        <td align='center'>&nbsp;". $res_resultados['agosto_r'] ."</td>
      </tr>
      <tr bgcolor='#99CC66'>
        <td><b>Septiembre</td>
        <td align='center'>&nbsp;". $resultado['septiembre_m'] ."</td>
        <td align='center'>&nbsp;". $res_resultados['septiembre_r'] ."</td>
      </tr>
      <tr bgcolor='#DFFFBF'>
        <td><b>Octubre</td>
        <td align='center'>&nbsp;". $resultado['octubre_m'] ."</td>
        <td align='center'>&nbsp;". $res_resultados['octubre_r'] ."</td>
      </tr>
      <tr bgcolor='#99CC66'>
        <td><b>Noviembre</td>
        <td align='center'>&nbsp;". $resultado['noviembre_m'] ."</td>
        <td align='center'>&nbsp;". $res_resultados['noviembre_r'] ."</td>
      </tr>
      <tr bgcolor='#DFFFBF'>
        <td><b>Diciembre</td>
        <td align='center'>&nbsp;". $resultado['diciembre_m'] ."</td>
        <td align='center'>&nbsp;". $res_resultados['diciembre_r'] ."</td>
      </tr>
    </table>
    <p>&nbsp;</p>";
?>
