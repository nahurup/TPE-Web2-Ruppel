<?php
require_once  "./view/AdminView.php";
require_once  "./model/AdminModel.php";
require_once  "./controller/PersonajesController.php";
require_once  "./controller/RolesController.php";
require_once  "SecuredController.php";

class AdminController extends SecuredController
{
  private $view;
  private $model;

  function __construct()
  {
    parent::__construct();
    $this->view = new AdminView();
    $this->model = new PersonajesModel();
    $this->model2 = new AdminModel();
  }

  function Home(){
    $personajes = $this->model->GetPersonajes();
    $roles = $this->model->GetRoles();
    $this->view->Mostrar($personajes, $roles);
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

    header(ADMIN);
  }
  
}

?>
