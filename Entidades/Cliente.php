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

        public function cargarCliente($request){
            $this->idCliente = $request ["id"];
            $this->nombre = $request ["nombre"];
            $this->email = $request ["email"];
            $this->dni = $request ["dni"];
            $this->pass = $request ["pass"];
        }

        public function insertar()
        {
            //Instancia la clase mysqli con el constructor parametrizado
            $mysqli = new mysqli(Config::BBDD_HOST, Config::BBDD_USUARIO, Config::BBDD_CLAVE, Config::BBDD_NOMBRE, Config::BBDD_PORT);
            //Arma la query
            $sql = "INSERT INTO clientes (
                        nombre,
                        email,
                        dni,
                        pass
                    ) VALUES (
                        '$this->nombre',
                        '$this->dni',
                        '$this->email',
                        '$this->pass'
                    );";
            // print_r($sql);exit;
            //Ejecuta la query
            if (!$mysqli->query($sql)) {
                printf("Error en query: %s\n", $mysqli->error . " " . $sql);
            }
            //Obtiene el id generado por la inserción
            $this->idcliente = $mysqli->insert_id;
            //Cierra la conexión
            $mysqli->close();
        }
    }
?>