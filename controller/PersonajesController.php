<?php
require_once  "./view/PersonajesView.php";
require_once  "./model/PersonajesModel.php";

class PersonajesController
{
  private $view;
  private $model;
  private $modelroles;

  function __construct()
  {
    $this->view = new PersonajesView();
    $this->model = new PersonajesModel();
    $this->modelroles = new RolesModel();
  }

  function Home(){
    $personajes = $this->model->GetPersonajes();
    $roles = $this->modelroles->GetRoles();
    $this->view->Mostrar($personajes, $roles);
  }

  function Personaje($param){
    if (isset($param)) {
      $personaje = $this->model->GetPersonaje($param);
      $imagenes = $this->model->GetImagenes($param);
      $roles = $this->modelroles->GetRoles();
      $this->view->MostrarPersonaje($personaje, $roles, $imagenes);
    }
    else {
      header("Location: http://".$_SERVER["SERVER_NAME"] . dirname($_SERVER["PHP_SELF"]));
    }
  }

}

?>
