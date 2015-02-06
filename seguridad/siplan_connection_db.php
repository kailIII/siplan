<?php
class conectar{
    //Se crean las variables a utilizar en la clase de la conexión
	protected $servidor;
	protected $usuario;
	protected $clave;
	protected $bd;
	protected $conexion;
    protected $error = "Error en la Conexión a la Base de Datos, favor de contactar al webmaster";

    //Se inicializan las variables para la conexión a la base de datos
    function inicializar($h,$u,$p,$b){
     $this->servidor = $h;
     $this->usuario = $u;
     $this->clave = $p;
     $this->bd = $b;
    }

    //Se realiza la conexión y se regresa el recurso ocn la conexión o con el error
	function conectarse(){
     $this->conexion = new mysqli($this->servidor,$this->usuario,$this->clave,$this->bd);
    if ($this->conexion->connect_errno) {
        return $this->error;
      }else{return $this->conexion;}

    }
}
?>
