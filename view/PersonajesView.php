<?php
require('libs/Smarty.class.php');

class PersonajesView
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
    $this->Smarty->display('templates/lista_personajes.tpl');
  }

  function MostrarPersonaje($personajes, $roles, $imagenes, $usuario = null){
    $this->Smarty->assign('personajes',$personajes);
    $this->Smarty->assign('roles',$roles);
    $this->Smarty->assign('imagenes',$imagenes);
    $this->Smarty->assign('usuario',$usuario);
    $this->Smarty->display('templates/personaje.tpl');
  }
}

?>
