<?php

define('HOME', 'Location: http://'.$_SERVER["SERVER_NAME"] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER["PHP_SELF"]));
define('ADMIN', 'Location: http://'.$_SERVER["SERVER_NAME"] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER["PHP_SELF"]). '/admin');
define('LOGOUT', 'Location: http://'.$_SERVER["SERVER_NAME"] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER["PHP_SELF"]). '/logout');
define('LOGIN', 'Location: http://'.$_SERVER["SERVER_NAME"] . dirname($_SERVER["PHP_SELF"]). '/login');
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
      'usuarios'=> 'AdminController#MostrarUsuarios',
      'borrarusuario'=> 'AdminController#BorrarUsuario',
      'daradmin'=> 'AdminController#DarAdmin',
      'quitaradmin'=> 'AdminController#QuitarAdmin',
      'agregarpersonaje'=> 'AdminController#AgregarPersonaje',
      'editarpj'=> 'AdminController#EditarPersonaje',
      'guardareditarpj'=> 'PersonajesController#GuardarEditarPersonaje',
      'borrarpj'=> 'PersonajesController#BorrarPersonaje',
      'insertarpj'=> 'PersonajesController#InsertarPersonaje',
      'borrarimg'=> 'PersonajesController#BorrarImagen',
      'agregarrol'=> 'AdminController#AgregarRol',
      'insertarrol'=> 'RolesController#InsertarRol',
      'borrarrol'=> 'RolesController#BorrarRol',
      'editarrol'=> 'AdminController#EditarRol',
      'guardarEditarRol'=> 'RolesController#GuardarEditarRol',
      'login'=> 'LoginController#login',
      'logout'=> 'LoginController#logout',
      'verificarlogin' => 'LoginController#verificarLogin',
      'registrar'=> 'LoginController#Registrar',
      'registrarusuario' => 'LoginController#registrarUsuario'
    ];

}

 ?>
