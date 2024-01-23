<?php

class Reserva
{
    private $nombre;
    private $dni;
    private $numeroHabitacion;
    private $checkIn;
    private $checkOut;

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

    public function obtenerReservas($array)
    {
        if (file_exists("../Files/reservas.txt")) {
            $strJson = file_get_contents("../Files/reservas.txt");
            $array = json_decode($strJson, true);
            return $array;
        } else {
            return $array = array();
        }
    }

    public function verificarReserva($reservas, $entrada, $salida, $habitacion)
    {
        foreach ($reservas as $reserva) {
            if ($habitacion == $reserva["numeroHabitacion"]) {
                if (($entrada >= $reserva["checkIn"] && $entrada <= $reserva["checkOut"]) || ($salida >= $reserva["checkIn"] && $salida <= $reserva["checkOut"])) {
                    return false;
                }
            }
        }
        return true;
    }

    public function insertarReserva($request)
    {
        $this->nombre = $_POST["txtName"];
        $this->dni = $_POST["txtDni"];
        $this->numeroHabitacion = $_POST["lstNumber"];
        $this->checkIn = $_POST["dtCheckIn"];
        $this->checkOut = $_POST["dtCheckOut"];
    }
}
