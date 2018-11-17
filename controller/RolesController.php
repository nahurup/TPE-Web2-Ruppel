<?php
require_once  "./view/RolesView.php";
require_once  "./model/RolesModel.php";
require_once  "./model/UsuarioModel.php";

class RolesController
{
  private $view;
  private $model;
  private $modelpersonajes;
  private $modelusuarios;

  function __construct()
  {
    $this->view = new RolesView();
    $this->model = new RolesModel();
    $this->modelpersonajes = new PersonajesModel();
    $this->modelusuarios = new UsuarioModel();
  }

  function Home(){
    $roles = $this->model->GetRoles();
    $personajes = $this->modelpersonajes->GetPersonajes();
    session_start();
    if(isset($_SESSION["User"])) {
      $nombre = $_SESSION["User"];
      $usuario = $this->modelusuarios->getUser($nombre);
      $this->view->Mostrar($roles, $personajes, $usuario[0]);
    }else{
      $this->view->Mostrar($roles, $personajes);
    }
  }

  function Rol($param){
    if (isset($param)) {
      $rol = $this->model->GetRol($param);
      $personajes = $this->modelpersonajes->GetPersonajes();
      session_start();
      if(isset($_SESSION["User"])){
        $nombre = $_SESSION["User"];
        $usuario = $this->modelusuarios->getUser($nombre);
        $this->view->MostrarRol($rol, $personajes, $usuario[0]);
      }else{
        $this->view->MostrarRol($rol, $personajes);
      }
    }
    else {
      header("Location: http://".$_SERVER["SERVER_NAME"] . dirname($_SERVER["PHP_SELF"]));
    }
  }
}

 ?>
