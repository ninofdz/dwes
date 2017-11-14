<?php

function conn(){

  $servername = "localhost";
  $username = "root";
  $password = "root";
  $dbname = "components_data";

  // create connection
  $conn = new mysqli($servername, $username, $password, $dbname);

  return $conn;
}
 ?>
