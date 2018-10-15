<?php
require_once  "./view/AdminView.php";
require_once  "./model/AdminModel.php";
require_once  "./controller/PersonajesController.php";
require_once  "./controller/RolesController.php";

class AdminController
{
  private $view;
  private $model;

  function __construct()
  {
    $this->view = new AdminView();
    $this->model = new PersonajesModel();
    $this->model2 = new AdminModel();
  }

  function Home(){
    $this->view->mostrarLogin();
  }

  function HomeAdmin(){
    $personajes = $this->model->GetPersonajes();
    $roles = $this->model->GetRoles();
    $this->view->Mostrar($personajes, $roles);
  }

  function logout(){
    session_start();
    session_destroy();
    header(LOGIN);
  }

  function verificarLogin(){
      $user = $_POST["usuarioId"];
      $pass = $_POST["passwordId"];
      $dbUser = $this->model2->getUser($user);

      if(isset($dbUser)){
          if (password_verify($pass, $dbUser[0]["password"])){
              //mostrar lista de tareas
              session_start();
              $_SESSION["User"] = $user;
              header(HOME);
          }else{
            $this->view->mostrarLogin("Contraseña incorrecta");

          }
      }else{
        //No existe el usario
        $this->view->mostrarLogin("No existe el usario");
      }

  }

  function AgregarPersonaje(){
    $roles = $this->model->GetRoles();
    $this->view->MostrarAgregarPJ($roles);
  }

  function AgregarRol(){
    $this->view->MostrarAgregarRol();
  }

  function AgregarUsuario(){
    $this->view->MostrarAgregarUsuario();
  }

  function InsertarUsuario(){
    $usuario = $_POST["usuarioForm"];
    $pass = $_POST["passwordId"];
    $hash = password_hash($pass, PASSWORD_DEFAULT);
    $password = $hash;

    $this->model2->InsertarUsuario($usuario,$password);

    header("Location: http://".$_SERVER["SERVER_NAME"] . dirname($_SERVER["PHP_SELF"]));
  }
  
}

?>
