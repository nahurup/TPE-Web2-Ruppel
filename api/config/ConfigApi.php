<?php

class ConfigApi
{
    public static $RESOURCE = 'resource';
    public static $PARAMS = 'params';
    public static $RESOURCES = [
      'tarea#GET'=> 'TareasApiController#GetTareas',
      'tarea#DELETE'=> 'TareasApiController#DeleteTarea',
      'tarea#POST'=> 'TareasApiController#InsertTarea',
      'tarea#PUT'=> 'TareasApiController#UpdateTarea'
    ];

}

 ?>
