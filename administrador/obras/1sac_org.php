<?php session_start();
date_default_timezone_set('America/Mexico_City');
require_once("../../seguridad/deniedacces.php");
require_once("../../seguridad/siplan_connection_db.php");
require_once("../../seguridad/logout.php");

?>
<p>Origen

<select name="origen" id="origen">
       <option value="" selected="selected">-seleccione-</option>

		    <?php
				$id = $_GET['id'];
	$dat = explode("-", $id);
	$ids = $dat[0];
            $consulta_com = mysql_query("SELECT * FROM origen WHERE s08c_origen =".$ids." order by s08c_origen asc" ,$siplan_data_conn) or die (mysql_error());
            while($res_com = mysql_fetch_array($consulta_com)){
                echo "<option value=\"".$res_com['s08c_origen']."\"> ".$res_com['s08c_origen']." - ".utf8_encode($res_com['c08c_tipori'])."</option>";
                $i++;
            }
            ?>
        </select>
 </p>
