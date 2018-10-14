<?php
require_once  "./view/RolesView.php";
require_once  "./model/RolesModel.php";

class RolesController
{
  private $view;
  private $model;
  private $Titulo;

  function __construct()
  {
    $this->view = new RolesView();
    $this->model = new RolesModel();
    $this->Titulo = "Lista de Tareas Controlador 1";
  }

  function Home(){
    $roles = $this->model->GetRoles();
    $this->view->Mostrar($roles);
}

  function InsertarRol(){
    $nombre = $_POST["nombreForm"];
    $n_personajes = 0;

    $this->model->InsertarRol($nombre,$n_personajes);

    header("Location: http://".$_SERVER["SERVER_NAME"] . dirname($_SERVER["PHP_SELF"]));
  }

  function BorrarRol($param){
    $this->model->BorrarRol($param[0]);
    header("Location: http://".$_SERVER["SERVER_NAME"] . dirname($_SERVER["PHP_SELF"]));
  }
}

 ?>
