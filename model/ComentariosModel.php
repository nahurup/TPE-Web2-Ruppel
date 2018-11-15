<?php

class ComentariosModel
{
  private $db;

  function __construct()
  {
    $this->db = $this->Connect();
  }

  function Connect(){
    return new PDO('mysql:host='.HOST.'; dbname='.DBNOMBRE.';charset=utf8', USER, PASS);
  }

  function GetComentarios(){
    $sentencia = $this->db->prepare("select * from comentario");
    $sentencia->execute();
    return $sentencia->fetchAll(PDO::FETCH_ASSOC);
  }

  function GetComentario($id){
    $sentencia = $this->db->prepare("select * from comentario where id=?");
    $sentencia->execute(array($id));
    return $sentencia->fetchAll(PDO::FETCH_ASSOC);
  }

  function InsertarComentario($id_pj,$autor,$puntaje,$contenido){
    $sentencia = $this->db->prepare("INSERT INTO comentario(id_pj, autor, puntaje, contenido) VALUES(?,?,?,?)");
    $sentencia->execute(array($id_pj,$autor,$puntaje,$contenido));
  }

  function BorrarComentario($id){
    $sentencia = $this->db->prepare("delete from comentario where id=?");
    $sentencia->execute(array($id));
  }
}

?>
