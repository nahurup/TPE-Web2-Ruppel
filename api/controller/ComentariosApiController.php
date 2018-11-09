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
    $objetoJson = $this->getJSONData();
    $r = $this->model->InsertarComentario($objetoJson->id_pj, $objetoJson->id_autor, $objetoJson->puntaje, $objetoJson->contenido);

    return $this->json_response($r, 200);
  }
}
 ?>