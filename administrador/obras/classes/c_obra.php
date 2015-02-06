<?php session_start();
date_default_timezone_set('America/Mexico_City');
require_once("seguridad/deniedacces.php");
//include("seguridad/siplan_connection_db.php");
require_once("seguridad/logout.php");
class obras{

function aprobar_obra_upla($id_obra){

		$id_dependencia = $_SESSION['id_dependencia_v3'];

$res_obra=mysql_query("update obras set status_obra='3' where id_obra=".$id_obra." and id_dependencia=".$id_dependencia ) or die (mysql_error());



$fecha = date("d-m-Y");
$hora = date("H:i");
$ipadd = $_SERVER['REMOTE_ADDR'];
$iduser = $_SESSION['id_usuario_v3'];
$eventi = "aprobo obra upla  id_obra= ".$id_obra." dependencia=".$id_dependencia;
			    mysql_query("INSERT into historial (id_usuario,fecha,hora,evento,ipaddress) VALUES ('$iduser','$fecha','$hora','$eventi','$ipadd')")or die(mysql_error());

if ($res_obra){
return ("1");
}else
{
return ("0");
}



}


function borrar_recurso($id_obra,$d,$p){

$id_dependencia = $_SESSION['id_dependencia_v3'];

$res_obra=mysql_query("delete from poa02_origen where id_obra_origen=".$id_obra ) or die (mysql_error());


$fecha = date("d-m-Y");
$hora = date("H:i");
$ipadd = $_SERVER['REMOTE_ADDR'];
$iduser = $_SESSION['id_usuario_v3'];
$eventi = "borro poa02_origen id_obra_origen= ".$id_obra;
			    mysql_query("INSERT into historial (id_usuario,fecha,hora,evento,ipaddress) VALUES ('$iduser','$fecha','$hora','$eventi','$ipadd')")or die(mysql_error());

if ($res_obra){
 return ("1-".$d."-".$p);
}else
{
 return ("0-".$d."-".$p);
}


}


function guardar_origen_recurso($proycompacc,$partida,$origen,$monto,$idobra,$proy){
$id_dependencia = $_SESSION['id_dependencia_v3'];
    $id = $proycompacc;
	$dat = explode("-", $id);
//	echo $dat[0]."-".$dat[1]." ".$dat[2]." ".$dat[3];
//	exit();
	$proycompacc1 = $dat[1];
	$proycompacc2 = $dat[2];
	$proycompacc3 = $dat[3];

	$id1 = $partida;
	$dat1 = explode("-", $id1);
	$partida1 = $dat1[1];
	$monto=limpiar($monto);
	$ttipo=$_POST['tpmv'];
	if($ttipo==""){
	$ttipo=0;
	}




	if ($ttipo==0){ //ejecucion


 if ($proycompacc3>0){

				$consulta_datos = mysql_query("SELECT * FROM poa02_origen where id_obra = '$idobra'") or die (mysql_error());
				$res_datos = mysql_fetch_array($consulta_datos);
				$cons_num_datos=mysql_num_rows($consulta_datos);
				if($cons_num_datos!=0 and $res_datos['s25c_accion']>0){
				if ($proycompacc3!=$res_datos['s25c_accion'] or $proycompacc2!=$res_datos['s11c_compon'])
				{

				 return ("3-".$idobra."-".$proy);

			//	echo "alert('No es posible asignar la obra');";

				}
				}

		        $consulta_datos = mysql_query("SELECT * FROM poa02_origen") or die (mysql_error());
				$cons_num_datos = mysql_num_rows($consulta_datos);
				while($res_datos = mysql_fetch_array($consulta_datos)){


				//echo $proycompacc3."==".$res_datos['s25c_accion']." and ".$proycompacc2."==".$res_datos['s11c_compon']." and ".$proycompacc1."==".$res_datos['s06c_proyec']." and ".$origen."==".$res_datos['s08c_origen']." and "."par".$partida1."==".$res_datos['s07c_partid']." and ".$res_datos['id_obra']."==".$idobra."</bR>";

				if 	($proycompacc3==$res_datos['s25c_accion'] and $proycompacc2==$res_datos['s11c_compon'] and $proycompacc1==$res_datos['s06c_proyec'] and $origen==$res_datos['s08c_origen'] and $partida1==$res_datos['s07c_partid'] and $res_datos['id_obra']==$idobra and $res_datos['tipo']==$ttipo){		 //verificando
			//	echo "if( accion[2]==".$res_datos['s25c_accion']." && accion[1]==".$res_datos['s11c_compon']." && accion[0]==".$res_datos['s06c_proyec']."&& ori[0]==" .$res_datos['s08c_origen']."&& part[0]==" .$res_datos['s07c_partid']."&& ".$res_datos['id_poa02']."==" .$res_obras['obra']."){";

 return ("4-".$idobra."-".$proy);

				//echo "alert('La partida y el origen de ese monto ya esta asignado a la obra');";


						}

						}


				}


			else if ($proycompacc2>0){

				$consulta_datos = mysql_query("SELECT * FROM poa02_origen where id_obra = '$idobra'") or die (mysql_error());
				$res_datos = mysql_fetch_array($consulta_datos);
				$cons_num_datos=mysql_num_rows($consulta_datos);
				if($cons_num_datos!=0 and $res_datos['s11c_compon']>0){
					if ($proycompacc2!=$res_datos['s11c_compon'] or 0!=$res_datos['s25c_accion']){
					 return ("5-".$idobra."-".$proy);

					//echo "alert('No es posible tener una obra en dos componentes');";


				}
				}

				$consulta_datos = mysql_query("SELECT * FROM poa02_origen") or die (mysql_error());
				$cons_num_datos = mysql_num_rows($consulta_datos);
				while($res_datos = mysql_fetch_array($consulta_datos)){
					if ($proycompacc2==$res_datos['s11c_compon'] and $proycompacc1==$res_datos['s06c_proyec'] and $res_datos['s11c_compon']==0){
					 return ("6-".$idobra."-".$proy);

					//echo "alert('Este componente ya esta asignada a la obra');";


				}
				}
				}


/*----------- se revisa que no exista ya la partida y origen para esa obra -------------------*/
    $consulta_montos_anteriores = "SELECT * FROM poa02_origen WHERE id_obra = '$idobra' AND s08c_origen = '$origen' AND s07c_partid = '$partida1' AND s06c_proyec = '$proycompacc1' AND s11c_compon = '$proycompacc2' AND s25c_accion = '$proycompacc3'";
    $ejecuta_montos_anteriores = mysql_query($consulta_montos_anteriores)or die(mysql_error());

	if(mysql_num_rows($ejecuta_montos_anteriores)==0){

    	$consulta_estado_finaciero = "SELECT * FROM estados_financieros WHERE s02c_depend = '$id_dependencia' AND s06c_proyec = '$proycompacc1' AND s11c_compon = '$proycompacc2' AND s25c_accion= '$proycompacc3' AND s07c_partid = '$partida1' AND s08c_origen = '$origen' ";
        $ejecuta_consulta_fin = mysql_query($consulta_estado_finaciero) or die (mysql_error());
		$res_edo_fin = mysql_fetch_array($ejecuta_consulta_fin);
		$pres_edo_fin = $res_edo_fin['d02p_preasi']+$res_edo_fin['d02p_acuamp']+$res_edo_fin['d02p_acutam']-$res_edo_fin['d02p_acured']-$res_edo_fin['d02p_acutre'];
		/*------------ consultamos el dinero gastado en otras obras del mismo proyecto que utilizan el mismo origen y partida ------*/
		 $consulta_montos_utilizados = "SELECT * FROM poa02_origen WHERE s08c_origen = '$origen' AND s07c_partid = '$partida1' AND s06c_proyec = '$proycompacc1' AND s11c_compon = '$proycompacc2' AND s25c_accion = '$proycompacc3' AND id_proyecto = '$proy'";
		 $ejecuta_montos_utilizados = mysql_query($consulta_montos_utilizados)or die (mysql_error());
		 $monto_utilizado = 0;
		 while($res_montos_utilizados = mysql_fetch_array($ejecuta_montos_utilizados)){
		 	$monto_utilizado = $monto_utilizado + $res_montos_utilizados['monto'];
		 	}

//	 var_dump($monto_utilizado);
		 $presupuesto =  $pres_edo_fin - $monto_utilizado;
//		 var_dump($presupuesto);
		 if($monto>$presupuesto){
		 return ("1-".$idobra."-".$proy);

    //	alert(\"No se tiene presupuesto suficiente para la obra.\");
   // 	location.href='../main.php?token=2c463dfdde588f3bfc60d53118c10d6b&obra=$num_obra&idproyecto=$no_proyecto';

		 }else{
		 //	echo "INSERT INTO poa02_origen VALUES ('','','$proy','$origen','$partida1','$monto','$proycompacc1','$proycompacc2',$proycompacc3,'',$idobra";

            $obras = mysql_query ("SELECT *  FROM obras WHERE id_obra =".$idobra) or die (mysql_error());
$num_obras = mysql_fetch_array($obras);

$cveobra=$num_obras['obra'];


			mysql_query("INSERT INTO poa02_origen VALUES ('','$cveobra','$proy','$origen','$partida1','$monto','$proycompacc3','$proycompacc2',$proycompacc1,$ttipo,$idobra,'0',1)")or die(mysql_error());

             $fecha = date("d-m-Y");
$hora = date("H:i");
$ipadd = $_SERVER['REMOTE_ADDR'];
$iduser = $_SESSION['id_usuario_v3'];
$eventi = "agrego poa02_origen id_obra_origen= ".$idobra." tipo=".$ttipo;
			    mysql_query("INSERT into historial (id_usuario,fecha,hora,evento,ipaddress) VALUES ('$iduser','$fecha','$hora','$eventi','$ipadd')")or die(mysql_error());


		 return ("0-".$idobra."-".$proy);
		 }

    } else{
	 return ("2-".$idobra."-".$proy);

   // 	alert(\"La partida y el origen de ese monto ya esta asignado\");
   // 	location.href='../main.php?token=2c463dfdde588f3bfc60d53118c10d6b&obra=$num_obra&idproyecto=$no_proyecto';

    }


	} //ejecucion



	if ($ttipo==2){   //canceclacion
	$existe=0;
					/*
					 * Verifica que la partida y el origen hallan sido previamente asignados a la obra
					 */
					$consulta_datos = mysql_query("SELECT * FROM poa02_origen") or die (mysql_error());
					 $cons_num_datos = mysql_num_rows($consulta_datos);

					while($res_datos = mysql_fetch_array($consulta_datos)){


						//echo "hola".$res_datos['id_obra_origen'];
					//	echo "uno---".$proycompacc3."==".$res_datos['s25c_accion']."and".$proycompacc2."==".$res_datos['s11c_compon']." and".$proycompacc1."==".$res_datos['s06c_proyec']."and".$origen."==".$res_datos['s08c_origen']."and".$partida1."==".$res_datos['s07c_partid']."and".$res_datos['id_obra']==$idobra;

			if( $proycompacc3==$res_datos['s25c_accion'] and $proycompacc2==$res_datos['s11c_compon'] and $proycompacc1==$res_datos['s06c_proyec'] and $origen==$res_datos['s08c_origen'] and $partida1==$res_datos['s07c_partid'] and $res_datos['id_obra']==$idobra){
				//		echo "<pre>";
	//var_dump($res_datos);
	//echo "</pre>";
			//	echo $proycompacc3."==".$res_datos['s25c_accion']."and".$proycompacc2."==".$res_datos['s11c_compon']." and".$proycompacc1."==".$res_datos['s06c_proyec']."and".$origen."==".$res_datos['s08c_origen']."and".$partida1."==".$res_datos['s07c_partid']."and".$res_datos['id_obra']==$idobra;
				//	exit();
					$existe=1;
					}//else{$existe=false;

				//	echo "aaa".$proycompacc3."==".$res_datos['s25c_accion']."and".$proycompacc2."==".$res_datos['s11c_compon']." and".$proycompacc1."==".$res_datos['s06c_proyec']."and".$origen."==".$res_datos['s08c_origen']."and".$partida1."==".$res_datos['s07c_partid']."and".$res_datos['id_obra']==$idobra;
				//	exit();

					 }





				if($existe==0){

					 return ("7-".$idobra."-".$proy);
				//	alert('Para realizar la cancelacion es necesario tener un monto previamente asignado de la misma partida, origen, proyecto, componente y accion.');
					}
			//	}


			/* if ($proycompacc2>0){

				$consulta_datos = mysql_query("SELECT * FROM poa02_origen where id_obra = '$idobra'") or die (mysql_error());
				$res_datos = mysql_fetch_array($consulta_datos);
				$cons_num_datos=mysql_num_rows($consulta_datos);
				if($cons_num_datos!=0 and $res_datos['s11c_compon']>0){
					if ($proycompacc2!=$res_datos['s11c_compon'] or 0!=$res_datos['s25c_accion']){
					//	echo "aqui va";
					//exit();
					 return ("5-".$idobra."-".$proy);
				/*	echo "<script>";
					echo "alert('No es posible tener una obra en dos componentes');";
					echo "</script>";
				exit();	*/
			/*	}
				}


				$consulta_datos = mysql_query("SELECT * FROM poa02_origen") or die (mysql_error());
				$cons_num_datos = mysql_num_rows($consulta_datos);
				while($res_datos = mysql_fetch_array($consulta_datos)){
					if ($proycompacc2==$res_datos['s11c_compon'] and $proycompacc1==$res_datos['s06c_proyec'] and $res_datos['s11c_compon']==0){
					 return ("6-".$idobra."-".$proy);
					/*echo "<script>";
					echo "alert('Este componente ya esta asignada a la obra');";
					echo "</script>";
					exit();	*/
			/*	}
				}
				}*/






		}  //cancelacion



 if ($ttipo==1){	//ampliacion


  if ($proycompacc3>0){

				$consulta_datos = mysql_query("SELECT * FROM poa02_origen where id_obra = '$idobra'") or die (mysql_error());
				$res_datos = mysql_fetch_array($consulta_datos);
				$cons_num_datos=mysql_num_rows($consulta_datos);
				if($cons_num_datos!=0 and $res_datos['s25c_accion']>0){
				if ($proycompacc3!=$res_datos['s25c_accion'] or $proycompacc2!=$res_datos['s11c_compon'])
				{ return ("3-".$idobra."-".$proy);
			//	echo "alert('No es posible asignar la obra');";
            	}
				}


					}

	/* if ($proycompacc2>0){

				$consulta_datos = mysql_query("SELECT * FROM poa02_origen where id_obra = '$idobra'") or die (mysql_error());
				$res_datos = mysql_fetch_array($consulta_datos);
				$cons_num_datos=mysql_num_rows($consulta_datos);
				if($cons_num_datos!=0 and $res_datos['s11c_compon']>0){
				if ($proycompacc2!=$res_datos['s11c_compon'] or 0!=$res_datos['s25c_accion']){
					 return ("5-".$idobra."-".$proy);
			 //echo "alert('No es posible tener una obra en dos componentes');";
				}
				}
						}*/








    	$consulta_estado_finaciero = "SELECT * FROM estados_financieros WHERE s02c_depend = '$id_dependencia' AND s06c_proyec = '$proycompacc1' AND s11c_compon = '$proycompacc2' AND s25c_accion= '$proycompacc3' AND s07c_partid = '$partida1' AND s08c_origen = '$origen' ";
        $ejecuta_consulta_fin = mysql_query($consulta_estado_finaciero) or die (mysql_error());
		$res_edo_fin = mysql_fetch_array($ejecuta_consulta_fin);
		$pres_edo_fin = $res_edo_fin['d02p_preasi']+$res_edo_fin['d02p_acuamp']+$res_edo_fin['d02p_acutam']-$res_edo_fin['d02p_acured']-$res_edo_fin['d02p_acutre'];

/*------------ consultamos el dinero gastado en otras obras del mismo proyecto que utilizan el mismo origen y partida ------*/
		 $consulta_montos_utilizados = "SELECT * FROM poa02_origen WHERE s08c_origen = '$origen' AND s07c_partid = '$partida1' AND s06c_proyec = '$proycompacc1' AND s11c_compon = '$proycompacc2' AND s25c_accion = '$proycompacc3' AND id_proyecto = '$proy' AND tipo IN (0,1)";
		 $ejecuta_montos_utilizados = mysql_query($consulta_montos_utilizados)or die (mysql_error());
		 $monto_utilizado = 0;
		 while($res_montos_utilizados = mysql_fetch_array($ejecuta_montos_utilizados)){
		 	$monto_utilizado = $monto_utilizado + $res_montos_utilizados['monto'];
	 	 }

	 	 /*------------ consultamos el dinero CANCELADO en las obras del mismo proyecto que utilizan el mismo origen y partida ------*/
		 $consulta_montos_utilizados = "SELECT * FROM poa02_origen WHERE s08c_origen = '$origen' AND s07c_partid = '$partida1' AND s06c_proyec = '$proycompacc1' AND s11c_compon = '$proycompacc2' AND s25c_accion = '$proycompacc3' AND id_proyecto = '$proy' AND tipo = 2";
		 $ejecuta_montos_utilizados = mysql_query($consulta_montos_utilizados)or die (mysql_error());
		 while($res_montos_utilizados = mysql_fetch_array($ejecuta_montos_utilizados)){
		 	$monto_utilizado = $monto_utilizado - $res_montos_utilizados['monto'];
	 	 }

		 //var_dump($monto_utilizado);
		 $presupuesto =  $pres_edo_fin - $monto_utilizado;

	/*	 echo "llego12| ".$monto."-|-".$presupuesto."-|-".$movimiento;
	echo $ttipo;
	exit();*/
		 //var_dump($presupuesto);
		 if($monto>$presupuesto && $ttipo!=2){
			  return ("1-".$idobra."-".$proy);


    //	alert(\"No se tiene presupuesto suficiente para la obra.\");

		 }else{

		  $obras = mysql_query ("SELECT *  FROM obras WHERE id_obra =".$idobra) or die (mysql_error());
$num_obras = mysql_fetch_array($obras);

$cveobra=$num_obras['obra'];


			mysql_query("INSERT INTO poa02_origen VALUES ('','$cveobra','$proy','$origen','$partida1','$monto','$proycompacc3','$proycompacc2',$proycompacc1,$ttipo,$idobra,'0',1)")or die(mysql_error());

             $fecha = date("d-m-Y");
$hora = date("H:i");
$ipadd = $_SERVER['REMOTE_ADDR'];
$iduser = $_SESSION['id_usuario_v3'];
$eventi = "agrego poa02_origen id_obra_origen= ".$idobra." tipo=".$ttipo;
			    mysql_query("INSERT into historial (id_usuario,fecha,hora,evento,ipaddress) VALUES ('$iduser','$fecha','$hora','$eventi','$ipadd')")or die(mysql_error());


		 return ("0-".$idobra."-".$proy);



	//	mysql_query("INSERT INTO poa02_origen (id_poa02,id_proyecto,s08c_origen,s07c_partid,monto,s06c_proyec,s11c_compon,s25c_accion,tipo) VALUES ('$id_obra','$proy','$origen','$partida1','$monto','$proycompacc1','$proycompacc2','$proycompacc3','$ttipo')")or die(mysql_error());



		 }
	}
	else{


	     /*------------ consultamos el dinero gastado en esa obra que utilizan el mismo origen y partida ------*/
		  $consulta_montos_utilizados = "SELECT * FROM poa02_origen WHERE id_obra = '$idobra' AND s08c_origen = '$origen' AND s07c_partid = '$partida1' AND s06c_proyec = '$proycompacc1' AND s11c_compon = '$proycompacc2' AND s25c_accion = '$proycompacc3' AND id_proyecto = '$proy' AND tipo IN (0,1)";
		 $ejecuta_montos_utilizados = mysql_query($consulta_montos_utilizados) or die (mysql_error());
		 $monto_utilizado = 0;
		 while($res_montos_utilizados = mysql_fetch_array($ejecuta_montos_utilizados)){
		 	$monto_utilizado = $monto_utilizado + $res_montos_utilizados['monto'];
	 	 }



	 	 /*------------ consultamos el dinero CANCELADO en esa obra que utilizan el mismo origen y partida ------*/
		 $consulta_montos_utilizados = "SELECT * FROM poa02_origen WHERE id_obra = '$idobra' AND s08c_origen = '$origen' AND s07c_partid = '$partida1' AND s06c_proyec = '$proycompacc1' AND s11c_compon = '$proycompacc2' AND s25c_accion = '$proycompacc3' AND id_proyecto = '$proy' AND tipo = 2";
		 $ejecuta_montos_utilizados = mysql_query($consulta_montos_utilizados)or die (mysql_error());
		 while($res_montos_utilizados = mysql_fetch_array($ejecuta_montos_utilizados)){
		 	$monto_utilizado = $monto_utilizado - $res_montos_utilizados['monto'];
	 	 }


	 	 if($monto>$monto_utilizado){
			  return ("8-".$idobra."-".$proy);

    		//	alert(\"El monto de la cancelacion excede el monto acumulado.\");

		 }else{


 $obras = mysql_query ("SELECT *  FROM obras WHERE id_obra =".$idobra) or die (mysql_error());
$num_obras = mysql_fetch_array($obras);

$cveobra=$num_obras['obra'];


			mysql_query("INSERT INTO poa02_origen VALUES ('','$cveobra','$proy','$origen','$partida1','$monto','$proycompacc3','$proycompacc2',$proycompacc1,$ttipo,$idobra,'0',1)")or die(mysql_error());

             $fecha = date("d-m-Y");
$hora = date("H:i");
$ipadd = $_SERVER['REMOTE_ADDR'];
$iduser = $_SESSION['id_usuario_v3'];
$eventi = "agrego poa02_origen id_obra_origen= ".$idobra." tipo=".$ttipo;
			    mysql_query("INSERT into historial (id_usuario,fecha,hora,evento,ipaddress) VALUES ('$iduser','$fecha','$hora','$eventi','$ipadd')")or die(mysql_error());


		 return ("0-".$idobra."-".$proy);

	//	mysql_query("INSERT INTO poa02_origen (id_poa02,id_proyecto,s08c_origen,s07c_partid,monto,s06c_proyec,s11c_compon,s25c_accion,tipo) VALUES ('$idobra','$proy','$origen','$partida1','$monto','$proycompacc1','$proycompacc2','$proycompacc3','$ttipo')")or die(mysql_error());
		 }
	} //ampliacion









}

function guardar_obra($proy,$com,$org,$mun,$loc,$mod, $ret, $med, $cant, $fini, $ffin, $desc, $prog, $subp, $fed, $est, $munp, $part, $cred, $otr, $benh, $benm,$prg, $otrprg ){

$id_dependencia = $_SESSION['id_dependencia_v3'];


$consulta_mun = mysql_query("SELECT * FROM municipios where id_municipio=".$mun );// or die (mysql_error());
//$consulta_mun = mysql_query("SELECT * FROM municipios where id_municipio=".$mun ,$siplan_data_conn) or die (mysql_error());
$res_mun = mysql_fetch_array($consulta_mun);
$mun=$res_mun['id_finanzas'];

 $consulta_loc = mysql_query("SELECT * FROM localidades WHERE id_localidad =".$loc) or die (mysql_error());
 $res_loc = mysql_fetch_array($consulta_loc);
 $loc=$res_loc['id_finanzas'];


 /*$num_proyecto = mysql_query("SELECT * FROM proyectos WHERE id_proyecto = '$proy'") or die (mysql_error());
$res_num_proyecto = mysql_fetch_assoc($num_proyecto);


$obras_proyecto = mysql_query ("SELECT *  FROM obras WHERE id_dependencia = '$id_dependencia' and id_proyecto = '$proy' ") or die (mysql_error());
$total_obras = mysql_num_rows($obras_proyecto);
if($id_dependencia < 10){
	$id_dependencia_cve = "0".$id_dependencia;
}else{$id_dependencia_cve = $id_dependencia;}

if($res_num_proyecto['no_proyecto']<10){
	$id_proyecto = "0".$res_num_proyecto['no_proyecto'];
}else{$id_proyecto = $res_num_proyecto['no_proyecto'];}
$consecutivo = $total_obras+1;
$consxdep =$consecutivo;
if($consecutivo < 10){
	$consecutivo = "00".$consecutivo;
}

if($consecutivo < 100 AND $consecutivo > 9 ){
	$consecutivo = "0".$consecutivo;
}
$num_obra = $id_dependencia_cve.$id_proyecto.$consecutivo;

/*
 * Bloque de codigo que verifica que no se repita
 * el numero de la obra, y si se repite se incrementa
 * hasta que encuentre uno que no se repita
 */

/*
$obras = mysql_query ("SELECT *  FROM obras WHERE obra = '$num_obra'") or die (mysql_error());
$num_obras = mysql_num_rows($obras);
while ($num_obras!=0){
    $num_obra=$num_obra+1;
    $consxdep =$consxdep+1;
    $obras = mysql_query ("SELECT *  FROM obras WHERE obra = '$num_obra'") or die (mysql_error());
    $num_obras = mysql_num_rows($obras);
}
*/
$consxdep=0;

$obras_proyecto = mysql_query ("SELECT consxdep  FROM obras WHERE id_dependencia = '$id_dependencia' and id_proyecto = '$proy' order by consxdep desc limit 1") or die (mysql_error());
 $nums = mysql_num_rows($obras_proyecto);
 if ($nums!="0"){
$total_obras = mysql_fetch_array($obras_proyecto);


$consxdep=$total_obras['consxdep'];
$obras_proyecto1 = mysql_query ("SELECT *  FROM obras WHERE id_dependencia = '$id_dependencia' and id_proyecto = '$proy' and consxdep>'$cons'") or die (mysql_error());
$total_obras1 = mysql_fetch_array($obras_proyecto1);
 $num_cons = mysql_num_rows($obras_proyecto1);
 if ($num_cons!="0"){
 $total_obras1 = mysql_fetch_array($obras_proyecto1);
 $consxdep=$total_obras['consxdep'];
 }
 }
$consxdep=$consxdep+1;

$cant=limpiar($cant);

$benh=limpiar($benh);
$benm=limpiar($benm);

$fini=fechanormal($fini);

$ffin=fechanormal($ffin);

$consulta = "INSERT INTO obras VALUES ( '','$num_obra','$id_dependencia','$proy','$com','$org','$mun','$loc','$mod','$ret','$med','$cant','$fini','$ffin','$desc','$prog','$subp','$benh','$benm','$prg','$otrprg','1','$consxdep','','0')";

$fed=limpiar($fed);
$est=limpiar($est);
$munp=limpiar($munp);
$part=limpiar($part);
$cred=limpiar($cred);
$otr=limpiar($otr);
mysql_query($consulta) or die (mysql_error());

 $consulta3 = "select * from obras where id_dependencia='$id_dependencia' and id_proyecto='$proy' and id_componente='$com' and origen='$org' and municipio='$mun' and localidad='$loc' and modalidad='$mod' and retencion='$ret' and u_medida='$med' and cantidad='$cant' and fecha_inicio='$fini' and fecha_fin='$ffin' and descripcion='$desc' and programa_poa='$prog' and subprograma_poa='$subp' and ben_h='$benh' and ben_m='$benm' and programa='$prg' and otro_prog='$otrprg' and status_obra='1'";



$res_cons3=mysql_query($consulta3) or die (mysql_error());


$res_con3= mysql_fetch_array($res_cons3);

$idd=$res_con3['id_obra'];
$consulta2 = "INSERT INTO aportes VALUES ('', '$idd','$fed','$est','$munp','$part','$cred','$otr')";



mysql_query($consulta2) or die (mysql_error());

$fecha = date("d-m-Y");
$hora = date("H:i");
$ipadd = $_SERVER['REMOTE_ADDR'];
$iduser = $_SESSION['id_usuario_v3'];
$eventi = "alta de obra id_obra= ".$idd." dependencia=".$id_dependencia;
			    mysql_query("INSERT into historial (id_usuario,fecha,hora,evento,ipaddress) VALUES ('$iduser','$fecha','$hora','$eventi','$ipadd')")or die(mysql_error());

return ("1");

}



function actualizar_obra($id,$proy,$com,$org,$mun,$loc,$mod, $ret, $med, $cant, $fini, $ffin, $desc, $prog, $subp, $fed, $est, $munp, $part, $cred, $otr, $benh, $benm,$prg, $otrprg ){


$id_dependencia = $_SESSION['id_dependencia_v3'];


///bloque actualizar condeexp
//echo "select * from obras where id_dependencia='$id_dependencia' and id_obra='$id'";
$consulta3 = "select * from obras where id_dependencia='$id_dependencia' and id_obra='$id'";
$res_cons3=mysql_query($consulta3) or die (mysql_error());
$res_cons3_1=mysql_fetch_array($res_cons3);
//echo $res_cons3_1['id_proyecto']."!=".$proy;
//exit();

if ($res_cons3['id_proyecto']!=$proy){
$consxdep=0;

$obras_proyecto = mysql_query ("SELECT consxdep  FROM obras WHERE id_dependencia = '$id_dependencia' and id_proyecto = '$proy' order by consxdep desc limit 1") or die (mysql_error());
 $nums = mysql_num_rows($obras_proyecto);
 if ($nums!="0"){
$total_obras = mysql_fetch_array($obras_proyecto);


$consxdep=$total_obras['consxdep'];
$obras_proyecto1 = mysql_query ("SELECT *  FROM obras WHERE id_dependencia = '$id_dependencia' and id_proyecto = '$proy' and consxdep>'$cons'") or die (mysql_error());
$total_obras1 = mysql_fetch_array($obras_proyecto1);
 $num_cons = mysql_num_rows($obras_proyecto1);
 if ($num_cons!="0"){
 $total_obras1 = mysql_fetch_array($obras_proyecto1);
 $consxdep=$total_obras['consxdep'];
 }
 }
$consxdep=$consxdep+1;
}

//termina bloque actualizaz codeexp




$consulta_mun = mysql_query("SELECT * FROM municipios where id_municipio=".$mun );// or die (mysql_error());
//$consulta_mun = mysql_query("SELECT * FROM municipios where id_municipio=".$mun ,$siplan_data_conn) or die (mysql_error());
$res_mun = mysql_fetch_array($consulta_mun);
$mun=$res_mun['id_finanzas'];

 $consulta_loc = mysql_query("SELECT * FROM localidades WHERE id_localidad =".$loc) or die (mysql_error());
 $res_loc = mysql_fetch_array($consulta_loc);
 $loc=$res_loc['id_finanzas'];

$cant=limpiar($cant);

$benh=limpiar($benh);
$benm=limpiar($benm);

$fini=fechanormal($fini);

$ffin=fechanormal($ffin);

if ($res_cons3_1['id_proyecto']!=$proy){
$consulta = "update obras  set id_proyecto='$proy', id_componente='$com',origen='$org',municipio='$mun', localidad='$loc',modalidad='$mod',retencion='$ret',u_medida='$med',cantidad='$cant',fecha_inicio='$fini',fecha_fin='$ffin',descripcion='$desc',programa_poa='$prog',subprograma_poa='$subp',ben_h='$benh',ben_m='$benm',programa='$prg',otro_prog='$otrprg', consxdep='$consxdep' where id_obra='$id' and id_dependencia='$id_dependencia'";
}elseif ($res_cons3_1['id_proyecto']==$proy){
$consulta = "update obras  set id_proyecto='$proy', id_componente='$com',origen='$org',municipio='$mun', localidad='$loc',modalidad='$mod',retencion='$ret',u_medida='$med',cantidad='$cant',fecha_inicio='$fini',fecha_fin='$ffin',descripcion='$desc',programa_poa='$prog',subprograma_poa='$subp',ben_h='$benh',ben_m='$benm',programa='$prg',otro_prog='$otrprg' where id_obra='$id' and id_dependencia='$id_dependencia'";
}

$fed=limpiar($fed);
$est=limpiar($est);
$munp=limpiar($munp);
$part=limpiar($part);
$cred=limpiar($cred);
$otr=limpiar($otr);

$consulta2 = "update aportes set federal='$fed', estatal='$est', municipal='$munp', participantes='$part', credito='$cred', otros='$otr' where id_obra='$id'";

mysql_query($consulta) or die (mysql_error());

mysql_query($consulta2) or die (mysql_error());

$fecha = date("d-m-Y");
$hora = date("H:i");
$ipadd = $_SERVER['REMOTE_ADDR'];
$iduser = $_SESSION['id_usuario_v3'];
$eventi = "actualizo obra id_obra= ".$id." dependencia=".$id_dependencia;
			    mysql_query("INSERT into historial (id_usuario,fecha,hora,evento,ipaddress) VALUES ('$iduser','$fecha','$hora','$eventi','$ipadd')")or die(mysql_error());

return ("1");

}

function actualizar_obrap($prio,$id,$proy,$com,$org,$mun,$loc,$mod, $ret, $med, $cant, $fini, $ffin, $desc, $prog, $subp, $fed, $est, $munp, $part, $cred, $otr, $benh, $benm,$prg, $otrprg ){


$id_dependencia = $_SESSION['id_dependencia_v3'];


///bloque actualizar condeexp
//echo "select * from obras where id_dependencia='$id_dependencia' and id_obra='$id'";
$consulta3 = "select * from obras where id_dependencia='$id_dependencia' and id_obra='$id'";
$res_cons3=mysql_query($consulta3) or die (mysql_error());
$res_cons3_1=mysql_fetch_array($res_cons3);
//echo $res_cons3_1['id_proyecto']."!=".$proy;
//exit();

if ($res_cons3['id_proyecto']!=$proy){
$consxdep=0;

$obras_proyecto = mysql_query ("SELECT consxdep  FROM obras WHERE id_dependencia = '$id_dependencia' and id_proyecto = '$proy' order by consxdep desc limit 1") or die (mysql_error());
 $nums = mysql_num_rows($obras_proyecto);
 if ($nums!="0"){
$total_obras = mysql_fetch_array($obras_proyecto);


$consxdep=$total_obras['consxdep'];
$obras_proyecto1 = mysql_query ("SELECT *  FROM obras WHERE id_dependencia = '$id_dependencia' and id_proyecto = '$proy' and consxdep>'$cons'") or die (mysql_error());
$total_obras1 = mysql_fetch_array($obras_proyecto1);
 $num_cons = mysql_num_rows($obras_proyecto1);
 if ($num_cons!="0"){
 $total_obras1 = mysql_fetch_array($obras_proyecto1);
 $consxdep=$total_obras['consxdep'];
 }
 }
$consxdep=$consxdep+1;
}

//termina bloque actualizaz codeexp




$consulta_mun = mysql_query("SELECT * FROM municipios where id_municipio=".$mun );// or die (mysql_error());
//$consulta_mun = mysql_query("SELECT * FROM municipios where id_municipio=".$mun ,$siplan_data_conn) or die (mysql_error());
$res_mun = mysql_fetch_array($consulta_mun);
$mun=$res_mun['id_finanzas'];

 $consulta_loc = mysql_query("SELECT * FROM localidades WHERE id_localidad =".$loc) or die (mysql_error());
 $res_loc = mysql_fetch_array($consulta_loc);
 $loc=$res_loc['id_finanzas'];

$cant=limpiar($cant);

$benh=limpiar($benh);
$benm=limpiar($benm);

$fini=fechanormal($fini);

$ffin=fechanormal($ffin);

$prio=limpiar($prio);

if ($prio==""){
$prio=0;
}

if ($res_cons3_1['id_proyecto']!=$proy){
$consulta = "update obras  set prioridad=$prio, id_proyecto='$proy', id_componente='$com',origen='$org',municipio='$mun', localidad='$loc',modalidad='$mod',retencion='$ret',u_medida='$med',cantidad='$cant',fecha_inicio='$fini',fecha_fin='$ffin',descripcion='$desc',programa_poa='$prog',subprograma_poa='$subp',ben_h='$benh',ben_m='$benm',programa='$prg',otro_prog='$otrprg', consxdep='$consxdep' where id_obra='$id' and id_dependencia='$id_dependencia'";
}elseif ($res_cons3_1['id_proyecto']==$proy){
$consulta = "update obras  set prioridad=$prio, id_proyecto='$proy', id_componente='$com',origen='$org',municipio='$mun', localidad='$loc',modalidad='$mod',retencion='$ret',u_medida='$med',cantidad='$cant',fecha_inicio='$fini',fecha_fin='$ffin',descripcion='$desc',programa_poa='$prog',subprograma_poa='$subp',ben_h='$benh',ben_m='$benm',programa='$prg',otro_prog='$otrprg' where id_obra='$id' and id_dependencia='$id_dependencia'";
}

$fed=limpiar($fed);
$est=limpiar($est);
$munp=limpiar($munp);
$part=limpiar($part);
$cred=limpiar($cred);
$otr=limpiar($otr);

$consulta2 = "update aportes set federal='$fed', estatal='$est', municipal='$munp', participantes='$part', credito='$cred', otros='$otr' where id_obra='$id'";

mysql_query($consulta) or die (mysql_error());

mysql_query($consulta2) or die (mysql_error());

$fecha = date("d-m-Y");
$hora = date("H:i");
$ipadd = $_SERVER['REMOTE_ADDR'];
$iduser = $_SESSION['id_usuario_v3'];
$eventi = "actualizo obra id_obra= ".$id." dependencia=".$id_dependencia;
			    mysql_query("INSERT into historial (id_usuario,fecha,hora,evento,ipaddress) VALUES ('$iduser','$fecha','$hora','$eventi','$ipadd')")or die(mysql_error());

return ("1");

}






function abrir_obra($id_obra,$dep){

$id_dependencia = $_SESSION['id_dependencia_v3'];

//$consulta_obra = mysql_query("SELECT (dependencias.nombre) as nom_dep, sectores.id_sector, sectores.sector, (obras.descripcion) as nom_obra, (proyectos.nombre) as nom_proy, eje.eje, (linea.nombre) as nom_linea, (estrategias.nombre) as nom_estr, municipios.id_municipio, (municipios.nombre) as nom_mun, localidades.id_localidad, (localidades.nombre) as nom_loc, regiones.id_region, (regiones.nombre) as nom_reg, obras.ben_h, obras.ben_m, obras.cantidad, (unidad_medida_prog02.descripcion) as nom_med, obras.fecha_inicio, obras.fecha_fin, programas_poa.clave, (programas_poa.descripcion) nom_ppoa, subprogramas_poa.clave, (subprogramas_poa.descripcion) as sppoa, obras.obra, (componentes.descripcion) as nom_com
//FROM ((programas_poa INNER JOIN (subprogramas_poa INNER JOIN (unidad_medida_prog02  INNER JOIN ((componentes INNER JOIN (sectores INNER JOIN (regiones INNER JOIN (municipios INNER JOIN ((dependencias INNER JOIN obras ON dependencias.id_dependencia = obras.id_dependencia) INNER JOIN (eje INNER JOIN proyectos ON eje.id_eje = proyectos.id_eje) ON (proyectos.id_proyecto = obras.id_proyecto) AND (dependencias.id_dependencia = proyectos.id_dependencia)) ON municipios.id_municipio = obras.municipio) ON regiones.id_region = municipios.id_region) ON sectores.id_sector = dependencias.id_sector) ON (proyectos.id_proyecto = componentes.id_proyecto) AND (componentes.id_componente = obras.id_componente)) INNER JOIN localidades ON municipios.id_municipio = localidades.id_municipio) ON (unidad_medida_prog02 .id_unidad = obras.u_medida) AND (unidad_medida_prog02 .id_unidad = obras.u_medida)) ON subprogramas_poa.id_subprograma_poa = obras.subprograma_poa) ON (programas_poa.id_programa_poa = subprogramas_poa.id_programa_poa) AND (programas_poa.id_programa_poa = obras.programa_poa)) INNER JOIN linea ON (linea.id_linea = proyectos.id_linea) AND (eje.id_eje = linea.id_eje)) INNER JOIN estrategias ON (estrategias.id_estrategia = proyectos.id_estrategia) AND (linea.id_linea = estrategias.id_linea) where obras.id_obra=".$id_obra." and obras.id_dependencia=".$id_dependencia."  group by obras.id_obra"  );// or die (mysql_error());


$consulta_obra = mysql_query("SELECT (dependencias.nombre) as nom_dep, sectores.id_sector, sectores.sector,obras.prioridad, (obras.descripcion) as nom_obra, (proyectos.nombre) as nom_proy, eje.eje, (linea.nombre) as nom_linea, (estrategias.nombre) as nom_estr, municipios.id_finanzas, (municipios.nombre) as nom_mun, localidades.id_localidad, (localidades.nombre) as nom_loc, regiones.id_region, (regiones.nombre) as nom_reg, obras.ben_h, obras.ben_m, obras.cantidad, (unidad_medida_prog02.descripcion) as nom_med, obras.fecha_inicio, obras.fecha_fin, (programas_poa.clave) as cvprg, (programas_poa.descripcion) as nom_ppoa, (subprogramas_poa.clave) as  cvsprg, (subprogramas_poa.descripcion) as sppoa, obras.obra, (componentes.descripcion) as nom_com,  (origen.c08c_tipori) as nom_origen,origen.s08c_origen, obras.modalidad, obras.retencion, aportes.federal, aportes.estatal, aportes.municipal, aportes.participantes, aportes.credito, aportes.otros, obras.programa, obras.otro_prog,proyectos.id_proyecto,componentes.id_componente,unidad_medida_prog02.id_unidad,subprogramas_poa.id_subprograma_poa,programas_poa.id_programa_poa, obras.ben_h, obras.ben_m, obras.id_obra,obras.municipio, obras.localidad
FROM origen INNER JOIN (((programas_poa INNER JOIN (subprogramas_poa INNER JOIN (unidad_medida_prog02  INNER JOIN ((componentes INNER JOIN (sectores INNER JOIN (regiones INNER JOIN (municipios INNER JOIN ((dependencias INNER JOIN obras ON dependencias.id_dependencia = obras.id_dependencia) INNER JOIN (eje INNER JOIN proyectos ON eje.id_eje = proyectos.id_eje) ON (proyectos.id_proyecto = obras.id_proyecto) AND (dependencias.id_dependencia = proyectos.id_dependencia)) ON municipios.id_finanzas = obras.municipio) ON regiones.id_region = municipios.id_region) ON sectores.id_sector = dependencias.id_sector) ON (proyectos.id_proyecto = componentes.id_proyecto) AND (componentes.id_componente = obras.id_componente)) INNER JOIN localidades ON municipios.id_municipio = localidades.id_municipio) ON (unidad_medida_prog02.id_unidad = obras.u_medida) AND (unidad_medida_prog02.id_unidad = obras.u_medida)) ON subprogramas_poa.id_subprograma_poa = obras.subprograma_poa) ON (programas_poa.id_programa_poa = subprogramas_poa.id_programa_poa) AND (programas_poa.id_programa_poa = obras.programa_poa)) INNER JOIN linea ON (linea.id_linea = proyectos.id_linea) AND (eje.id_eje = linea.id_eje)) INNER JOIN estrategias ON (estrategias.id_estrategia = proyectos.id_estrategia) AND (linea.id_linea = estrategias.id_linea)) ON origen.s08c_origen = obras.origen INNER JOIN aportes ON obras.id_obra = aportes.id_obra where obras.id_obra=".$id_obra." and obras.id_dependencia=".$id_dependencia."  group by obras.id_obra"  );// or die (mysql_error());


$res_obra= mysql_fetch_array($consulta_obra);


return ($res_obra);

}


function borrar_obra($id_obra){

$id_dependencia = $_SESSION['id_dependencia_v3'];

$res_obra=mysql_query("delete from obras where id_obra=".$id_obra." and id_dependencia=".$id_dependencia ) or die (mysql_error());
$res_obra1=mysql_query("delete from aportes where id_obra=".$id_obra ) or die (mysql_error());

$fecha = date("d-m-Y");
$hora = date("H:i");
$ipadd = $_SERVER['REMOTE_ADDR'];
$iduser = $_SESSION['id_usuario_v3'];
$eventi = "borro obra id_obra= ".$id_obra." dependencia=".$id_dependencia;
			    mysql_query("INSERT into historial (id_usuario,fecha,hora,evento,ipaddress) VALUES ('$iduser','$fecha','$hora','$eventi','$ipadd')")or die(mysql_error());

if ($res_obra and $res_obra1){
return ("1");
}else
{
return ("0");
}


}

function aprobar_obra($id_obra){

	$id_dependencia = $_SESSION['id_dependencia_v3'];



$obras = mysql_query ("SELECT *  FROM obras WHERE id_obra = '$id_obra'") or die (mysql_error());
$num_obras = mysql_fetch_array($obras);

$idproy1=$num_obras['id_proyecto'];

$proy = mysql_query ("SELECT *  FROM proyectos WHERE id_proyecto = '$idproy1'") or die (mysql_error());
$num_proy = mysql_fetch_array($proy);

$iddependencia=$num_obras['id_dependencia'];
$idproy=$num_proy['no_proyecto'];
$consxdep=$num_obras['consxdep'];
$cve_obra="";

if (strlen($iddependencia)==1){
$cve_obra="0".$iddependencia;
}elseif(strlen($iddependencia)>=2){
$cve_obra=$iddependencia;
}

if (strlen($idproy)==1){
$cve_obra.="0".$idproy;
}elseif(strlen($idproy)>=2){
$cve_obra.=$idproy;
}

if (strlen($consxdep)==1){
$cve_obra.="00".$consxdep;
}elseif(strlen($consxdep)==2){
$cve_obra.="0".$consxdep;
}elseif(strlen($consxdep)>=3){
$cve_obra.=$consxdep;
}






$res_obra=mysql_query("update obras set status_obra='4', obra='$cve_obra' where id_obra=".$id_obra." and id_dependencia=".$id_dependencia ) or die (mysql_error());

$res_obra1=mysql_query("update poa02_origen set id_poa02='$cve_obra' where id_obra=".$id_obra ) or die (mysql_error());

$fecha = date("d-m-Y");
$hora = date("H:i");
$ipadd = $_SERVER['REMOTE_ADDR'];
$iduser = $_SESSION['id_usuario_v3'];
$eventi = "aprobo obra=".$cve_obra." id_obra= ".$id_obra." dependencia=".$id_dependencia;
			    mysql_query("INSERT into historial (id_usuario,fecha,hora,evento,ipaddress) VALUES ('$iduser','$fecha','$hora','$eventi','$ipadd')")or die(mysql_error());

if ($res_obra and $res_obra1 ){
return ("1".$cve_obra);
}else
{
return ("0");
}


}





function rechazar_obra($id_obra){

$id_dependencia = $_SESSION['id_dependencia_v3'];

$res_obra=mysql_query("update obras set status_obra='2' where id_obra=".$id_obra." and id_dependencia=".$id_dependencia ) or die (mysql_error());

$fecha = date("d-m-Y");
$hora = date("H:i");
$ipadd = $_SERVER['REMOTE_ADDR'];
$iduser = $_SESSION['id_usuario_v3'];
$eventi = "aprobo obra id_obra= ".$id_obra." dependencia=".$id_dependencia;
			    mysql_query("INSERT into historial (id_usuario,fecha,hora,evento,ipaddress) VALUES ('$iduser','$fecha','$hora','$eventi','$ipadd')")or die(mysql_error());

if ($res_obra ){
return ("1");
}else
{
return ("0");
}


}


function rechazar_obra_dep($id_obra){

$id_dependencia = $_SESSION['id_dependencia_v3'];

$res_obra=mysql_query("update obras set status_obra='2' where id_obra=".$id_obra." and id_dependencia=".$id_dependencia ) or die (mysql_error());

$fecha = date("d-m-Y");
$hora = date("H:i");
$ipadd = $_SERVER['REMOTE_ADDR'];
$iduser = $_SESSION['id_usuario_v3'];
$eventi = "aprobo obra id_obra= ".$id_obra." dependencia=".$id_dependencia;
			    mysql_query("INSERT into historial (id_usuario,fecha,hora,evento,ipaddress) VALUES ('$iduser','$fecha','$hora','$eventi','$ipadd')")or die(mysql_error());

if ($res_obra ){
return ("1");
}else
{
return ("0");
}


}

function entro(){
$fecha = date("d-m-Y");
$hora = date("H:i");
$ipadd = $_SERVER['REMOTE_ADDR'];
$iduser = $_SESSION['id_usuario_v3'];
$eventi = "acceso modulo obras";
			    mysql_query("INSERT into historial (id_usuario,fecha,hora,evento,ipaddress) VALUES ('$iduser','$fecha','$hora','$eventi','$ipadd')")or die(mysql_error());
}







}
function limpiar($valor){
$valor1 = str_replace(" ","",$valor);
$valor1 = str_replace("$","",$valor1);
$valor1 = str_replace(",","",$valor1);
return $valor1;
}


function fechanormal($fechavieja){

	if ($fechavieja!="00-00-0000"){

    list($d,$m,$a)=explode("-",$fechavieja);
    return $a."-".$m."-".$d;
	}else{
		return "No hay";
		}}
?>
