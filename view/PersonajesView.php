<?php
require('libs/Smarty.class.php');

class PersonajesView
{
  function Mostrar($personajes, $roles){
    $smarty = new Smarty();
    $smarty->assign('personajes',$personajes);
    $smarty->assign('roles',$roles);
    $smarty->display('templates/lista_personajes.tpl');
  }

  function MostrarPersonaje($datos, $roles){
    $smarty = new Smarty();
    $smarty->assign('datos',$datos);
    $smarty->assign('roles',$roles);
    $smarty->display('templates/personaje.tpl');
  }

  function MostrarEditarPersonaje($personaje, $roles){
    $smarty = new Smarty();
    $smarty->assign('personaje',$personaje);
    $smarty->assign('roles',$roles);
    $smarty->assign('home',"http://".$_SERVER["SERVER_NAME"] . dirname($_SERVER["PHP_SELF"]));
    $smarty->display('templates/editar_personaje.tpl');
  }
}

?>