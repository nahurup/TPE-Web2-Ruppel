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

  function GetImagenes($idPersonaje){
    $sentencia = $this->db->prepare("select * from imagen where id_pj=?");
    $sentencia->execute($idPersonaje);
    return $sentencia->fetchAll(PDO::FETCH_ASSOC);
  }

  private function subirImagen($imagen){
    $destino_final = 'img/' . uniqid() . '.jpg';
    echo "destino_final: ".$destino_final;
    move_uploaded_file($imagen, $destino_final);
    return $destino_final;
  }

  function BorrarImagen($id){
    $sentencia = $this->db->prepare("delete from imagen where id=?");
    $sentencia->execute(array($id));
  }

  function BorrarComentariosPJ($id){
    $sentencia = $this->db->prepare("delete from comentario where id_pj=?");
    $sentencia->execute(array($id));
  }

  private function asignarImagen($path, $lastId){
    $sentencia = $this->db->prepare("INSERT INTO imagen(src, id_pj) VALUES(?,?)");
    $sentencia->execute(array($path,$lastId));
  }

  function InsertarPersonaje($nombre,$descripcion,$idrol,$tempPath){
    $sentencia = $this->db->prepare("INSERT INTO personaje(nombre, descripcion, id_rol) VALUES(?,?,?)");
    $sentencia->execute(array($nombre,$descripcion,$idrol));
    $lastId = $this->db->lastInsertId();
    if (!empty($tempPath[0])) {
      for ($i = 0; $i < count($tempPath); $i++) {
        $path = $this->subirImagen($tempPath[$i]);
        $this->asignarImagen($path, $lastId);
      }
    }  
  }

  function BorrarPersonaje($idPj){
    $sentencia = $this->db->prepare("delete from comentario where id_pj=?");
    $sentencia->execute(array($idPj));
    $sentencia = $this->db->prepare("delete from imagen where id_pj=?");
    $sentencia->execute(array($idPj));
    $sentencia = $this->db->prepare("delete from personaje where id=?");
    $sentencia->execute(array($idPj));
  }

  function GuardarEditarPersonaje($nombre,$descripcion,$idRol,$idPj,$tempPath){
    $sentencia = $this->db->prepare("update personaje set nombre = ?, descripcion = ?, id_rol = ? where id=?");
    $sentencia->execute(array($nombre,$descripcion,$idRol,$idPj));
    if (!empty($tempPath[0])) {
      for ($i = 0; $i < count($tempPath); $i++) {
        $path = $this->subirImagen($tempPath[$i]);
        $this->asignarImagen($path, $lastId);
      }
    }
  }
}

?>
