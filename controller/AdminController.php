<?php
require_once  "./view/AdminView.php";
require_once  "./model/AdminModel.php";
require_once  "./controller/PersonajesController.php";
require_once  "./controller/RolesController.php";
require_once  "SecuredController.php";

class AdminController extends SecuredController
{
  private $view;
  private $model;
  private $modelpersonajes;
  private $modelroles;

  function __construct()
  {
    parent::__construct();
    $this->view = new AdminView();
    $this->modelpersonajes = new PersonajesModel();
    $this->modelroles = new RolesModel();
    $this->model = new AdminModel();
  }

  function Home(){
    $personajes = $this->modelpersonajes->GetPersonajes();
    $roles = $this->modelroles->GetRoles();
    $this->view->Mostrar($personajes, $roles);
  }

  function AgregarPersonaje(){
    $roles = $this->modelroles->GetRoles();
    $this->view->MostrarAgregarPJ($roles);
  }

  function InsertarPersonaje(){
    $nombre = $_POST["nombreForm"];
    $descripcion = $_POST["descripcionForm"];
    $idrol = $_POST["rolForm"];

    $this->modelpersonajes->InsertarPersonaje($nombre,$descripcion,$idrol);

    header("Location: http://".$_SERVER["SERVER_NAME"] . dirname($_SERVER["PHP_SELF"]));
  }

  function BorrarPersonaje($param){
    $this->modelpersonajes->BorrarPersonaje($param[0]);
    header("Location: http://".$_SERVER["SERVER_NAME"] . dirname($_SERVER["PHP_SELF"]));
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

    $this->modelpersonajes->GuardarEditarPersonaje($nombre,$descripcion,$idRol,$idPj);

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

  function AgregarUsuario(){
    $this->view->MostrarAgregarUsuario();
  }

  function InsertarUsuario(){
    $usuario = $_POST["usuarioForm"];
    $pass = $_POST["passwordId"];
    $hash = password_hash($pass, PASSWORD_DEFAULT);
    $password = $hash;

    $this->model->InsertarUsuario($usuario,$password);

    header(ADMIN);
  }
  
}

?>
