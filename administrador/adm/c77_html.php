<?php
echo "
<a href = 'rpts/c77_xls.php' target='_blank'>Descargar c77 XLS</a><br>
<h3>Archivo c77</h3><br>
<table width='100%' border='1' cellspacing='0' cellpadding='0'>";
$consulta_oficios = $conexion->query("select id_oficio,no_oficio,tipo,fecha_oficio,fecha_captura from oficio_aprobacion where estatus_sefin = 0");
while($r_of = $consulta_oficios->fetch_assoc()){
    $id_oficio = $r_of['id_oficio'];
    $no_oficio = $r_of['no_oficio'];
    $tipo_of = $r_of['tipo'];
    $fof = $r_of['fecha_oficio'];
    $fca = $r_of['fecha_captura'];
    $consulta_detof = $conexion-query("SELECT id_poa02,monto FROM detalle_oficio WHERE id_oficio = ".$id_oficio);
    while($r_detof = $consulta_detof->fetch_assoc()){
        $idpoa = $r_detof['id_poa02'];
        $monto = $r_detof['monto'];
        $consulta_obra = $conexion->query("SELECT obra,id_dependencia,id_proyecto,consxdep FROM obras WHERE id_obra = ".$idpoa);
        echo "<tr>";
        $r_obra = $consulta_obra->fetch_assoc();
        $obra = $r_obra['obra'];
        $id_dep = $r_obra['id_dependencia'];
        $id_proy = $r_obra['id_proyecto'];
        $consxdep = $r_obra['consxdep'];
        $consulta_dep = $conexion->query("SELECT id_sector FROM dependencias where id_dependencia = ".$id_dep);
        $id_sector_r = $consulta_dep->fetch_array();
        $id_sector = $id_sector_r[0];
        $consulta_dep->free();
        echo "<td>".$id_sector."</td>";
        echo "<td>".$id_dep."</td>";
        $consulta_poa02_origen = $conexion->query("SELECT * FROM poa02_origen where id_poa02 =".$obra);
        $r_origen=$consulta_poa02_origen->fetch_assoc();
        $poa_proyecto = $r_origen["s06c_proyec"];
			$poa_partid = $r_origen["s07c_partid"];
			$poa_origen = $r_origen["s08c_origen"];
			$poa_compon = $r_origen["s11c_compon"];
			$poa_accion = $r_origen["s25c_accion"];
		    $cons_edo_fin = $conexion->query("SELECT
		    s03c_objeti as obj,s04c_progra as pro,s05c_subpro as subpro
		    FROM estados_financieros WHERE
		    s01c_sector = '$id_sector' AND
		    s02c_depend = '$id_dep' AND
		    S06c_proyec = '$poa_proyecto' AND
		    s07c_partid = '$poa_partid' AND
		    s08c_origen = '$poa_origen' AND
		    s11c_compon = '$poa_compon' AND
		    s25c_accion = '$poa_accion'
		    ");
		$r_edofin =$cons_edo_fin->fetch_assoc();
	     echo "<td>".$r_edofin["obj"]."</td>";
	     echo "<td>".$r_edofin["pro"]."</td>";
	     echo "<td>".$r_edofin["subpro"]."</td>";
             $cons_proyecto = $conexion->query("SELECT no_proyecto FROM proyectos WHERE id_proyecto = ".$id_proy);

         $cons_pr_q = $cons_proyecto->fetch_array();
        echo "<td>".$cons_pr_q[0]."</td>";
             $cons_proyecto->free();
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
    $consulta_detof->free();
}
unset($r_of);
$consulta_oficios->free();
echo "</table>";
?>
