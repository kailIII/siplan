<?php
if (isset($_SERVER['PHP_AUTH_USER']) and isset($_SERVER['PHP_AUTH_PW'])) {
    if (($_SERVER['PHP_AUTH_USER'] != "siplan_ws" ||  $_SERVER['PHP_AUTH_PW'] != "4Do1t4m0" )) { {
            header('WWW-Authenticate: Basic realm="212"');
            header('HTTP/1.0 401 Unauthorized');
        }
    }
} else {
    header('WWW-Authenticate: Basic realm="WebDAVServer"');
    header('HTTP/1.0 401 Unauthorized');
    echo 'Debe identificarse para poder ingresar';
    exit;
}
require_once('lib/nusoap.php');
$server = new nusoap_server();
//$ns = 'http://localhost/siplan/ws/ws_siplan.php';
$ns = 'http://siplan.zacatecas.gob.mx/ws/ws_siplan.php';
$server->configureWSDL('WSDL SIPLAN', $ns);

function wsSiplan($ejercicio,$dependencia,$proyecto)
{

//$conexion = 	mysql_connect("localhost", "root", "tr15t4n14");
$conexion = mysql_connect("10.221.12.2", "siplan_consulta", "cons.1pl4n.UplA");
$consulta = "select
dep.id_sector as sector,
pr.id_dependencia as dependencia,
pr.id_eje as eje,
pr.id_linea as linea,
pr.id_estrategia as estrtegia,
pr.no_proyecto as num_proyecto,
pr.nombre as nombre,
pr.inversion as inversion,
pr.beneficiarios_h as ben_h,
pr.beneficiarios_m as ben_m,
pr.justificacion as justificacion,
pr.cantidad as cantidad,
pr.unidad_medida as u_medida,
pr.finalidad as finalidad,
fun.id_funf as funcion,
subfun.id_subf as subfuncion,
comp.id_componente as id_componente,
comp.no_componente as num_componente,
comp.descripcion as componente,
comp.unidad_medida as u_medida_comp,
comp.id_tipo as tipo_u_m_componente,
comp.ped_eje as comp_eje_ped,
comp.ped_linea as comp_linea_ped,
comp.ped_estrategia as comp_estrategia_ped,
acc.id_accion as id_accion,
acc.no_accion as num_accion,
acc.descripcion as accion
from
proyectos as pr
inner join dependencias as dep on(pr.id_dependencia = dep.id_dependencia)
inner join funcion as fun on(pr.funcion = fun.id_funf and pr.finalidad = fun.id_finalidad)
inner join subfuncion as subfun on(pr.subfuncion = subfun.id_subfuncion)
inner join componentes as comp on(comp.id_proyecto = pr.id_proyecto)
inner join acciones as acc on(acc.id_componente = comp.id_componente)
where
pr.id_dependencia = $dependencia AND
pr.no_proyecto = $proyecto AND
pr.estatus = 2 AND
pr.anual_pr = $ejercicio
order by pr.id_dependencia,pr.no_proyecto,comp.no_componente,acc.no_accion ASC;";

	mysql_select_db("siplan2015", $conexion);
	$result = mysql_query($consulta,$conexion) or die (mysql_error());

	$datoretorno = array();
	while($row = mysql_fetch_row($result)){

		$datos = array(
			'id_sector' => $row[0],
			'dependencia' => $row[1],
			'eje' => $row[2],
			'linea' => $row[3],
			'estrategia' => $row[4],
			'num_proyecto' => $row[5],
			'nombre' => $row[6],
			'inversion' => $row[7],
			'ben_h' => $row[8],
			'ben_m' => $row[9],
			'justificacion' => $row[10],
			'cantidad' => $row[11],
			'u_medida' => $row[12],
			'finalidad' => $row[13],
			'funcion' => $row[14],
			'subfuncion' => $row[15],
			'id_componente' => $row[16],
			'num_componente' => $row[17],
			'componente' => $row[18],
			'u_medida_comp' => $row[19],
			'tipo_u_m_comp' => $row[20],
			'comp_eje_ped' => $row[21],
			'comp_linea_ped' => $row[22],
			'comp_estrategia_ped' => $row[23],
			'id_accion' => $row[24],
			'num_accion' => $row[25],
			'accion' => $row[26]
		);
		$datoretorno[]= (array) $datos;

	}
	mysql_close($link);
	return ($datoretorno);
}


