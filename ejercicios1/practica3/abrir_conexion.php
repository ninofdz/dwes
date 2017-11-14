<?php

// funcion para establecer conexión con la base de datos

function conn(){

  $servername = "localhost";
  $username = "root";
  $password = "root";
  $dbname = "components_data";

  // crea la conexion
  $conn = new mysqli($servername, $username, $password, $dbname);

  return $conn;
}
 ?>
