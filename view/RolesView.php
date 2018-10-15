<?php


class RolesView
{
  function Mostrar($roles, $personajes){
    $smarty = new Smarty();
    $smarty->assign('roles',$roles);
    $smarty->assign('personajes',$personajes);
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

  function MostrarEditarRol($rol){
    $smarty = new Smarty();
    $smarty->assign('rol',$rol);
    $smarty->assign('home',"http://".$_SERVER["SERVER_NAME"] . dirname($_SERVER["PHP_SELF"]));

    //$smarty->debugging = true;
    $smarty->display('templates/editar_rol.tpl');
  }
}

?>