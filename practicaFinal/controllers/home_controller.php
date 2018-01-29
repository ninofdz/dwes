<?php
require_once("models/categories_model.php");
require_once("models/products_model.php");


class home_controller {

    function view($cart, $loginFailed = "") {

        $data = array();
        $data['products'] = $this->getProducts();
        $data['categories'] = $this->getCategories();
        $data['cart'] = $cart;
        //echo "<pre>" .print_r($data['cart'],1). "</pre>";
        //die();

        require_once("views/home_view.phtml");
    }

    function getProducts() {

        $products = new products_model();
        return $products->get_products();
    }

   
    
  

}
?>
