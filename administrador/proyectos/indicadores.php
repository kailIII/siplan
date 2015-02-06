<style type="text/css" title="currentStyle">
			@import "dise�o/tablas/demo_page.css";
			@import "dise�o/tablas/demo_table.css";
</style>
<div style="margin-left:20px; margin-right:20px;">
  <tr>
    
    <td width="98%" valign="middle"></td>
  </tr>
  
  </div></p>
  
  <B>  <p>Definir Indicadores X</p>	</B>
  
  <div id="container" class="ex_highlight_row">

<div style="margin-left:20px; margin-right:20px;">
<h2>Indicadores</h2>
<div id="cuadro_info">
<div id="container" class="ex_highlight_row">
<ul id="botones">
    <li><a href="main.php?token=<?php print(md5(4));?>"><img src="imagenes/agregar.png" width="24" height="24" align="middle">Agregar Indicador</a></li>
    <li><a href="#" target="_blank"><img src="imagenes/printer24x24.png" width="24" height="24" align="middle">Imprimir</a></li>
    <li><a href="#" target="_blank"><img src="imagenes/excel24x24.png" width="24" height="24" align="middle">Exportar XLS</a></li>
</ul>
<hr>
<div id="container" class="ex_highlight_row">
<div id="demo">


<div id="demo">
<table width="99%" cellpadding="0" cellspacing="0" border="0" class="display" id="example">
 <thead>
    <tr>
    <td width="3%"><div align="center">Num </div></td>    
    <td width="15%"><div align="center">Nombre</div></td>
	<td width="12%"><div align="center">Eje</div></td>
    <td width="15%"><div align="center">Linea</div></td>
	<td width="20%"><div align="center">Estrategia</div></td>
	<td width="20%"><div align="center">Indicador</div></td>
    
  </tr>
  </thead>
  <tbody>
  <?php
	$iduser = $_SESSION['id_usuario'];	
	$consulta = mysql_query("SELECT * FROM usuarios WHERE id_usuario = ".$iduser,$siplan_data_conn) or die (mysql_error());
	$resultado = mysql_fetch_array($consulta);  
	$iddep=$resultado["id_dependencia"];	
 	
	//Filtro para solo solicitar las que son de la dependencia
	$consulta_proy = mysql_query("SELECT * FROM proyectos WHERE id_dependencia=$iddep" ,$siplan_data_conn)or die (mysql_error());	
	while ($filtro_proy = mysql_fetch_assoc($consulta_proy)) 
	{
		
		$idp=$filtro_proy['id_proyecto'];
		
		//Consulta todos los indicadores
		$consulta_indicadores = mysql_query("SELECT * FROM indicadores   " ,$siplan_data_conn)or die (mysql_error());			
		 while ($resindicadores = mysql_fetch_assoc($consulta_indicadores)) 
		 {
			$id_indicador=0;			
			$idproy=$resindicadores['id_proyecto'];
			
			//Se aplica el filtro para solo mostrar los indicadores pertenecientes a los proyectos que son de la dependencia
			if($idproy==$idp)
			{
				$consulta_proyectos = mysql_query("SELECT * FROM proyectos WHERE id_proyecto=$idproy" ,$siplan_data_conn)or die (mysql_error());
				$resproy = mysql_fetch_assoc($consulta_proyectos);			
?>

			  <tr class="gradeA">
				<td><?php $id_indicador= $resindicadores['id_indicador']; echo $id_indicador; ?></td>   
				
				<td><?php echo $resindicadores['definicion']; ?></td>
								
				<td><?php 
				$eje=$resproy['id_eje'];
				$consulta_eje = mysql_query("SELECT * FROM eje WHERE id_eje=$eje" ,$siplan_data_conn)or die (mysql_error());
				$c_e = mysql_fetch_array($consulta_eje);
				echo $c_e["eje"];; ?></td>
				
				<td><?php 
				$linea=$resproy['id_linea'];
				$consulta_linea = mysql_query("SELECT * FROM linea WHERE id_linea=$linea" ,$siplan_data_conn)or die (mysql_error());
				$c_l = mysql_fetch_array($consulta_linea);  				
				echo $c_l["nombre"]; ?></td>
				
				<td><?php
				$estrategia=$resproy['id_estrategia'];
				$consulta_estrategia = mysql_query("SELECT * FROM estrategias WHERE id_estrategia=$estrategia" ,$siplan_data_conn)or die (mysql_error());
				$c_e = mysql_fetch_array($consulta_estrategia);  				
				echo $c_e["nombre"]; ?></td>
				
				<td><?php echo $resindicadores['algoritmo']; ?></td>
					
				<td width="9%" valign="middle"> <a href="main.php?token=<?php print(md5(11));?>&id_indicador=<?php echo"$id_indicador";?>">Editar</a> </td>
				
				
				
			  </tr>
			   
<?php
			}
		}		
	}
?>
    </tbody>
    
  </table>
  </div></div>
  
  
  
</div>
</div>