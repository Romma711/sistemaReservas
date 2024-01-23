<?php


include_once "../Entidades/Reserva.php";

$reserva = new Reserva;
$aReservas = array();
$aReservas = $reserva->obtenerReservas($aReservas);

function ordenarFechas($fechaA, $fechaB)
{
    return strtotime(trim($fechaA['checkIn'])) > strtotime(trim($fechaB['checkIn']));
}

usort($aReservas, "ordenarFechas");

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
    <main>
        <nav class="row text-start nav-div py-3 px-3">
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

        <div class="row justify-center" style="width: 100%; height: 100%">
            <?php foreach ($aReservas as $reserva) : ?>
                <div class="card border border-primary col-3 m-2">
                    <div class="card-body">
                        <div class="mb-2">
                            <h4 class="card-title">Nombre del cliente: <?php echo $reserva["nombre"]; ?></h4>
                            <h5 class="card-subtitle">Dni del cliente: <?php echo $reserva["dni"]; ?></h5>
                        </div>
                        <p class="card-text mt-1">Numero de habitacion: <?php echo $reserva["numeroHabitacion"]; ?></p>
                        <p class="card-text text-decoration-underline">Check in: <?php echo $reserva["checkIn"]; ?></p>
                        <p class="card-text text-decoration-underline">Check out: <?php echo $reserva["checkOut"]; ?></p>
                    </div>
                </div>
            <?php endforeach ?>
        </div>
    </main>
</body>

</html>