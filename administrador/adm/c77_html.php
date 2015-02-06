<?php
echo "
<a href = 'rpts/c77_xls.php' target='_blank'>Descargar c77 XLS</a><br>
<h3>Archivo c77</h3><br>
<table width='100%' border='1' cellspacing='0' cellpadding='0'>";
$consulta_oficios = mysql_query("select id_oficio,no_oficio,tipo,fecha_oficio,fecha_captura from oficio_aprobacion where estatus_sefin = 0",$siplan_data_conn) or die (mysql_error());
while($r_of = mysql_fetch_assoc($consulta_oficios)){
    $id_oficio = $r_of['id_oficio'];
    $no_oficio = $r_of['no_oficio'];
    $tipo_of = $r_of['tipo'];
    $fof = $r_of['fecha_oficio'];
    $fca = $r_of['fecha_captura'];
    $consulta_detof = mysql_query("SELECT id_poa02,monto FROM detalle_oficio WHERE id_oficio = ".$id_oficio,$siplan_data_conn);
    while($r_detof = mysql_fetch_assoc($consulta_detof)){
        $idpoa = $r_detof['id_poa02'];
        $monto = $r_detof['monto'];
        $consulta_obra = mysql_query("SELECT obra,id_dependencia,id_proyecto,consxdep FROM obras WHERE id_obra = ".$idpoa,$siplan_data_conn)or die (mysql_error());
        echo "<tr>";
        $r_obra = mysql_fetch_assoc($consulta_obra);
        $obra = $r_obra['obra'];
        $id_dep = $r_obra['id_dependencia'];
        $id_proy = $r_obra['id_proyecto'];
        $consxdep = $r_obra['consxdep'];
        $consulta_dep = mysql_query("SELECT id_sector FROM dependencias where id_dependencia = ".$id_dep,$siplan_data_conn) or die (mysql_error());
        $id_sector = mysql_result($consulta_dep,0);
        mysql_free_result($consulta_dep);
        echo "<td>".$id_sector."</td>";
        echo "<td>".$id_dep."</td>";
        $consulta_poa02_origen = mysql_query("SELECT * FROM poa02_origen where id_poa02 =".$obra,$siplan_data_conn) or die (mysql_error());
        $r_origen=mysql_fetch_assoc($consulta_poa02_origen);
        $poa_proyecto = $r_origen["s06c_proyec"];
			$poa_partid = $r_origen["s07c_partid"];
			$poa_origen = $r_origen["s08c_origen"];
			$poa_compon = $r_origen["s11c_compon"];
			$poa_accion = $r_origen["s25c_accion"];
		    $cons_edo_fin = mysql_query("SELECT
		    s03c_objeti as obj,s04c_progra as pro,s05c_subpro as subpro
		    FROM estados_financieros WHERE
		    s01c_sector = '$id_sector' AND
		    s02c_depend = '$id_dep' AND
		    S06c_proyec = '$poa_proyecto' AND
		    s07c_partid = '$poa_partid' AND
		    s08c_origen = '$poa_origen' AND
		    s11c_compon = '$poa_compon' AND
		    s25c_accion = '$poa_accion'
		    ",$siplan_data_conn)or die (mysql_error());
		$r_edofin = mysql_fetch_assoc($cons_edo_fin);
	     echo "<td>".$r_edofin["obj"]."</td>";
	     echo "<td>".$r_edofin["pro"]."</td>";
	     echo "<td>".$r_edofin["subpro"]."</td>";
             $cons_proyecto = mysql_query("SELECT no_proyecto FROM proyectos WHERE id_proyecto = ".$id_proy,$siplan_data_conn) or die (mysql_error());
             echo "<td>".mysql_result($cons_proyecto,0)."</td>";
             mysql_free_result($cons_proyecto);
             echo "<td>".$poa_compon."</td>";
	       echo "<td>".$poa_accion."</td>";
                echo "<td>$consxdep</td>";
                echo "<td>$obra</td>";
                echo "<td>$no_oficio</td>";
                echo "<td>$tipo_of</td>";
                echo "<td>";
print(substr($fof,8,2)."/".substr($fof,5,2)."/".substr($fof,2,2));
echo "</td><td>$monto</td>
              <td>698</td>
              <td>".substr($fca,8,2)."/".substr($fca,5,2)."/".substr($fca,2,2)."</td>
              <td>698</td>
              <td>".substr($fca,8,2)."/".substr($fca,5,2)."/".substr($fca,2,2)."</td>"
              ;
        echo"</tr>";
    }
    unset($r_detof);
    mysql_free_result($consulta_detof);
}
unset($r_of);
mysql_free_result($consulta_oficios);
echo "</table>";
?>
