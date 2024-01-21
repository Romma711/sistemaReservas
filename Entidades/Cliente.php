<?php 

class Habitacion
{
    private $nombre;
    private $apellido;
    private $dni;

    public function __construct() {
        
    }

    public function __get ($atributo){
        return $this -> $atributo;
    }
    public function __set ($atributo, $valor){
        $this->$atributo = $valor;
        return $this;
    }


}

?>