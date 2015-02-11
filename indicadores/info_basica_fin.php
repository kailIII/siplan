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

 <ul class="nav nav-tabs">
  <li role="presentation" id="basica" class="active"><a href="#">Información Básica</a></li>
  <li role="presentation" id="numerica"><a href="#">Información Númerica</a></li>
  <li role="presentation" id="grafica"><a href="#">Gráficos</a></li>
</ul>


        <form>
        </form>
