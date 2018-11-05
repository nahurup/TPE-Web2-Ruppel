<?php

define('HOME', 'Location: http://'.$_SERVER["SERVER_NAME"] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER["PHP_SELF"]));
define('ADMIN', 'Location: http://'.$_SERVER["SERVER_NAME"] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER["PHP_SELF"]). '/admin');
define('LOGOUT', 'Location: http://'.$_SERVER["SERVER_NAME"] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER["PHP_SELF"]). '/logout');
define('HOST', 'localhost');
define('USER', 'root');
define('PASS', '');
define('DBNOMBRE', 'db_overwatch');

class ConfigApp
{
    public static $ACTION = 'action';
    public static $PARAMS = 'params';
    public static $ACTIONS = [
      ''=> 'PersonajesController#Home',
      'personaje'=> 'PersonajesController#Personaje',
      'roles'=> 'RolesController#Home',
      'rol'=> 'RolesController#Rol',
      'admin'=> 'AdminController#Home',
      'agregarpersonaje'=> 'AdminController#AgregarPersonaje',
      'editarpj'=> 'AdminController#EditarPersonaje',
      'guardareditarpj'=> 'AdminController#GuardarEditarPersonaje',
      'borrarpj'=> 'AdminController#BorrarPersonaje',
      'insertarpj'=> 'AdminController#InsertarPersonaje',
      'agregarrol'=> 'AdminController#AgregarRol',
      'insertarrol'=> 'AdminController#InsertarRol',
      'borrarrol'=> 'AdminController#BorrarRol',
      'editarrol'=> 'AdminController#EditarRol',
      'guardarEditarRol'=> 'AdminController#GuardarEditarRol',
      'login'=> 'LoginController#login',
      'logout'=> 'LoginController#logout',
      'verificarlogin' => 'LoginController#verificarLogin',
      'registrar'=> 'LoginController#Registrar',
      'registrarusuario' => 'LoginController#registrarUsuario'
    ];

}

 ?>
