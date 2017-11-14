<?php


// check connection

// if ($conn->connect_error) {
  // die("Connection failed: " . $conn->connect_error);
// }
// else {
//    echo "Connected successfully";
// }

// consults

$tabla_db1 = "components";

function consult($conn){
  global $tabla_db1;
  $conn;
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
      echo "<a  href=\"http://127.0.0.1/dwes/ejercicios1/practica3/altas.php\"><button type=\"button\">Agregar</button></a>";

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

function add_component($conn, $type, $model, $price, $description){
  $conn;
  global $tabla_db1;

  test_input($type);
  test_input($model);
  test_input($price);
  test_input($description);

  $sql = "INSERT INTO $tabla_db1 (Type, Model, Price, Description) VALUES ('$type', '$model', $price, '$description')";

  if ($conn->query($sql) === TRUE) {
      echo "Nou registre creat";
      header('location: index.php');

  } else {
      echo "<br>Error:" . $conn->error;
  }

}

 ?>
