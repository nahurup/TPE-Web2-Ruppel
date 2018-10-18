<?php
class LoginView
{
  private $Smarty;

  function __construct()
  {
    $this->Smarty = new Smarty();
  }


  function mostrarLogin($message = ''){

    $this->Smarty->assign('Titulo',"Login");
    $this->Smarty->assign('Message',$message);

    $this->Smarty->display('templates/login.tpl');
  }
}

 ?>
