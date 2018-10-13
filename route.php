<?php

require_once "agregar.php";
require_once "prueba.php";
require_once "controller\TareasController.php";

$controller = new TareasController();

if ($_GET['action'] == '') {
  MostrarAgregar();
}else {
  $partesURL = explode('/', $_GET['action']);

  if ($_GET['action'] == 'agregar') {
    $controller->InsertTarea();
  }elseif ($partesURL[0] == 'borrar') {
    $controller->BorrarTarea($partesURL[1]);
  }elseif ($partesURL[0] == 'completada') {
    $controller->CompletarTarea($partesURL[1]);
  }elseif ($partesURL[0] == 'lista') {
    $controller->Home();
  }
}

 ?>
 
