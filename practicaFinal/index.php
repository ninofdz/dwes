<?php
require_once("db/db.php");

require_once("controllers/personas_controller.php");
require_once("controllers/products_controller.php");
require_once("controllers/login_controller.php");
require_once("controllers/home_controller.php");
require_once("controllers/products_controller.php");

if (isset($_GET['controller']) && isset($_GET['action']) ) {

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

    if ($_GET['controller'] == "usuarios") {
      if ($_GET['action'] == "login") {
        $controller = new login_controller();
        $controller->login();
      }

      if ($_GET['action'] == "view") {
        $controller = new login_controller();
        $controller->view();
      }
    }

} else {
   $controller = new products_controller();
   $controller->view();
}
?>
