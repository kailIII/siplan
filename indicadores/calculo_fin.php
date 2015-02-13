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
$mysqli->query("SET NAMES utf8");
$consulta = "SELECT
pr.no_proyecto as num_proyecto,
pr.nombre as proyecto,
indpro.nombre_fin as nombre
FROM proyectos pr

inner join indicadores_proyecto as indpro on (pr.id_proyecto=indpro.id_proyecto)

WHERE pr.id_proyecto = ".$idproyecto;
$ex_consulta = $mysqli->query($consulta);
$res_consulta = $ex_consulta->fetch_assoc();

?>
<div id="wrapper" style="padding-left:3%;padding-right:3%;">
<h3 class="page-header">Indicadores nivel Fin</h3>
<div class="row">
<div class="col-lg-12">
<div class="panel panel-default">
<div class="panel-heading">
<bold><span class="glyphicon glyphicon-stats" aria-hidden="true"></span> Lista de indicadores registrados</bold>
</div>
<div class="panel-body">
<p><span class="label label-default" style="font-size:12px;">Proyecto: </span>&nbsp;<strong><?php echo $res_consulta['num_proyecto']." ".$res_consulta['proyecto']; ?></strong> </p>
<p><span class="label label-default" style="font-size:12px;">Nombre del indicador: </span>&nbsp;<strong><?php echo $res_consulta['nombre']; ?></strong> </p>
<br>

<form action="main.php?token=<?php echo md5(45); ?>" method="post">
    <input type="hidden" value="<?php echo $idproyecto; ?>" name="idproyecto">
<div class="input-group">
  <span class="input-group-addon" id="basic-addon1">Calculado</span>
  <input type="text" class="form-control" placeholder="Calculado" aria-describedby="basic-addon1" name="calculado">
</div><br>
    <div class="input-group">
  <span class="input-group-addon" id="basic-addon1">Resultado</span>
  <input type="text" class="form-control" placeholder="Resultado" aria-describedby="basic-addon1" name="resultado">
</div><br>
    <div class="input-group">
  <span class="input-group-addon" id="basic-addon1">Observaciones</span>
  <input type="text" class="form-control" placeholder="Observaciones" aria-describedby="basic-addon1" name="observaciones">
</div><br>
    <button class="btn btn-default btn-sm"><span class="glyphicon glyphicon-floppy-disk" aria-hidden="true"></span> Guardar</button>
    </form>


</div></div></div></div></div>
