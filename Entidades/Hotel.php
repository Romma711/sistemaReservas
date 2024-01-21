<?php 
    class Hotel{

        private $nombre;
        private $aHabitaciones;
        
        public function _construct() {
            $this->$aHabitaciones = array();
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