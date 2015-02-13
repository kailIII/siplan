<?php
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
ti.tipo_indicador as tipo,
dimind.dimension as dimension,
fi.frecuencia as frecuencia,
sind.sentido as sentido,
indpro.medio_verifica_fin as medio,
supuesto_fin as supuesto,
indpro.fin_observaciones as observaciones
FROM proyectos pr
inner join dependencias dep on(pr.id_dependencia = dep.id_dependencia)
inner join sectores sc on(dep.id_sector = sc.id_sector)
inner join indicadores_proyecto as indpro on (pr.id_proyecto=indpro.id_proyecto)
inner join tipo_indicador ti on(indpro.tipo_fin = ti.id_tipo_indicador)
inner join dimension_indicador dimind on (indpro.dimension_fin = dimind.id_dimension)
inner join frecuencia_indicador as fi on (indpro.frecuencia_fin = fi.id_frecuencia)
inner join sentido_indicador as sind on (indpro.sentido_fin = sind.id_sentido)
WHERE pr.id_proyecto = ".$idproyecto;
$ex_consulta = $mysqli->query($consulta);
$res_consulta = $ex_consulta->fetch_assoc();
$sentido = $res_consulta['sentido'];
?>
<ul class="nav nav-tabs">
  <li role="presentation" id="basica" class="active"><a href="#">Información Básica</a></li>
  <li role="presentation" id="numerica"><a href="main.php?token=17e62166fc8586dfa4d1bc0e1742c08b&idproyecto=94&info=2&tipoind=1">Información Númerica</a></li>
  <li role="presentation" id="grafica"><a href="main.php?token=17e62166fc8586dfa4d1bc0e1742c08b&idproyecto=94&info=3&tipoind=1">Gráficos</a></li>
</ul>

<p><span class="label label-default" style="font-size:12px;">Proyecto: </span>&nbsp;<strong><?php echo $res_consulta['num_proyecto']." ".$res_consulta['proyecto']; ?></strong> </p>
<p><span class="label label-default" style="font-size:12px;">Nombre del indicador: </span>&nbsp;<strong><?php echo $res_consulta['nombre']; ?></strong> </p>
<div class="table-responsive">
<table class="table table-striped table-bordered table-hover">
    <thead>
        <tr>
            <th>Sector</th>
            <th>Dependencia</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td><?php echo $res_consulta['num_sector']." ".$res_consulta['sector']; ?></td>
            <td><?php echo $res_consulta['num_dep']." ".$res_consulta['dependencia']; ?></td>
        </tr>
 </tbody>
</table>
 </div>


<div class="table-responsive">
<table class="table table-striped table-bordered table-hover">
    <thead>
        <tr>
            <th>Tipo Indicador</th>
            <th>Dimensión</th>
            <th>Frecuencia</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td><?php echo $res_consulta['tipo']; ?></td>
            <td><?php echo $res_consulta['dimension']; ?></td>
            <td><?php echo $res_consulta['frecuencia']; ?></td>
        </tr>

 </tbody>
</table>
 </div>

<div class="table-responsive">
<table class="table table-striped table-bordered table-hover">
    <thead>
        <tr>
            <th>Sentido</th>
            <th>Medio Verificación</th>
            <th>Supuesto</th>
        </tr>
    </thead>
    <tbody>
         <tr>
            <td><?php echo $sentido ?></td>
            <td><?php echo $res_consulta['medio']; ?></td>
            <td><?php echo $res_consulta['supuesto']; ?></td>
        </tr>
</tbody>

    </table></div>
<form>


<div class="panel panel-default">
<div class="panel-heading"><strong>Objetivos</strong></div>
<div class="panel-body">
<?php echo $res_consulta['objetivo']; ?>
</div>
</div>


<br>
<div class="panel panel-default">
<div class="panel-heading"><strong>Observaciones</strong></div>
<div class="panel-body">
<?php echo $res_consulta['observaciones']; ?>
</div>
</form>
