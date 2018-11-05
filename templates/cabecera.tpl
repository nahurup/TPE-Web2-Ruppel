<!doctype html>
<html lang="en">

<head>
  <base href="http://{$smarty.server.SERVER_NAME}:{$smarty.server.SERVER_PORT}{dirname($smarty.server.PHP_SELF)}/" target="_self">
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
<div class="cabecera">
  <header><h1>Overwatch</h1></header>
  <div class="portada"></div>
    <div class="menu">
      <input id="toggle" type="checkbox"/>
      <label for="toggle" class="drop">
        <svg width="36px" height="36px" viewBox="0 0 48 48"><path d="M6 36h36v-4H6v4zm0-10h36v-4H6v4zm0-14v4h36v-4H6z"></path></svg>
      </label >
      <nav>
        <a href="">Personajes</a>
        <a href="roles">Roles</a>
        <a href="registrar">Registrar</a>
        <a href="admin">Admin</a>
      </nav>  
    </div>
</div>
