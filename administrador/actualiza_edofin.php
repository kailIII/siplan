<?php


include 'lib/nusoap.php';
include 'classes/webServiceClient.php';
include 'classes/bd.php';
$objbd = new bd();
$link =  $objbd->conectar();
$client=new nusoap_client('http://10.113.6.212/webservices.php');
//$client=new nusoap_client('http://10.113.6.212/index.php?webservices=server&wsdl');
$client->setCredentials("webadmin","B8g^w%lTO$");
$err = $client->getError();
if ($err) {
	$errortype = 1;
    $mensajeerror =  '<h2>Constructor error</h2><pre>' . $err . '</pre>';
  }
//llamando al metodo SOAP

/*$dataReturnEstFin = $client->call('seplader',array('id' => '0','annio' => '2014'));
$dataReturnPartidas = $client->call('seplader_origen',array('id' => '0','annio' => '2014'));
$dataReturnOrigenes = $client->call('seplader_partida',array('id' => '0','annio' => '2014'));
$dataReturnPartidaOrigen= $client->call('seplader_paxor',array('id' => '0','annio' => '2014'));
*/

$id_dep = $_SESSION['id_dependencia_v3'];

$dataReturnEstFin = $client->call('seplader',array('id' => $id_dep,'anio' => 2014));
$dataReturnPartidas = $client->call('seplader_origen',array('id' => 0,'anio' => 2014));
$dataReturnOrigenes = $client->call('seplader_partida',array('id' => 0,'anio' => 2014));
$dataReturnPartidaOrigen= $client->call('seplader_paxor',array('id' => 0,'anio' => 2014));




$errortype=0;
if ($client->fault) {
	$errortype = 1;
	$mensajeerror = "<h2>Fault</h2><pre>".print_r($datareturn)."</pre>";
} else {
    $err = $client->getError();
    if ($err) {
        $errortype = 1;
       $mensajeerror =  '<h2>Constructor error</h2><pre>' . $err . '</pre>';
    }
}
if($errortype==1) {
	echo $mensajeerror;
} else{
      $clientews = new webServiceClient();
      $num_edos_fin = count($dataReturnEstFin);
	  if($num_edos_fin>1){
	  	$clientews->delEstadosFinancieros();
	  	$clientews->insertEstadosFinancieros($dataReturnEstFin);
		//$clientews->delPartidas();
         $clientews->insertPartidas($dataReturnPartidas);
        //$clientews->delOrigenes();
	  $clientews->insertOrigenes($dataReturnOrigenes);
    //  $clientews->delPartida_Origen();
     $clientews->insertPartida_Origen($dataReturnPartidaOrigen);





		$mensaje = "<div align='center'>
              <table width='50%' border='0' cellspacing='0' cellpadding='3' style='border:solid 1px #009F3C;'>
  <tr>
    <td width='7%' bgcolor='#009F3C'><img src='imagenes/SecurityApproved.gif' width='31' height='31'></td>
    <td width='93%' bgcolor='#E2F0D5'><div style='color:#030; font-size:12px;'>Estado Financiero Actualizado correctamente.<br>
    <a href='main.php?token=".md5(51)."'>Clic aqui para ver el Estado Financiero</a></div></td>
  </tr>
</table></div>";
	  }else{
		  $mensaje = "<div align='center'>
              <table width='25%' border='0' cellspacing='0' cellpadding='3' style='border:solid 1px #E4BE12;'>
  <tr>
    <td width='7%' bgcolor='#E4BE12'><img src='imagenes/Info.gif' width='31' height='31'></td>
    <td width='93%' bgcolor='#FDFCC4'><div style='color:#E4BE12; font-size:12px;'>No se lograron obtener datos desde el SIIF </div></td>
  </tr>
</table></div>";



		  }
    /*
       $objbd->desconectar();

     //  header ("Location: importCatalogosWS.php?est=1");
      */
      $objbd->desconectar();
       }

 echo "<p>&nbsp;</p>".$mensaje;
 ?>
<p>&nbsp;</p>
<?php
//}
?>
