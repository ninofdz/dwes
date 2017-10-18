
<!DOCTYPE html>
<html>



  <head>
  </head>
  <body>


    <?php

    if (isset($_POST['submit'])){
    echo "<br>
         <table>
           <tr>
             <th>Nombre:</th>
             <td>" . $_POST['nombre'] . "</td>
           </tr>
           <tr>
             <th>LLinatge:</th>
             <td>" . $_POST['edad'] . "</td>
           </tr>
           <tr>
             <th>Correo:</th>
             <td>" . $_POST['email'] . "</td>
           </tr>
           <tr>
             <td><b>Género:</b></td>
             <td>";
             if ($_POST['gender'] == "hombre") {
                     echo "Hombre";
                   }elseif ($_POST['gender'] == "mujer") {
                     echo "Mujer";
                   }else {
                     echo "Otro";
                   }
             echo "</td>
             <tr>
               <td> Aficiones </td>
               <td>";   foreach($_POST['afi'] as $aficiones)
                 {
                   echo $aficiones.' ';
                 } echo "</td>
             </tr>


         </table> <br>";


    } else {
?>
    <form action="ejerciciosFormularis3.php" method="post">
    <p>Nom complet: <input type="text" name="nombre" required><br><p>
    <p>Edat: <input type="text" name="edad"><br><p>
    <p>Email: <input type="text" name="email"><br></p>
    <p><input type="radio" name="gender" value="hombre"> hombre</p>
    <p><input type="radio" name="gender" value="mujer"> Mujer</p>
    <p><input type="radio" name="gender" value="otro"> Otro</p>
    <p>Aficiones</p>
    <input type="checkbox" name="afi[]" value="musica">Música
    <input type="checkbox" name="afi[]" value="futbol">Fútbol
    <input type="checkbox" name="afi[]" value="cine">Cine
    <input type="checkbox" name="afi[]" value="videojuegos">VideoJuegos
    <input type="checkbox" name="afi[]" value="estudiar">Estudiar
    <p><br></p>
    <input type="submit" value="envia" name="submit">
    </form>
<?php  } ?>

  </body>
</html>
