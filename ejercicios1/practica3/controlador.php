<?php

$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "components_data";
// create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// check connection

// if ($conn->connect_error) {
  // die("Connection failed: " . $conn->connect_error);
// }
// else {
//    echo "Connected successfully";
// }

// consults

function consult(){
  global $conn;
  $sql = "select * from components";
  $result = $conn->query($sql);


  if ($result->num_rows > 0) {
      // output data of each row
      $showComponents = "
      <table>
        <tr>
          <th>Modelo</th>
          <th>Precio</th>
          <th>Descripcion</th>
        </tr>";

      while($row = $result->fetch_assoc()) {

        $showComponents.=
        "<tr>
          <td>".$row["Model"]." </td>
          <td>".$row["Price"]." </td>
          <td>".$row["Description"]."</td>
        </tr>
        ";
      }

      $showComponents.= "</table>";
      echo $showComponents;
      echo "<a  href=\"http://localhost/ejercicios1/practica3/altas.php\"><button type=\"button\">Agregar</button></a>";

  } else {
      echo "0 results";
  }
}

// add components

function test_input(&$data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);

}

function add_component($model, $price, $description){

  test_input($model);
  test_input($price);
  test_input($description);

  $sql = "INSERT INTO components (Model, Price, Description) VALUES ($model, $price, $description)";

  if ($conn->query($sql) === TRUE) {
      echo "Nou registre creat";
  } else {
      echo "<br>Error:" . $conn->error;
  }

}

 ?>
