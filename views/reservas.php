<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include_once "../entidades/Reserva.php";
include_once "../entidades/Habitacion.php";

$habitacion = new Habitacion;
$aHabitaciones = $habitacion->cargarHabitaciones($aHabitaciones);

$reserva = new Reserva;
$aReservas = $reserva->obtenerReservas(($aReservas));
if($_POST){
    $nombre = $_POST["txtName"];
    $dni = $_POST["txtDni"];
    $numeroHabitacion = $_POST["lstNumber"];
    $checkIn = $_POST["dtCheckIn"];
    $checkOut = $_POST["dtCheckOut"];

    if($reserva->verificarReserva($aReservas,$checkIn,$checkOut,$numeroHabitacion)){
        $aReservas[] = array("nombre" => $nombre,
        "dni" =>$dni,
        "numeroHabitacion"=>$numeroHabitacion,
        "checkIn"=> $checkIn,
        "checkOut"=> $checkOut

    );
    }else{
     $msg ="La habitacion ya esta reservada para esas fechas, por favor pruebe otra fecha";
    }
    
    $strJson = json_encode($aReservas);

    file_put_contents("../Files/reservas.txt",$strJson);
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="index.css">
    <title>Document</title>
</head>

<body>
    <main class="container-fluid">
        <nav class="row text-center nav-div py-3 px-2">
            <div class="col-3">
                <h2>Hotel Carballo</h1>
            </div>
            <div class="col-3">
                <a href="reservas.php">Reservar habitacion</a>
            </div>
            <div class="col-3">
                <a href="listar.php">Ver reservas</a>
            </div>
            <div class="col-3">
                <a href="contactanos.php">Contactate con nosotros</a>
            </div>
        </nav>

        <div class="row col-12">
            <div class="col-6">
                <form class="form-control" action="" method="post">
                    <div class="col-12 from-group">
                        <input type="text" id="txtName" name="txtName" placeholder="Nombre y apellido">
                        <input type="text" id="txtDni" name="txtDni" placeholder="Numero de documento">
                        <label for="lstNumber">Numero de habitacion</label>
                        <select name="lstNumber" id="lstNumber">
                            <option value="" disabled selected>Seleccionar</option>
                            <?php foreach ($aHabitaciones as $habitacion): ?>
                                <option value="<?php echo $habitacion["numero"]; ?>">Numero de habitacion: <?php echo $habitacion["numero"]; ?></option>
                            <?php endforeach ?>
                        </select>
                        <label for="dtCheckIn">Fecha de entrada:</label>
                        <input type="date" id="dtCheckIn" name="dtCheckIn">
                        <label for="dtCheckOut">Fecha de salida:</label>
                        <input type="date" id="dtCheckOut" name="dtCheckOut">
                    </div>
                    <button type="submit" class="btn btn-primary" id="btnReservar" name="btnReservar">Reservar</button>
                </form>
            </div>
            <?php foreach ($aHabitaciones as $habitacion): ?>
            <div class="card col-3">
                <h4>Numero de habitacion: <?php echo $habitacion["numero"]; ?></h4>
                <h4>Cantidade de ambientes: <?php echo $habitacion["ambientes"]; ?></h4>
            </div>
            <?php endforeach ?>
        </div>
    </main>
</body>

</html>