function validar(){

var usuario = document.getElementById('usuario').value;
var clave = document.getElementById('clave').value;
var ejercicio = document.getElementById('ejercicio').value;

if(ejercicio=='0' || ejercicio==0){
alert('Por favor elige ejercicio fiscal');
return false();
}

//verificamos que el campo de usuario no este vacio
if (usuario == ''){
alert('Por favor ingrese su nombre de usuario');
return false();
}

//Verificamos que el usuario tenga la magnitud deseada
if (usuario.length < 4){
alert('Deben ser mayor igual a 4 caraceteres');
return false();
}

//Verificamos que la contraseña no este en blanco
if (clave == ''){
alert ('Porfavor ingrese su contraseña');
return false();
}

//Verificamos que la contraseña tenga la magnitud necesaria
if (clave.length < 4){
alert ('La contraseña debe ser mayor a 8 digitos');
return false();
}
//Verificamos que los caracteres sean validos
for(i=0; i < usuario.length; i++){
var caracter = usuario.charAt(i);
if (caracter == "!" || caracter == "%" || caracter == "#"|| caracter == "$" || caracter == " "|| caracter == "@"){
alert("Caracter "+caracter+" en usuario no permitido");
return false();
}
}
//si no existe ningun problema se envía el formulario
document.form_login.submit();
}
