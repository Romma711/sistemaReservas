<?php

class Reserva
{
    private $idReserva;
    private $fk_idCliente;
    private $fk_idHabitacion;
    private $checkIn;
    private $checkOut;
    private $ip;
    private $total;

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

    public function cargarFormulario($request){
        $this->idventa = isset($request["id"])? $request["id"] : "";
        $this->fk_idcliente = isset($request["lstCliente"])? $request["lstCliente"] : "";
        $this->fk_idproducto = isset($request["lstProducto"])? $request["lstProducto"]: "";
        if(isset($request["txtAnio"]) && isset($request["txtMes"]) && isset($request["txtDia"])){
            $this->fecha = $request["txtAnio"] . "-" .  $request["txtMes"] . "-" .  $request["txtDia"] . " " . $request["txtHora"];
        }
        $this->cantidad = isset($request["txtCantidad"])? $request["txtCantidad"] : 0;
        $this->preciounitario = isset($request["txtPrecioUni"])? $request["txtPrecioUni"] : 0.0;
        $this->total = $this->preciounitario * $this->cantidad;
    }

    public function insertar(){
        $mysqli = new mysqli(Config::BBDD_HOST, Config::BBDD_USUARIO, Config::BBDD_CLAVE, Config::BBDD_NOMBRE, Config::BBDD_PORT);
        $sql = "INSERT INTO reservas (
                    fk_idcliente, 
                    fk_idhabitacion, 
                    checkIn, 
                    checkOut,
                    ip,
                    total
                ) VALUES (
                    $this->fk_idCliente, 
                    $this->fk_idHabitacion,
                    '$this->checkIn', 
                    '$this->checkOut',
                    $this->ip
                    $this->total
                );";
        if (!$mysqli->query($sql)) {
            printf("Error en query: %s\n", $mysqli->error . " " . $sql);
        }
        $this->idReserva = $mysqli->insert_id;
        $mysqli->close();
    }

    public function actualizar(){

        $mysqli = new mysqli(Config::BBDD_HOST, Config::BBDD_USUARIO, Config::BBDD_CLAVE, Config::BBDD_NOMBRE, Config::BBDD_PORT);
        $sql = "UPDATE reservas SET
                    fk_idcliente = $this->fk_idCliente,
                    fk_idhabitacion = $this->fk_idHabitacion,
                    checkIn = '$this->checkIn',
                    CheckOut = '$this->checkOut',
                    ip = $this->ip,
                    total = $this->total
                WHERE idreserva = $this->idReserva";

        if (!$mysqli->query($sql)) {
            printf("Error en query: %s\n", $mysqli->error . " " . $sql);
        }
        $mysqli->close();
    }

    public function eliminar(){
        $mysqli = new mysqli(Config::BBDD_HOST, Config::BBDD_USUARIO, Config::BBDD_CLAVE, Config::BBDD_NOMBRE, Config::BBDD_PORT);
        $sql = "DELETE FROM reservas WHERE idreserva = " . $this->idReserva;
        if (!$mysqli->query($sql)) {
            printf("Error en query: %s\n", $mysqli->error . " " . $sql);
        }
        $mysqli->close();
    }

    public function obtenerPorId(){
        $mysqli = new mysqli(Config::BBDD_HOST, Config::BBDD_USUARIO, Config::BBDD_CLAVE, Config::BBDD_NOMBRE, Config::BBDD_PORT);
        $sql = "SELECT  idreserva, 
                        fk_idcliente, 
                        fk_idhabitacion, 
                        checkIn, 
                        checkOut,
                        ip,
                        total
                FROM reserva 
                WHERE idreserva = " . $this->idReserva;
        if (!$resultado = $mysqli->query($sql)) {
            printf("Error en query: %s\n", $mysqli->error . " " . $sql);
        }

        if($fila = $resultado->fetch_assoc()){
            $this->idReserva = $fila["idreserva"];
            $this->fk_idCliente = $fila["fk_idcliente"];
            $this->fk_idHabitacion = $fila["fk_idhabitacion"];
            $this->checkIn = $fila["checkIn"];
            $this->checkOut = $fila["checkOut"];
            $this->ip = $fila["ip"];
            $this->total = $fila["total"];
        }
        $mysqli->close();

    }
    
    public function obtenerTodos(){
        $mysqli = new mysqli(Config::BBDD_HOST, Config::BBDD_USUARIO, Config::BBDD_CLAVE, Config::BBDD_NOMBRE, Config::BBDD_PORT);
        $sql = "SELECT idreserva, 
                        fk_idcliente, 
                        fk_idhabitacion, 
                        checkIn, 
                        checkOut,
                        ip,
                        total
                FROM reserva";
        if (!$resultado = $mysqli->query($sql)) {
            printf("Error en query: %s\n", $mysqli->error . " " . $sql);
        }

        $aResultado = array();
        if($resultado){
            while($fila = $resultado->fetch_assoc()){
                $entidadAux = new Reserva();
                $entidadAux->idReserva = $fila["idreserva"];
                $entidadAux->fk_idCliente = $fila["fk_idcliente"];
                $entidadAux->fk_idHabitacion = $fila["fk_idhabitacion"];
                $entidadAux->checkIn = $fila["checkIn"];
                $entidadAux->checkOut = $fila["checkOut"];
                $entidadAux->ip = $fila["ip"];
                $entidadAux->total = $fila["total"];
                $aResultado[] = $entidadAux;
            }
        }
        $mysqli->close();
        return $aResultado;
    }
    
}
