<!--  versió 2:
		Fa el mateix que la versió 1, però introdueix dues millores:
		 	- Empro la funció isset() per comprovar si l'usuari ha omplit
				els camps
			- Passo el contingut dels paràmetres a variables
-->

<?php
	//inicialitzar les variables
	$nom  = $llin = $dni = $tlf = $email ="";
	$nomErr = $llinErr = $dniErr = $tlfErr = $emailErr = "";
	$mostrar = false;



	function clean_name($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>

<html>
<body>

	<?php



	//Si ha estat processat el formulari, mostro els resultats
	if (isset( $_POST['submit'] ) ) {

		if (empty($_POST["nom"])) {
			$mostrar = false;
			$nomErr = "Nombre requerido";
		} else {
			$nameErr = "";
			$nom = clean_name($_POST["nom"]);
			$mostrar = true;
		}

		if (empty($_POST["llin"])) {
			$mostrar = false;
			$llinErr = "Nombre requerido";
		} else {
			$llinErr = "";
			$llin = clean_name($_POST["llin"]);
			$mostrar = true;
		}

		if (empty($_POST["dni"])) {
			$mostrar = false;
			$dniErr = "Nombre requerido";
		} else {
			$dniErr = "";
			$dni = test_input($_POST["dni"]);
			$mostrar = true;
		}

		if (empty($_POST["tlf"])) {
			$mostrar = false;
			$tlfErr = "Nombre requerido";
		} else {
			$tlfErr = "";
			$tlf = test_input($_POST["tlf"]);
			$mostrar = true;
		}

		if (empty($_POST["email"])) {
			$mostrar = false;
			$emailErr = "Nombre requerido";
		} else {
			$emailErr = "";
			$email = test_input($_POST["email"]);
			$mostrar = true;
		}
}



if($mostrar){
	?>


	  <p> Bon dia, <?php echo $nom; ?> </p>
	  <p> La teva direccio de correu es: <?php echo $email; ?> </p>



	<?php
    } else { ?>

	  <form action="form.php" method="post">
	  Nom:   <input type="text"   name="nom"><?php echo $nomErr;?><br>
    Llinatge: <input type="text"   name="llin"><<?php echo $llinErr;?>br>
    DNI: <input type="text"   name="dni"><?php echo $dniErr;?><br>
    Teléfon: <input type="text"   name="tlf"><?php echo $tlfErr;?><br>
	  E-mail: <input type="text"   name="email"><?php echo $emailErr;?><br>
		Data de naixement:   <input type="date" name="dnaix"><br>


    Sexe: <input type="radio" name="sexe" value="hombre"> Hombre
    <input type="radio" name="sexe" value="hombre"> Mujer
    <input type="radio" name="sexe" value="hombre"> Otro <br>

		Coneixements: <br>
    <input type="checkbox" name="coneixements" value="java">Java<br>
    <input type="checkbox" name="coneixements" value="html5">HTML5<br>
    <input type="checkbox" name="coneixements" value="javascript">Javascript<br>
    <input type="checkbox" name="coneixements" value="php">PHP<br>
    <input type="checkbox" name="coneixements" value="xml">XML<br>
    <input type="checkbox" name="coneixements" value=".net">.NET<br>

		Experiencia laboral:
    <select>
      <option value="sense">Sense experiència</option>
      <option value="menor1"> < 1 any</option>
      <option value="menor2"> < 2 anys</option>
      <option value="mayor2"> > 2 anysAudi</option>
    </select>
		<br>

	          <input type="submit" name="submit" value="Enviar"><br>
	  </form>

	<?php } ?>

</body>
</html>
