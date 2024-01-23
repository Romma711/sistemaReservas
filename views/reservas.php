<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include_once "../entidades/Reserva.php";
include_once "../entidades/Habitacion.php";

$habitacion = new Habitacion;
$aHabitaciones = array();
$aHabitaciones = $habitacion->cargarHabitaciones($aHabitaciones);

$reserva = new Reserva;
$aReservas = array();
$aReservas = $reserva->obtenerReservas(($aReservas));
if ($_POST) {
    $nombre = $_POST["txtName"];
    $dni = $_POST["txtDni"];
    $numeroHabitacion = $_POST["lstNumber"];
    $checkIn = $_POST["dtCheckIn"];
    $checkOut = $_POST["dtCheckOut"];

    if ($checkIn > $checkOut) {
        $msg = "Fechas invalidas, por favor vuelva a intentar";
    } else {
        if ($reserva->verificarReserva($aReservas, $checkIn, $checkOut, $numeroHabitacion) == true) {
            $aReservas[] = array(
                "nombre" => $nombre,
                "dni" => $dni,
                "numeroHabitacion" => $numeroHabitacion,
                "checkIn" => $checkIn,
                "checkOut" => $checkOut

            );
        } else {
            $msg = "La habitacion ya esta reservada para esas fechas, por favor pruebe otra fecha";
        }
        $strJson = json_encode($aReservas);

        file_put_contents("../Files/reservas.txt", $strJson);
    }
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

<body class="hero-body">
    <main class="container-fluid">
        <nav class="row text-start nav-div py-3 px-2">
            <div class="col-4">
                <a href="index.php">
                    <h2>Hotel Carballo</h1>
                </a>
            </div>
            <div class="col-4">
                <a href="reservas.php">Reservar habitacion</a>
            </div>
            <div class="col-4">
                <a href="listar.php">Ver reservas</a>
            </div>
        </nav>

        <div class="row col-12">
            <div class="col-6 mt-2 pb-3 hero-form">
                <?php if (isset($msg) && $msg != "") : ?>
                    <div class="alert alert-danger" role="alert">
                        <?php echo $msg; ?>
                    </div>
                <?php endif; ?>
                <form class="form-control border border-primary pb-3" action="" method="post">
                    <div class="col-12">
                        <input type="text" id="txtName" name="txtName" placeholder="Nombre y apellido" class="col-12 my-4 border border-primary form-control" required>
                        <input type="text" id="txtDni" name="txtDni" placeholder="Numero de documento" class="col-12 my-4 border border-primary form-control" required>
                        <label for="lstNumber" class="col-12">Numero de habitacion</label>
                        <select name="lstNumber" id="lstNumber" class="col-12 mt-2 mb-3 border border-primary form-control" required>
                            <option value="" disabled selected>Seleccionar</option>
                            <?php foreach ($aHabitaciones as $habitacion) : ?>
                                <option value="<?php echo $habitacion["numero"]; ?>">Habitacion <?php echo $habitacion["numero"]; ?></option>
                            <?php endforeach ?>
                        </select>
                        <label for="dtCheckIn" class="col-12 mt-1">Fecha de entrada:</label>
                        <input type="date" id="dtCheckIn" name="dtCheckIn" class="col-12 mt-2 mb-3 border border-primary form-control" required>
                        <label for="dtCheckOut" class="col-12 mt-1">Fecha de salida:</label>
                        <input type="date" id="dtCheckOut" name="dtCheckOut" class="col-12 mt-2 mb-3 border border-primary form-control" required>
                    </div>
                    <button type="submit" class="btn btn-primary" id="btnReservar" name="btnReservar">Reservar</button>
                </form>
            </div>
            <div class="col-6 row">
                <?php foreach ($aHabitaciones as $habitacion) : ?>
                    <div class="card border border-primary m-2 col-3">
                        <h4 class="card-title m-2">Habitacion: <?php echo $habitacion["numero"]; ?></h4>
                        <h5 class="card-subtitle m-2">Ambientes: <?php echo $habitacion["ambientes"]; ?></h5>
                    </div>
                <?php endforeach ?>
            </div>
        </div>
    </main>
</body>

</html>