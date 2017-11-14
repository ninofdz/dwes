<?php

include("abrir_conexion.php");
include("controlador.php");

echo "<form action=\"altas.php\" method=\"post\">";
    echo " <p></b><input name=\"type\" type=\"text\" placeholder=\"Tipo\"></p>";
    echo " <p> </b><input  name=\"model\" type=\"text\" placeholder=\"Marca\"></p>";
    echo " <p></b><input  name=\"price\" type=\"number\" value=\"0\" placeholder=\"Precio\"></p>";
    echo " <textarea   rows=\"4\" cols=\"50\" name=\"description\" placeholder=\"Descripcion...\"></textarea>";
    echo " <a  href=\"http://localhost/ejercicios1/practica3\"><button type=\"button\">Cancelar</button></a>";
    echo " <input type=\"submit\" name=\"submit\" value=\"Envia\">";
echo "</form>";

    if(isset($_POST['submit'])){
    $type = $_POST["type"];
    $model = $_POST["model"];
    $price = $_POST["price"];
    $description = $_POST["description"];

    if (!empty($type) && !empty($model) && !empty($type) && !empty($description)) {
      $conn = conn();
      add_component($conn, $type, $model, $price, $description);

    }else {
      echo "valores incorrectos";
    }

  }


 ?>
