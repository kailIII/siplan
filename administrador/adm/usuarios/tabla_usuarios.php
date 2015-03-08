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
                                            $conexion->query('SET NAMES utf8');

$sql = "select usuarios.id_usuario, usuarios.usuario, usuarios.nombre, usuarios.activo, dependencias.nombre id_dependencia from usuarios, dependencias where usuarios.id_dependencia = dependencias.id_dependencia order by id_usuario;";
                                            $datos = $conexion->query($sql);

                                            if(!$datos)
                                                echo 'error';
                                            else{

                                                    while($row = $datos->fetch_assoc()){

echo "<tr>
<td style='width:10%;'>".$row['id_usuario']."</td><td style='width:15%;'>".$row['usuario']."</td>
<td>".$row['nombre']."</td><td>".$row['id_dependencia']."</td>
<td class='text-center' style='width:3%;'>".($row['activo'] == 1 ? 'Si' : 'No')."</td>
<td class='text-center'>
    <a href='main.php?token=".md5(50)."&id=".$row['id_usuario']."' title ='Editar' class='glyphicon glyphicon-pencil' style='margin-right: 10px;'></a>
    <a href='#' title='Cambiar Contraseña' class='glyphicon glyphicon-lock' style='margin-right: 10px;'></a>
    <a href='main.php?token=".md5(48)."&id=".$row['id_usuario']."' title='Activar/Desactivar' class='glyphicon glyphicon-off'             style='margin-right: 10px;'></a>
    <a href='main.php?token=".md5(49)."&id=".$row['id_usuario']."' title='Eliminar' class='glyphicon glyphicon-remove'></a>
</td></tr>";
                                                    }
                                                $datos->free();

                                        }
                                        ?>
                                   </tbody>
                                </table>
