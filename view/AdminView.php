<?php

class AdminView
{
  private $Smarty;

  function __construct()
  {
    $this->Smarty = new Smarty();
  }

  function Mostrar($personajes, $roles){
    $this->Smarty->assign('personajes',$personajes);
    $this->Smarty->assign('roles',$roles);
    $this->Smarty->display('templates/admin_lista.tpl');
  }

  function MostrarUsuarios($usuarios){
    $this->Smarty->assign('usuarios',$usuarios);
    $this->Smarty->display('templates/usuarios.tpl');
  }

  function MostrarAgregarPJ($roles){
    $this->Smarty->assign('roles',$roles);
    $this->Smarty->display('templates/agregar_personaje.tpl');
  }

  function MostrarEditarPersonaje($personaje, $roles){
    $this->Smarty->assign('personaje',$personaje);
    $this->Smarty->assign('roles',$roles);
    $this->Smarty->display('templates/editar_personaje.tpl');
  }

  function MostrarAgregarRol(){
    $this->Smarty->display('templates/agregar_rol.tpl');
  }

  function MostrarEditarRol($rol){
    $this->Smarty->assign('rol',$rol);
    $this->Smarty->display('templates/editar_rol.tpl');
  }
}

?>
