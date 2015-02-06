<?php session_start();
date_default_timezone_set('America/Mexico_City');
require_once("../../seguridad/deniedacces.php");
require_once("../../seguridad/siplan_connection_db.php");
require_once("../../seguridad/logout.php");

?>
<p>Componente

<select name="componente" id="componente">
       <option value="" selected="selected">-seleccione-</option>

		    <?php
            $consulta_com = mysql_query("SELECT * FROM componentes WHERE id_proyecto =".$_GET['id']." order by descripcion asc" ,$siplan_data_conn) or die (mysql_error());
            while($res_com = mysql_fetch_array($consulta_com)){
                echo "<option value=\"".$res_com['id_componente']."\"> ".($res_com['descripcion'])."</option>";
                $i++;
            }
            ?>
        </select>
 </p>
