<?php

require_once  "./view/LoginView.php";
require_once  "./model/UsuarioModel.php";

class LoginController
{
  private $view;
  private $model;

  function __construct()
  {
    $this->view = new LoginView();
    $this->model = new UsuarioModel();
  }

  function login(){
    $this->view->mostrarLogin();
  }

  function Registrar(){
    $this->view->mostrarRegistrar();
  }

  function logout(){
    session_start();
    session_destroy();
    header(HOME);
  }

  function verificarLogin(){
      $user = $_POST["usuarioId"];
      $pass = $_POST["passwordId"];
      $dbUser = $this->model->getUser($user);

      if(isset($dbUser)){
          if (password_verify($pass, $dbUser[0]["password"])){
              session_start();
              $_SESSION["User"] = $user;
              header(ADMIN);
          }else{
            $this->view->mostrarLogin("Contraseña incorrecta");
          }
      }else{
        $this->view->mostrarLogin("No existe el usario");
      }

  }

  function registrarUsuario(){
    $usuario = $_POST["usuarioForm"];
    $pass = $_POST["passwordId"];
    $hash = password_hash($pass, PASSWORD_DEFAULT);
    $password = $hash;

    $this->model->InsertarUsuario($usuario,$password);

    header(HOME);
  }

}

?>
