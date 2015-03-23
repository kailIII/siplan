<?php
    $conexion->query('SET NAMES utf8');
    $usuario = $conexion->query('SELECT * from usuarios where id_usuario = '.$_GET['id']);
    $row = $usuario->fetch_assoc();
?>
<h2><span class="glyphicon glyphicon-pencil"></span>&nbsp;Edición de Usuarios</h2>
<br>
<form method="post" action="#" name="form_editar">
    <table style="margin: 0 auto">
        <tr>
            <td><b>Id:&nbsp;</b></td>
            <td><?php echo $row['id_usuario']; ?></td>
        </tr><tr>
            <td><b>Usuario:&nbsp;</b></td>
            <td><?php echo $row['usuario']; ?></td>
        </tr>
        <tr>
            <td><b>Nombre:&nbsp;</b></td>
            <td><input type="text" name="nombre" value="<?php echo $row['nombre']; ?>" required></td>
        </tr>
        <!--tr>
            <td><b>Contraseña:&nbsp;</b></td>
            <td><input type="password" name="contrasena" ></td>
        </tr>
        <tr>
            <td><b>Repetir Contraseña:&nbsp;</b></td>
            <td><input type="password" name="contrasena_rep"></td>
        </tr-->
        <tr>
            <td><b>Dependencia:&nbsp;</b></td>
            <td>
                <select name="dependencia">
                    <?php
                        $dependencias = $conexion->query('SELECT id_dependencia, nombre from dependencias');

                        while($rowd = $dependencias->fetch_assoc()){
                            if($rowd['id_dependencia'] == $row['id_dependencia'])
                                echo '<option value = '.$rowd['id_dependencia'].' selected>'.$rowd['nombre'].'</option>';
                            else
                                echo '<option value = '.$rowd['id_dependencia'].'>'.$rowd['nombre'].'</option>';
                        }
                    ?>

                </select>
            </td>
        </tr>
        <tr>
            <td></td>
            <td class="text-right">
                <br><input type="submit" value="Guardar" onclick="confirmaGuardar()" class="btn btn-default">
            </td>
        </tr>
    </table>
    <input type="hidden" id="guardar" name="guardar">

</form>
<script>
    function confirmaGuardar(){
        if(confirm("¿Esta seguro de guardar el registro?")){
            $("#guardar").val(1);
            document.form_editar.submit();
        }else{
            $("#guardar").val(0);
            document.form_editar.submit();
        }
    }
</script>
<?php
    if(isset($_POST['guardar']) && $_POST['guardar'] == 1){
        $conexion->query('UPDATE usuarios SET nombre = "'.$_POST['nombre'].'", id_dependencia = '.$_POST['dependencia'].'
        where id_usuario = '.$_GET['id']);
        echo "<script type='text/javascript'>location.href='main.php?token=67c6a1e7ce56d3d6fa748ab6d9af3fd7';</script>";

    }
?>
