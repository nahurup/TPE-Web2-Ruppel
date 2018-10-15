{include file="cabecera.tpl"}

<div class="submenu">
    <nav>
        <a href="http://{$smarty.server.SERVER_NAME}{dirname($smarty.server.PHP_SELF)}/agregarpersonaje">Agregar Personaje</a>
        <a href="http://{$smarty.server.SERVER_NAME}{dirname($smarty.server.PHP_SELF)}/agregarrol">Agregar Rol</a>
        <a href="http://{$smarty.server.SERVER_NAME}{dirname($smarty.server.PHP_SELF)}/agregarusuario">Agregar Usuario</a>
        <a href="http://{$smarty.server.SERVER_NAME}{dirname($smarty.server.PHP_SELF)}/logout">Logout</a>
    </nav> 
</div>
<div class="container" id="container">
    <h2>Agregar Rol</h2>
    <form method="post" action="insertarrol">
        <div class="form-group">
          <label for="nombreForm">Nombre</label>
          <input type="text" class="form-control" id="nombreForm" name="nombreForm">
        </div>
        <div class="form-group">
          <label for="descripcionForm">Descripcion</label>
          <input type="text" class="form-control" id="descripcionForm" name="descripcionForm">
        </div>
        
        <button type="submit" class="btn btn-primary">Añadir</button>
    </form>  
</div>

{include file="footer.tpl"}
    