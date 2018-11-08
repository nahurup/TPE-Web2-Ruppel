<?php

require_once "Api.php";
require_once "./../model/TareasModel.php";

class TareasApiController extends Api{

  private $model;
  function __construct(){
    parent::__construct();
    $this->model = new TareasModel();
  }

  function GetTareas($param = null){

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

  function DeleteTarea($param = null){
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

  function InsertTarea($param = null){

    $objetoJson = $this->getJSONData();
    $r = $this->model->InsertarTarea($objetoJson->Titulo, $objetoJson->Descripcion, $objetoJson->Completada);

    return $this->json_response($r, 200);
  }

  function UpdateTarea($param = null){
    if(count($param) == 1){
      $idTarea = $param[0];
      $objetoJson = $this->getJSONData();
      $r = $this->model->GuardarEditarTarea($objetoJson->Titulo, $objetoJson->Descripcion, $objetoJson->Completada, $idTarea);
      return $this->json_response($r, 200);

    }else{
      return  $this->json_response("No task specified", 300);
    }

  }
}
 ?>
