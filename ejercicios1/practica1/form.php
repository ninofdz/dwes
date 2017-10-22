<!--  versió 2:
		Fa el mateix que la versió 1, però introdueix dues millores:
		 	- Empro la funció isset() per comprovar si l'usuari ha omplit
				els camps
			- Passo el contingut dels paràmetres a variables
-->
<style>


.contenedor {
	width: 500px;
	margin: auto;
	border: 1px solid black;
}

.formulario {

}

.nom {
	display: inline-block;
}

.llin {
	display: inline-block;
	float: right;
}

</style>
<?php
	//inicialitzar les variables
	$nom  = $llin = $dni = $tlf = $email ="";
	$nomErr = $llinErr = $dniErr = $tlfErr = $emailErr = $emailNoVal = "";
	$mostrar = false;
	$comprobarEmail = "";



	function clean_name($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

	function clean_dni($data) {
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
			$nomErr = "<span style='color:red'>nombre</span>";
			echo "<style> #nom1{background-color:red} </style>";
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


		if (isset ($_POST["dni"])) {
			$mostrar = false;
				$dni = $_POST["dni"];
				$dniNum = strlen($dni);
				$dniLetra = substr($dni, -1);
				$dniNumeros = substr($dni, 0, 8);
				if ($dni == "") {
						$dniErr = "vacio";
				}
				elseif (!is_numeric($dniNumeros) || is_numeric($dniLetra) || $dniNum !== 9  ) {
					$dniErr = "mal";
					$mostrar = true;
				}
		}

		if (empty($_POST["tlf"])) {
			$mostrar = false;
			$tlfErr = "Nombre requerido";
		} else {
			$tlfErr = "";
			$tlf = clean_name($_POST["tlf"]);
			$mostrar = true;
		}

		if (empty($_POST["email"])) {
				$mostrar = false;
				$comprobarEmail = "vacio";
				$emailVacio = "Campo requerido";
		} elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
				$comprobarEmail = "mal";
				$emailMal = "Tiene que tener formato email";
				$mostrar = false;
		} else {
			$mostrar = true;
		}


}



if($mostrar){


	?>


	  <p> Bon dia, <?php echo $nom; ?> </p>
	  <p> La teva direccio de correu es: <?php echo $email; ?> </p>



	<?php
    } else { ?>

<div class="contenedor">


		<div class="formulario">


	  <form action="form.php" method="post">
			<div class="nom">
				Nom:   <input type="text" id="nom1"  name="nom"><?php echo $nomErr;?>
			</div>
			<div class="llin">
				Llinatge: <input type="text"   name="llin"><?php echo $llinErr;?><br>
			</div>
			<div class="dni">
				DNI: <input type="text"   name="dni"><?php if ($dniErr == "mal") { echo "mal xd";} elseif ($dniErr == "vacio"){ echo "vacio";} ?>
			</div>
				<br>
			<div class="tlf">
				Teléfon: <input type="text"   name="tlf"><?php echo $tlfErr;?><br>
			</div>
			<div class="email">
				E-mail: <input type="text"   name="email">
				<?php
				if ($comprobarEmail == "vacio"){
					echo $emailVacio;
				} elseif ($comprobarEmail == "mal"){
					 echo $emailMal;
				} ?>
			</div>

		 <br>
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
		</div>
		</div>
	<?php } ?>

</body>
</html>
