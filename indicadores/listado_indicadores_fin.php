<?php

$mysqli = new mysqli("localhost", "root", "tr15t4n14", "siplan2015");
if ($mysqli->connect_errno) {
  echo "Fallo al contenctar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}
$mysqli->query('SET NAMES utf8');
?>
<script type="text/javascript">
function cambiar_pagina(a){
location.href=a;
}
</script>
<div id="wrapper" style="padding-left:3%;padding-right:3%;">
<h3 class="page-header">Indicadores nivel Fin</h3>
<div class="row">
<div class="col-lg-12">
<div class="panel panel-default">
<div class="panel-heading">
Lista de indicadores registrados
</div>
<div class="panel-body">
<div class="dataTable_wrapper">
<button type="button" class="btn btn-default btn-sm"><span class="glyphicon glyphicon-print" aria-hidden="true"></span> Imprimir</button>
<button type="button" class="btn btn-default btn-sm"><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> Exportar</button>
<p>&nbsp;</p>
<table class="table table-striped table-bordered table-hover" id="dataTables-example">
            <thead>
              <tr>
                <th><span class="glyphicon glyphicon-stats" aria-hidden="true"></span></th>
                <th>Dependencia</th>
                <th>Proyecto</th>
                <th>Indicador</th>
                <th>Resultado</th>
                <th>Información</th>
                <th>Calcular</th>
                <th>Editar</th>
              </tr>
            </thead>
            <tbody>
          <?php
            $consulta = "SELECT
            ip.id_proyecto as id_proyecto,
            dep.acronimo as dependencia,
            pr.no_proyecto as num_proyecto,

            ip.nombre_fin as nombre_indicador

            from indicadores_proyecto ip

            inner join proyectos pr on(ip.id_proyecto = pr.id_proyecto)
            inner join dependencias dep on(pr.id_dependencia = dep.id_dependencia)

            where dep.id_dependencia = ".$_SESSION['id_dependencia_v3']."
            order by pr.no_proyecto;
            ";
            $Resultado = $mysqli->query($consulta);
            $contador = 1;


              while($resul = $Resultado->fetch_assoc()){
                $res = $contador/2;
                $contador++;




                if($res == 0){$clase_css = "odd gradeX";}else{$clase_css = "even gradeC";}
          ?>

              <tr class="<?php echo $clase_css; ?>">
                <td>--</td>
                <td><?php echo $resul['dependencia']; ?></td>
                <td><?php echo $resul['num_proyecto']; ?></td>
                <td><?php echo $resul['nombre_indicador']; ?></td>
                <td>Resultado</td>
                <td class="center">
                    <a href="main.php?token=<?php echo md5(43); ?>&idproyecto=<?php echo $resul['id_proyecto']; ?>"><span class='glyphicon glyphicon-info-sign' aria-hidden='true'></span></a></td>
                <td class="center"><a href="<?php echo $resul['id_proyecto']; ?>"<span class='glyphicon glyphicon-tasks' aria-hidden='true'></span></a></td>
                <td class="center"><a href="<?php echo $resul['id_proyecto']; ?>"<span class='glyphicon glyphicon-pencil' aria-hidden='true'></span></a></td>
              </tr>

              <?php
            }
              ?>
            </tbody>
          </table>
        </div>


    </div>
  </div>
</div></div></div>


