
<!DOCTYPE html>
<html>
  <body>

    <form action="processament2.php" method="post">
    <p>Nom complet: <input type="text" name="nombre"><br><p>
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
    <p><input type="submit" value="envia" name="submit"></p>
    </form>

  </body>
</html>
