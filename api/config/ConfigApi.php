<?php

define('HOME', 'Location: http://'.$_SERVER["SERVER_NAME"] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER["PHP_SELF"]));
define('ADMIN', 'Location: http://'.$_SERVER["SERVER_NAME"] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER["PHP_SELF"]). '/admin');
define('LOGOUT', 'Location: http://'.$_SERVER["SERVER_NAME"] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER["PHP_SELF"]). '/logout');
define('HOST', 'localhost');
define('USER', 'root');
define('PASS', '');
define('DBNOMBRE', 'db_overwatch');

class ConfigApi
{
    public static $RESOURCE = 'resource';
    public static $PARAMS = 'params';
    public static $RESOURCES = [
      'comentario#GET'=> 'ComentariosApiController#GetComentarios',
      'comentario#DELETE'=> 'ComentariosApiController#BorrarComentario',
      'comentario#POST'=> 'ComentariosApiController#InsertarComentario',
      'verificar#GET'=> 'ComentariosApiController#verificarAdmin'
    ];

}

 ?>
