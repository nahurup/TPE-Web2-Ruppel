<?php


class RolesView
{
  function Mostrar($roles){
    $smarty = new Smarty();
    $smarty->assign('roles',$roles);
    //$smarty->debugging = true;
    $smarty->display('templates/lista_roles.tpl');
  }

  function MostrarEditarRol($nombre, $roles){
    $this->Smarty->assign('Nombre',$nombre);
    $this->Smarty->assign('Roles',$roles);
    $this->Smarty->assign('home',"http://".$_SERVER["SERVER_NAME"] . dirname($_SERVER["PHP_SELF"]));

    //$smarty->debugging = true;
    $this->Smarty->display('templates/MostrarEditarRol.tpl');
  }

}

?>