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

  function verificarAdmin(){
    session_start();
    if(isset($_SESSION["User"])){
      $usuario = $_SESSION["User"];
      $dbUsuario = $this->modelusuarios->getUser($usuario);
      if($dbUsuario[0]["admin"] == 1) {
        if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > 1800)) {
          return false;
        }else{
          $_SESSION['LAST_ACTIVITY'] = time();
          return true;
        }
      }else{
        return false;
      }
    }else{
      return false;
    }
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
      header(HOME);
    }
  }

  function InsertarRol(){
    if ($this->verificarAdmin() == true) {
      $nombre = $_POST["nombreForm"];
      $descripcion = $_POST["descripcionForm"];

      $this->model->InsertarRol($nombre,$descripcion);

      header(ADMIN);
    }else{
      header(ADMIN);
    }
  }

  function BorrarRol($param){
    if ($this->verificarAdmin() == true) {
      $this->model->BorrarRol($param[0]);
      header(ADMIN);
    }else{
      header(ADMIN);
    }
  }

  function GuardarEditarRol(){
    if ($this->verificarAdmin() == true) {
      $idRol = $_POST["idForm"];
      $nombre = $_POST["nombreForm"];
      $descripcion = $_POST["descripcionForm"];

      $this->model->GuardarEditarRol($nombre,$descripcion,$idRol);

      header(ADMIN);
    }else{
      header(ADMIN);
    }
  }

}

?>
