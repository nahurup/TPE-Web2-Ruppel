<?php

define('HOME', 'Location: http://'.$_SERVER["SERVER_NAME"] . dirname($_SERVER["PHP_SELF"]));
define('ADMIN', 'Location: http://'.$_SERVER["SERVER_NAME"] . dirname($_SERVER["PHP_SELF"]). '/admin');
define('LOGOUT', 'Location: http://'.$_SERVER["SERVER_NAME"] . dirname($_SERVER["PHP_SELF"]). '/logout');


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
      'insertarpj'=> 'PersonajesController#InsertarPersonaje',
      'agregarrol'=> 'AdminController#AgregarRol',
      'insertarrol'=> 'RolesController#InsertarRol',
      'agregarusuario'=> 'AdminController#AgregarUsuario',
      'insertarusuario'=> 'AdminController#InsertarUsuario',
      'borrarrol'=> 'RolesController#BorrarRol',
      'editarrol'=> 'RolesController#EditarRol',
      'borrarpj'=> 'PersonajesController#BorrarPersonaje',
      'guardarEditarRol'=> 'RolesController#GuardarEditarRol',
      'editarpj'=> 'PersonajesController#EditarPersonaje',
      'guardareditarpj'=> 'PersonajesController#GuardarEditarPersonaje',
      'mostrarUsuarios'=> 'UsuarioController#MostrarUsuario',
      'login'=> 'LoginController#login',
      'logout'=> 'LoginController#logout',
      'verificarlogin' => 'LoginController#verificarLogin'
    ];

}

 ?>
