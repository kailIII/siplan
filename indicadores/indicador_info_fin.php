<?php
$mysqli = new mysqli("localhost", "root", "tr15t4n14", "siplan2015");
if ($mysqli->connect_errno) {
  echo "Fallo al contenctar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}

/* Revisamos los valores a cargar desde get para mostrar la informacion */
if(isset($_GET['idproyecto'])){
    $idproyecto = $_GET['idproyecto'];
}else{
    $idproyecto=0;
}

if(isset($_GET['info'])){
  $nivel_info = $_GET['info'];
}else{
  $nivel_info = 0;
}

if(isset($_GET['tipoind'])){
  $tipoind = $_GET['tipoind'];
}else{
  $tipoind = 0;
}
/* ----------------- FIN IF's -----------  */

?>

<div id="wrapper" style="padding-left:3%;padding-right:3%;">
<h2 class="page-header">Información del Indicador - Indicadores FIN</h2>
<div class="row">
<div class="col-lg-12">
<div class="panel panel-default">
<div class="panel-heading">
    Información del Indicador
</div>
<!-- /.panel-heading -->
<div class="panel-body">
<div class="dataTable_wrapper">
<button type="button" class="btn btn-default btn-sm"><span class="glyphicon glyphicon-print" aria-hidden="true"></span> Imprimir</button>
<button type="button" class="btn btn-default btn-sm"><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> Exportar</button>
<p>&nbsp;</p>
<?php
// las siguientes combinaciones determinan el tipo de informaciòn a mostrar
if(($nivel_info == 1 OR $nivel_info == 0) AND ($tipoind == 1 OR $tipoind==0)){
   include ('indicadores/info_basica_fin.php');
}

if($nivel_info == 2 AND ($tipoind == 1 OR $tipoind==0)){
   include ('indicadores/info_numerica_fin.php');
}

if($nivel_info == 3 AND ($tipoind == 1 OR $tipoind==0)){
   include ('indicadores/info_grafica_fin.php');
}




?>




</div>
</div>
</div>
</div></div>



    </div>

