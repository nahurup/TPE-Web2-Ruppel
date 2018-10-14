<?php


class RolesView
{
  function Mostrar($roles){
    $smarty = new Smarty();
    $smarty->assign('roles',$roles);
    //$smarty->debugging = true;
    $smarty->display('templates/lista_roles.tpl');
  }

  function MostrarRol($datos, $personajes){
    $smarty = new Smarty();
    $smarty->assign('datos',$datos);
    $smarty->assign('personajes',$personajes);
    //$smarty->debugging = true;
    $smarty->display('templates/rol.tpl');
  }
}

?>