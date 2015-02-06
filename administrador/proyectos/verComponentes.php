<style type="text/css" title="currentStyle">
			@import "dise�o/tablas/demo_page.css";
			@import "dise�o/tablas/demo_table.css";
</style>
<div style="margin-left:20px; margin-right:20px;">
<div id="cuadro_info">
  <p><div id="aviso">
  <table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    
    <td width="98%" valign="middle"></td>
  </tr>
</table>
</div></p>
  <br />
  <p>Componentes<br /> 
  </p>
  <div id="container" class="ex_highlight_row">
<div id="demo">
<table width="99%" cellpadding="0" cellspacing="0" border="0" class="display" id="example">
 <thead>
    <tr>
    <td width="30%"><div align="center">Descripcion </div></td>    
    <td width="8%"><div align="center">Unidad Medida</div></td>
	<td width="8%"><div align="center">Ponderacion</div></td>
    <td width="30%"><div align="center">Unidad Responsable</div></td>
    
  </tr>
  </thead>
  <tbody>
  <?php
	$idproyecto = $_GET['id_proyecto'];
	$componentes = mysql_query("SELECT * FROM componentes where id_proyecto = '$idproyecto' ",$siplan_data_conn) or die(mysql_error());
	while($rescomponentes =  mysql_fetch_assoc($componentes)){
	$id_proyecto=0;
?>
	<tr class="gradeA">
	
    <td align="center"><?php echo $rescomponentes['descripcion']; ?></td>
	<td align="center"><?php echo $rescomponentes['unidad_medida']; ?></td>
	<td align="center"><?php echo $rescomponentes['ponderacion']; ?></td>
	<td align="center"><?php echo $rescomponentes['unidad_responsable']; ?></td>
    

	
	<td align="center">
	<td><form action="main.php?token=<?php print(md5(2.1)); ?>" method="post" class="Estilo6">
	<td width="9%" valign="middle"> <a href="main.php?token=<?php print(md5(2.6));?>&id_proyecto=<?php echo"$id_proyecto";?>">Acciones</a> </td>
	<td width="9%" valign="middle"> <a href="main.php?token=<?php print(md5(2.2));?>&id_proyecto=<?php echo"$id_proyecto";?>">Detalles</a> </td>	
	<td width="9%" valign="middle"> <a href="main.php?token=<?php print(md5(2.4));?>&id_proyecto=<?php echo"$id_proyecto";?>" onclick="return confirm('¿Borrar?');">Borrar</a> </td>
	</tr>	
	
  <?php } ?>
   
      
    </tbody>
    
</table>
</div></div>  
</div>
</div>  