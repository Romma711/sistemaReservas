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

       public function obtenerTodos(){
            $mysqli = new mysqli(Config::BBDD_HOST, Config::BBDD_USUARIO, Config::BBDD_CLAVE, Config::BBDD_NOMBRE, Config::BBDD_PORT);
            $sql = "SELECT 
                        idhabitacion,
                        ambientes,
                        precio_noche,
                        piso
                    FROM habitaciones";
            if (!$resultado = $mysqli->query($sql)) {
                printf("Error en query: %s\n", $mysqli->error . " " . $sql);
            }

            $aResultado = array();

            if($resultado){
                //Convierte el resultado en un array asociativo

                while($fila = $resultado->fetch_assoc()){
                    $entidadAux = new Habitacion();
                    $entidadAux->idHabitacion = $fila["idhabitacon"];
                    $entidadAux->ambientes = $fila["ambientes"];
                    $entidadAux->precio_noche = $fila["precio"];
                    $entidadAux->piso = $fila["piso"];
                    $aResultado[] = $entidadAux;
                }
            }
            $mysqli->close();
            return $aResultado;
        }
    }
?>