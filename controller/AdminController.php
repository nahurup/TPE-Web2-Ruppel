<?php
require_once  "./view/AdminView.php";
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
  
}

?>
