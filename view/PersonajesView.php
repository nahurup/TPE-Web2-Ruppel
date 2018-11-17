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

  function MostrarPersonaje($personajes, $roles, $imagenes, $usuario = null){
    $smarty = new Smarty();
    $smarty->assign('personajes',$personajes);
    $smarty->assign('roles',$roles);
    $smarty->assign('imagenes',$imagenes);
    $smarty->assign('usuario',$usuario);
    $smarty->display('templates/personaje.tpl');
  }
}

?>