<?php ini_set('display_errors','1'); ?>
<html>
<head>
<title>cliente webservice!!</title>
<meta charset="utf-8"></head>
<body>
<?php
require_once('lib/nusoap.php');
$client = new nusoap_client("http://localhost/siplan/ws/ws_siplan.php?wsdl", true);
$client->setCredentials("siplan_ws","4Do1t4m0");
$err = $client->getError();
if ($err) {
    echo '<h2>Ha ocurrido un error</h2><pre>' . $err . '</pre>';
}
//$result = $client->call('wsSiplan', array('ejercicio' => '2015','dependencia'=>'1','proyecto'=>'1'));
$result = $client->call('wsC73',array('ejercicio' => 2015,'dependencia'=>1));
//$result = $client->call('wsC74',array('ejercicio' => 2015,'dependencia'=>1));
//$result = $client->call('wsC75',array('ejercicio' => 2014,'dependencia'=>1));
//$result = $client->call('wsC76',array('ejercicio' => 2014,'dependencia'=>62));
//$result = $client->call('wsC77',array('ejercicio' => 2014,'dependencia'=>62));
//$result = $client->call('wsR',array('oficio' => 'UPLA-OE/0063/14','respuesta'=>1));
echo "<pre>";
print_r($result);
echo "</pre>";
?>
</body>
</html>
