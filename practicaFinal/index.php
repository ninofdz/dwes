<?php

require_once("db/db.php");

require_once("controllers/personas_controller.php");
require_once("controllers/products_controller.php");
require_once("controllers/login_controller.php");
require_once("controllers/home_controller.php");
require_once("controllers/products_controller.php");
require_once("controllers/cart_controller.php");


session_start();
if (empty($_SESSION['usuario'])) {
    $_SESSION['usuario'] = "invitado";
}

$cart = new cart_controller();
$cart->shoppingCart();

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

        $controller->view("", $loginFailed);
    }





    if (!$_SESSION['usuario'] == "admin") {
        $controller = new home_controller();

        if ($_GET['controller'] == "cart") {

            if ($_GET['action'] == "addToCart") {
                $id = $_POST["id"];
                $cart->addItemToCart($id);
            }

            if ($_GET['action'] == "deleteFromCart") {
                
            }
        }
        $controller->view("", $loginFailed);
    }







    if ($_GET["controller"] == "home") {
        if ($_GET['action ==']) {
            
        }
    }


    if ($_GET['controller'] == "products") {

        if ($_GET['action'] == "view") {
            $controller = new products_controller();
            $controller->view();
        }
    }


    if ($_GET['controller'] == "categories") {

        if ($_GET['action'] == "view") {
            $controller = new categories_controller();
            $controller->view();
        }
    }

    if ($_GET['controller'] == "categories") {

        if ($_GET['action'] == "mostrarLista") {
            $id = $_GET['id'];
            $controller = new categories_controller();
            $products = $controller->mostrarLista($id);

            $controller->view();
        }
    }

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
    }
} else {

    $controller = new home_controller();
    $subCategory = !empty($_GET['subCategory']) ? $_GET['subCategory'] : "";
    $controller->view($subCategory, $loginFailed);
}
?>
