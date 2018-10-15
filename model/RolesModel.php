<?php
/**
 *
 */
class RolesModel
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

  function GetRoles(){
    $sentencia = $this->db->prepare("select * from rol");
    $sentencia->execute();
    return $sentencia->fetchAll(PDO::FETCH_ASSOC);
  }

  function GetPersonajes(){
    $sentencia = $this->db->prepare("select * from personaje");
    $sentencia->execute();
    return $sentencia->fetchAll(PDO::FETCH_ASSOC);
  }

  function GetRol($idRol){
    $sentencia = $this->db->prepare("select * from rol where id=?");
    $sentencia->execute($idRol);
    return $sentencia->fetchAll(PDO::FETCH_ASSOC);
  }

  function InsertarRol($nombre,$descripcion){
    $sentencia = $this->db->prepare("INSERT INTO rol(nombre, descripcion) VALUES(?,?)");
    $sentencia->execute(array($nombre,$descripcion));
  }

  function BorrarRol($idRol){
    $sentencia = $this->db->prepare("delete from rol where id=?");
    $sentencia->execute(array($idRol));
  }

  function GuardarEditarRol($nombre,$descripcion,$id){
    $sentencia = $this->db->prepare( "update rol set nombre = ?, descripcion = ? where id=?");
    $sentencia->execute(array($nombre,$descripcion,$id));
  }

}


 ?>
