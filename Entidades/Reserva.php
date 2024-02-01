<?php

class Reserva
{
    private $idReserva;
    private $fk_idCliente;
    private $fk_idHabitacion;
    private $checkIn;
    private $checkOut;
    private $ip;

    public function __construct()
    {
    }

    public function __get($atributo)
    {
        return $this->$atributo;
    }
    public function __set($atributo, $valor)
    {
        $this->$atributo = $valor;
        return $this;
    }

    
}
