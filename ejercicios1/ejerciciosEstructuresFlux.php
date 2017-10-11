<?php

//Ejercicio1

//localhost/ejercicios1/ejerciciosEstructuresFlux.php?num1=5&num2=10

/*
$num1 = $_GET['num1'];
$num2 = $_GET['num2'];

if($num1 > $num2){
  echo "$num1 es mayor que $num2";
  }else if ($num2 > $num1){
    echo "$num2 es mayor que $num1";
  }
  else {
    echo "son iguales";
}

*/

//Ejercicio2

//localhost/ejercicios1/ejerciciosEstructuresFlux.php?pal1=hola&pal2=adiosi

/*
echo "<br>";
$palabra1 = strlen($_GET['pal1']);
$palabra2 = strlen($_GET['pal2']);

if($palabra1 > $palabra2){
  echo "La palabra " . $_GET["pal1"] . " es más larga que " . $_GET["pal2"];
}elseif ($palabra1 < $palabra2) {
  echo "La palabra " . $_GET["pal2"] . " es más larga que " . $_GET["pal1"];
} else {
  echo "Las palabras tienen la misma longitud";
}
*/

//Ejercicio3

/*
$var = 5;

if(is_int($var)){
  echo "es entero";
} elseif (is_string($var1)) {
  echo"es un string";
} elseif (is_bool($var)) {
  echo "Es un booleano";
} elseif (is_real($var1)) {
  echo "Es un real";
}
*/

// Ejercicio4
/*
$var = $_GET["variable"];

if(is_int($var)){
  echo "es entero";
} elseif (is_string($var)) {
  echo"es un string";
} elseif (is_bool($var)) {
  echo "Es un booleano";
} elseif (is_real($var1)) {
  echo "Es un real";
}
*/
// al pasarlo por parametro son string

// Ejercicio5

/*

$num1 = $_GET["num1"];
$num2 = $_GET["num2"];
$operacion = $_GET["operacion"];

if ($operacion == "s"){
  $suma = $num1 + $num2;
  echo "$suma";
} elseif ($operacion == "-") {
  $resta = $num1 - $num2;
  echo "$resta";
}  elseif ($operacion == "*") {
  $mult = ($num1 * $num2);
  echo "$mult";
} elseif ($operacion == "/") {
  $dividir = $num1 / $num2;
  echo "$dividir";
} elseif ($operacion == "p") {
  $pow = pow($num1,$num2);
  echo "$pow";
}
*/

// Ejercicio6

//http://localhost/ejercicios1/ejerciciosEstructuresFlux.php?mes=2

/*
$mes = $_GET["mes"];

switch ($mes) {
  case '1':
    echo "Enero";
    break;
  case '2':
    echo "Febrero";
    break;
  case '3':
    echo "Marzo";
    break;
  case '4':
    echo "Abril";
  break;
  case '5':
    echo "Mayo";
  break;
  case '6':
      echo "Junio";
  break;
  case '7':
      echo "Julio";
  break;
  case '8':
      echo "Agosto";
  break;
  case '9':
      echo "Septiembre";
  break;
  case '10':
      echo "Octubre";
  break;
  case '11':
      echo "Noviembre";
  break;
  case '12':
      echo "Diciembre";
  break;
  default:
    echo "Error, mes no encontrado";
    break;
}

*/

// Ejercicio 1 Bucles
/*
$num = $_GET["num"];
if ($num >= 1 & $num <= 10) {
  for ($i=1; $i < 11 ; $i++) {
    echo "$num x $i = " . ($num*$i) . "<br>";
      }
  } else {
    echo "Escribe un número entre 1 y 10 ";

}
*/

// Ejercicio 2 Bucles

/*
$n = $_GET["n"];

for ($i=0; $i <= $n ; $i++) {
  $suma += $i;
}

echo "$suma";

*/

// Ejercicio 3 Bucles

/*
$pot = $_GET["pot"];

if ($pot >= 1 & $pot<=10 ) {
  for ($i=1; $i <= 10; $i++) {
    $resultado = pow($pot,$i);
    if ($i == 10) {
      echo "$resultado.";
    } else {
      echo "$resultado, ";
    }
  }
} else {
  echo "error";
}
*/

// Ejercicio 4 Bucles

$numero_anterior=1;
$numero_posterior=1;
$serie=1;
$fin=10000;
echo "Serie de Fibonacci:";
while ($serie < $fin){
echo $serie.", ";
$serie=$numero_anterior + $numero_posterior;
$numero_anterior=$numero_posterior;
$numero_posterior=$serie;
}


 ?>
