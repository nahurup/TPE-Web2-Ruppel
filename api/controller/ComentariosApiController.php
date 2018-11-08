<?php

require_once "Api.php";
require_once "./../model/ComentariosModel.php";

class TareasApiController extends Api{

  private $model;
  function __construct(){
    parent::__construct();
    $this->model = new ComentariosModel();
  }

  function GetComentarios($param = null){
    if(isset($param)){
        $id_tarea = $param[0];
        $arreglo = $this->model->GetTarea($id_tarea);
        $data = $arreglo;
        
    }else{
      $data = $this->model->GetTareas();
    }
      if(isset($data)){
        return $this->json_response($data, 200);
      }else{
        return $this->json_response(null, 404);
      }
  }

  function BorrarComentario($param = null){
    if(count($param) == 1){
        $id_tarea = $param[0];
        $r =  $this->model->BorrarTarea($id_tarea);
        if($r == false){
          return $this->json_response($r, 300);
        }

        return $this->json_response($r, 200);
    }else{
      return  $this->json_response("No task specified", 300);
    }
  }

  function InsertarComentario($param = null){

    $objetoJson = $this->getJSONData();
    $r = $this->model->InsertarTarea($objetoJson->Titulo, $objetoJson->Descripcion, $objetoJson->Completada);

    return $this->json_response($r, 200);
  }
}
 ?>
