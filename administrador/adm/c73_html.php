<?php
if($_SESSION['id_perfil_v3']==1){
echo "<table  border='1' cellspacing='0' cellpadding='0'>\n";
$oficios = mysql_query("select id_oficio from oficio_aprobacion where estatus_sefin = 0 and tipo = 0",$siplan_data_conn) or die (mysql_error());
while($r_of = mysql_fetch_assoc($oficios)){
$id_oficio = $r_of['id_oficio'];
$detalle_oficio = mysql_query("SELECT id_poa02 FROM detalle_oficio WHERE id_oficio = ".$id_oficio,$siplan_data_conn);
while($d_of = mysql_fetch_assoc($detalle_oficio)){
            echo "<tr>\n";
		$consulta_poa02 = mysql_query("select * from obras where id_obra = ".$d_of["id_poa02"],$siplan_data_conn) or die (mysql_error());
                $r_poa02 = mysql_fetch_assoc($consulta_poa02);
		$consulta_deps = mysql_query("SELECT id_dependencia, id_sector FROM dependencias WHERE id_dependencia = ".$r_poa02["id_dependencia"],$siplan_data_conn)or die (mysql_error);
		$r_dep = mysql_fetch_assoc($consulta_deps);
		$sector = $r_dep['id_sector'];
		$dependencia = $r_dep['id_dependencia'];
		unset($r_dep);
                mysql_free_result($consulta_deps);
                echo "<td>".$sector."</td>\n";
		echo "<td>".$dependencia."</td>\n";
		$obra =  $r_poa02['obra'];
		$consulta_poaorigen = mysql_query("SELECT s06c_proyec,s07c_partid,s08c_origen,s11c_compon,s25c_accion from poa02_origen where id_poa02 = ".$obra,$siplan_data_conn) or die (mysql_error());
		$r_poa02_o = mysql_fetch_assoc($consulta_poaorigen);
		$s06c_proyec = $r_poa02_o['s06c_proyec'];
		$s07c_partid = $r_poa02_o['s07c_partid'];
		$s08c_origen = $r_poa02_o['s08c_origen'];
		$s11c_compon = $r_poa02_o['s11c_compon'];
		$s25c_accion = $r_poa02_o['s25c_accion'];
                unset($r_poa02_o);
                mysql_free_result($consulta_poaorigen);
                $consulta_edosfin = mysql_query("SELECT s03c_objeti,s04c_progra,s05c_subpro
		FROM estados_financieros
		where
		s01c_sector = '$sector' and
		s02c_depend = '$dependencia' and
		s06c_proyec = '$s06c_proyec' and
		s07c_partid = '$s07c_partid' and
		s08c_origen = '$s08c_origen' and
		s11c_compon = '$s11c_compon' and
		s25c_accion = '$s25c_accion'",$siplan_data_conn) or die (mysql_error());
		$r_edofin = mysql_fetch_assoc($consulta_edosfin);
		echo "<td>".$r_edofin["s03c_objeti"]."</td>\n";
		echo "<td>".$r_edofin["s04c_progra"]."</td>\n";
		echo "<td>".$r_edofin["s05c_subpro"]."</td>\n";
                unset($r_edofin);
                mysql_free_result($consulta_edosfin);
		$consulta_proyecto = mysql_query("SELECT no_proyecto,nombre FROM proyectos WHERE id_proyecto = ".$r_poa02['id_proyecto'], $siplan_data_conn) or die (mysql_error());
		$r_pro = mysql_fetch_assoc($consulta_proyecto);
		echo "<td>".$r_pro['no_proyecto']."</td>\n";
		echo "<td>".$s11c_compon."</td>\n";
		echo "<td>".$s25c_accion."</td>\n";
		echo "<td>".$r_poa02['consxdep']."</td>\n";
		echo "<td>".$obra."</td>\n<td>0</td>\n<td>&nbsp;</td>\n";
		unset($r_pro);
                mysql_free_result($consulta_proyecto);
		echo "<td>".$r_poa02['descripcion']."</td>\n";
		$ompio = $r_poa02["municipio"];




                $cons_mpio_fin = mysql_query("select id_municipio from municipios where id_finanzas = ".$ompio,$siplan_data_conn) or die (mysql_error());
                $ompio = mysql_result($cons_mpio_fin,0);
mysql_free_result($cons_mpio_fin);


		$cons_mpios = mysql_query("SELECT id_finanzas,id_reg_finanzas from municipios where id_municipio = ".$ompio,$siplan_data_conn)or die (mysql_error());
		$rmpio = mysql_fetch_assoc($cons_mpios);
		$municipio =  $rmpio["id_finanzas"];
		$region = $rmpio["id_reg_finanzas"];
                unset($rmpio);
                mysql_free_result($cons_mpios);
                echo "<td>".$municipio."</td>\n";
		$cons_localidades = mysql_query("SELECT id_finanzas,id_marginacion from localidades
		where id_finanzas = ".$r_poa02["localidad"]." AND id_municipio = ".$ompio,$siplan_data_conn) or die (mysql_error());
		$r_loc = mysql_fetch_assoc($cons_localidades);
		$marginacion  = $r_loc["id_marginacion"];
		echo "<td>".$r_loc["id_finanzas"]."</td>\n";
		unset($r_loc);
		mysql_free_result($cons_localidades);
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
        mysql_free_result($consulta_poa02);
	echo "<td>".$region."</td>\n";
	$cons_margin = mysql_query("SELECT descripcion from marginacion where id_marginacion = ".$marginacion,$siplan_data_conn) or die (mysql_error());
	echo "<td>".mysql_result($cons_margin,0)."</td>\n
	<td>1</td>\n
    <td>1</td>\n
    <td>".date('d/m/y')."</td>\n
    <td>0</td>\n
    <td>698</td>\n
    <td>".date('d/m/y')."</td>\n
    <td>698</td>\n
    <td>".date('d/m/y')."</td>\n
    ";echo "</tr>\n";
mysql_free_result($cons_margin);
	}
	unset($id_oficio);
        unset($d_of);
	mysql_free_result($detalle_oficio);
}
unset($r_of);
mysql_free_result($oficios);
echo "</table>";
}
?>
