<?php 

$db = new PDO('mysql:host=localhost;'
.'dbname=db_tareas;charset=utf8'
, 'root', '');

$sentencia = $db->prepare( "select * from tarea");
$sentencia->execute();

function MostrarLista() {
  $smarty = new Smarty();
  $smarty->display('templates/cabecera.tpl');
  $smarty->display('templates/lista.tpl');
  $smarty->display('templates/footer.tpl');
}

?>