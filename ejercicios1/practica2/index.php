<?php

class Component {
  private $num_serie = "";
  protected $marca = "";
  protected $preu = "";
  protected $nom = "";
  protected $tipus = "";

  function __construct($numSerie, $marca, $preu, $nom, $tipus) {
			$this->numSerie = $numSerie;
			$this->marca = $marca;
			$this->preu = $preu;
			$this->nom = $nom;
			$this->$tipus = $tipus;
		}

		public function getNumSerie() {
			return $this->numSerie;
		}

		public function getMarca() {
			return $this->marca;
		}

		public function getPreu() {
			return $this->preu;
		}

		public function getNom() {
			return $this->nom;
		}

		public function getTipusComponent() {
			return $this->tipusComponent;
		}

		public function setNumSerie($newNumSerie) {
			$this->numSerie = $newNumSerie;
		}

		public function setMarca($newMarca) {
			$this->marca = $newMarca;
		}

		public function setPreu($newPreu) {
			$this->preu = $newPreu;
		}

		public function setNewNom($newNom) {
			$this->nom = $newNom;
		}

		public function setNewTipusComponent($newTipus) {
			$this->tipus = $newTipus;
		}

		public function imprimir_descripcio($components) {

			echo "Producte: <b>" . $producte->getNom() . "</b> Número de serie <b>" . $producte->getNumSerie() .
      "</b>. Tipus: <b>" . $producte->getTipusComponent() . "</b> Marca:
			<b>" . $producte->getMarca() . "</b> preu: <b>" . $producte->getPreu() . "</b>€. </br>";

		}
	}


}

class Processador extends Components{
  protected $ghz = "";
  protected $nuclis = "";

}

class MemoriaRam extends Components{
  protected $capacitat = "";
  protected $mhz = "";
}


class DiscDur extends Components{
  protected $capacitat = "";
  protected $rpm = "";
}

class PlacaBases extends Components{
  protected $socket = "";
  protected $factorForma = "";
}



 ?>
