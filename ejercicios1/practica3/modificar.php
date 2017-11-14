<?php

// incluir archivos
include("abrir_conexion.php");
include("cerrar_conexion.php");
include("controlador.php");

// abrir conexion
$dbConn = conn();
// consultar los datos
modificar($dbConn);
// cerrar conexiíon
close_conn($dbConn);




 ?>
