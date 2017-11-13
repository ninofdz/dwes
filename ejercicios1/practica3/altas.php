<?php

include("controlador.php");

echo "<form action=\"controlador.php\" method=\"post\">";
    echo " <p></b><input name=\"type\" type=\"text\" placeholder=\"Tipo\"></p>";
    echo " <p> </b><input  name=\"model\" type=\"text\" placeholder=\"Marca\"></p>";
    echo " <p></b><input  name=\"price\" type=\"number\" value=\"0\" placeholder=\"Precio\"></p>";
    echo " <textarea   rows=\"4\" cols=\"50\" name=\"comment\" placeholder=\"Descripcion...\"></textarea>";
    echo " <a  href=\"http://localhost/ejercicios1/practica3\"><button type=\"button\">Cancelar</button></a>";
    echo " <input type=\"submit\" name=\"submit\" value=\"Envia\">";
    echo "</form>";
 ?>
