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
    $sentencia->execute($id);
    return $sentencia->fetchAll(PDO::FETCH_ASSOC);
  }
  
  function InsertarComentario($id_pj,$id_autor,$puntaje,$contenido){
    $sentencia = $this->db->prepare("INSERT INTO personaje(nombre, descripcion, id_rol) VALUES(?,?,?)");
    $sentencia->execute(array($nombre,$descripcion,$idrol));
    $lastId = $this->db->lastInsertId();
    for ($i = 0; $i < count($tempPath); $i++) {
      $path = $this->subirImagen($tempPath[$i]);
      $this->asignarImagen($path, $lastId);
    }
    
  }

  function BorrarPersonaje($idPj){
    $sentencia = $this->db->prepare("delete from personaje where id=?");
    $sentencia->execute(array($idPj));
  }
}

?>