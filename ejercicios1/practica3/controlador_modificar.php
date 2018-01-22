<?php
// incluir archivos
include("abrir_conexion.php");
include("controlador.php");
$conn = conn();
$id = $_GET["update"];

$sql = "SELECT Type, Model, Price, Description from $tabla_db1 where ID =$id";

// guarda el resultado de la sentencia sql ejecutada en una variable
$result = $conn->query($sql);
$row = $result->fetch_assoc();

// crear el formulario
echo "<center>";
echo "<h1>Modificar componente</h1>";
echo "<form action=\"controlador_modificar.php?update={$_GET['update']}\" method=\"post\">";
    echo " <p>Tipo: </b><input name=\"type\" type=\"text\"  value=\"".$row['Type']."\" size=\"48\"></p>";
    echo " <p> Marca: </b><input  name=\"model\" type=\"text\"  value=\"".$row['Model']."\" size=\"48\"></p>";
    echo " <p>Precio: </b><input  name=\"price\" type=\"number\"  value=\"".$row['Price']."\" size=\"10\"></p>";
    echo " <p>Descripcion:  <textarea   rows=\"4\" cols=\"50\" name=\"description\" >".$row['Description']."</textarea></p>";
    echo " <a  href=\"http://localhost/ejercicios1/practica3\"><button type=\"button\">Cancelar</button></a>";
    echo " <input type=\"submit\" name=\"submit\" value=\"Guardar\">";
echo "</form>";
echo "</center>";

  // si se ha enviado el formulario añade los componentes


    if(isset($_POST['submit'])){
    $type = $_POST["type"];
    $model = $_POST["model"];
    $price = $_POST["price"];
    $description = $_POST["description"];

    // comprueba que no hayan campos vacios
    if (!empty($type) && !empty($model) && !empty($type) && !empty($description)) {
      update_component($conn, $type, $model, $price, $description, $id);

    }else {
      // si no se han enviado correctamente los datos, mostrará un mensaje de error.
      echo "<center>";
      echo "valores incorrectos";
      echo "</center>";

    }

  }


 ?>
