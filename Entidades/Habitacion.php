<?php 
    class Habitacion{

        private $numero;
        private $ambientes;

        public function __construct() {
        }

        public function cargarHabitaciones($array){
            if (file_exists("../Files/habitaciones.txt")){
                $strJson = file_get_contents("../Files/habitaciones.txt");
                $array = json_decode($strJson, true);
                return $array;
            }else{
                echo "error al leer el archivo";
            }
        }
    }
?>