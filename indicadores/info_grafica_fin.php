<?php
$mysqli = new mysqli("localhost", "root", "tr15t4n14", "siplan2015");
if ($mysqli->connect_errno) {
  echo "Fallo al contenctar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}
$mysqli->query('SET NAMES utf8');

$consulta = "SELECT

pr.no_proyecto as num_proyecto,
pr.nombre as proyecto,
indpro.nombre_fin as nombre,
indpro.fin_resultado as resultado

FROM indicadores_proyecto indpro
inner join proyectos as pr on (pr.id_proyecto=indpro.id_proyecto)

WHERE indpro.id_proyecto = ".$_GET['idproyecto'];

$ex_consulta = $mysqli->query($consulta);
$res_consulta = $ex_consulta->fetch_assoc();


?>
<ul class="nav nav-tabs">
  <li role="presentation" id="basica"><a href="main.php?token=17e62166fc8586dfa4d1bc0e1742c08b&idproyecto=<?php echo $_GET['idproyecto'];?>&info=1&tipoind=1">Información Básica</a></li>
  <li role="presentation" id="numerica"><a href="main.php?token=17e62166fc8586dfa4d1bc0e1742c08b&idproyecto=<?php echo $_GET['idproyecto'];?>&info=2&tipoind=1">Información Númerica</a></li>
  <li role="presentation" id="grafica" class="active"><a href="#">Gráficos</a></li>
</ul>

<div id="morris-bar-chart"></div>


  <!-- Morris Charts JavaScript -->
    <script src="js/raphael-min.js"></script>
    <script src="js/morris.min.js"></script>
    <script type="text/javascript">
   $(function(){
    Morris.Bar({
        element: 'morris-bar-chart',
        data: [
            {
         y: '2014',
         a: <?php echo $res_consulta['resultado']; ?>

            }
        ],
        xkey: 'y',
        ykeys: ['a'],
        labels: ['<?php echo $res_consulta['nombre']; ?>'],
        hideHover: 'auto',
        resize: true
});
})

   </script>

