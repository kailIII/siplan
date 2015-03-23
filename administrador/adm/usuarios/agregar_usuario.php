<h2><span class="glyphicon glyphicon-plus"></span>&nbsp;Agregar Usuarios</h2>
<br>
<form method="post" action="#" name="form_editar">
    <table style="margin: 0 auto">
        <tr >
            <td style="margin: 5px;"><b>Usuario:&nbsp;</b></td>
            <td><input type="text" name="usuario" id="usuario" value="<?php if(isset($_POST['usuario'])) echo $_POST['usuario'];?>"></td>
        </tr>
        <tr>
            <td><b>Nombre:&nbsp;</b></td>
            <td><input type="text" name="nombre" id="nombre" class="col-sm-9" value="<?php if(isset($_POST['nombre'])) echo $_POST['nombre'];?>"></td>
        </tr>
        <tr>
            <td><b>Contraseña:&nbsp;</b></td>
            <td><input type="password" name="contrasena" id="pass"></td>
        </tr>
        <tr>
            <td><b>Repetir Contraseña:&nbsp;</b></td>
            <td><input type="password" name="contrasena_rep" id="passr"></td>
        </tr>
        <tr>
            <td><b>Dependencia:&nbsp;</b></td>
            <td>
                <select name="dependencia" id="dependencia">
                    <option value = ''></option>
                    <?php
                        $dependencias = $conexion->query('SELECT id_dependencia, nombre from dependencias');

                        while($rowd = $dependencias->fetch_assoc()){
                                echo '<option value = '.$rowd['id_dependencia'].'>'.$rowd['nombre'].'</option>';
                        }
                    ?>

                </select>
            </td>
        </tr>
         <tr>
            <td>
                <b>Activo:&nbsp;</b>
            </td>
            <td>
                Si <input type="radio" name="activo" value="1" checked>
                No <input type="radio" name="activo" value="0">
            </td>
        </tr>
         <tr>
            <td><b>Area:&nbsp;</b></td>
            <td><input type="text" name="area" id="area" value="<?php if(isset($_POST['area'])) echo $_POST['area'];?>"></td>
        </tr>
         <tr>
            <td><b>Cargo:&nbsp;</b></td>
            <td><input type="text" name="cargo" id="cargo" value="<?php if(isset($_POST['cargo'])) echo $_POST['cargo'];?>"></td>
        </tr>
         <tr>
            <td><b>Correo Electrónico:&nbsp;</b></td>
            <td><input type="email" name="correo" id="correo" value="<?php if(isset($_POST['correo'])) echo $_POST['correo'];?>"></td>
        </tr>
         <tr>
            <td><b>Teléfono Oficina:&nbsp;</b></td>
            <td><input type="tel" name="tel_of" id="tel_of" value="<?php if(isset($_POST['tel_of'])) echo $_POST['tel_of'];?>"></td>
        </tr>
         <tr>
            <td><b>Extensión:&nbsp;</b></td>
            <td><input type="text" name="ext" id="ext" value="<?php if(isset($_POST['ext'])) echo $_POST['ext'];?>"></td>
        </tr>
         <tr>
            <td><b>Teléfono Celular:&nbsp;</b></td>
            <td><input type="tel" name="tel_cel" id="tel_cel" value="<?php if(isset($_POST['tel_cel'])) echo $_POST['tel_cel'];?>"></td>
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
        if(document.getElementById('usuario').value == '' || document.getElementById('nombre').value == '' || document.getElementById('pass').value == '' || document.getElementById('passr').value == '' || document.getElementById('dependencia').selectedIndex  == 0 || document.getElementById('area').value == '' || document.getElementById('cargo').value == ''){
                alert("Los campos Usuario, Nombre, Contraseña, Dependencia, Area y Cargo son obligatorios");
        }else{
            if(document.getElementById('pass').value.length < 4){
                alert("La longitud minima de la contraseña es de 4 caracteres");
            }else{
                if(document.getElementById('pass').value != document.getElementById('passr').value){
                alert("Las contraseñas no coinciden");
                }else{
                    if(confirm("¿Esta seguro de guardar el registro?")){
                        $("#guardar").val(1);
                        document.form_editar.submit();
                    }else{
                        $("#guardar").val(0);
                        document.form_editar.submit();
                    }
                }
            }
        }
    }

    $(document).ready(function (){
        $("#pass").val('');
        $("#nombre").val(<?php if(!isset($_POST['nombre']))echo '';?>);
        $("#passr").val('');

    });
</script>
<?php
    if(isset($_POST['guardar']) && $_POST['guardar'] == 1){
        if(isset($_POST['correo']) && $_POST['correo'] != '')
            $correo = $_POST['correo'];
        else
            $correo = '_';
        if(isset($_POST['tel_of']) && $_POST['tel_of'] != '')
            $tel = $_POST['cortel_ofreo'];
        else
            $tel = 0;
        if(isset($_POST['ext']) && $_POST['ext'] != '')
             $ext = $_POST['ext'];
        else
            $ext = 0;
        if(isset($_POST['tel_cel']) && $_POST['tel_cel'] != '')
             $cel = $_POST['tel_cel'];
        else
            $cel = 0;

$conexion->query("INSERT INTO usuarios(usuario, nombre, password, id_dependencia, activo, area, cargo, correo, tel_oficina, extension, tel_cel)
values('{$_POST["usuario"]}', '{$_POST["nombre"]}','{$_POST["contrasena"]}',{$_POST["dependencia"]}, {$_POST["activo"]},'{$_POST["area"]}', '{$_POST["cargo"]}', '$correo', $tel, $ext, $cel );") OR die("No se pudo guadar el registro");

        echo "<script type='text/javascript'>location.href='main.php?token=67c6a1e7ce56d3d6fa748ab6d9af3fd7';</script>";

    }
?>
