<?php
$c_t_p="select count(*) from proyectos where id_dependencia = ".$_SESSION['id_dependencia_v3']." AND anual_pr = ".$_SESSION["ejercicio_v3"];
$e_c_t_p = $conexion->query($c_t_p);
$r_c_t_p = $e_c_t_p->fetch_array();
$c_t_p_a="select count(*) from proyectos where id_dependencia = ".$_SESSION['id_dependencia_v3']." AND anual_pr = ".$_SESSION["ejercicio_v3"]. " AND estatus = 2";
$e_c_t_p_a = $conexion->query($c_t_p_a);
$r_c_t_p_a = $e_c_t_p_a->fetch_array();
$c_t_p_p="select count(*) from proyectos where id_dependencia = ".$_SESSION['id_dependencia_v3']." AND anual_pr = ".$_SESSION["ejercicio_v3"]. " AND estatus = 1";
$e_c_t_p_p = $conexion->query($c_t_p_p);
$r_c_t_p_p = $e_c_t_p_p->fetch_array();
$c_t_p_na="select count(*) from proyectos where id_dependencia = ".$_SESSION['id_dependencia_v3']." AND anual_pr = ".$_SESSION["ejercicio_v3"]. " AND estatus = 0 OR estatus = 3";
$e_c_t_p_na = $conexion->query($c_t_p_na);
$r_c_t_p_na = $e_c_t_p_na->fetch_array();
$f_cap_inicio_prog01 = strtotime($_SESSION['inicio_poa01'],time());
$fecha_actual = strtotime(date("d-m-Y",time()));
$consulta_marco_estrategico =$conexion->query("SELECT count(*) FROM marco_estrategico WHERE ejercicio = ".$_SESSION["ejercicio_v3"]);
$res_consulta_marco_estrategico = $consulta_marco_estrategico->fetch_array();
?>
<div class="wrap">
<h2><span class="glyphicon glyphicon-home"></span>&nbsp;Bienvenido</h2>
<br>
<div class="panel panel-default">
<div class="panel-heading"><span class="glyphicon glyphicon-list-alt"></span>&nbsp; Ahora mismo en el SIPLAN</div>
<div class="panel-body">
<div class="row">
<div class="col-lg-6">
<h4>Proyectos</h4>
<ul class="list-group">
<li class="list-group-item"><span class="badge"><?php echo $r_c_t_p[0]; ?></span> Proyectos de la Dependencia: </li>
<li class="list-group-item"><span class="badge"><?php echo $r_c_t_p_a[0]; ?></span> Aprobados por la UPLA: </li>
<li class="list-group-item"><span class="badge"><?php echo $r_c_t_p_p[0]; ?></span> Aprobados por la Dependencia: </li>
<li class="list-group-item"><span class="badge"><?php echo $r_c_t_p_na[0]; ?></span> Sin Aprobar: </li>
</ul>
</div>
<div class="col-lg-4 col-lg-offset-1">
<h4>Información</h4>
<div class="alert alert-success" role="alert">El sistema se encuentra funcionando correctamente</div>
<?php  if($res_consulta_marco_estrategico[0]==0) { ?>
<div class="alert alert-danger" role="danger">No se ha capturado marco estrategico para este ejercicio</div>
<?php  } ?>
<div class="alert alert-info" role="info">
<a href="http://siplan.zacatecas.gob.mx/documentos/Proceso_para_subir_Expedientes_Tecnicos_al_siplan.pdf" target="_blank" class="alert-link">Proceso para subir Expedientes Tecnicos al siplan</a>
</div>
<div class="alert alert-info" role="info">
<a href="http://siplan.zacatecas.gob.mx/documentos/Manual_de_Modulo de_Evaluacion_Trimestral.pdf" target="_blank" class="alert-link">Manual de Módulo de Evaluación Trimestral</a>
</div>
<div class="alert alert-info" role="info">
<a href="http://siplan.zacatecas.gob.mx/documentos/Manual_siplan_3 V1.0_Proyectos.pdf" target="_blank" class="alert-link">Descargar el manual de usuario del siplan</a>
</div>
</div>
</div>
</div>
</div>
<br>
<?php
//se liberan las consultas
$e_c_t_p->free();
$e_c_t_p_a->free();
$e_c_t_p_p->free();
$e_c_t_p_na->free();
$consulta_marco_estrategico->free();
?>
