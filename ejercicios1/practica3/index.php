<?php


include("abrir_conexion.php");
include("cerrar_conexion.php");
include("controlador.php");

$dbConn = conn();
consult($dbConn);
close_conn($dbConn);




 ?>
