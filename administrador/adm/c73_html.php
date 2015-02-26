<?php
if($_SESSION['id_perfil_v3']==1){
    echo "<a href = 'rpts/c73_xls.php' target='_blank'>Descargar c73 XLS</a><br>
<br><h3>Archivo c73</h3><br>";
echo "<table  border='1' cellspacing='0' cellpadding='0'>\n";
$oficios = $conexion->query("select id_oficio from oficio_aprobacion where estatus_sefin = 0 and tipo = 0");
while($r_of = $oficios->fetch_assoc()){
$id_oficio = $r_of['id_oficio'];
$detalle_oficio =$conexion->query("SELECT id_poa02 FROM detalle_oficio WHERE id_oficio = ".$id_oficio);
while($d_of = $detalle_oficio->fetch_assoc()){
            echo "<tr>\n";
		$consulta_poa02 = $conexion->query("select * from obras where id_obra = ".$d_of["id_poa02"]);
        $r_poa02 = $consulta_poa02->fetch_assoc();

    $consulta_deps = $conexion->query("SELECT id_dependencia, id_sector FROM dependencias WHERE id_dependencia = ".$r_poa02["id_dependencia"]);
		$r_dep = $consulta_deps->fetch_assoc();
		$sector = $r_dep['id_sector'];
		$dependencia = $r_dep['id_dependencia'];
		unset($r_dep);
                $consulta_deps->free();
                echo "<td>".$sector."</td>\n";
		echo "<td>".$dependencia."</td>\n";
		$obra =  $r_poa02['obra'];
$consulta_poaorigen = $conexion->query("SELECT s06c_proyec,s07c_partid,s08c_origen,s11c_compon,s25c_accion from poa02_origen where id_poa02 = ".$obra);
		$r_poa02_o = $consulta_poaorigen->fetch_assoc();
		$s06c_proyec = $r_poa02_o['s06c_proyec'];
		$s07c_partid = $r_poa02_o['s07c_partid'];
		$s08c_origen = $r_poa02_o['s08c_origen'];
		$s11c_compon = $r_poa02_o['s11c_compon'];
		$s25c_accion = $r_poa02_o['s25c_accion'];
                unset($r_poa02_o);
                $consulta_poaorigen->free();
                $consulta_edosfin = $conexion->query("SELECT s03c_objeti,s04c_progra,s05c_subpro
		FROM estados_financieros
		where
		s01c_sector = '$sector' and
		s02c_depend = '$dependencia' and
		s06c_proyec = '$s06c_proyec' and
		s07c_partid = '$s07c_partid' and
		s08c_origen = '$s08c_origen' and
		s11c_compon = '$s11c_compon' and
		s25c_accion = '$s25c_accion'");
		$r_edofin = $consulta_edosfin->fetch_assoc();
		echo "<td>".$r_edofin["s03c_objeti"]."</td>\n";
		echo "<td>".$r_edofin["s04c_progra"]."</td>\n";
		echo "<td>".$r_edofin["s05c_subpro"]."</td>\n";
        unset($r_edofin);
        $consulta_edosfin->free();
		$consulta_proyecto = $conexion->query("SELECT no_proyecto,nombre FROM proyectos WHERE id_proyecto = ".$r_poa02['id_proyecto']);
		$r_pro = $consulta_proyecto->fetch_assoc();
		echo "<td>".$r_pro['no_proyecto']."</td>\n";
		echo "<td>".$s11c_compon."</td>\n";
		echo "<td>".$s25c_accion."</td>\n";
		echo "<td>".$r_poa02['consxdep']."</td>\n";
		echo "<td>".$obra."</td>\n<td>0</td>\n<td>&nbsp;</td>\n";
		unset($r_pro);
        $consulta_proyecto->free();
		echo "<td>".$r_poa02['descripcion']."</td>\n";
		$ompio = $r_poa02["municipio"];
        $cons_mpio_fin = $conexion->query("select id_municipio from municipios where id_finanzas = ".$ompio);
        $ompio_arr = $cons_mpio_fin->fetch_array();
        $ompio = $ompio_arr[0];
        $cons_mpio_fin->free();
        $cons_mpios = $conexion->query("SELECT id_finanzas,id_reg_finanzas from municipios where id_municipio = ".$ompio);
		$rmpio = $cons_mpios->fetch_assoc();
		$municipio =  $rmpio["id_finanzas"];
		$region = $rmpio["id_reg_finanzas"];
        unset($rmpio);
        $cons_mpios->free();
        echo "<td>".$municipio."</td>\n";
		$cons_localidades = $conexion->query("SELECT id_finanzas,id_marginacion from localidades
		where id_finanzas = ".$r_poa02["localidad"]." AND id_municipio = ".$ompio);
		$r_loc = $cons_localidades->fetch_assoc();
		$marginacion  = $r_loc["id_marginacion"];
		echo "<td>".$r_loc["id_finanzas"]."</td>\n";
		unset($r_loc);
		$cons_localidades->free();
		$f_i = $r_poa02["fecha_inicio"];
		$f_f = $r_poa02["fecha_fin"];
		$m_i = substr($f_i,5,2);
	switch($m_i) {
	case "01":
		$m_inicio = 1;
		break;
		case "02":
		$m_inicio = 2;
		break;
		case "03":
		$m_inicio = 3;
		break;
		case "04":
		$m_inicio = 4;
		break;
		case "05":
		$m_inicio = 5;
		break;
		case "06":
		$m_inicio = 6;
		break;
		case "07":
		$m_inicio = 7;
		break;
		case "08":
		$m_inicio = 8;
		break;
		case "09":
		$m_inicio = 9;
		break;
		case "10":
		$m_inicio = 10;
		break;
		case "11":
		$m_inicio = 11;
		break;
		case "12":
		$m_inicio = 12;
		break;
	}
	$a_i = substr($f_i,7,4);
	$a_f = substr($f_f,7,4);
	$m_f = substr($f_f,5,2);
	switch($m_f) {
	case "01":
		$m_fin = 1;
		break;
		case "02":
		$m_fin = 2;
		break;
		case "03":
		$m_fin = 3;
		break;
		case "04":
		$m_fin = 4;
		break;
		case "05":
		$m_fin = 5;
		break;
		case "06":
		$m_fin = 6;
		break;
		case "07":
		$m_fin = 7;
		break;
		case "08":
		$m_fin = 8;
		break;
		case "09":
		$m_fin = 9;
		break;
		case "10":
		$m_fin = 10;
		break;
		case "11":
		$m_fin = 11;
		break;
		case "12":
		$m_fin = 12;
		break;
	}
	echo "<td>".substr($f_i,0,4)."</td>\n";
    echo "<td>".$m_inicio."</td>\n";
    echo "<td>".substr($f_f,0,4)."</td>\n";
    echo "<td>".$m_fin."</td>\n";
	echo "<td>".$r_poa02["modalidad"]."</td>\n";
	echo "<td>".$r_poa02["retencion"]."</td>\n";
	echo "<td>".$r_poa02["programa_poa"]."</td>\n";
	echo "<td>".$r_poa02["subprograma_poa"]."</td>\n";
	echo "<td>".$r_poa02["u_medida"]."</td>\n"
                . "<td>1</td>\n";
	echo "<td>".$r_poa02["cantidad"]."</td>\n";
	echo "<td>".$r_poa02["ben_h"]."</td>\n";
	echo "<td>".$r_poa02["ben_m"]."</td>\n
	<td>0</td>\n
    <td>1</td>\n";
        unset($r_poa02);
        $consulta_poa02->free();
	echo "<td>".$region."</td>\n";
	$cons_margin = $conexion->query("SELECT descripcion from marginacion where id_marginacion = ".$marginacion);
	$r_mar = $cons_margin->fetch_array();
    echo "<td>".$r_mar[0]."</td>\n
	<td>1</td>\n
    <td>1</td>\n
    <td>".date('d/m/y')."</td>\n
    <td>0</td>\n
    <td>698</td>\n
    <td>".date('d/m/y')."</td>\n
    <td>698</td>\n
    <td>".date('d/m/y')."</td>\n
    ";echo "</tr>\n";
    $cons_margin->free();

//termina el while

}
	unset($id_oficio);
        unset($d_of);
	$detalle_oficio->free();
}
unset($r_of);
$oficios->free();
echo "</table>";
}
?>
