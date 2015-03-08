<?php
    $conexion->query('SET NAMES utf8');
    $usuario = $conexion->query('SELECT * from usuarios where id_usuario = '.$_GET['id']);
    $row = $usuario->fetch_assoc();
?>

<br>
<form method="post" action="#" name="form_elimina">
    <table style="margin: 0 auto">
        <tr>
            <td><b>Usuario:&nbsp;</b></td>
            <td><?php echo $row['usuario']; ?></td>
        </tr>
        <tr>
            <td><b>Activo:&nbsp;</b></td>
            <td><?php if($row['activo'] == 1) echo 'Si'; else echo 'No'; ?></td>
        </tr>
        <tr>
            <td><b>Nombre:&nbsp;</b></td>
            <td><?php echo $row['nombre']; ?></td>
        </tr>
        <tr>
            <td><b>Area:&nbsp;</b></td>
            <td><?php echo $row['area']; ?></td>
        </tr>
        <tr>
            <td><b>Cargo:&nbsp;</b></td>
            <td><?php echo $row['cargo']; ?></td>
        </tr>
        <tr>
            <td></td>
            <td class="text-right">
                <br><input type="submit" value="Eliminar" name="eliminar" onclick="confirmaElimnacion()">
            </td>
        </tr>
    </table>
    <input type="hidden" id="elimina" name="eliminar">

</form>
<script>
    function confirmaElimnacion(){
        if(confirm("¿Esta seguro de eliminar el registro?")){
            $("#elimina").val(1);
            document.form_elimina.submit();
        }else{
            $("#elimina").val(0);
            document.form_elimina.submit();
        }
    }
</script>
<?php
    if(isset($_POST['eliminar']) && $_POST['eliminar'] == 1){
        $conexion->query('DELETE FROM usuarios WHERE id_usuario = '.$_GET['id']);
        echo "<script type='text/javascript'>location.href='main.php?token=67c6a1e7ce56d3d6fa748ab6d9af3fd7';</script>";

    }
?>
