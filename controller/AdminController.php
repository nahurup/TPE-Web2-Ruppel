<?php
require_once  "./view/AdminView.php";
require_once  "./model/UsuarioModel.php";
require_once  "./controller/PersonajesController.php";
require_once  "./controller/RolesController.php";
require_once  "SecuredController.php";

class AdminController extends SecuredController
{
  private $view;
  private $modelusuarios;
  private $modelpersonajes;
  private $modelroles;

  function __construct()
  {
    parent::__construct();

    $this->view = new AdminView();
    $this->modelpersonajes = new PersonajesModel();
    $this->modelroles = new RolesModel();
    $this->modelusuarios = new UsuarioModel();
  }

  function Home(){
    $personajes = $this->modelpersonajes->GetPersonajes();
    $roles = $this->modelroles->GetRoles();
    if(isset($_SESSION["User"])) {
      $nombre = $_SESSION["User"];
      $usuario = $this->modelusuarios->getUser($nombre);
      $this->view->Mostrar($personajes, $roles, $usuario[0]);
    }else{
      $this->view->Mostrar($personajes, $roles);
    }
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

  function AgregarPersonaje(){
    $roles = $this->modelroles->GetRoles();
    if(isset($_SESSION["User"])) {
      $nombre = $_SESSION["User"];
      $usuario = $this->modelusuarios->getUser($nombre);
      $this->view->MostrarAgregarPJ($roles, $usuario[0]);
    }else{
      $this->view->MostrarAgregarPJ($roles);
    }
  }

  function EditarPersonaje($param){
    $personaje = $this->modelpersonajes->GetPersonaje($param);
    $roles = $this->modelroles->GetRoles();
    if(isset($_SESSION["User"])) {
      $nombre = $_SESSION["User"];
      $usuario = $this->modelusuarios->getUser($nombre);
      $this->view->MostrarEditarPersonaje($personaje[0], $roles, $usuario[0]);
    }else{
      $this->view->MostrarEditarPersonaje($personaje[0], $roles);
    }

  }

  function EditarRol($param){
    $rol= $this->modelroles->GetRol($param);
    if(isset($_SESSION["User"])) {
      $nombre = $_SESSION["User"];
      $usuario = $this->modelusuarios->getUser($nombre);
      $this->view->MostrarEditarRol($rol[0], $usuario[0]);
    }else{
      $this->view->MostrarEditarRol($rol[0]);
    }
  }

  function AgregarRol(){
    if(isset($_SESSION["User"])) {
      $nombre = $_SESSION["User"];
      $usuario = $this->modelusuarios->getUser($nombre);
      $this->view->MostrarAgregarRol($usuario[0]);
    }else{
      $this->view->MostrarAgregarRol();
    }
  }

  function MostrarUsuarios(){
    $usuarios= $this->modelusuarios->GetUsuarios();
    if(isset($_SESSION["User"])) {
      $nombre = $_SESSION["User"];
      $usuario = $this->modelusuarios->getUser($nombre);
      $this->view->MostrarUsuarios($usuarios, $usuario[0]);
    }else{
      $this->view->MostrarUsuarios($usuarios);
    }

  }

  function BorrarUsuario($param){
    if ($this->verificarAdmin() == true) {
      $this->modelusuarios->BorrarUsuario($param[0]);
      header(ADMIN);
    }
  }

  function DarAdmin($param){
    if ($this->verificarAdmin() == true) {
      $this->modelusuarios->DarAdmin($param[0]);
      header(ADMIN);
    }
  }

  function QuitarAdmin($param){
    if ($this->verificarAdmin() == true) {
      $this->modelusuarios->QuitarAdmin($param[0]);
      header(ADMIN);
    }
  }

}

?>
