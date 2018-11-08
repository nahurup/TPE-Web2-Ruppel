<?php

class ConfigApi
{
    public static $RESOURCE = 'resource';
    public static $PARAMS = 'params';
    public static $RESOURCES = [
      'comentario#GET'=> 'ComentariosApiController#GetComentarios',
      'comentario#DELETE'=> 'ComentariosApiController#BorrarComentario',
      'comentario#POST'=> 'ComentariosApiController#InsertarComentario'
    ];

}

 ?>
