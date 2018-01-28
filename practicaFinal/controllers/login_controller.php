<?php

require_once("models/login_model.php");

class login_controller {

    function login() {
        $usuario = new login_model();

        $username = !empty($_POST['username']) ? $_POST['username'] : "";
        $password = !empty($_POST['password']) ? $_POST['password'] : "";

        $usuario->setUsuario($username);
        $usuario->setPassword($password);

        $ok = $usuario->verifyUser();

        if ($ok) {
            $_SESSION['usuario'] = $username;
            return true;
        } else {
            return false;
        }
    }

    function loginFailed() {
        $obj = array();
        $obj['message'] = "Mecaogentuputuamadreeeeenoestasregistrao";
        $obj['openModel'] = "<script type='text/javascript'>
         $(document).ready(function(){
         $('#loginModal').modal('show');
         });
         </script>";
        return $obj;
    }

}

?>
