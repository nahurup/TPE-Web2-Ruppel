<?php
require('libs/Smarty.class.php');

class PersonajesView
{
  function Mostrar($personajes, $roles){
    $smarty = new Smarty();
    $smarty->assign('personajes',$personajes);
    $smarty->assign('roles',$roles);
    //$smarty->debugging = true;
    $smarty->display('templates/lista_personajes.tpl');
  }

  function MostrarPersonaje($datos, $roles){
    $smarty = new Smarty();
    $smarty->assign('datos',$datos);
    $smarty->assign('roles',$roles);
    //$smarty->debugging = true;
    $smarty->display('templates/personaje.tpl');
  }
}

?>