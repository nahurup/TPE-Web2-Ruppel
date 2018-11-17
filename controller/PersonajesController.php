<?php
require_once  "./view/PersonajesView.php";
require_once  "./model/PersonajesModel.php";
require_once  "./model/UsuarioModel.php";

class PersonajesController
{
  private $view;
  private $model;
  private $modelroles;
  private $modelusuarios;

  function __construct()
  {
    $this->view = new PersonajesView();
    $this->model = new PersonajesModel();
    $this->modelroles = new RolesModel();
    $this->modelusuarios = new UsuarioModel();
  }

  function Home(){
    $personajes = $this->model->GetPersonajes();
    $roles = $this->modelroles->GetRoles();
    session_start();
    if(isset($_SESSION["User"])) {
      $nombre = $_SESSION["User"];
      $usuario = $this->modelusuarios->getUser($nombre);
      $this->view->Mostrar($personajes, $roles, $usuario[0]);
    }else{
      $this->view->Mostrar($personajes, $roles);
    }
  }

  function Personaje($param){
    if (isset($param)) {
      $personaje = $this->model->GetPersonaje($param);
      $imagenes = $this->model->GetImagenes($param);
      $roles = $this->modelroles->GetRoles();
      session_start();
      if(isset($_SESSION["User"])){
        $nombre = $_SESSION["User"];
        $usuario = $this->modelusuarios->getUser($nombre);
        $this->view->MostrarPersonaje($personaje, $roles, $imagenes, $usuario[0]);
      }else{
        $this->view->MostrarPersonaje($personaje, $roles, $imagenes);
      }
      
    }
    else {
      header(HOME);
    }
  }

}

?>
