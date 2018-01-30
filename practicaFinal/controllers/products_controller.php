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
    function view($subCategory) {
        $producto = new products_model();

        //Uso metodo del modelo de personas
        $data['products'] = $this->getProducts($subCategory);
        $data['categories'] = $this->getCategories();


        //Llamado a la vista: mostrar la pantalla
        require_once("views/product_view.phtml");
    }

    /*
      function mostrarLista($id) {

      $lista = array();

      $consulta = $this->db->query("SELECT * FROM PRODUCT WHERE CATEGORY = {$id};");
      while ($filas = $consulta->fetch_assoc()) {
      $lista[] = $filas;
      }
      return $lista;
      } */

    function getProducts($subCategory) {

        $products = new products_model();
        return $products->get_products($subCategory);
    }

    function getCategories() {

        // Creamos el objeto de la clase categorias_model
        $categories = new categories_model();

        // llamamos a la funcion get_categories y guardamos en myCategories las categorias y subcategorias de la bd
        $myCategories = $categories->get_categories();
        // cremamos un array para guardar las categorias ordenadas (las categorías con sus subcategorías)
        $orderedCategories = array();


        // guarda en un array el id de la categoria principal y dentro de su array guarda el nombre y las subcategorias que pertenecen
        // a ésta en otro array.
        foreach ($myCategories as $dato) {

            $id = $dato["ID"];
            $name = $dato["NAME"];
            $parentCategory = $dato["PARENTCATEGORY"];

            // comprobamos si es categoria principal, si el array no existe lo crea y añade el nombre de la categoria dentro de ella.
            // Si es uina subcategoria, comprueba si la categoria principal existe, si no existe lo crea y guarda dentro de ella
            // su subcategoria con su nombre e ID

            if (empty($parentCategory)) {
                if (!array_key_exists($id, $orderedCategories)) {
                    $orderedCategories[$id] = array();
                }
                $orderedCategories[$id]['NAME'] = $name;
            } else {
                if (!array_key_exists($parentCategory, $orderedCategories)) {
                    $orderedCategories[$parentCategory] = array();
                }
                $orderedCategories[$parentCategory][] = [
                    'ID' => $id,
                    'NAME' => $name
                ];
            }
        }
        
        //echo "<pre>" .print_r($orderedCategories,1). "</pre>";
        //die();
                
       
        return $orderedCategories;
    }

}

?>
