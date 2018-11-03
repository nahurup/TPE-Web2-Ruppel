<?php
require_once  "./view/RolesView.php";
require_once  "./model/RolesModel.php";

class RolesController
{
  private $view;
  private $model;
  private $modelpersonajes;

  function __construct()
  {
    $this->view = new RolesView();
    $this->model = new RolesModel();
    $this->modelpersonajes = new PersonajesModel();
  }

  function Home(){
    $roles = $this->model->GetRoles();
    $personajes = $this->modelpersonajes->GetPersonajes();
    $this->view->Mostrar($roles, $personajes);
  }

  function Rol($param){
    if (isset($param)) {
      $rol = $this->model->GetRol($param);
      $personajes = $this->modelpersonajes->GetPersonajes();
      $this->view->MostrarRol($rol, $personajes);
    }
    else {
      header("Location: http://".$_SERVER["SERVER_NAME"] . dirname($_SERVER["PHP_SELF"]));
    }
  }
}

 ?>
