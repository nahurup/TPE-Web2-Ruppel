<?php 

if(isset($_GET["a"], $_GET["b"])) {
  $valor1 = $_GET["a"];
  $valor2 = $_GET["b"];

  $resultado = $valor1 + $valor2;

  echo "<h1>Resultado: $resultado</h1>";
}

function MostrarPrueba() {
  $smarty = new Smarty();
  $smarty->display('templates/cabecera.tpl');
  $smarty->display('templates/footer.tpl');
}

?>
  



