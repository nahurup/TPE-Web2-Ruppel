<?php
require_once "Api.php";
require_once "./../model/ComentariosModel.php";

class ComentariosApiController extends Api{

  private $model;
  function __construct(){
    parent::__construct();
    $this->model = new ComentariosModel();
  }

  function GetComentarios($param = null){
    if(isset($param)){
        $id = $param[0];
        $arreglo = $this->model->GetComentario($id);
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

  function BorrarComentario($param = null){
    if(count($param) == 1){
        $id = $param[0];
        $r =  $this->model->BorrarComentario($id);
        if($r == false){
          return $this->json_response($r, 300);
        }

        return $this->json_response($r, 200);
    }else{
      return  $this->json_response("No especifico comentario", 300);
    }
  }

  function InsertarComentario($param = null){
    session_start();
    if(isset($_SESSION["User"])) {
      $autor = $_SESSION["User"];
      $objetoJson = $this->getJSONData();
      $r = $this->model->InsertarComentario($objetoJson[0]->id_pj,$objetoJson[0]->autor,$objetoJson[0]->puntaje,$objetoJson[0]->contenido);
      return $this->json_response($r, 200);
    }
  }

}
?>
