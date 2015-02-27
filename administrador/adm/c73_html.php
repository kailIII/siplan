<?php
$conexion->query("SET NAMES utf8");
$oficios = $conexion->query("select id_oficio from oficio_aprobacion where estatus_sefin = 0 and tipo = 0 and activo = 1");
$i=0;
while($r_of = $oficios->fetch_assoc()){
    $id_oficio = $r_of['id_oficio'];
    $detalle_oficio = $conexion->query("SELECT id_poa02 FROM detalle_oficio WHERE id_oficio = ".$id_oficio);
    while($d_of = $detalle_oficio->fetch_assoc()){
       $consulta_poa02 = $conexion->query("select * from obras where id_obra = ".$d_of["id_poa02"]);
       $r_poa02 = $consulta_poa02->fetch_assoc();
       $consulta_deps = $conexion->query("SELECT id_dependencia, id_sector FROM dependencias WHERE id_dependencia = ".$r_poa02["id_dependencia"]);
       $r_dep = $consulta_deps->fetch_assoc();
	   $sector = $r_dep['id_sector'];
	   $dependencia = $r_dep['id_dependencia'];
       unset($r_dep);
       $consulta_deps->free();
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

	$eje = $r_edofin["s03c_objeti"];
	$linea = $r_edofin["s04c_progra"];
	$estrategia = $r_edofin["s05c_subpro"];

	unset($r_edofin);
     $consulta_edosfin->free();
	$consulta_proyecto = $conexion->query("SELECT no_proyecto,nombre FROM proyectos WHERE id_proyecto = ".$r_poa02['id_proyecto']);
	$r_pro = $consulta_proyecto->fetch_assoc();
	$n_proyecto = $r_pro['no_proyecto'];
	$nombre_proyecto = $r_pro['nombre'];
	$consxdep = $r_poa02['consxdep'];

	unset($r_pro);
        $consulta_proyecto->free();
	$descripcion = $r_poa02['descripcion'];
		$ompio = $r_poa02["municipio"];
        $cons_mpio_fin = $conexion->query("select id_municipio,id_region from municipios where id_finanzas = ".$ompio);
        $rmpio = $cons_mpio_fin->fetch_assoc();
        $municipio = $rmpio['id_municipio'];
        $region = $rmpio['id_region'];
        unset($rmpio);
        $cons_mpio_fin->free();
        $oloc = $r_poa02["localidad"];
		$cons_localidades = $conexion->query("SELECT id_finanzas,id_marginacion from localidades where id_finanzas = ".$r_poa02["localidad"]." AND id_municipio = ".$ompio);
		$r_loc = $cons_localidades->fetch_assoc();
		$marginacion  = $r_loc["id_marginacion"];
		$finanzas_localidad = $r_loc["id_finanzas"];
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

	$ai = substr($f_i,0,4);
        $af =  substr($f_f,0,4);
       $modalidad  = $r_poa02["modalidad"];
       $retencion = $r_poa02["retencion"];
       $prog_poa =  $r_poa02["programa_poa"];
       $subprog_poa = $r_poa02["subprograma_poa"];
       $u_medida =  $r_poa02["u_medida"];
       $cantidad =  $r_poa02["cantidad"];
       $ben_h = $r_poa02["ben_h"];
       $ben_m = $r_poa02["ben_m"];
        unset($r_poa02);
        $consulta_poa02->free();
	$cons_margin = $conexion->query("SELECT descripcion from marginacion where id_marginacion = ".$marginacion);
    $r_marginacion =  $cons_margin->fetch_array();
    $marginacion = $r_marginacion[0];
    $cons_margin->free();

    $c73[$i] = array(
    'sec'=>$sector,
    'dep'=>$dependencia,
    'obj'=>$eje,
     'pro'=>$linea,
     'subpro'=>$estrategia,
     'proyecto'=>$n_proyecto,
     "com"=>$s11c_compon,
    "acc"=>$s25c_accion,
            "obra"=>$consxdep,
            "upla"=>$obra,
            "int"=>0 ,
            "desproy"=>$nombre_proyecto,
            "desobra"=>$descripcion,
            "mun"=>$municipio,
            "loc"=>$finanzas_localidad,
            "annioI"=>$ai,
            "mesI"=>$m_inicio,
            "annioF"=>$af,
             "mesF"=>$m_fin,
            "mod"=>$modalidad,
            "ret"=>$retencion,
            "pro_poa"=>$prog_poa,
            "subpro_poa"=>$subprog_poa,
             "uni"=>$u_medida,
              "oficio"=>1,
                "cantidad"=>$cantidad,
            "hombres"=>$ben_h,
                "mujeres"=>$ben_m,
            "punt"=>1,
            "prior"=>1,
            "region"=>$region,
            "marginalidad"=>$marginacion,
            "aprob"=>1,
    "ofasig"=>1,
    "fecha"=>date('d/m/y'),
    "idproy"=>0,
    "usuario"=>698,
    "fecha1"=>date('d/m/y'),
    "usr"=>698,
    "fecha2"=>date('d/m/y')
           );

    $i = $i+1;
      }
      unset($id_oficio);
        unset($d_of);
	$detalle_oficio->free();
    }
    unset($r_of);
$limite = count($c73);
for($x=0;$x<$limite;$x++){
  echo "<pre>";
    print_r($c73[$x]);
  echo "</pre>";
}









?>
