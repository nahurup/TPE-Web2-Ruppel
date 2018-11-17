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
    $nombre = $_POST["nombreForm"];
    $descripcion = $_POST["descripcionForm"];
    $idrol = $_POST["rolForm"];
    $rutaTempImagenes = $_FILES['imagenes']['tmp_name'];

    $this->modelpersonajes->InsertarPersonaje($nombre,$descripcion,$idrol,$rutaTempImagenes);

    header("Location: http://".$_SERVER["SERVER_NAME"] . dirname($_SERVER["PHP_SELF"]));
  }

  function BorrarPersonaje($param){
    if ($this->verificarAdmin() ==true) {
      $this->modelpersonajes->BorrarPersonaje($param[0]);
      header("Location: http://".$_SERVER["SERVER_NAME"] . dirname($_SERVER["PHP_SELF"]));
    }

  }

  function BorrarImagen($param){
    $this->modelpersonajes->BorrarImagen($param[0]);
    header(ADMIN);
  }

  function EditarPersonaje($param){
    $personaje = $this->modelpersonajes->GetPersonaje($param);
    $roles = $this->modelroles->GetRoles();
    $this->view->MostrarEditarPersonaje($personaje[0], $roles);
  }

  function GuardarEditarPersonaje(){
    $idPj = $_POST["idForm"];
    $nombre = $_POST["nombreForm"];
    $descripcion = $_POST["descripcionForm"];
    $idRol = $_POST["idrolForm"];
    $rutaTempImagenes = $_FILES['imagenes']['tmp_name'];

    $this->modelpersonajes->GuardarEditarPersonaje($nombre,$descripcion,$idRol,$idPj,$rutaTempImagenes);

    header("Location: http://".$_SERVER["SERVER_NAME"] . dirname($_SERVER["PHP_SELF"]));
  }

  function InsertarRol(){
    $nombre = $_POST["nombreForm"];
    $descripcion = $_POST["descripcionForm"];

    $this->modelroles->InsertarRol($nombre,$descripcion);

    header("Location: http://".$_SERVER["SERVER_NAME"] . dirname($_SERVER["PHP_SELF"]));
  }

  function BorrarRol($param){
    $this->modelroles->BorrarRol($param[0]);
    header("Location: http://".$_SERVER["SERVER_NAME"] . dirname($_SERVER["PHP_SELF"]));
  }

  function EditarRol($param){
    $rol= $this->modelroles->GetRol($param);
    $this->view->MostrarEditarRol($rol[0]);
  }

  function GuardarEditarRol(){
    $idRol = $_POST["idForm"];
    $nombre = $_POST["nombreForm"];
    $descripcion = $_POST["descripcionForm"];

    $this->modelroles->GuardarEditarRol($nombre,$descripcion,$idRol);

    header("Location: http://".$_SERVER["SERVER_NAME"] . dirname($_SERVER["PHP_SELF"]));
  }

  function AgregarRol(){
    $this->view->MostrarAgregarRol();
  }

  function MostrarUsuarios(){
    $usuarios= $this->modelusuarios->GetUsuarios();
    $this->view->MostrarUsuarios($usuarios);
  }

  function BorrarUsuario($param){
    $this->modelusuarios->BorrarUsuario($param[0]);
    header("Location: http://".$_SERVER["SERVER_NAME"] . dirname($_SERVER["PHP_SELF"]));
  }

  function DarAdmin($param){
    $this->modelusuarios->DarAdmin($param[0]);
    header("Location: http://".$_SERVER["SERVER_NAME"] . dirname($_SERVER["PHP_SELF"]));
  }

  function QuitarAdmin($param){
    $this->modelusuarios->QuitarAdmin($param[0]);
    header("Location: http://".$_SERVER["SERVER_NAME"] . dirname($_SERVER["PHP_SELF"]));
  }

}

?>
