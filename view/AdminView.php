<?php

class AdminView
{
  private $Smarty;

  function __construct()
  {
    $this->Smarty = new Smarty();
  }

  function Mostrar($personajes, $roles, $usuario = null){
    $this->Smarty->assign('personajes',$personajes);
    $this->Smarty->assign('roles',$roles);
    $this->Smarty->assign('usuario',$usuario);
    $this->Smarty->display('templates/admin_lista.tpl');
  }

  function MostrarUsuarios($usuarios, $usuario = null){
    $this->Smarty->assign('usuarios',$usuarios);
    $this->Smarty->assign('usuario',$usuario);
    $this->Smarty->display('templates/usuarios.tpl');
  }

  function MostrarAgregarPJ($roles, $usuario = null){
    $this->Smarty->assign('roles',$roles);
    $this->Smarty->assign('usuario',$usuario);
    $this->Smarty->display('templates/agregar_personaje.tpl');
  }

  function MostrarEditarPersonaje($personaje, $roles, $usuario = null){
    $this->Smarty->assign('personaje',$personaje);
    $this->Smarty->assign('roles',$roles);
    $this->Smarty->assign('usuario',$usuario);
    $this->Smarty->display('templates/editar_personaje.tpl');
  }

  function MostrarAgregarRol($usuario = null){
    $this->Smarty->assign('usuario',$usuario);
    $this->Smarty->display('templates/agregar_rol.tpl');
  }

  function MostrarEditarRol($rol, $usuario = null){
    $this->Smarty->assign('rol',$rol);
    $this->Smarty->assign('usuario',$usuario);
    $this->Smarty->display('templates/editar_rol.tpl');
  }
}

?>
