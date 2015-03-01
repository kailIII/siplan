<br>
<table class="table table-striped table-bordered table-hover dataTable no-footer" id="dataTables-example" role="grid" aria-describedby="dataTables-example_info" style="width: 90%; margin: 0 auto;">
                                    <thead>
                                        <tr role="row">
                                            <th style="width: 154px;">Id</th>
                                            <th style="width: 183px;">Usuario</th>
                                            <th style="width: 167px;">Nombre</th>
                                            <th style="width: 133px;">Dependencia</th>
                                            <th style="width: 98px;">Activo</th>
                                            <th  style="width: 98px;">Herramientas</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $conexionn = mysql_connect("localhost", "root", "");
                                               if(!$conexionn)
                                                   echo 'Error al conectarse a la base de datos';

                                            $db = mysql_select_db("siplan2015", $conexionn);

                                            if(!$db)
                                                   echo 'Error al seleccionar a la base de datos';

                                            mysql_set_charset('utf8',$conexionn);


                                            $sql = "select usuarios.id_usuario, usuarios.usuario, usuarios.nombre, usuarios.activo, dependencias.nombre id_dependencia from usuarios, dependencias where usuarios.id_dependencia = dependencias.id_dependencia;";
                                            $datos = mysql_query($sql,$conexionn);

                                            if(!$datos)
                                                echo 'error'.mysql_error();
                                            else{
                                                mysql_close($conexionn);

                                                    while($row = mysql_fetch_assoc ($datos)){
                                                        //echo $rows['id_usuario'];
echo "<tr><td style='width:10%;'>".$row['id_usuario']."</td><td style='width:15%;'>".$row['usuario']."</td><td>".$row['nombre']."</td><td>                   ".$row['id_dependencia']."</td><td class='text-center' style='width:3%;'>".($row['activo'] == 1 ? 'Si' : 'No')."</td><td class='text-center'><a href='#' title ='Editar' class='glyphicon glyphicon-pencil' style='margin-right: 10px;'></a><a href='#' title='Cambiar Contraseña' class='glyphicon glyphicon-lock' style='margin-right: 10px;'></a><a href='#' title='Activar/Desactivar' class='glyphicon glyphicon-off' style='margin-right: 10px;'></a><a href='#' title='Eliminar' class='glyphicon glyphicon-remove'></a></td></tr>";
                                                    }
                                        }
                                        ?>
                                   </tbody>
                                </table>
