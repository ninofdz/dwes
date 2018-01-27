<?php
//Llamada al modelo
require_once("models/categories_model.php");


class categories_controller {

/**
 * Muestra pantalla 'add'
 * @return No
 */
function add() {
  require_once("views/products_add.phtml");
}


/**
 * Mostra llistat
 * @return No
 */
function view() {
  $categories = new categories_model();

  //Uso metodo del modelo de personas
  $datos=$categories->get_categories();

  //Llamado a la vista: mostrar la pantalla
  require_once("views/home_view.phtml");
}

function mostrarLista($id){

  $lista = array();

  $consulta=$this->db->query("SELECT * FROM PRODUCT WHERE CATEGORY = {$id};");
  while($filas=$consulta->fetch_assoc()){
    $lista[]=$filas;
  }
  return $lista;

}

}
 ?>
