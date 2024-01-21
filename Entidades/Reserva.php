<?php 

class Reserva
{
    private $cliente;
    private $habitacion;
    private $checkIn;
    private $checkOut;

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