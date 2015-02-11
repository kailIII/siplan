     <div class="input-group">
                   <span class="input-group-addon" id="sizing-addon2"><b>Sector</b></span>
  <input type="text" class="form-control" aria-describedby="sizing-addon2" value="<?php echo $res_consulta['num_sector']." ".$res_consulta['sector']; ?>" readonly>
</div><br>
                 <div class="input-group">
                     <span class="input-group-addon" id="sizing-addon2"><b>Dependencia</b></span>
  <input type="text" class="form-control" aria-describedby="sizing-addon2" value="<?php echo $res_consulta['num_dep']." ".$res_consulta['dependencia']; ?>" readonly >
</div><br>

                 <div class="input-group">
  <span class="input-group-addon" id="sizing-addon2">Proyecto</span>
  <input type="text" class="form-control" aria-describedby="sizing-addon2" value="<?php echo $res_consulta['num_proyecto']." ".$res_consulta['proyecto']; ?>" readonly>
</div><br>

    <div class="panel panel-default">
  <div class="panel-heading"><strong>Objetivos</strong></div>
  <div class="panel-body">
    <?php echo $res_consulta['objetivo']; ?>
  </div>
</div>

                 <div class="panel panel-default">
  <div class="panel-heading"><strong>Nombre del Indicador</strong></div>
  <div class="panel-body">
    <?php echo $res_consulta['nombre']; ?>
  </div>
</div>

                                  <div class="panel panel-default">
  <div class="panel-heading"><strong>M&eacute;todo de C&aacute;lculo</strong></div>
  <div class="panel-body">
    <?php echo $res_consulta['metodo']; ?>
  </div>
</div>

                 <div class="input-group">
  <span class="input-group-addon" id="sizing-addon2">Cálculo al 31 de diciembre de 2014</span>
  <input type="text" class="form-control" aria-describedby="sizing-addon2" value=" <?php echo $res_consulta['calculado']; ?>">
</div><br>

                 <div class="input-group">
  <span class="input-group-addon" id="sizing-addon2">Resultado</span>
  <input type="text" class="form-control" aria-describedby="sizing-addon2" value=" <?php echo $res_consulta['resultado']; ?>">
</div><br>

                                      <div class="panel panel-default">
  <div class="panel-heading"><strong>Observaciones</strong></div>
  <div class="panel-body">
     <?php echo $res_consulta['observaciones']; ?>
  </div>
</div>
