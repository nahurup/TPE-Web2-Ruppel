<?php
require_once "Api.php";
require_once "./../model/ComentariosModel.php";

class ComentariosApiController extends Api{

  private $model;
  function __construct(){
    parent::__construct();
    $this->model = new ComentariosModel();
  }

  function BorrarComentario($param = null){
    session_start();
    if(isset($_SESSION["User"])){
      $nombre = $_SESSION["User"];
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
    return $this->json_response($r, 200);
    }
  }

}
?>
