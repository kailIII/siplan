<?php
echo "
<a href = 'rpts/c76_xls.php' target='_blank'>Descargar c76 XLS</a><br>
<h3>Archivo c76</h3><br>
<table width='100%' border='1' cellspacing='0' cellpadding='0'>";
$consulta_oficios = mysql_query("SELECT id_oficio,no_oficio,tipo,fecha_oficio,fecha_captura from oficio_aprobacion where estatus_sefin = 0",$siplan_data_conn) or die (mysql_error());
while($r_of = mysql_fetch_assoc($consulta_oficios)){
    echo "<tr>";
    $id_oficio = $r_of['id_oficio'];
    $cons_d_of = mysql_query("SELECT id_proyecto from detalle_oficio where id_oficio = ".$id_oficio." group by id_oficio",$siplan_data_conn) or die (mysql_error());
    $id_pro = mysql_result($cons_d_of,0);
    mysql_free_result($cons_d_of);
    $cons_dep = mysql_query("SELECT id_dependencia FROM proyectos WHERE id_proyecto = ".$id_pro,$siplan_data_conn) or die (mysql_error());
    echo "<td>".mysql_result($cons_dep,0)."</td>";
    mysql_free_result($cons_dep);
    echo "<td>".$r_of['no_oficio']."</td>";
    echo "<td>".$r_of['tipo']."</td>";
    $fof = $r_of['fecha_oficio'];
print("<td>".substr($fof,8,2)."/".substr($fof,5,2)."/".substr($fof,2,2)."</td><td>698</td>");
$fca = $r_of['fecha_captura'];
print("<td>".substr($fca,8,2)."/".substr($fca,5,2)."/".substr($fca,2,2)."</td><td>698</td>");
print("<td>".substr($fca,8,2)."/".substr($fca,5,2)."/".substr($fca,2,2)."</td>");
echo "</tr>";
}
unset($r_of);
mysql_free_result($consulta_oficios);
echo "</table>";
?>

