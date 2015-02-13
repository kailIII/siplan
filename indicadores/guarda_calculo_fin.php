<?php

$mysqli = new mysqli("localhost", "root", "tr15t4n14", "siplan2015");
if ($mysqli->connect_errno) {
  echo "Fallo al contenctar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}

$mysqli->query("SET NAMES utf8");
extract($_POST);
$consulta = "UPDATE indicadores_proyecto SET fin_calculado = '$calculado', fin_resultado='$resultado',fin_observaciones = '$observaciones' WHERE id_proyecto = '$idproyecto'";
if($mysqli->query($consulta)){
?>
<script type="text/javascript">
    alert("se ha guardado correctamente");
    location.href='main.php?token=a1d0c6e83f027327d8461063f4ac58a6';
</script>
<?php
}else{
?>
<script type="text/javascript">
    alert("Error: no se ha guardado correctamente");
    location.href='main.php?token=a1d0c6e83f027327d8461063f4ac58a6';
</script>
<?php
}
?>
