 <?php


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





?>
