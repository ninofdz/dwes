<?php
require_once("models/login_model.php");

class login_controller {

  /**
   * Mostra llistat
   * @return No
   */
  function view() {

    require_once("views/login_view.phtml");
  }

  function login(){
    $usuario = new login_model();

    $usuario->setUsuario($_POST['usuario']);
    $usuario->setPassword($_POST['password']);

      $ok = $usuario->con_usuarios();

          if ($ok) {
            session_start();
            $_SESSION['usuario'] = $_POST['usuario'];
            header( "Location: index.php?controller=personas&action=view");
          }
          else {
              header( "Location: index.php?controller=usuarios&action=view");
          }
      }

}


 ?>
