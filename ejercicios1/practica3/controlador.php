<?php

  $servername = "localhost";
  $username = "root";
  $password = "root";
  $dbname = "components_data";


  $tabla_db1 = "components";


  // create connection
  $conn = new mysqli($servername, $username, $password, $dbname);


function close_conn(){
  global $conn;
  mysqli_close($conn);
}
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
  global $tabla_db1;
  $sql = "select * from $tabla_db1";
  $result = $conn->query($sql);


  if ($result->num_rows > 0) {
      // output data of each row
      $showComponents = "
      <table>
        <tr>
          <th>Tipo</th>
          <th>Modelo</th>
          <th>Precio</th>
          <th>Descripcion</th>
        </tr>";

      while($row = $result->fetch_assoc()) {

        $showComponents.=
        "<tr>
          <td>".$row["Type"]." </td>
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

function add_component($type, $model, $price, $description){
  global $conn;
  global $tabla_db1;

  $type = test_input($type);
  $model = test_input($model);
  $price = test_input($price);
  $description = test_input($description);

  $sql = "INSERT INTO $tabla_db1 (Type, Model, Price, Description) VALUES ('$type', '$model', $price, '$description')";

  if ($conn->query($sql) === TRUE) {
      echo "Nou registre creat";
      header('location: index.php');

  } else {
      echo "<br>Error:" . $conn->error;
  }

}

 ?>
