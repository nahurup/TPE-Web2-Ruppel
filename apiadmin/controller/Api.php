<?php
require_once  "./../model/UsuarioModel.php";

class Api{

  protected $data;
  private $model;

  function __construct(){
    $this->data = file_get_contents("php://input");
    $this->model = new UsuarioModel();
    session_start();
    if(isset($_SESSION["User"])){
      $usuario = $_SESSION["User"];
      $dbUsuario = $this->model->getUser($usuario);
      if($dbUsuario[0]["admin"] == 1) {
        if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > 1800)) {
          $this->logout();
        }
        $_SESSION['LAST_ACTIVITY'] = time();
      }else{
        $this->logout();
      }
    }else{
        header(LOGIN);
    }
  }

  function logout(){
    session_start();
    session_destroy();
    header(LOGIN);
  }

  public function json_response($data, $status) {
      header("Content-Type: application/json");
      header("HTTP/1.1 " . $status . " " . $this->_requestStatus($status));
      return json_encode($data);
  }

  private function _requestStatus($code){
     $status = array(
       200 => "OK",
       401 => "Unauthorized user",
       404 => "Not found",
       500 => "Internal Server Error",
       300 => "Comment Not found"
     );
     return ($status[$code])? $status[$code] : $status[500];
   }

  function getJSONData(){
    return json_decode($this->data);
  }

}
?>
