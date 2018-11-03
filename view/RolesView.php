<?php


class RolesView
{
  function Mostrar($roles, $personajes){
    $smarty = new Smarty();
    $smarty->assign('roles',$roles);
    $smarty->assign('personajes',$personajes);
    $smarty->display('templates/lista_roles.tpl');
  }

  function MostrarRol($datos, $personajes){
    $smarty = new Smarty();
    $smarty->assign('datos',$datos);
    $smarty->assign('personajes',$personajes);
    $smarty->display('templates/rol.tpl');
  }

}

?>