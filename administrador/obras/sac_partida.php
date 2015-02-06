<?php session_start();
date_default_timezone_set('America/Mexico_City');
require_once("../../seguridad/deniedacces.php");
require_once("../../seguridad/siplan_connection_db.php");
require_once("../../seguridad/logout.php");

?>
<p>Partida

         <?php
			$id = $_GET['id'];
	$dat = explode("-", $id);
	$idsd = $dat[0];
	$idsp = $dat[1];
	$idsc = $dat[2];
	$idsa = $dat[3];


	   $con="SELECT * FROM estados_financieros INNER JOIN partida  ON estados_financieros.s07c_partid = partida.s07c_partid where s02c_depend=".$_SESSION['id_dependencia_v3']." and s06c_proyec=".$idsp." and s11c_compon=".$idsc." and s25c_accion=".$idsa." GROUP BY partida.s07c_partid order by partida.s07c_partid asc";
	$con1=mysql_query($con);


	/*	for ($i=1;$i<=$nres;$i++)
{$reres=mysql_fetch_array($res);
	echo "SELECT * FROM partida  INNER JOIN estados_financieros  ON partida.s07c_partid = estados_financieros.s07c_partid WHERE partida.s07c_partid ='".$reres['s07c_partid']."' and estados_financieros.s08c_origen=".$reres['s08c_origen']." GROUP BY partida.s07c_partid order by partida.s07c_partid asc";
}*/
	?>
<select name="partida" id="partida" onchange="mostrar_org(this.value)">
       <option value="" selected="selected">-seleccione-</option>

		    <?php
			while($res_com = mysql_fetch_array($con1)){

		//echo $par="SELECT s07c_partid, c07c_descri FROM partida where s07c_partid='".$reres['s07c_partid']."'";

		echo "<option value=\"".$idsp."_".$idsc."_".$idsa."_".$res_com['s07c_partid']."-".$res_com['s07c_partid']."\"> ".$res_com['s07c_partid']." - ".utf8_encode($res_com['c07c_descri'])."</option>".$val_cbo;


           }//for




          /*  while($res_com = mysql_fetch_array($consulta_com)){
                echo "<option value=\"".$res_com['s08c_origen']."-".$res_com['s07c_partid']."\"> ".$res_com['s07c_partid']." - ".utf8_encode($res_com['c07c_descri'])."</option>";
                $i++;
            }*/


            ?>
        </select>

 </p>
