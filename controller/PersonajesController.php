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

  function InsertarPersonaje(){
    if ($this->verificarAdmin() == true) {
      $nombre = $_POST["nombreForm"];
      $descripcion = $_POST["descripcionForm"];
      $idrol = $_POST["rolForm"];
      $rutaTempImagenes = $_FILES['imagenes']['tmp_name'];
      if (isset($rutaTempImagenes)) {
        $this->model->InsertarPersonaje($nombre,$descripcion,$idrol,$rutaTempImagenes);
      }else{
        $this->model->InsertarPersonaje($nombre,$descripcion,$idrol);
      }

      header(ADMIN);
    }
  }

  function BorrarPersonaje($param){
    if ($this->verificarAdmin() == true) {
      $this->model->BorrarPersonaje($param[0]);
      header(ADMIN);
    }else{
      header(ADMIN);
    }

  }

  function BorrarImagen($param){
    if ($this->verificarAdmin() == true) {
      $this->model->BorrarImagen($param[0]);
      header(HOME);
    }else{
      header(ADMIN);
    }
  }

  function GuardarEditarPersonaje(){
    if ($this->verificarAdmin() == true) {
      $idPj = $_POST["idForm"];
      $nombre = $_POST["nombreForm"];
      $descripcion = $_POST["descripcionForm"];
      $idRol = $_POST["idrolForm"];
      $rutaTempImagenes = $_FILES['imagenes']['tmp_name'];

      $this->model->GuardarEditarPersonaje($nombre,$descripcion,$idRol,$idPj,$rutaTempImagenes);

      header(ADMIN);
    }else{
      header(ADMIN);
    }
  }

}

?>
