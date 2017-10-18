<?php

// Exercici 1

/*
$noms = array ("nom"=> "Alberto Contador", "professio" => "Ciclista", "edat"=> 35, "equip"=>"Trek");

function imptabla($noms){

echo "<table border=1>";

foreach ($noms as $key => $value) {
  echo "<tr>";
  echo "<td>$key</td>";
  echo "<td>$value</td>";
  echo "</tr>";

}
echo "</table";

}

imptabla($noms);
*/

// Exercici 2

/*

$noms = array ("nom"=> "Alberto Contador", "professio" => "Ciclista", "edat"=> 35, "equip"=>"Trek");

function imptabla($noms){

echo "<table border=1>";

foreach ($noms as $key => $value) {

  $pos = strpos($value, "a");

  if ($pos == true) {

    echo "<tr>";
    echo "<td>$key</td>";
    echo "<td>$value</td>";
    echo "</tr>";

  }


}
echo "</table";

}

imptabla($noms);

*/
/*
$palabras = "blanco negro verde amarillo azul";

function funComas($palabras){
  $palOrdenado = explode(" ", $palabras);

  echo implode(", " , $palOrdenado);
}

funComas($palabras);

*/
// Ejercicio4
/*
$string = "Imprime separadamente estas cinco palabras";

function funComas($string){
  $palOrdenado = explode(" ", $string);

  echo implode("<br>" , $palOrdenado);
}

funComas($string);
*/

// Ejercicio 5
/*
$noms = array ("Maria", "Joan", "Luis", "Pere", "Pep", "Susana");


function strGuions ($noms){

  echo implode("-", $noms);
}

strGuions($noms);
*/

// Ejercicio 6

$frase = "ies son ferrer";

function crear_acronimo ($frase){

  $acronimo = "";
  
  foreach (explode(' ', )) {
    $acronimo = $p[0];
  }

  echo $acronimo;

}

crear_acronimo($frase);

?>