function wsC73($ejercicio,$dependencia_recibe){

$siplan_data_conn = mysql_connect("10.221.12.2", "siplan_consulta", "cons.1pl4n.UplA");
//$siplan_data_conn = mysql_connect("localhost", "root", "tr15t4n14");
mysql_select_db("siplan2015", $siplan_data_conn);
mysql_query("SET NAMES utf8");
$oficios = mysql_query("select id_oficio from oficio_aprobacion where estatus_sefin = 0 and tipo = 0",$siplan_data_conn) or die (mysql_error());
$i=0;
while($r_of = mysql_fetch_assoc($oficios)){
    $id_oficio = $r_of['id_oficio'];
    $detalle_oficio = mysql_query("SELECT id_poa02 FROM detalle_oficio WHERE id_oficio = ".$id_oficio,$siplan_data_conn);
    while($d_of = mysql_fetch_assoc($detalle_oficio)){
       $consulta_poa02 = mysql_query("select * from obras where id_obra = ".$d_of["id_poa02"],$siplan_data_conn) or die (mysql_error());
       $r_poa02 = mysql_fetch_assoc($consulta_poa02);
       $consulta_deps = mysql_query("SELECT id_dependencia, id_sector FROM dependencias WHERE id_dependencia = ".$r_poa02["id_dependencia"],$siplan_data_conn)or die (mysql_error);    $r_dep = mysql_fetch_assoc($consulta_deps);
	   $sector = $r_dep['id_sector'];
	   $dependencia = $r_dep['id_dependencia'];
	   unset($r_dep);
        mysql_free_result($consulta_deps);
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

	$eje = $r_edofin["s03c_objeti"];
	$linea = $r_edofin["s04c_progra"];
	$estrategia = $r_edofin["s05c_subpro"];

	unset($r_edofin);
        mysql_free_result($consulta_edosfin);
	$consulta_proyecto = mysql_query("SELECT no_proyecto,nombre FROM proyectos WHERE id_proyecto = ".$r_poa02['id_proyecto'], $siplan_data_conn) or die (mysql_error());

	$r_pro = mysql_fetch_assoc($consulta_proyecto);

	$n_proyecto = $r_pro['no_proyecto'];
	$nombre_proyecto = $r_pro['nombre'];
	$consxdep = $r_poa02['consxdep'];

	unset($r_pro);
        mysql_free_result($consulta_proyecto);

	$descripcion = $r_poa02['descripcion'];





		$ompio = $r_poa02["municipio"];
        $cons_mpio_fin = mysql_query("select id_municipio,id_region from municipios where id_finanzas = ".$ompio,$siplan_data_conn) or die (mysql_error());
        $rmpio = mysql_fetch_assoc($cons_mpio_fin);
        $municipio = $rmpio['id_municipio'];
        $region = $rmpio['id_region'];
        unset($rmpio);
        /*$ompio = mysql_result($cons_mpio_fin,0);
        $cons_mpios = mysql_query("SELECT id_finanzas,id_reg_finanzas from municipios where id_municipio = ".$ompio,$siplan_data_conn)or die (mysql_error());
		$rmpio = mysql_fetch_assoc($cons_mpios);
        $municipio =  $rmpio["id_finanzas"];
		$region = $rmpio["id_reg_finanzas"];
        unset($rmpio);
        */


                mysql_free_result($cons_mpios);

                $oloc = $r_poa02["localidad"];




		$cons_localidades = mysql_query("SELECT id_finanzas,id_marginacion from localidades
		where id_finanzas = ".$r_poa02["localidad"]." AND id_municipio = ".$ompio,$siplan_data_conn) or die (mysql_error());
		$r_loc = mysql_fetch_assoc($cons_localidades);
		$marginacion  = $r_loc["id_marginacion"];

		$finanzas_localidad = $r_loc["id_finanzas"];

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
        mysql_free_result($consulta_poa02);

	$cons_margin = mysql_query("SELECT descripcion from marginacion where id_marginacion = ".$marginacion,$siplan_data_conn) or die ('error linea 171: '.mysql_error());
	$marginacion =  mysql_result($cons_margin,0);
        mysql_free_result($cons_margin);

        if($dependencia_recibe == $dependencia){

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
            "punt"=>0,
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


      }
      unset($id_oficio);
        unset($d_of);

	mysql_free_result($detalle_oficio);



    }
    unset($r_of);
mysql_free_result($oficios);
 mysql_close($siplan_data_conn);


   return($c73);


}

function wsC74($ejercicio,$dependencia){

//$conexion = mysql_connect("localhost", "root", "tr15t4n14");
    $conexion = mysql_connect("10.221.12.2", "siplan_consulta", "cons.1pl4n.UplA");
    mysql_select_db("siplan2015", $conexion);
    mysql_query("SET NAMES utf8");
    $consulta_c74 = mysql_query("call c74($ejercicio,$dependencia)",$conexion)or die ("<span class='rojo'>error en llamada de procedimiento</span>");
    $i = 0;
    while($r_c74 = mysql_fetch_assoc($consulta_c74)){
        $c74[$i]=array(
            "sec"=>$r_c74['sec'],
            "dep"=>$r_c74['dep'],
            "obj"=>$r_c74['obj'],
            "pro"=>$r_c74['pro'],
            "subp"=>$r_c74['subp'],
            "proy"=>$r_c74['proy'],
            "com"=>$r_c74['com'],
            "acc"=>$r_c74['acc'],
            "obra"=>$r_c74['obra'],
            "inversion"=>$r_c74['inversion'],
            "partida"=>$r_c74['partida'],
            "origen"=>$r_c74['origen'],
            "fecha"=>date('d/m/y'),
            "usuario"=>698,
            "campo1"=>"",
            "usr"=>698,
            "campo2"=>""
        );
        $i = $i+1;
    }
    mysql_free_result($consulta_c74);
    mysql_close($conexion);
    return($c74);
}

function wsC75($ejercicio,$dependencia){
  //$conexion = mysql_connect("localhost", "root", "tr15t4n14");
    $conexion = mysql_connect("10.221.12.2", "siplan_consulta", "cons.1pl4n.UplA");
    mysql_select_db("siplan", $conexion);
    mysql_query("SET NAMES utf8");
    $consulta_c75 = mysql_query("call c75($ejercicio,$dependencia)",$conexion)or die ("<span class='rojo'>error en llamada de procedimiento</span>");
    $i = 0;
     while($r_c75 = mysql_fetch_assoc($consulta_c75)){
         $fof = $r_c75['fof'];
         $fca = $r_c75['fca'];
         $c75[$i] = array(
             "sec"=>$r_c75['sec'],
             "dep"=>$r_c75['dep'],
             "obj"=>$r_c75['obj'],
             "pro"=>$r_c75['pro'],
             "subp"=>$r_c75['subp'],
             "proy"=>$r_c75['proy'],
             "com"=>$r_c75['com'],
             "acc"=>$r_c75['acc'],
             "obra"=>$r_c75['obra'],
             "oficio"=>$r_c75['oficio'],
             "inversion"=>$r_c75['inversion'],
             "tipo"=>$r_c75['tipo'],
             "partida"=>$r_c75['partida'],
             "origen"=>$r_c75['origen'],
             "fecha"=>substr($fof,8,2)."/".substr($fof,5,2)."/".substr($fof,2,2),
             "imp_obra"=>$r_c75['imp_obra'],
             "usuario"=>698,
             "fecha_captura"=>substr($fca,8,2)."/".substr($fca,5,2)."/".substr($fca,2,2),
             "usr"=> 698,
             "fecha_captura2"=>substr($fca,8,2)."/".substr($fca,5,2)."/".substr($fca,2,2)
         );

        $i = $i+1;
     }
     mysql_free_result($consulta_c75);
    mysql_close($conexion);
    return($c75);
}

function wsC76($ejercicio,$dependencia){

    //$conexion = mysql_connect("localhost", "root", "tr15t4n14");
    $conexion = mysql_connect("10.221.12.2", "siplan_consulta", "cons.1pl4n.UplA");
    mysql_select_db("siplan2015", $conexion);
   mysql_query("SET NAMES utf8");
    $consulta_c76 = mysql_query("call c76($ejercicio,$dependencia)",$conexion)or die ("<span class='rojo'>error en llamada de procedimiento</span>");
    $i = 0;
     while($r_c76 = mysql_fetch_assoc($consulta_c76)){

         $fof = $r_c76['fecha_oficio'];
         $fca = $r_c76['fecha_captura'];
         $c76[$i] = array(

             "dep"=>$r_c76['dep'],
             "oficio"=>$r_c76['oficio'],
             "tipo"=>$r_c76['tipo'],

             "fecha"=>substr($fof,8,2)."/".substr($fof,5,2)."/".substr($fof,2,2),

             "usuario"=>698,
             "fecha_captura"=>substr($fca,8,2)."/".substr($fca,5,2)."/".substr($fca,2,2),
             "usr"=> 698,
             "fecha_captura2"=>substr($fca,8,2)."/".substr($fca,5,2)."/".substr($fca,2,2)
         );

        $i = $i+1;
     }
     mysql_free_result($consulta_c76);
    mysql_close($conexion);
    return($c76);
}

function wsC77($ejercicio,$dependencia){
    // $conexion = mysql_connect("localhost", "root", "tr15t4n14");
    $conexion = mysql_connect("10.221.12.2", "siplan_consulta", "cons.1pl4n.UplA");
    mysql_select_db("siplan2015", $conexion);
    mysql_query("SET NAMES utf8");
    $consulta_c77 = mysql_query("call c77($ejercicio,$dependencia)",$conexion)or die ("<span class='rojo'>error en llamada de procedimiento</span>");
    $i = 0;
     while($r_c77 = mysql_fetch_assoc($consulta_c77)){

         $fof = $r_c77['fof'];
         $fca = $r_c77['fca'];

         $c77[$i] = array(

             "sec"=>$r_c77['sec'],
             "dep"=>$r_c77['dep'],
             "obj"=>$r_c77['obj'],
             "pro"=>$r_c77['pro'],
             "subp"=>$r_c77['subp'],
             "proy"=>$r_c77['proy'],
             "com"=>$r_c77['com'],
             "acc"=>$r_c77['acc'],
             "consxdep"=>$r_c77['consxdep'],
             "obra"=>$r_c77['obra'],
             "oficio"=>$r_c77['oficio'],
             "tipo"=>$r_c77['tipo'],
             "fecha"=>substr($fof,8,2)."/".substr($fof,5,2)."/".substr($fof,2,2),
             "imp_obra"=>$r_c77['imp_obra'],
             "usuario"=>698,
             "fecha_captura"=>substr($fca,8,2)."/".substr($fca,5,2)."/".substr($fca,2,2),
             "usr"=> 698,
             "fecha_captura2"=>substr($fca,8,2)."/".substr($fca,5,2)."/".substr($fca,2,2)
         );

        $i = $i+1;
     }
     mysql_free_result($consulta_c77);
    mysql_close($conexion);
    return($c77);
}

function wsR($oficio,$respuesta){
    if($respuesta == 1){
       // $conexion = mysql_connect("localhost", "root", "tr15t4n14");
        $conexion = mysql_connect("10.221.12.2", "siplan_consulta", "cons.1pl4n.UplA");
       mysql_select_db("siplan2015", $conexion);
        mysql_query("SET NAMES utf8");
        mysql_query("UPDATE oficio_aprobacion SET estatus_sefin = 1 WHERE no_oficio = '$oficio'",$conexion);
        $response[] = array(
            "oficio"=>$oficio,
            "respuesta"=>"El estatus del oficio se ha actualizado correctamente"
        );
        return($response);
    }
}

/*---------------------------------------------------------------*/
$server->wsdl->addComplexType(
	'wsSiplanStruct',
	'complexType',
	'struct',
	'all',
	'',
	array(
		'id_sector' => array('name'=>'id_sector', 'type'=>'xsd:int'),
		'dependencia' => array('name'=>'dependencia', 'type'=>'xsd:int'),
		'eje' => array('name'=>'eje', 'type'=>'xsd:int'),
		'linea' => array('name'=>'linea', 'type'=>'xsd:int'),
		'estrategia' => array('name'=>'estrategia', 'type'=>'xsd:int'),
		'num_proyecto' => array('name'=>'num_proyecto', 'type'=>'xsd:int'),
		'nombre' => array('name'=>'nombre', 'type'=>'xsd:string'),
		'inversion' => array('name'=>'inversion', 'type'=>'xsd:int'),
		'ben_h' => array('name'=>'ben_h', 'type'=>'xsd:int'),
		'ben_m' => array('name'=>'ben_m', 'type'=>'xsd:int'),
		'justificacion' => array('name'=>'justificacion', 'type'=>'xsd:string'),
		'cantidad' => array('name'=>'cantidad', 'type'=>'xsd:string'),
		'u_medida' => array('name'=>'u_medida', 'type'=>'xsd:string'),
		'finalidad' => array('name'=>'finalidad','type'=>'xsd:int'),
		'funcion' => array('name'=>'funcion', 'type'=>'xsd:int'),
		'subfuncion' => array('name'=>'subfuncion', 'type'=>'xsd:int'),
		'id_componente' => array('name'=>'id_componente', 'type'=>'xsd:int'),
		'num_componente' => array('name'=>'num_componente','type' => 'xsd:int'),
		'componente' => array('name'=>'componente', 'type'=>'xsd:string'),
		'u_medida_comp' => array('name'=>'u_medida_comp', 'type'=>'xsd:int'),
		'tipo_u_m_comp' => array('name'=>'tipo_u_m_comp', 'type'=>'xsd:int'),
		'comp_eje_ped' => array('name'=>'comp_eje_ped', 'type'=>'xsd:int'),
		'comp_linea_ped' => array('name'=>'comp_linea_ped', 'type'=>'xsd:int'),
		'comp_estrategia_ped' => array('name'=>'comp_estrategia_ped', 'type'=>'xsd:int'),
		'id_accion' => array('name'=>'id_accion','type'=>'xsd:int'),
		'num_accion' => array('name'=>'num_accion','type' => 'xsd:int'),
		'accion' => array('name'=>'accion', 'type'=>'xsd:string')

		)
	);

$server->wsdl->addComplexType(
	'siplan_responde',
	'complexType',
	'array',
	'',
	'SOAP-ENC:Array',
	array(),
	array( array('ref'=>'SOAP-ENC:arrayType','wsdl:arrayType'=>'tns:wsSiplanStruct[]')),'tns:wsSiplanStruct');

$server->register('wsSiplan',
	array('ejercicio' => 'xsd:int','dependencia' => 'xsd:int','proyecto' => 'xsd:int'),
	array('return' => 'tns:siplan_responde'), $ns ,
'',
'',
'rpc',
'encoded',
'Regresa listado siplan' );
/*----------------------------------------------------------------------------*/



/*-------------------------------------- Registro de C73-----*/
$server->wsdl->addComplexType(
	'wsC73Struct',
	'complexType',
	'struct',
	'all',
	'',
	array(
		'sec' => array('name'=>'sec', 'type'=>'xsd:int'),
		'dep' => array('name'=>'dep', 'type'=>'xsd:int'),

                'obj' => array('name'=>'obj', 'type'=>'xsd:int'),
		'pro' => array('name'=>'pro', 'type'=>'xsd:int'),

            'subpro' => array('name'=>'subpro', 'type'=>'xsd:int'),


                'proyecto' => array('name'=>'proyecto', 'type'=>'xsd:int'),
		'com' => array('name'=>'com', 'type'=>'xsd:int'),
		'acc' => array('name'=>'acc', 'type'=>'xsd:int'),
		'obra' => array('name'=>'obra', 'type'=>'xsd:int'),
		'upla' => array('name'=>'upla', 'type'=>'xsd:string'),
		'int' => array('name'=>'int', 'type'=>'xsd:int'),

		'desproy' => array('name'=>'desproy', 'type'=>'xsd:string'),
		'desobra' => array('name'=>'desobra', 'type'=>'xsd:string'),

		'mun' => array('name'=>'mun','type'=>'xsd:int'),
		'loc' => array('name'=>'loc', 'type'=>'xsd:int'),
		'annioI' => array('name'=>'annioI', 'type'=>'xsd:int'),
		'mesI' => array('name'=>'mesI', 'type'=>'xsd:int'),
		'annioF' => array('name'=>'annioF','type' => 'xsd:int'),
		'mesF' => array('name'=>'mesF', 'type'=>'xsd:int'),
		'mod' => array('name'=>'mod', 'type'=>'xsd:int'),
		'ret' => array('name'=>'ret', 'type'=>'xsd:int'),
		'pro_poa' => array('name'=>'pro_poa', 'type'=>'xsd:int'),
		'subpro_poa' => array('name'=>'subpro_poa', 'type'=>'xsd:int'),
		'uni' => array('name'=>'uni', 'type'=>'xsd:int'),
		'oficio' => array('name'=>'oficio','type'=>'xsd:int'),
		'cantidad' => array('name'=>'cantidad','type' => 'xsd:string'),
                'hombres' => array('name'=>'hombres', 'type'=>'xsd:int'),
            'mujeres' => array('name'=>'mujeres', 'type'=>'xsd:int'),
            'punt' => array('name'=>'punt', 'type'=>'xsd:int'),
            'prior' => array('name'=>'prior', 'type'=>'xsd:int'),
            'region' => array('name'=>'region', 'type'=>'xsd:int'),
            'marginalidad' => array('name'=>'marginalidad', 'type'=>'xsd:string'),
            'aprob'=> array('name'=>'aprob', 'type'=>'xsd:int'),
            'ofasig' => array('name'=>'ofasig', 'type'=>'xsd:int'),
            'fecha' => array('name'=>'fecha', 'type'=>'xsd:string'),
            'idproy' => array('name'=>'idproy', 'type'=>'xsd:int'),
            'usuario' => array('name'=>'usuario', 'type'=>'xsd:int'),
            'fecha1' => array('name'=>'fecha1', 'type'=>'xsd:string'),
            'usr' => array('name'=>'usr', 'type'=>'xsd:int'),
            'fecha2' => array('name'=>'fecha2', 'type'=>'xsd:string')

		)
	);

$server->wsdl->addComplexType(
	'siplan_oficiosC73',
	'complexType',
	'array',
	'',
	'SOAP-ENC:Array',
	array(),
	array( array('ref'=>'SOAP-ENC:arrayType','wsdl:arrayType'=>'tns:wsC73Struct[]')),'tns:wsC73Struct');

$server->register('wsC73',
	array('ejercicio' => 'xsd:int','dependencia' => 'xsd:int'),
	array('return' => 'tns:siplan_oficiosC73'), $ns ,
'',
'',
'rpc',
'encoded',
'Regresa oficios c73' );

/*--------------------------------------------------------------------------*/


/*-------------------------------------- Registro de C74-----*/
$server->wsdl->addComplexType(
	'wsC74Struct',
	'complexType',
	'struct',
	'all',
	'',
	array(
		'sec' => array('name'=>'sec', 'type'=>'xsd:int'),
		'dep' => array('name'=>'dep', 'type'=>'xsd:int'),
		'obj' => array('name'=>'obj', 'type'=>'xsd:int'),
		'pro' => array('name'=>'pro', 'type'=>'xsd:int'),
		'subp' => array('name'=>'subp', 'type'=>'xsd:int'),
		'proy' => array('name'=>'proy', 'type'=>'xsd:int'),
		'com' => array('name'=>'com', 'type'=>'xsd:int'),
		'acc' => array('name'=>'acc', 'type'=>'xsd:int'),
		'obra' => array('name'=>'obra', 'type'=>'xsd:int'),
                'inversion' => array('name'=>'inversion', 'type'=>'xsd:string'),
                'partida' => array('name'=>'partida', 'type'=>'xsd:int'),
                'origen' => array('name'=>'origen', 'type'=>'xsd:int'),
            'fecha' => array('name'=>'fecha', 'type'=>'xsd:string'),
            'usuario' => array('name'=>'usuario', 'type'=>'xsd:int'),
            'campo1' => array('name'=>'campo1', 'type'=>'xsd:string'),
            'usr' => array('name'=>'usr', 'type'=>'xsd:int'),
            'campo2' => array('name'=>'campo2', 'type'=>'xsd:string')

		)
	);

$server->wsdl->addComplexType(
	'siplan_oficiosC74',
	'complexType',
	'array',
	'',
	'SOAP-ENC:Array',
	array(),
	array( array('ref'=>'SOAP-ENC:arrayType','wsdl:arrayType'=>'tns:wsC74Struct[]')),'tns:wsC74Struct');

$server->register('wsC74',
	array('ejercicio' => 'xsd:int','dependencia' => 'xsd:int'),
	array('return' => 'tns:siplan_oficiosC74'), $ns ,
'',
'',
'rpc',
'encoded',
'Regresa oficios c74' );

/*--------------------------------------------------------------------------*/


/*-------------------------------------- Registro de C75-----*/
$server->wsdl->addComplexType(
	'wsC75Struct',
	'complexType',
	'struct',
	'all',
	'',
	array(
		'sec' => array('name'=>'sec', 'type'=>'xsd:int'),
		'dep' => array('name'=>'dep', 'type'=>'xsd:int'),
		'obj' => array('name'=>'obj', 'type'=>'xsd:int'),
		'pro' => array('name'=>'pro', 'type'=>'xsd:int'),
		'subp' => array('name'=>'subp', 'type'=>'xsd:int'),
		'proy' => array('name'=>'proy', 'type'=>'xsd:int'),
		'com' => array('name'=>'com', 'type'=>'xsd:int'),
		'acc' => array('name'=>'acc', 'type'=>'xsd:int'),
		'obra' => array('name'=>'obra', 'type'=>'xsd:int'),
		'oficio' => array('name'=>'oficio', 'type'=>'xsd:string'),
		'inversion' => array('name'=>'inversion', 'type'=>'xsd:string'),
		'tipo' => array('name'=>'tipo', 'type'=>'xsd:int'),
		'partida' => array('name'=>'partida', 'type'=>'xsd:int'),
		'origen' => array('name'=>'origen','type'=>'xsd:int'),
		'fecha' => array('name'=>'fecha', 'type'=>'xsd:string'),
		'imp_obra' => array('name'=>'imp_obra', 'type'=>'xsd:string'),
		'usuario' => array('name'=>'usuario', 'type'=>'xsd:int'),
		'fecha_captura' => array('name'=>'fecha_captura','type' => 'xsd:string'),
		'usr' => array('name'=>'usr', 'type'=>'xsd:int'),
		'fecha_captura2' => array('name'=>'fecha_captura2', 'type'=>'xsd:string')
		)
	);

$server->wsdl->addComplexType(
	'siplan_oficiosC75',
	'complexType',
	'array',
	'',
	'SOAP-ENC:Array',
	array(),
	array( array('ref'=>'SOAP-ENC:arrayType','wsdl:arrayType'=>'tns:wsC75Struct[]')),'tns:wsC75Struct');

$server->register('wsC75',
	array('ejercicio' => 'xsd:int','dependencia' => 'xsd:int'),
	array('return' => 'tns:siplan_oficiosC75'), $ns ,
'',
'',
'rpc',
'encoded',
'Regresa oficios c75' );

/*--------------------------------------------------------------------------*/


/*-------------------------------------- Registro de C76-----*/
$server->wsdl->addComplexType(
	'wsC76Struct',
	'complexType',
	'struct',
	'all',
	'',
	array(

                'dep' => array('name'=>'dep', 'type'=>'xsd:int'),
		'oficio' => array('name'=>'oficio', 'type'=>'xsd:string'),
		'tipo' => array('name'=>'tipo', 'type'=>'xsd:int'),
		'fecha' => array('name'=>'fecha', 'type'=>'xsd:string'),
		'usuario' => array('name'=>'usuario', 'type'=>'xsd:int'),
		'fecha_captura' => array('fecha_captura'=>'com', 'type'=>'xsd:string'),
		'usr' => array('name'=>'acc', 'type'=>'xsd:int'),
		'fecha_captura2' => array('name'=>'obra', 'type'=>'xsd:string')

            		)
	);

$server->wsdl->addComplexType(
	'siplan_oficiosC76',
	'complexType',
	'array',
	'',
	'SOAP-ENC:Array',
	array(),
	array( array('ref'=>'SOAP-ENC:arrayType','wsdl:arrayType'=>'tns:wsC76Struct[]')),'tns:wsC76Struct');

$server->register('wsC76',
	array('ejercicio' => 'xsd:int','dependencia' => 'xsd:int'),
	array('return' => 'tns:siplan_oficiosC76'), $ns ,
'',
'',
'rpc',
'encoded',
'Regresa oficios c76' );

/*--------------------------------------------------------------------------*/

/*-------------------------------------- Registro de C77-----*/
$server->wsdl->addComplexType(
	'wsC77Struct',
	'complexType',
	'struct',
	'all',
	'',
	array(

                'sec' => array('name'=>'sec', 'type'=>'xsd:int'),
                'dep' => array('name'=>'dep', 'type'=>'xsd:int'),
            'obj' => array('name'=>'obj', 'type'=>'xsd:int'),
            'pro' => array('name'=>'pro', 'type'=>'xsd:int'),
            'subp' => array('name'=>'subp', 'type'=>'xsd:int'),
            'proy' => array('name'=>'proy', 'type'=>'xsd:int'),
            'com' => array('name'=>'com', 'type'=>'xsd:int'),
            'acc' => array('name'=>'acc', 'type'=>'xsd:int'),
            'consxdep' => array('name'=>'consxdep', 'type'=>'xsd:int'),
            'obra' => array('name'=>'obra', 'type'=>'xsd:string'),
		'oficio' => array('name'=>'oficio', 'type'=>'xsd:string'),
		'tipo' => array('name'=>'tipo', 'type'=>'xsd:int'),
		'fecha' => array('name'=>'fecha', 'type'=>'xsd:string'),
	'imp_obra' => array('name'=>'imp_obra', 'type'=>'xsd:string'),
            'usuario' => array('name'=>'usuario', 'type'=>'xsd:int'),
		'fecha_captura' => array('fecha_captura'=>'com', 'type'=>'xsd:string'),
		'usr' => array('name'=>'acc', 'type'=>'xsd:int'),
		'fecha_captura2' => array('name'=>'obra', 'type'=>'xsd:string')

            		)
	);

$server->wsdl->addComplexType(
	'siplan_oficiosC77',
	'complexType',
	'array',
	'',
	'SOAP-ENC:Array',
	array(),
	array( array('ref'=>'SOAP-ENC:arrayType','wsdl:arrayType'=>'tns:wsC77Struct[]')),'tns:wsC77Struct');

$server->register('wsC77',
	array('ejercicio' => 'xsd:int','dependencia' => 'xsd:int'),
	array('return' => 'tns:siplan_oficiosC77'), $ns ,
'',
'',
'rpc',
'encoded',
'Regresa oficios c77' );

/*--------------------------------------------------------------------------*/

/*-------------------------------------- Respuesta----*/
$server->wsdl->addComplexType(
	'wsRStruct',
	'complexType',
	'struct',
	'all',
	'',
	array(

                'oficio' => array('name'=>'oficio', 'type'=>'xsd:string'),
                'respuesta' => array('name'=>'respuesta', 'type'=>'xsd:string')

            		)
	);

$server->wsdl->addComplexType(
	'siplan_oficiosR',
	'complexType',
	'array',
	'',
	'SOAP-ENC:Array',
	array(),
	array( array('ref'=>'SOAP-ENC:arrayType','wsdl:arrayType'=>'tns:wsRStruct[]')),'tns:wsRStruct');

$server->register('wsR',
	array('oficio' => 'xsd:string','respuesta' => 'xsd:int'),
	array('return' => 'tns:siplan_oficiosR'), $ns ,
'',
'',
'rpc',
'encoded',
'Regresa Respuesta_oficio' );

/*--------------------------------------------------------------------------*/




$HTTP_RAW_POST_DATA = isset($HTTP_RAW_POST_DATA) ? $HTTP_RAW_POST_DATA : '';
$server->service($HTTP_RAW_POST_DATA);

?>
