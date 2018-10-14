<?php
require('libs/Smarty.class.php');

class PersonajesView
{
  function Mostrar($personajes, $roles){
    $smarty = new Smarty();
    $smarty->assign('personajes',$personajes);
    $smarty->assign('roles',$roles);
    //$smarty->debugging = true;
    $smarty->display('templates/lista_personajes.tpl');
  }

  function MostrarEditarPersonaje($Titulo, $Tarea){
    $this->Smarty->assign('Personajes',$personajes);
    $this->Smarty->assign('home',"http://".$_SERVER["SERVER_NAME"] . dirname($_SERVER["PHP_SELF"]));

    //$smarty->debugging = true;
    //$this->Smarty->display('templates/MostrarEditarTarea.tpl');
  }

}

?>