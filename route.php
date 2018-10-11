<?php

require_once "agregar.php";
require_once "prueba.php";
require_once "lista.php";


if ($_GET['action'] == '') {
  MostrarAgregar();
}else {
  $partesURL = explode('/', $_GET['action']);

  if($partesURL[0] === 'sumar'){
    sumar($partesURL[1], $partesURL[2]);
  }elseif ($partesURL[0] === 'lista') {
    MostrarLista();
  }elseif ($partesURL[0] === 'about') {
    if(isset($partesURL[1]) && $partesURL[1] == 'javi'){
      AboutPersonalizado($partesURL[1]);
    }else{
      About();
    }
  }
}

 ?>
