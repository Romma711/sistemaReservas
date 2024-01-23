<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

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
    <main class="container-flux">
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
        <div class="text-center">
            <h1 class="py-5">Bienvenidos a la web de reservas del Hotel Carballo</h1>
            <p class="py-1" >Podes reservar tu sitio desde ya aprentando aca</p>
            <a href="reservas.php" class="my-2 fs-5 btn btn-primary">Reserva Ya!</a>
        </div>
    </main>
</body>

</html>