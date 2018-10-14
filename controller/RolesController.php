<?php
require_once  "./view/RolesView.php";
require_once  "./model/RolesModel.php";

class RolesController
{
  private $view;
  private $model;

  function __construct()
  {
    $this->view = new RolesView();
    $this->model = new RolesModel();
  }

  function Home(){
    $roles = $this->model->GetRoles();
    $this->view->Mostrar($roles);
  }

  function Rol($param){
    if (isset($param)) {
      $rol = $this->model->GetRol($param);
      $personajes = $this->model->GetPersonajes();
      $this->view->MostrarRol($rol, $personajes);
    }
    else {
      header("Location: http://".$_SERVER["SERVER_NAME"] . dirname($_SERVER["PHP_SELF"]));
    }
  }
}

 ?>
