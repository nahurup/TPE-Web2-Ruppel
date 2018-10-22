<?php

class PersonajesModel
{
  private $db;

  function __construct()
  {
    $this->db = $this->Connect();
  }

  function Connect(){
    return new PDO('mysql:host='.HOST.'; dbname='.DBNOMBRE.';charset=utf8', USER, PASS);
  }

  function GetPersonajes(){
    $sentencia = $this->db->prepare("select * from personaje");
    $sentencia->execute();
    return $sentencia->fetchAll(PDO::FETCH_ASSOC);
  }

  function GetPersonaje($idPersonaje){
    $sentencia = $this->db->prepare("select * from personaje where id=?");
    $sentencia->execute($idPersonaje);
    return $sentencia->fetchAll(PDO::FETCH_ASSOC);
  }

  function GetRoles(){
    $sentencia = $this->db->prepare("select * from rol");
    $sentencia->execute();
    return $sentencia->fetchAll(PDO::FETCH_ASSOC);
  }
  
  function InsertarPersonaje($nombre,$descripcion,$idrol){
    $sentencia = $this->db->prepare("INSERT INTO personaje(nombre, descripcion, id_rol) VALUES(?,?,?)");
    $sentencia->execute(array($nombre,$descripcion,$idrol));
  }

  function BorrarPersonaje($idPj){
    $sentencia = $this->db->prepare("delete from personaje where id=?");
    $sentencia->execute(array($idPj));
  }

  function GuardarEditarPersonaje($nombre,$descripcion,$idRol,$idPj){
    $sentencia = $this->db->prepare( "update personaje set nombre = ?, descripcion = ?, id_rol = ? where id=?");
    $sentencia->execute(array($nombre,$descripcion,$idRol,$idPj));
  }
}

?>
