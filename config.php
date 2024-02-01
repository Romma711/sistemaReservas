<?php 

session_start();

date_default_timezone_set('America/Argentina/Buenos_Aires');

class Config {
    const BBDD_HOST  = 'localhost'; // Servidor de la base de datos.
    const BBDD_PORT =  '3306';        // Puerto en el que se encuentra el servidor de la B
    const BBDD_USUARIO= 'root';     // Usuario para acceder a la BD.
    const BBDD_CLAVE  = '';         // Contraseña del usuario.
    const BBDD_NOMBRE = 'sistemaReservas'; //Nombre de la base de datos
}
?>