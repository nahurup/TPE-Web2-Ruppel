<?php

class AdminModel
{
  private $db;

  function __construct()
  {
    $this->db = $this->Connect();
  }

  function Connect(){
    return new PDO('mysql:host='.HOST.'; dbname='.DBNOMBRE.';charset=utf8', USER, PASS);
  }

  function GetUsuario(){
    $sentencia = $this->db->prepare( "select * from usuario");
    $sentencia->execute();
    return $sentencia->fetchAll(PDO::FETCH_ASSOC);
  }

  function InsertarUsuario($nombre, $password){
    $sentencia = $this->db->prepare("INSERT INTO usuario(nombre, password) VALUES(?,?)");
    $sentencia->execute(array($nombre, $password));
  }

  function GetUser($user){
    $sentencia = $this->db->prepare( "select * from usuario where nombre=? limit 1");
    $sentencia->execute(array($user));
    return $sentencia->fetchAll(PDO::FETCH_ASSOC);
  }
  
}


?>