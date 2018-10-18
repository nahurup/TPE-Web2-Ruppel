<?php

define('LOGIN', 'Location: http://'.$_SERVER["SERVER_NAME"] . dirname($_SERVER["PHP_SELF"]). '/login');

class SecuredController
{

  function __construct(){
    session_start();
    if(isset($_SESSION["User"])){
      if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > 1800)) {
        $this->logout();
      }
        $_SESSION['LAST_ACTIVITY'] = time();
    }else{
        header(LOGIN);
    }
  }

  function logout(){
    session_start();
    session_destroy();
    header(LOGIN);
  }

}

?>
