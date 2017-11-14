<?php


// creamos la variable para la tabla
$tabla_db1 = "components";

// funcion que consulta los datos de la base de datos
function consult($conn){
  global $tabla_db1;
  $sql = "select * from $tabla_db1";
  $result = $conn->query($sql);

  // comprueba que el resultado de la query tenga más de 0 columnas
  if ($result->num_rows > 0) {
      // muestra los datos de la bd en una tabla
      $showComponents = "
    <center>
    <h1>Componentes</h1>
      <table border = \"1\" width = \"600\" height = \"150\">
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

      $showComponents.= "</table></center>";
      echo $showComponents;
      echo "<br><center><a  href=\"http://127.0.0.1/dwes/ejercicios1/practica3/altas.php\"><button type=\"button\">Agregar</button></a>";
      echo "<a  href=\"http://127.0.0.1/dwes/ejercicios1/practica3/controlador_baja.php\"><button type=\"button\">Modificar</button></a></center>";

  } else {
    // si no hay mas de 0 columnas muestra que no hay resultados
      echo "0 results";
  }
}

// funcion para eliminar innecesarios caracteres, para eliminar barras invertidas y convertir
// caracteres especiales en entidades HTML y asi evitar ataque SQL Injection
function test_input(&$data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
}

// función para añadir componentes
function add_component($conn, $type, $model, $price, $description){
  global $tabla_db1;

  // usa la funcion test input para limpiar los datos
  test_input($type);
  test_input($model);
  test_input($price);
  test_input($description);

  // sentencia para insertar los datos a la tabla
  $sql = "INSERT INTO $tabla_db1 (Type, Model, Price, Description) VALUES ('$type', '$model', $price, '$description')";

  // si se han insertado correctamente, redireccionará a la página principal
  if ($conn->query($sql) === TRUE) {
      header('location: index.php');

  } else {
      echo "<br>Error:" . $conn->error;
  }

}

 ?>
