<?php 
  require('libs/Smarty.class.php');
?>


<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB"
    crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="css/style.css">
  <title>Overwatch</title>
</head>

<body>

  <?php
  $smarty = new Smarty();
  $smarty->display('templates/cabecera.tpl');
  ?>


  <div class="container" id="container">
    <div class="row">

    </div>
  </div>
  
  <footer class="footer">
      Copyright © 2018
  </footer>
  </div>

</body>

</html>
