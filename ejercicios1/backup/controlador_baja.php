<?php

//include("abrir_conexion.php");

include("abrir_conexion.php");
include("cerrar_conexion.php");
include("controlador.php");

// abrir conexion
$dbConn = conn();
// consultar los datos
modificar($dbConn);
// cerrar conexiíon

function modificar($conn){
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
          <td><a onClick=\"javascript: return confirm('Por favor, confirme eliminación');\" href='controlador_baja.php?drop=".$row["ID"]."'>X</a></td>
          <td><a href='controlador_modificar.php?update=".$row["ID"]."'>modificar</a></td>
        </tr>
        ";
      }

      $showComponents.= "</table></center>";
      echo $showComponents;
      echo "<br><center><a  href=\"http://localhost/ejercicios1/practica3/altas.php\"><button type=\"button\">Agregar</button></a></center>";

  } else {
    // si no hay mas de 0 columnas muestra que no hay resultados
      echo "0 results";
  }

  // Si se ha enviado el parametro drop, eliminará el registro con ese ID asociado
  if (isset($_GET['drop'])) {
    $id = $_GET['drop'];
    $sqlDelete = "DELETE FROM $tabla_db1 WHERE ID = '$id'";

    //Ejecutar la consulta
    $resultadoDelete = $conn->query($sqlDelete);

    //redirigir nuevamente a la página para ver el resultado
    header("location: index.php");

  }
  close_conn($conn);


}

 ?>
