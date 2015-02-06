<?php session_start();
date_default_timezone_set('America/Mexico_City');
require_once("../../seguridad/deniedacces.php");
require_once("../../seguridad/siplan_connection_db.php");
require_once("../../seguridad/logout.php");

?>
<p>Subprograma POA

<select name="subprogramas_poa" id="subprogramas_poa">
       <option value="" selected="selected">-seleccione-</option>

		    <?php
            $consulta_loc = mysql_query("SELECT * FROM subprogramas_poa WHERE id_programa_poa =".$_GET['id']." order by clave asc" ,$siplan_data_conn) or die (mysql_error());
            while($res_loc = mysql_fetch_array($consulta_loc)){
                echo "<option value=\"".$res_loc['id_subprograma_poa']."\"> ".($res_loc['clave']." ".$res_loc['descripcion'])."</option>";
                $i++;
            }
            ?>
        </select>
 </p>
