
<?php
$mysqli = new mysqli("localhost", "root", "tr15t4n14", "siplan2015");
if ($mysqli->connect_errno) {
  echo "Fallo al contenctar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}
if(isset($_GET['idproyecto'])){
    $idproyecto = $_GET['idproyecto'];
}else{
    $idproyecto=0;
}
$mysqli->query("SET NAMES utf8");
$consulta = "SELECT
sc.id_sector as num_sector,
sc.sector as sector,
dep.id_dependencia as num_dep,
dep.nombre as dependencia,
pr.no_proyecto as num_proyecto,
pr.nombre as proyecto,
indpro.fin_objetivo as objetivo,
indpro.nombre_fin as nombre,
indpro.metodo_fin as metodo,
indpro.fin_calculado as calculado,
indpro.fin_resultado as resultado,
indpro.fin_observaciones as observaciones
FROM proyectos pr
inner join dependencias dep on(pr.id_dependencia = dep.id_dependencia)
inner join sectores sc on(dep.id_sector = sc.id_sector)
inner join indicadores_proyecto as indpro on (pr.id_proyecto=indpro.id_proyecto)
WHERE pr.id_proyecto = ".$idproyecto;
$ex_consulta = $mysqli->query($consulta);
$res_consulta = $ex_consulta->fetch_assoc();
?>
<script type="text/javascript">
function cargar_info(){
    document.getElementById("demo").innerHTML = "Paragraph changed!";
    alert("hola mundo");

}

cargar_info();
</script>
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

    <ul class="nav nav-tabs">
  <li role="presentation" id="basica"><a href="#">Home</a></li>
  <li role="presentation" id="numerica"><a href="#">Profile</a></li>
  <li role="presentation" id="grafica"><a href="#">Messages</a></li>
</ul>


        <form>

        <div id="demo">iiii</div>
             </form>
            </div>
          </div>
        </div>
        </div></div>



    </div>

