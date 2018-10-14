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

  function InsertarRol($id,$n_personajes,$nombre){
    $sentencia = $this->db->prepare("INSERT INTO rol(id, n_personajes, nombre) VALUES(?,?,?)");
    $sentencia->execute(array($id,$n_personajes,$nombre));
  }

  function BorrarRol($idRol){
    $sentencia = $this->db->prepare( "delete from rol where id=?");
    $sentencia->execute(array($idRol));
  }
}


 ?>
