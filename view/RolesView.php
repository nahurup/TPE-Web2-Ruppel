<?php


class RolesView
{
  function Mostrar($roles, $personajes, $usuario = null){
    $smarty = new Smarty();
    $smarty->assign('roles',$roles);
    $smarty->assign('personajes',$personajes);
    $smarty->assign('usuario',$usuario);
    $smarty->display('templates/lista_roles.tpl');
  }

  function MostrarRol($datos, $personajes, $usuario = null){
    $smarty = new Smarty();
    $smarty->assign('datos',$datos);
    $smarty->assign('personajes',$personajes);
    $smarty->assign('usuario',$usuario);
    $smarty->display('templates/rol.tpl');
  }

}

?>