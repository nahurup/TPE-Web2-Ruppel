<?php 

function sumar($valor1, $valor2) {
  $resultado = $valor1 + $valor2;
  
  echo "<h1>Resultado: $resultado</h1>";
}

function MostrarPrueba() {
  $smarty = new Smarty();
  $smarty->display('templates/cabecera.tpl');
  $smarty->display('templates/footer.tpl');
}

?>
  



