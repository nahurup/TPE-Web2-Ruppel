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
    $this->view->Mostrar($personajes, $roles);
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
    $this->view->MostrarAgregarPJ($roles);
  }

  function InsertarPersonaje(){
    if ($this->verificarAdmin() == true) {
      $nombre = $_POST["nombreForm"];
      $descripcion = $_POST["descripcionForm"];
      $idrol = $_POST["rolForm"];
      $rutaTempImagenes = $_FILES['imagenes']['tmp_name'];
  
      $this->modelpersonajes->InsertarPersonaje($nombre,$descripcion,$idrol,$rutaTempImagenes);
  
      header(ADMIN);
    } 
  }

  function BorrarPersonaje($param){
    if ($this->verificarAdmin() == true) {
      $this->modelpersonajes->BorrarPersonaje($param[0]);
      header(ADMIN);
    }

  }

  function BorrarImagen($param){
    if ($this->verificarAdmin() == true) {
      $this->modelpersonajes->BorrarImagen($param[0]);
      header(HOME);
    }
  }

  function EditarPersonaje($param){
    $personaje = $this->modelpersonajes->GetPersonaje($param);
    $roles = $this->modelroles->GetRoles();
    $this->view->MostrarEditarPersonaje($personaje[0], $roles);
  }

  function GuardarEditarPersonaje(){
    if ($this->verificarAdmin() == true) {
      $idPj = $_POST["idForm"];
      $nombre = $_POST["nombreForm"];
      $descripcion = $_POST["descripcionForm"];
      $idRol = $_POST["idrolForm"];
      $rutaTempImagenes = $_FILES['imagenes']['tmp_name'];

      $this->modelpersonajes->GuardarEditarPersonaje($nombre,$descripcion,$idRol,$idPj,$rutaTempImagenes);

      header(ADMIN);
    }
  }

  function InsertarRol(){
    if ($this->verificarAdmin() == true) {
      $nombre = $_POST["nombreForm"];
      $descripcion = $_POST["descripcionForm"];

      $this->modelroles->InsertarRol($nombre,$descripcion);

      header(ADMIN);
    }
  }

  function BorrarRol($param){
    if ($this->verificarAdmin() == true) {
      $this->modelroles->BorrarRol($param[0]);
      header(ADMIN);
    }  
  }

  function EditarRol($param){
    $rol= $this->modelroles->GetRol($param);
    $this->view->MostrarEditarRol($rol[0]);
  }

  function GuardarEditarRol(){
    if ($this->verificarAdmin() == true) {
      $idRol = $_POST["idForm"];
      $nombre = $_POST["nombreForm"];
      $descripcion = $_POST["descripcionForm"];

      $this->modelroles->GuardarEditarRol($nombre,$descripcion,$idRol);

      header(ADMIN);
    }
  }

  function AgregarRol(){
    $this->view->MostrarAgregarRol();
  }

  function MostrarUsuarios(){
    $usuarios= $this->modelusuarios->GetUsuarios();
    $this->view->MostrarUsuarios($usuarios);
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
