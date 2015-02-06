<?php session_start();
date_default_timezone_set('America/Mexico_City');
require_once("../../seguridad/deniedacces.php");
require_once("../../seguridad/siplan_connection_db.php");
require_once("../../seguridad/logout.php");

?>
<p>Localidad

<select name="loc" id="loc">
       <option value="" selected="selected">-seleccione-</option>

		    <?php
            $consulta_loc = mysql_query("SELECT * FROM localidades WHERE id_municipio =".$_GET['id']." order by nombre asc" ,$siplan_data_conn) or die (mysql_error());
            while($res_loc = mysql_fetch_array($consulta_loc)){
                echo "<option value=\"".$res_loc['id_localidad']."\"> ".($res_loc['nombre'])."</option>";
                $i++;
            }
            ?>
        </select>
 </p>
