 <ul class="nav nav-tabs">
  <li role="presentation" id="basica"><a href="main.php?token=17e62166fc8586dfa4d1bc0e1742c08b&idproyecto=94&info=1&tipoind=1">Información Básica</a></li>
  <li role="presentation" id="numerica"><a href="main.php?token=17e62166fc8586dfa4d1bc0e1742c08b&idproyecto=94&info=2&tipoind=1">Información Númerica</a></li>
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
         a: 0,
         b: 0
            }
        ],
        xkey: 'y',
        ykeys: ['a', 'b'],
        labels: ['Series A', 'Series B'],
        hideHover: 'auto',
        resize: true
});
})

   </script>

