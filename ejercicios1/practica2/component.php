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

		public function getTipus() {
			return $this->tipus;
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

		public function setNom($newNom) {
			$this->nom = $newNom;
		}

		public function setTipus($newTipus) {
			$this->tipus = $newTipus;
		}

		public function imprimir_descripcio($components) {

			echo "Producte: <b>" . $producte->getNom() . "</b> Número de serie <b>" . $producte->getNumSerie() .
      "</b>. Tipus: <b>" . $producte->getTipus() . "</b> Marca:
			<b>" . $producte->getMarca() . "</b> preu: <b>" . $producte->getPreu() . "</b>€. </br>";

		}

}

class Processador extends Component{
  protected $ghz = "";
  protected $nuclis = "";

  function __construct($numSerie, $marca, $preu, $nom, $tipus, $ghz, $nuclis) {
  			parent::__construct($numSerie, $marca, $preu, $nom, $tipus);
  			$this->ghz = $ghz;
  			$this->nuclis = $nuclis;
  		}

  public function getGhz(){
    return $this->ghz;
  }

  public function getNuclis(){
    return $this->nuclis;
  }

  public function setNewGhz($newGhz){
    $this->ghz = $newGhz;
  }
  public function setNewNuclis($newNuclis){
    $this->$nuclis = $newNuclis;
  }

  function imprimir_descripcio($processador) {

     echo $processador->getTipus() . " " . $processador->getNom() . " " . $processador->getMarca(). " " .
     $processador->getGhz() . " Ghz " . $processador->getNuclis() . "  (número de serie " .
     $processador->getNumSerie() . ") </br>";
   }

}

class MemoriaRam extends Component{
  protected $capacitat = "";
  protected $mhz = "";

  function __construct($numSerie, $marca, $preu, $nom, $tipus, $capacitat, $mhz) {
  			parent::__construct($numSerie, $marca, $preu, $nom, $tipus);
  			$this->capcitat = $capacitat;
  			$this->mhz = $mhz;
  		}

      public function getCapacitat() {
    			return $this->capacitat;
    		}

    		public function getMhz() {
    			return $this->mhz;
    		}

    		public function setCapacitat($newCapacitat) {
    			$this->capacitat = $newCapacitat;
    		}

    		public function setMhz($newMhz) {
    			$this->mhz = $newMhzRam;
    		}

        public function imprimir_descripcio($memoriaRam) {

			echo $memoriaRam->getTipus() . " " . $memoriaRam->getNom() . " " . $memoriaRam->getMarca() . " ".
      $memoriaRam->getCapacitat() . " GB " . $memoriaRam->getMhz() .
      " Ghz, (número de serie " . $memoriaRam->getNumSerie() . ") </br>";

		}


}


class DiscDur extends Component{
  protected $capacitat = "";
  protected $rpm = "";

  function __construct($numSerie, $marca, $preu, $nom, $tipus, $capacitat, $rpm) {
        parent::__contruct($numSerie, $marca, $preu, $nom, $tipus);
        $this->capcitat = $capacitat;
        $this->rpm = $rpm;
      }

      public function getCapacitatHdd() {
  			return $this->capacitat;
  		}

  		public function getRpm() {
  			return $this->rpm;
  		}

  		public function setCapacitatHdd($newCapacitat) {
  			$this->capacitat = $newCapacitat;
  		}

  		public function setRpm($newRpm) {
  			$this->rpm = $newRpm;
  		}

  		public function imprimir_descripcio($discDur) {

  			echo $discDur->getTipus() . " " . $discDur->getNom() . " " . $discDur->getMarca() . " " .
         $discDur->getCapacitatHdd() .  " GB " . $discDur->getRpm() . " rpm, (número de serie " .
         $discDur->getNumSerie() . ") </br>";

  		}

}

class PlacaBase extends Component{
  protected $socket = "";
  protected $factorForma = "";

  function __construct($numSerie, $marca, $preu, $nom, $tipus, $socket, $factorForma) {
        parent::__construct($numSerie, $marca, $preu, $nom, $tipus);
        $this->socket = $socket;
        $this->factorForma = $factorForma;
      }

      public function getSocket() {
  			return $this->socket;
  		}

  		public function getFactorForma() {
  			return $this->factorForma;
  		}

  		public function setSocket($newSocket) {
  			$this->socket = $newSocket;
  		}

  		public function setFactorForma($newFactorForma) {
  			$this->factorForma = $newFactorForma;
  		}

  		public function imprimir_descripcio($placaBase) {

  			echo $placaBase->getTipus() . " " . $placaBase->getNom() . " " . $placaBase->getMarca() . " " .
        $placaBase->getSocket() . " LGA " . $placaBase->getFactorForma() .
         " (número de serie " . $placaBase->getNumSerie() . ") </br>";

  		}

}



 ?>
