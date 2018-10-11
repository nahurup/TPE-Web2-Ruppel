<?php 
  require('libs/Smarty.class.php');
  function MostrarAgregar() {
    $smarty = new Smarty();
    $smarty->display('templates/cabecera.tpl');
    $smarty->display('templates/agregar_heroe.tpl');
    $smarty->display('templates/footer.tpl');
  }
?>
