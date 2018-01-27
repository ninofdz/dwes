<?php
//Llamada al modelo
require_once("models/products_model.php");


class products_controller {

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
  $producto = new products_model();

  //Uso metodo del modelo de personas
  $datos=$producto->get_products();

  //Llamado a la vista: mostrar la pantalla
  require_once("views/home_view.phtml");
}
}
 ?>
