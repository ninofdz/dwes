<!--  versió 2:
		Fa el mateix que la versió 1, però introdueix dues millores:
		 	- Empro la funció isset() per comprovar si l'usuari ha omplit
				els camps
			- Passo el contingut dels paràmetres a variables
-->

<?php
	//inicialitzar les variables
	$user_nom  = $user_llin = $user_dni = $user_tlf = $user_email = "";
	$nomErr = $llinErr = $dniErr = $tlfErr = "";
	$emailErr = ".";
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
<head>
	<link rel="stylesheet" href="style.css">
</head>
<body>

	<?php



	//Si ha estat processat el formulari, mostro els resultats
	if (isset( $_POST['envia'] ) ) {

		if (empty($_POST["user_nom"])) {
			$nomErr = "<span style='color:red'>*</span>";
			echo "<style> #nom1{background-color:red} </style>";
		} else {
			$nom = clean_name($_POST["user_nom"]);
		}

		if (empty($_POST["user_llin"])) {
			$llinErr = "<span style='color:red'>*</span>";
		} else {
			$llin = clean_name($_POST["user_llin"]);
		}


		if (isset ($_POST["user_dni"])) {
			$dni = $_POST["user_dni"];
			$dniNum = strlen($dni);
			$dniLetra = substr($dni, -1);
			$dniNumeros = substr($dni, 0, 8);
			if ($dni == "") {
					$dniErr = "*";
			}
			elseif (!is_numeric($dniNumeros) || is_numeric($dniLetra) || $dniNum !== 9  ) {
				$dniErr = "mal";
			}

		}

		if (empty($_POST["user_tlf"])) {
			$tlfErr = "<span style='color:red'>*</span>";
		} else {
			$tlf = clean_name($_POST["user_tlf"]);
		}

		$email = $_POST["user_email"];

		if (empty($_POST["user_email"])) {
				$comprobarEmail = "user_vacio";
				$emailErr = "<span style='color:red'>*</span>";
		} elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
				$comprobarEmail = "mal";
				$emailErr = "<span style='color:red'>Formato de email</span>";
		} else {
				$emailErr = "";
		}


}


if( empty($nomErr) && empty($llinErr) && empty($dniErr) &&
empty($tlfErr) && empty($emailErr)){


	?>


	  <p> Bon dia, <?php echo $nom; ?> </p>
	  <p> La teva direccio de correu es: <?php echo $email; ?> </p>



	<?php
    } else { ?>

<div class="contenedor">

		<div class="formulario">

	  <form action="form.php" method="post">
		<h1>Registra't</h1>

			<fieldset>
				<legend><span class="number">1</span>Your basic info</legend>
				<span class="campo">Campo requerido *</span><br>
			  <label for="name">Name<span id="requerido">*</span><?php echo $nomErr;?>:</label>
				<input type="text" id="name"  name="user_nom">

				<label for="llin">Llinatge:<span id="requerido">*</span><?php echo $llinErr;?></label>
				<input type="text"  id="llin" name="user_llin">

				<label for="dni">DNI:</label>
				<input type="text"  id="dni" name="user_dni"><?php if ($dniErr == "*") { echo "vacio";} elseif ($dniErr == "mal"){ echo "tiene que tener formato DNI";} ?>

				<label for="tlf">Teléfon:</label>
				<input type="text" id="tlf"  name="user_tlf"><?php echo $tlfErr;?><br>

				<label for="email">Email:</label>
				<input type="text" id="email"  name="user_email" placeholder="Ex: tuemail@dominio.com">
				<?php
				if ($comprobarEmail == "vacio"){
					echo $emailErr;
				} elseif ($comprobarEmail == "mal"){
					 echo $emailErr;
				} ?>

				<label for="dnaix">Data naixement:</label>
				<input type="date" id="dnaix" name="user_dnaix"><br>

				<label for="sexe">Sexe:</label>
  			<input type="radio" id="sexe" name="user_sexe" value="hombre"> Hombre
    		<input type="radio" id="sexe" name="user_sexe" value="mujer"> Mujer
    		<input type="radio" id="sexe" name="user_sexe" value="otro"> Otro
			</fieldset>

			<fieldset>
				<legend><span class="number">2</span>Your Profile</legend>

				<label>Coneixements: </label>
			    <input type="checkbox" name="user_coneixements[]" value="java"><label class="light" for="java">Java</label><br>
			    <input type="checkbox" name="user_coneixements[]" value="html5"><label class="light" for="html5">Html5</label><br>
			    <input type="checkbox" name="user_coneixements[]" value="javascript"><label class="light" for="javascript">Javascript</label><br>
			    <input type="checkbox" name="user_coneixements[]" value="php"><label class="light" for="php">PHP</label><br>
			    <input type="checkbox" name="user_coneixements[]" value="xml"><label class="light" for="xml">XML</label><br>
			    <input type="checkbox" name="user_coneixements[]" value=".net"><label class="light" for="net">.NET</label><br>

					<label for="job">Experiencia laboral</label>
				    <select id="job" name="user_job">
				      <option value="sense">Sense experiència</option>
				      <option value="menor1"> < 1 any</option>
				      <option value="menor2"> < 2 anys</option>
				      <option value="mayor2"> > 2 anysAudi</option>
				    </select>
					</fieldset>
	        <button type="submit" name="envia">enviar</button>
	  </form>
		</div>
		</div>
	<?php } ?>

</body>
</html>
