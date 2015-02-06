<p align="center">&nbsp;</p>


<div style="margin-left:20px; margin-right:20px;">
<p align="center"><font size="5" >REPORTES DE INVERSI&Oacute;N</font>
</p>
<div id="cuadro_info" align="center">
<form id="poainversion" name="poainversion" method="post" action="rpts/reporte_obras_inv.php" target="_blank">


<p> <b>Dependencia</b> <br>
<select name="dependencia" id="dependencia" style="width:400px">
            <option value="0">-seleccione-</option>
            <?php
				$consulta_proyectos = "SELECT id_dependencia, nombre FROM dependencias order by id_dependencia ASC";
				$res_consulta_proy = mysql_query($consulta_proyectos,$siplan_data_conn) or die (mysql_error());
				$total_proyectos = mysql_num_rows($res_consulta_proy);
			     while($mostrar_proyectos = mysql_fetch_array($res_consulta_proy)){
					 //$arr_id_proyectos[] = $mostrar_proyectos['id_proyecto'];
					 echo 	"<option value=\"". $mostrar_proyectos['id_dependencia'] ."\"> ".$mostrar_proyectos['id_dependencia']." - ".$mostrar_proyectos['nombre']."</option>";
				 }
			?>
</select></p><b>Sector</b> <br>
<select name="Sector" id="Sector" style="width:400px">
            <option value="0">-seleccione-</option>
            <?php
				$consulta_proyectos = "SELECT id_sector, sector FROM sectores order by id_sector ASC";
				$res_consulta_proy = mysql_query($consulta_proyectos,$siplan_data_conn) or die (mysql_error());
				$total_proyectos = mysql_num_rows($res_consulta_proy);
			     while($mostrar_proyectos = mysql_fetch_array($res_consulta_proy)){
					 //$arr_id_proyectos[] = $mostrar_proyectos['id_proyecto'];
					 echo 	"<option value=\"". $mostrar_proyectos['id_sector'] ."\"> ".$mostrar_proyectos['id_sector']." - ".$mostrar_proyectos['sector']."</option>";
				 }
			?>
</select><br><br><b>Region </b><br>
<select name="Region" id="Region" style="width:400px">
            <option value="0">-seleccione-</option>
            <?php
				$consulta_proyectos = "SELECT id_region, nombre FROM regiones order by id_region ASC";
				$res_consulta_proy = mysql_query($consulta_proyectos,$siplan_data_conn) or die (mysql_error());
				$total_proyectos = mysql_num_rows($res_consulta_proy);
			     while($mostrar_proyectos = mysql_fetch_array($res_consulta_proy)){
					 //$arr_id_proyectos[] = $mostrar_proyectos['id_proyecto'];
					 echo 	"<option value=\"". $mostrar_proyectos['id_region'] ."\"> ".$mostrar_proyectos['id_region']." - ".$mostrar_proyectos['nombre']."</option>";
				 }
			?>
</select><br><br><b>Municipio</b><br>
<select name="mun" id="mun" style="width:400px">
            <option value="0">-seleccione-</option>
            <?php
				$consulta_proyectos = "SELECT * FROM municipios order by nombre ASC";
				$res_consulta_proy = mysql_query($consulta_proyectos,$siplan_data_conn) or die (mysql_error());
				$total_proyectos = mysql_num_rows($res_consulta_proy);
			     while($mostrar_proyectos = mysql_fetch_array($res_consulta_proy)){
					 //$arr_id_proyectos[] = $mostrar_proyectos['id_proyecto'];
					 echo 	"<option value=\"". $mostrar_proyectos['id_finanzas'] ."\"> ".$mostrar_proyectos['nombre']."</option>";
				 }
			?>
</select><br><br><b>Eje</b> <br>
<select name="Eje" id="Eje" style="width:400px">
            <option value="0">-seleccione-</option>
            <?php
				$consulta_proyectos = "SELECT id_eje, eje FROM eje order by id_eje ASC";
				$res_consulta_proy = mysql_query($consulta_proyectos,$siplan_data_conn) or die (mysql_error());
				$total_proyectos = mysql_num_rows($res_consulta_proy);
			     while($mostrar_proyectos = mysql_fetch_array($res_consulta_proy)){
					 //$arr_id_proyectos[] = $mostrar_proyectos['id_proyecto'];
					 echo 	"<option value=\"". $mostrar_proyectos['id_eje'] ."\"> ".$mostrar_proyectos['eje']."</option>";
				 }
			?>
</select><br><br><b>
Programa </b><br>
<select name="Programa" id="Programa" style="width:400px">
            <option value="0">-seleccione-</option>
            <option value="1">SUMAR</option>
            <option value="2">OTROS</option>
</select><br><br>


 <b>Estado</b><br>
	   <select name="Tipo" id="Tipo" style="width:400px"  >


		 <option value="0" selected="selected">-seleccione-</option>



		  <option value="1" >Sin Aprobar</option>




		    <option value="2">Aprob. Dependencia</option>

		  <option value="3">Aprob. UPLA</option>

		    <option value="4">Con Oficio de Ejec.</option>


      </select>







<br>
<br>
<input type="submit" name="print" id="print" value="Imprimir" />
<input type="submit" name="xls" id="print" value="Exportar XLS"/>

</form>
</div>

<p>&nbsp;</p>
</div>
