<?php 
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    include_once  '../config.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="index.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    <aside>
        <h2>Hotel Carballo</h2>
        <h3>Bienvenido <?php // echo $_SESSION['usuario'] ?></h3>
        <nav>
            <a href="index.php">Inicio</a>
            <a href="reservas.php">Reservar habitacion</a>
            <a href="listar.php">Ver reservas</a>
            <a href="contacto.php">Nuestro contacto</a>
        </nav>
        <h3><a href="login.php">Cerrar sesion </a></h3>
    </aside>    
