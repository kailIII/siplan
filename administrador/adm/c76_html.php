<?php
echo "
<a href = 'rpts/c76_xls.php' target='_blank'>Descargar c76 XLS</a><br>
<h3>Archivo c76</h3><br>
<table width='100%' border='1' cellspacing='0' cellpadding='0'>";
$consulta_oficios = $conexion->query("SELECT id_oficio,no_oficio,tipo,fecha_oficio,fecha_captura from oficio_aprobacion where estatus_sefin = 0");
while($r_of = $consulta_oficios->fetch_assoc()){
    echo "<tr>";
    $id_oficio = $r_of['id_oficio'];
    $cons_d_of = $conexion-query("SELECT id_proyecto from detalle_oficio where id_oficio = ".$id_oficio." group by id_oficio");
    $id_pro_r = $cons_d_of->fetch_arry();
    $id_pro= $id_pro_r[0];
    $cons_d_of->free();
    $cons_dep = $conexion->query("SELECT id_dependencia FROM proyectos WHERE id_proyecto = ");
    $r_cons_dep = $cons_dep->fetch_array();
    echo "<td>".$r_cons_dep[0]."</td>";
    $cons_dep->free();
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
$consulta_oficios->free();
echo "</table>";
?>

