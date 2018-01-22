<?php

// incluir archivos
include("abrir_conexion.php");
include("cerrar_conexion.php");
include("controlador.php");

session_start();

if (isset($_SESSION['user'])) {
  // abrir conexion
  $dbConn = conn();
  // consultar los datos
  consult($dbConn);
  // cerrar conexíon
  close_conn($dbConn);
} else {
  include("pantalla_login.php");
}



 ?>
