<?php
class categories_model{

private $db;
private $categories;

private $id;
private $name;
private $parentCategory;


public function __construct(){
    $this->db=Conectar::conexion();
    $this->categories=array();
}

/* GETTERS & SETTERS */

public function getId() {
  return $this->id;
}

public function setId($id) {
  $this->id = $id;
}

public function getName() {
  return $this->name;
}

public function setName($name) {
  $this->name = $name;
}

public function getParentCategory() {
  return $this->$parentCategory;
}

public function getParentCategory($parentCategory) {
  $this->$parentCategory = $parentCategory;
}



/**
* Extreu totes les persones de la taula
* @return array Bidimensional de totes les persones
*/
public function get_categories(){
    $consulta=$this->db->query("SELECT * FROM CATEGORY;");


    while($filas=$consulta->fetch_assoc()){
        $this->categories[]=$filas;
        echo "<pre>" print_r($filas, 1) "</pre>";
        die;
    }
    return $this->$categories;
}




}
?>
