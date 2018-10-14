<?php

class PersonajesModel
{
  private $db;

  function __construct()
  {
    $this->db = $this->Connect();
  }

  function Connect(){
    return new PDO('mysql:host=localhost;'
    .'dbname=db_overwatch;charset=utf8'
    , 'root', '');
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
  
  function InsertarPersonaje($nombre,$descripcion,$id_rol){
    $sentencia = $this->db->prepare("INSERT INTO personaje(nombre, descripcion, id_rol) VALUES(?,?,?)");
    $sentencia->execute(array($nombre,$descripcion,$id_rol));
  }
}

?>
