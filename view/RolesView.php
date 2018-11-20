<?php


class RolesView
{
  private $Smarty;

  function __construct()
  {
    $this->Smarty = new Smarty();
  }

  function Mostrar($roles, $personajes, $usuario = null){
    $this->Smarty->assign('roles',$roles);
    $this->Smarty->assign('personajes',$personajes);
    $this->Smarty->assign('usuario',$usuario);
    $this->Smarty->display('templates/lista_roles.tpl');
  }

  function MostrarRol($datos, $personajes, $usuario = null){
    $this->Smarty->assign('datos',$datos);
    $this->Smarty->assign('personajes',$personajes);
    $this->Smarty->assign('usuario',$usuario);
    $this->Smarty->display('templates/rol.tpl');
  }

}

?>
