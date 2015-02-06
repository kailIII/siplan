<?php
$consulta_componentes1 =@mysql_query("SELECT id_componente FROM componentes WHERE id_proyecto = ".$id_proyecto,$siplan_data_conn);
$resultado_c1 = mysql_result($consulta_componentes1,0);
?>