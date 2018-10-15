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
    $personajes = $this->model->GetPersonajes();
    $this->view->Mostrar($roles, $personajes);
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

  function InsertarRol(){
    $nombre = $_POST["nombreForm"];
    $descripcion = $_POST["descripcionForm"];

    $this->model->InsertarRol($nombre,$descripcion);

    header("Location: http://".$_SERVER["SERVER_NAME"] . dirname($_SERVER["PHP_SELF"]));
  }

  function BorrarRol($param){
    $this->model->BorrarRol($param[0]);
    header("Location: http://".$_SERVER["SERVER_NAME"] . dirname($_SERVER["PHP_SELF"]));
  }

  function EditarRol($param){
    $rol= $this->model->GetRol($param[0]);
    $this->view->MostrarEditarRol($rol[0]);
  }

  function GuardarEditarRol(){
    $idRol = $_POST["idForm"];
    $nombre = $_POST["nombreForm"];
    $descripcion = $_POST["descripcionForm"];

    $this->model->GuardarEditarRol($nombre,$descripcion,$idRol);

    header("Location: http://".$_SERVER["SERVER_NAME"] . dirname($_SERVER["PHP_SELF"]));
  }

}

 ?>
