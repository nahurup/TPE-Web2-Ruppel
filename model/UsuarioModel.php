<?php

class UsuarioModel
{
  private $db;

  function __construct()
  {
    $this->db = $this->Connect();
  }

  function Connect(){
    return new PDO('mysql:host='.HOST.'; dbname='.DBNOMBRE.';charset=utf8', USER, PASS);
  }

  function GetUsuarios(){
    $sentencia = $this->db->prepare("select * from usuario");
    $sentencia->execute();
    return $sentencia->fetchAll(PDO::FETCH_ASSOC);
  }

  function InsertarUsuario($nombre, $password){
    $sentencia = $this->db->prepare("INSERT INTO usuario(nombre, pass) VALUES(?,?)");
    $sentencia->execute(array($nombre, $password));
  }

  function GetUser($user){
    $sentencia = $this->db->prepare("select * from usuario where nombre=? limit 1");
    $sentencia->execute(array($user));
    return $sentencia->fetchAll(PDO::FETCH_ASSOC);
  }

  function BorrarUsuario($id){
    $sentencia = $this->db->prepare("delete from usuario where id=?");
    $sentencia->execute(array($id));
  }

  function DarAdmin($id){
    $sentencia = $this->db->prepare("update usuario set admin = 1 where id=?");
    $sentencia->execute(array($id));
  }

  function QuitarAdmin($id){
    $sentencia = $this->db->prepare("update usuario set admin = 0 where id=?");
    $sentencia->execute(array($id));
  }

}

?>
