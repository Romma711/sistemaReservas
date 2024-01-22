<?php 
    class Hotel{

        private $nombre;
        private $aHabitaciones;
        
        public function _construct() {
            $this->$nombre="Carballo";
            $this->$aHabitaciones = array(1,2,3,4,5,6,7,8,9,10);
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