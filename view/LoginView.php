<?php
class LoginView
{
  private $Smarty;

  function __construct()
  {
    $this->Smarty = new Smarty();
  }


  function mostrarLogin($message = ''){

    $this->Smarty->assign('Titulo',"Login"); // El 'Titulo' del assign puede ser cualquier valor
    $this->Smarty->assign('Message',$message); // El 'Titulo' del assign puede ser cualquier valor

    $this->Smarty->display('templates/login.tpl');
  }
}

 ?>
