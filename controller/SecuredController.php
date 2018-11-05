<?php
require_once  "./model/UsuarioModel.php";

define('LOGIN', 'Location: http://'.$_SERVER["SERVER_NAME"] . dirname($_SERVER["PHP_SELF"]). '/login');

class SecuredController
{
  private $model;

  function __construct(){
    $this->model = new UsuarioModel();
    session_start();
    if(isset($_SESSION["User"])){
      $usuario = $_SESSION["User"];
      $dbUsuario = $this->model->getUser($usuario);
      if($dbUsuario[0]["admin"] == 1) {
        if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > 1800)) {
          $this->logout();
        }
        $_SESSION['LAST_ACTIVITY'] = time();
      }else{
        $this->logout();
      }
    }else{
        header(LOGIN);
    }
  }

  function logout(){
    session_start();
    session_destroy();
    header(LOGIN);
  }

}

?>
