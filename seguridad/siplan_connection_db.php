<?php
class conectar{
	protected $servidor;
	protected $usuario;
	protected $clave;
	protected $bd;
	protected $conexion;
    protected $error = "Error en la Conexión a la Base de Datos, favor de contactar al webmaster";

    function inicializar($h,$u,$p,$b){
     $this->servidor = $h;
     $this->usuario = $u;
     $this->clave = $p;
     $this->bd = $b;
    }

	function conectarse(){
     $this->conexion = new mysqli($this->servidor,$this->usuario,$this->clave,$this->bd);
    if ($this->conexion->connect_errno) {
        return $this->error;
      }else{return $this->conexion;}

    }
}
?>
