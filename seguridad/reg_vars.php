<?php

$cdu="SELECT * FROM usuarios WHERE usuario = '$usuario' AND password = '$cve'";
$res_usr = $conexion->query($cdu);
$info=$res_usr->fetch_assoc();
$_SESSION['sesion_activa_v3'] = 1;
$_SESSION['id_usuario_v3'] = $info['id_usuario'];
$_SESSION['id_dependencia_v3'] = $info['id_dependencia'];
$_SESSION['id_perfil_v3'] = $info['id_perfil'];
$_SESSION['activo_v3'] = $info['activo'];
$_SESSION['nombre_v3'] = $info['nombre'];
$_SESSION['extraordinario_v3'] = $info['extraordinario'];
$_SESSION['trim_habilitado_v3'] = $info['trim_habilitado'];
$_SESSION['inicio_poa01'] = $info['i_captura_prog01'];
$_SESSION['fin_poa01']= $info['f_captura_prog01'];
$_SESSION["autentificado_v3"] = "SI";
$_SESSION["ejercicio_v3"] = $ejercicio;
$res_usr->free();
$consulta_nombre_dependencia = "SELECT * FROM dependencias WHERE id_dependencia = ".$_SESSION['id_dependencia_v3'];
$cons_dep = $conexion->query($consulta_nombre_dependencia);
$data_dep = $cons_dep->fetch_assoc();
$_SESSION['nombre_dependencia_v3'] =  $data_dep['nombre'];
$_SESSION['sector_dependencia_v3'] =  $data_dep['id_sector'];
$cons_dep->free();

?>
