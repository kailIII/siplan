<?php session_start();
date_default_timezone_set('America/Mexico_City');
require_once("../../seguridad/deniedacces.php");
require_once("../../seguridad/siplan_connection_db.php");
require_once("../../seguridad/logout.php");


	$id = $_GET['id'];
	$dat = explode("-", $id);
	$ids = $dat[0];

	$dat1 = explode("_", $ids);

	$idsp = $dat1[0];
	$idsc = $dat1[1];
	$idsa = $dat1[2];
	$idspa = $dat1[3];

?>
<p>Origen

<select name="origen" id="origen">
       <option value="" selected="selected">-seleccione-</option>

		    <?php




	 $consulta_com = mysql_query("SELECT * FROM estados_financieros INNER JOIN origen  ON estados_financieros.s08c_origen = origen.s08c_origen where s02c_depend=".$_SESSION['id_dependencia_v3']." and s06c_proyec=".$idsp." and s11c_compon=".$idsc." and s25c_accion=".$idsa." and s07c_partid=".$idspa." GROUP BY origen.s08c_origen order by origen.s08c_origen asc" ,$siplan_data_conn) or die (mysql_error());

           // $consulta_com = mysql_query("SELECT * FROM origen WHERE s08c_origen =".$ids." order by s08c_origen asc" ,$siplan_data_conn) or die (mysql_error());
            while($res_com = mysql_fetch_array($consulta_com)){
                echo "<option value=\"".$res_com['s08c_origen']."\"> ".$res_com['s08c_origen']." - ".utf8_encode($res_com['c08c_tipori'])."</option>";
                $i++;
            }
            ?>
        </select>
 </p>
