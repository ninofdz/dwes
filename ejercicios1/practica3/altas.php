<?php

include("controlador.php");

echo "<p></b><input name=\"type\" type=\"text\" placeholder=\"Tipo\"></p>";
echo "<p> </b><input  name=\"model\" type=\"number\" placeholder=\"Marca\"></p>";
echo "<p></b><input  name=\"price\" type=\"text\" placeholder=\"Precio\"></p>";
echo "<textarea  name=\"txt\" rows=\"4\" cols=\"50\" name=\"comment\" form=\"usrform\" placeholder=\"Descripcion...\"></textarea>";
echo "<p></p>";


echo "<form action=\"altas.php\" method=\"post\">
        <input type=\"cancelar\" value=\"Cancelar\">
        <input type=\"envia\" value=\"Guardar\">
      </form>";

if (isset( $_POST['envia'] ) ) {

  add_component($model, $price, $description);

}


 ?>
