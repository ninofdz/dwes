<html>
<head>
</head>

<body>
<?php

  //Ejercicio1

  echo "Hola món";

  //Ejercicio2

  //phpinfo();

  //Ejercicio3

  echo "<br><b>Hola món</b>";
  echo "<br><i>Hola món</i>";
  echo "<br><h1>Hola món</h1>";
  echo "<br><h2>Hola món</h2>";
  echo "<br><h3>Hola món</h3>";
  echo "<br><h4>Hola món</h4>";
  echo "<br><h5>Hola món</h5>";

  //Ejercicio4

//localhost/ejercicios1/ejercicios.php?numero1=5&numero2=10

  $num1 = $_GET['numero1'];
  $num2 = $_GET['numero2'];

  $resultado = $num1 + $num2;

  echo "El resultado de $num1 + $num2 es = $resultado";

  //Ejercicio5

  $palabra1 = $_GET['palabra1'];
  $palabra2 = $_GET['palabra2'];

  //localhost/ejercicios1/ejercicios.php?palabra1=hola&palabra2=adiós

  echo "<br>Les paraules són $palabra1 i $palabra2.";

  // Ejercicio6
  //localhost/ejercicios1/ejercicios.php?nom=tonino&llinatge=fernandez&edat=19

  $nom = $_GET['nom'];
  $ape = $_GET['llinatge'];
  $edad = $_GET['edat'];

echo "<br><br>
        <table border='1'>
          <tr>
            <th>Nom:</th>
            <td>$nom</td>
          </tr>
          <tr>
            <th>Llinatge:</th>
            <td>$ape</td>
          </tr>
          <tr>
            <th>Edat:</th>
            <td>$edad</td>
          </tr>
        </table>";

  // Ejercicio7

  $int = 10;
  $real = 3.14;
  $boolean = false;
  $string = "hola";
  $array = array(1,2,3);

  var_dump("Valores: $int $real $boolean $string $array");


echo "<br>";
$nodeclarada;
// Sale null
var_dump($nodeclarada);

  ?>



</body>

</html>
