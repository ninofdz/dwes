<?php

require_once("db/db.php");

require_once("controllers/personas_controller.php");
require_once("controllers/products_controller.php");
require_once("controllers/login_controller.php");
require_once("controllers/home_controller.php");
require_once("controllers/products_controller.php");
require_once("controllers/cart_controller.php");
require_once("controllers/view_controller.php");


ob_start();
session_start();
if (empty($_SESSION['usuario'])) {
    $_SESSION['usuario'] = "invitado";
}

$cart = new cart_controller();
$userCart = $cart->shoppingCart();


if (isset($_GET['controller']) && isset($_GET['action'])) {

    if ($_GET["controller"] == "log") {
        $controller = new home_controller();
        $loginFailed = "";
        if ($_GET["action"] == "login") {
            $login = new login_controller();
            $loged = $login->login();
            if (!$loged) {
                $loginFailed = $login->loginFailed();
            }
        }
        if ($_GET['action'] == "logout") {
            $_SESSION['usuario'] = "invitado";
        }

        $controller->view($userCart, $loginFailed);
    }

    if ($_SESSION['usuario'] != "admin") {
        $controller = new home_controller();

        if ($_GET['controller'] == "cart") {

            if ($_GET['action'] == "addToCart") {
                $id = $_POST["id"];
                $cart->addItemToCart($id);
            }

            if ($_GET['action'] == "deleteFromCart") {
                $id = $_GET['id'];
                //echo "<pre>" .print_r($id,1). "</pre>";
                //die();
                $cart->deleteItemFromCart($id);
            }
        }
        $controller->view($userCart);
    }


    if ($_GET["controller"] == "home") {
        if ($_GET['action ==']) {
            
        }
    }

    
    // mostrar productos por categortias
    if ($_GET['controller'] == "products") {

        ob_clean();
        
        if ($_GET['action'] == "view") {
            $controller = new products_controller();
            $id = $_GET['subCategory'];
            $controller->view($id);
        }
    }
    

    /* pruebas */
    /*if ($_GET['controller'] == "categories") {

        if ($_GET['action'] == "view") {
            $controller = new products_controller();
            $controller->view();
        }
    } */

    /*if ($_GET['controller'] == "categories") {

        if ($_GET['action'] == "mostrarLista") {
            $id = $_GET['id'];
            $controller = new categories_controller();
            $products = $controller->mostrarLista($id);

            $controller->view();
        }
    }*/

    /*
    if ($_GET['controller'] == "coches") {

        if ($_GET['action'] == "view") {
            $controller = new coches_controller();
            $controller->view();
        }

        if ($_GET['action'] == "add") {
            $controller = new coches_controller();
            $controller->add();
        }

        if ($_GET['action'] == "insert") {
            $controller = new coches_controller();
            $controller->insert();
        }

        if ($_GET['action'] == "delete") {
            $controller = new coches_controller();
            $controller->delete();
        }

        if ($_GET['action'] == "ordmarca") {
            $controller = new coches_controller();
            $controller->ordmarca();
        }
      */
     
} else {
    
    
    $html = file_get_contents("views/home_view.phtml");
    $view = new view_controller($html);
    $subCategory = !empty($_GET['subCategory']) ? $_GET['subCategory'] : "";
    $view->setHeaderTemplate(file_get_contents("views/templates/header_template.phtml"));
    $view->show();
    
    //$controller = new home_controller();
    //$subCategory = !empty($_GET['subCategory']) ? $_GET['subCategory'] : "";
    //$controller->view($userCart);
}
?>
