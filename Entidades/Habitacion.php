<?php 
    class Habitacion{

        private $idHabitacion;
        private $ambientes;
        private $precio_noche;
        private $piso;

        public function __construct() {
        }

       //GETTERS Y SETTERS
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
?>