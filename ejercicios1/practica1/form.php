<?php

	// @author Tonino Fernández

	//inicialitzar les variables
	$user_nom  = $user_llin = $user_dni =  $user_email = $user_tlf = $user_dnaix =  "";
	$nomErr = $llinErr = $dniErr = $tlfErr = $coneixErr = "";
	$emailErr = ".";
	$comprobarEmail = "";
	$contar = "";



	// funció que neteja el camp de caràcters especials i evita atacs de SQL Injection
	function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

?>

<html>
<head>

	<style>

	*, *:before, *:after {
		-moz-box-sizing: border-box;
		-webkit-box-sizing: border-box;
		box-sizing: border-box;
	}

	body {
		font-family: 'Nunito', sans-serif;
		color: #384047;
		background: #00b09b;  /* fallback for old browsers */
		background: -webkit-linear-gradient(to right, #96c93d, #00b09b);  /* Chrome 10-25, Safari 5.1-6 */
		background: linear-gradient(to right, #96c93d, #00b09b); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */

	}

	form {
		max-width: 400px;
		margin: 10px auto;
		padding: 10px 20px;
		background: #f4f7f8;
		border-radius: 8px;
	}
	h1 {
		margin: 0 0 30px 0;
		text-align: center;
	}



	.campo {
		color: red;
		display: none;
	}

	input[type="text"],
	input[type="date"],
	input[type="email"],
	select {
		background: rgba(255,255,255,0.1);
		border: none;
		font-size: 16px;
		height: auto;
		margin: 0;
		outline: 0;
		padding: 15px;
		width: 100%;
		background-color: #e8eeef;
		color: #8a97a0;
		box-shadow: 0 1px 0 rgba(0,0,0,0.03) inset;
		margin-bottom: 30px;
	}

	input[type="radio"],
	input[type="checkbox"] {
		margin: 0 4px 8px 0;
	}
	select {
		padding: 6px;
		height: 32px;
		border-radius: 2px;
	}

	button {
		padding: 19px 39px 18px 39px;
		color: #FFF;
		background-color: #4bc970;
		font-size: 18px;
		text-align: center;
		font-style: normal;
		border-radius: 5px;
		width: 100%;
		border: 1px solid #3ac162;
		border-width: 1px 1px 3px;
		box-shadow: 0 -1px 0 rgba(255,255,255,0.1) inset;
		margin-bottom: 10px;
	}

	fieldset {
		margin-bottom: 30px;
		border: none;
	}

	legend {
		font-size: 1.4em;
		margin-bottom: 10px;
	}

	label {
		display: block;
		margin-bottom: 8px;
	}

	label.light {
		font-weight: 300;
		display: inline;
	}
	.number {
		background-color: #5fcf80;
		color: #fff;
		height: 30px;
		width: 30px;
		display: inline-block;
		font-size: 0.8em;
		margin-right: 4px;
		line-height: 30px;
		text-align: center;
		text-shadow: 0 1px 0 rgba(255,255,255,0.2);
		border-radius: 100%;
	}

	select:focus{
		color: black;

	}

	input:focus {
			color: black;
			background-color: #DCE8BA;
	}

	</style>
</head>
<body>

	<?php

	//Si ha estat processat el formulari, comprovo els camps.
	if (isset( $_POST['envia'] ) ) {

		// Comprova que no estigui buit el nom y si no està neteja el valor enviat i la guarda.
		if (empty($_POST["user_nom"])) {
			$nomErr = "<span style='color:red'>*</span>";
			echo "<style> #name{border:1px solid red} </style>";
			echo "<style> .campo{display:block}</style>";
		} else {
			$user_nom = test_input($_POST["user_nom"]);
		}

		// Comprova que no estigui buit el llinatge.
		// si està bé es guarda el valor
		if (empty($_POST["user_llin"])) {
			$llinErr = "<span style='color:red'>*</span>";
			echo "<style> .campo{display:block}</style>";
			echo "<style> #llin{border:1px solid red} </style>";
		} else {
			$user_llin = test_input($_POST["user_llin"]);
		}

		// Es comprova que no estegui buit i que tingui un format DNI (8 numeros i l'últim una lletra)
		// i si tot està correcte es guarda en la variable.
		if (isset ($_POST["user_dni"])) {
			$dni = $_POST["user_dni"];
			$dniNum = strlen($dni);
			$dniLetra = substr($dni, -1);
			$dniNumeros = substr($dni, 0, 8);
			if ($dni == "") {
					$dniErr = "<span style='color:red'>*</span>";
					echo "<style> .campo{display:block}</style>";
					echo "<style> #dni{border:1px solid red} </style>";
			}
			elseif ( !(ctype_alpha($dniLetra)) || !is_numeric($dniNumeros) || is_numeric($dniLetra) || $dniNum !== 9  ) {
				$dniErr = "<span style='color:red'>Tiene que tener formato DNI</span>";
				echo "<style> #dni{border:1px solid red} </style>";
			} else {
				$user_dni = test_input($dni);
			}

		}

		// Es comprobva que el telèfon no estigui buit.
		// si està bé es guarda el valor.
		if (empty($_POST["user_tlf"])) {
			$tlfErr = "<span style='color:red'>*</span>";
			echo "<style> .campo{display:block}</style>";
			echo "<style> #tlf{border:1px solid red} </style>";
		} else {
			$user_tlf = test_input($_POST["user_tlf"]);
		}

		// S'assigna a la variable email el valor enviat en el camp Email.
		$email = $_POST["user_email"];


		// Es comprova que el email tingui format de email
		// si passa la comprovacio es guarda el valor.
		if (empty($_POST["user_email"])) {
				$comprobarEmail = "user_vacio";
				$emailErr = "<span style='color:red'>*</span>";
				echo "<style> .campo{display:block}</style>";
				echo "<style> #email{border:1px solid red} </style>";
		} elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
				$comprobarEmail = "mal";
				$emailErr = "<span style='color:red'>Tiene que tener formato email</span>";
				echo "<style> #email{border:1px solid red} </style>";
		} else {
				$emailErr = "";
				$user_email = test_input($_POST["user_email"]);
		}


}

// Es comprova que els errors estiguin buits per passar a
// mostrar la taula del resultats enviats.
// Si no, si un camp dóna error se mostra el formulari

if( empty($nomErr) && empty($llinErr) && empty($dniErr) &&
empty($tlfErr) && empty($emailErr)){

	// Se guarda el valor del camp enviat en la seva variable
	if (isset( $_POST["user_sexe"])){
			$user_sexe = $_POST["user_sexe"];
	}

	if (isset($_POST["user_dnaix"])){
		$user_dnaix = $_POST["user_dnaix"];
	}

	if (isset( $_POST["user_exp"])){
			$user_exp = $_POST["user_exp"];
	}

	// si no s'ha seleccinat gens, mostrarà en la taula que
	//no s'ha selecciona gens.
	if (isset ($_POST["user_coneixements"])) {
		$user_coneix = $_POST['user_coneixements'];
		$contar = count($user_coneix);
		$numConeix = false;
	}
	if ($contar == 0) {
			$numConeix = false;
	} else {
			$numConeix = true;
	}

?>

<!-- es crea la taula -->
	<table border="2" cellspacing="0" cellpadding="2" >
			 <tr>
				 <th>Nom: </th>
				 <td><?php echo $user_nom ?></td>
				 <th>Llinatges: </th>
				 <td colspan="3"><?php echo $user_llin ?></td>
			 </tr>
			 <tr>
				 <th>DNI: </th>
				 <td><?php echo $user_dni ?></td>
				 <th>Sexe: </th>
				 <td><?php echo $user_sexe ?></td>
				 <th>Data de naixement: </th>
				 <td><?php echo $user_dnaix ?> </td>
			 </tr>
			 <tr>
				 <th>Teléfon: </th>
				 <td><?php echo $user_tlf ?></td>
				 <th>Email: </th>
				 <td colspan="3"><?php echo $user_email ?></td>
			 </tr>
			 <tr>
				 <th>Experiència Laboral: </th>
				 <td colspan="5"><?php echo $user_exp ?></td>
			 </tr>
			 <tr>
				 <th>Coneixements: </th>
				 <td colspan="5">
					 <?php
					  if ($numConeix) {
					 	foreach($_POST['user_coneixements'] as $value) { echo $value.' '; }
						} else {
						echo "No has seleccionado ninguna opción.";
						} ?>
					</td>
			 </tr>
		 </table>

	<?php
    } else { ?>

			<!-- Es crea el formulari -->

<div class="contenedor">

		<div class="formulario">

	  <form action="form.php" method="post">
		<h1>Registra't</h1>

			<fieldset>
				<legend><span class="number">1</span>Tu informació bàsica</legend>
				<span class="campo">Camp requerit *</span><br>
			  <label for="name">Nom:<?php echo $nomErr;?></label>
				<input type="text" id="name" name="user_nom"  value="<?php echo $user_nom?>">

				<label for="llin">Llinatge:<?php echo $llinErr;?></label>
				<input type="text"  id="llin" name="user_llin"  value="<?php echo $user_llin?>">

				<label for="dni">DNI:<?php echo $dniErr ?></label>
				<input type="text"  id="dni" name="user_dni" value="<?php echo $user_dni?>">

				<label for="tlf">Telèfon:<?php echo $tlfErr;?></label>
				<input type="text" id="tlf"  name="user_tlf" value="<?php echo $user_tlf?>">

				<label for="email">Email:<?php echo $emailErr; ?> </label>
				<input type="text" id="email"  name="user_email" placeholder="Ex: tuemail@dominio.com" value="<?php echo $user_email?>">

				<label for="dnaix">Data naixement:</label>
				<input type="date" id="dnaix" name="user_dnaix" value="<?php echo $user_dnaix?>">

				<label for="sexe">Sexe:</label>
  			<input type="radio" id="sexe" name="user_sexe" value="hombre" > Hombre
    		<input type="radio" id="sexe" name="user_sexe" value="mujer"> Mujer
    		<input type="radio" id="sexe" name="user_sexe" value="otro" checked> Otro
			</fieldset>

			<fieldset>
				<legend><span class="number">2</span>Tu perfil</legend>

				<label for="job">Experiencia laboral</label>
					<select id="job" name="user_exp">
						<option value="sense experiència">Sense experiència</option>
						<option value="menor a 1 any"> < 1 any</option>
						<option value="menor a 2 anys"> < 2 anys</option>
						<option value="major a 2 anys"> > 2 anysAudi</option>
					</select>

				<label>Coneixements:</label>
			    <input type="checkbox" name="user_coneixements[]" value="java"><label class="light" for="java">Java</label><br>
			    <input type="checkbox" name="user_coneixements[]" value="html5"><label class="light" for="html5">Html5</label><br>
			    <input type="checkbox" name="user_coneixements[]" value="javascript"><label class="light" for="javascript">Javascript</label><br>
			    <input type="checkbox" name="user_coneixements[]" value="php"><label class="light" for="php">PHP</label><br>
			    <input type="checkbox" name="user_coneixements[]" value="xml"><label class="light" for="xml">XML</label><br>
			    <input type="checkbox" name="user_coneixements[]" value=".net"><label class="light" for="net">.NET</label><br>


					</fieldset>
	        <button type="submit" name="envia">enviar</button>
	  </form>
		</div>
		</div>
	<?php } ?>

</body>
</html>
