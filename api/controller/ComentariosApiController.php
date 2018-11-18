<?php
require_once "Api.php";
require_once "./../model/ComentariosModel.php";
require_once "./../model/UsuarioModel.php";

class ComentariosApiController extends Api{

  private $model;
  private $modelusuarios;
  function __construct(){
    parent::__construct();
    $this->model = new ComentariosModel();
    $this->modelusuarios = new UsuarioModel();
  }

  function verificarAdmin(){
    session_start();
    if(isset($_SESSION["User"])){
      $usuario = $_SESSION["User"];
      $dbUsuario = $this->modelusuarios->getUser($usuario);
      if($dbUsuario[0]["admin"] == 1) {
        if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > 1800)) {
          $admin = false;
          return $this->json_response($admin, 200);
        }else{
          $_SESSION['LAST_ACTIVITY'] = time();
          $admin = true;
          return $this->json_response($admin, 200);
        }
      }else{
        $admin = false;
        return $this->json_response($admin, 200);
      }
    }else{
      $admin = false;
      return $this->json_response($admin, 200);
    }
  }

  function GetComentarios($param = null){
    if(isset($param)){
        $id = $param[0];
        $arreglo = $this->model->GetComentariosPJ($id);
        $data = $arreglo;
    }else{
      $data = $this->model->GetComentarios();
    }
    if(isset($data)){
      return $this->json_response($data, 200);
    }else{
      return $this->json_response(null, 404);
    }
  }

  function InsertarComentario($param = null){
    $objetoJson = $this->getJSONData();
    session_start();
    if(isset($_SESSION["User"])){
      $objetoJson->autor = $_SESSION["User"];
      $r = $this->model->InsertarComentario($objetoJson->id_pj,$objetoJson->autor,$objetoJson->puntaje,$objetoJson->contenido);
    return $this->json_response($r, 200);
    }else {
      return $this->json_response($objetoJson, 401);
    }
  }

}
?>
