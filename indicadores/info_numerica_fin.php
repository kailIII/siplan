<?php
$mysqli->query("SET NAMES utf8");
$consulta = "SELECT
ipro.nombre_fin as nombre,
ipro.u_medida_fin as u_medida,
ipro.meta_fin as meta,
ipro.fin_calculado as calculado,
ipro.fin_resultado as resultado,
pr.no_proyecto as num_proyecto,
pr.nombre as proyecto
FROM indicadores_proyecto ipro
INNER JOIN proyectos pr on (pr.id_proyecto = ipro.id_proyecto)
WHERE ipro.id_proyecto = ".$idproyecto;

$ex_consulta = $mysqli->query($consulta);
$res_consulta = $ex_consulta->fetch_assoc();
?>
<ul class="nav nav-tabs">
  <li role="presentation" id="basica" ><a href="main.php?token=17e62166fc8586dfa4d1bc0e1742c08b&idproyecto=<?php echo $_GET['idproyecto'];?>&info=1&tipoind=1">Información Básica</a></li>
  <li role="presentation" id="numerica" class="active"><a href="#">Información Númerica</a></li>
  <li role="presentation" id="grafica"><a href="main.php?token=17e62166fc8586dfa4d1bc0e1742c08b&idproyecto=<?php echo $_GET['idproyecto'];?>&info=3&tipoind=1">Gráficos</a></li>
</ul>
<p><span class="label label-default" style="font-size:12px;">Proyecto: </span>&nbsp;<strong><?php echo $res_consulta['num_proyecto']." ".$res_consulta['proyecto']; ?></strong> </p>
<p><span class="label label-default" style="font-size:12px;">Nombre del indicador: </span>&nbsp;<strong><?php echo $res_consulta['nombre']; ?></strong> </p>

<div class="table-responsive">
<table class="table table-striped table-bordered table-hover">
    <thead>
        <tr>
            <th>Unidad de Medida</th>
            <th>Meta</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td><?php echo $res_consulta['u_medida']; ?></td>
            <td><?php echo $res_consulta['meta']; ?></td>
        </tr>
 </tbody>
</table>
 </div>
<div class="table-responsive">
<table class="table table-striped table-bordered table-hover">
    <thead>
        <tr>
            <th>Fecha de Cálculo</th>
            <th>Calculado</th>
            <th>Resultado</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>31 de Diciembre de 2014</td>
            <td><?php echo $res_consulta['calculado']; ?></td>
            <td><?php echo $res_consulta['resultado']; ?></td>
        </tr>
 </tbody>
</table>
 </div>

