<?php

    include_once('../../seguridad/siplan_connection_db.php');
    date_default_timezone_set('America/Mexico_City');

	extract($_POST);
    extract($_GET);

    if (!$idObsProyecto){
      $insertObservacionesProyecto = "
            INSERT INTO observaciones (id_accion, id_proyecto, observacion, trimestre, anual)
            VALUES (0, $ID_PROYECTO, '$ObsProyecto', $trimestre, $anual);";
            mysql_query($insertObservacionesProyecto, $siplan_data_conn) or die (mysql_error());
    } else {
      $updateObservacionesProyecto = "
            UPDATE observaciones
            SET observacion = '$ObsProyecto' WHERE (id_accion =  0 AND id_proyecto = $ID_PROYECTO) AND (trimestre = $trimestre AND anual = $anual)";
            mysql_query($updateObservacionesProyecto, $siplan_data_conn) or die (mysql_error());
      // }
    }

    foreach ($valores as $key => $value){
      $campos = null;

        foreach ($value as $key2 => $value2){
          if ($campos) $campos .= ", ";
            $campos .= "$key2='$value2'";
        }
         $updateResultados =  "UPDATE resultados SET $campos WHERE id_accion =  $key";
         //print "<br>";
     	 mysql_query($updateResultados, $siplan_data_conn) or die (mysql_error());
    }


    foreach ($obs as $key => $value){
      if ($value != null){

        $consultaObs = "
            SELECT observacion
            FROM observaciones
            WHERE trimestre = " . $trimestre . " AND anual = " . $anual . " AND id_accion = " . $key;
        $querObs = mysql_query($consultaObs) or die (mysql_error());
        $totalObs = mysql_fetch_object($querObs);

        if ($totalObs->total != 0){
            $insertObservaciones = "
            INSERT INTO observaciones (id_accion, id_proyecto, observacion, trimestre, anual)
            VALUES ($key, $ID_PROYECTO, '$value', $trimestre, $anual);";
            mysql_query($insertObservaciones, $siplan_data_conn) or die (mysql_error());
        } else {
            $queryObs = "SELECT * from observaciones  WHERE trimestre = " . $trimestre . " AND anual = " . $anual . " AND id_accion = " . $key;
            $queryObs2 = mysql_query($queryObs) or die (mysql_error());
            $totalObs2 = mysql_fetch_object($queryObs2);

            if ($totalObs2){
              $updateObservaciones = "
            UPDATE observaciones
            SET observacion = '$value' WHERE id_accion =  $key AND (trimestre = $trimestre AND anual = $anual)";
            mysql_query($updateObservaciones, $siplan_data_conn) or die (mysql_error());
            } else {
              $insertObservaciones2 = "
              INSERT INTO observaciones (id_accion, id_proyecto, observacion, trimestre, anual)
              VALUES ($key, $ID_PROYECTO, '$value', $trimestre, $anual);";
               mysql_query($insertObservaciones2, $siplan_data_conn) or die (mysql_error());

            }
        }
      } else {
       $deleteObservaciones = "DELETE FROM observaciones WHERE  id_accion =  $key AND (trimestre = $trimestre AND anual = $anual)";
       mysql_query($deleteObservaciones) or die (mysql_error());
      }
    }


    $fecha = date("d-m-Y");
    $hora = date("H:i");
    $ipadd = $_SERVER['REMOTE_ADDR'];
    $iduser = $_SESSION['id_usuario'];
    $eventi = "Actualizacion de evaluacion del proyecto (".$ID_PROYECTO.")";
    mysql_query("INSERT into historial (id_usuario, fecha, hora, evento, ipaddress) VALUES ('$iduser','$fecha','$hora','$eventi','$ipadd')",    $siplan_data_conn)or die(mysql_error());


?>

    <script type="text/javascript">
	 alert ("La evaluaci0n se actualiz0 correctamente");
	 location.href= "../../main.php?token=0e51a87ec173dd9534a056a403c85881";
     </script>
*
