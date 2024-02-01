<?php 

    class Cliente{

        private $idCliente;
        private $nombre;
        private $email;
        private $dni;
        private $pass;

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