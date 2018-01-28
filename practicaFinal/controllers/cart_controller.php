<?php
require_once("models/categories_model.php");
require_once("models/products_model.php");

class cart_controller {

    public function shoppingCart(){
        
        $product  = new products_model();
        
        $data = $product->get_shopping_cart();
        //echo "<pre>" .print_r($data,1). "</pre>";
        //die();
    }
    
    public function addItemToCart($id, $nUnits=1){
        
        $item = array($id,$nUnits);
        
        if (empty($_SESSION['cart'])){
        $_SESSION['cart'] = array();
        
        } 
        
        if (array_key_exists($id, $_SESSION['cart'])) {
            $_SESSION['cart'][$id] += $nUnits;
        } else {
            $_SESSION['cart'][$id] = $nUnits;
        }
    }
    
    public function deleteItemFromCart($id){
        
        if (array_key_exists($id, $_SESSION['cart'])) {
             unset($_SESSION['cart'][id]);
        }
        
    }
}
?>
