<?php
    $conexion->query('SET NAMES utf8');
    $usuario = $conexion->query('SELECT usuario, activo from usuarios where id_usuario = '.$_GET['id']);
    $row = $usuario->fetch_assoc();
?>
<h2><span class="glyphicon glyphicon-off"></span>&nbsp;Bloqueo de Usuarios</h2>
<br>
<form method="post" action="#">
    <table style="margin: 0 auto">
        <tr>
            <td>
            <b>Usuario:&nbsp;</b>
            </td>
            <td><?php
                echo $row['usuario'];
                ?>
            </td>
        </tr>
        <tr>
            <td>
                <b>Activo:&nbsp;</b>
            </td>
            <td>
                Si <input type="radio" name="activo" value="1" <?php if($row['activo'] == 1) echo 'checked'; ?>>
                No <input type="radio" name="activo" value="0" <?php if($row['activo'] == 0) echo 'checked'; ?>>
            </td>
        </tr>
        <tr>
            <td></td>
            <td class="text-right">
                <br><input type="submit" value="Guardar" name="guardar" class="btn btn-default">
            </td>
        </tr>
    </table>

</form>

<?php
    if(isset($_POST['guardar'])){
        $conexion->query('UPDATE usuarios set activo='.$_POST['activo'].' where id_usuario = '.$_GET['id']);
        echo "<script type='text/javascript'>location.href='main.php?token=67c6a1e7ce56d3d6fa748ab6d9af3fd7';</script>";

    }
?>
