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
    <h2>Agregar Personaje</h2>
    <form method="post" action="insertarpj">
        <div class="form-group">
          <label for="nombreForm">Nombre</label>
          <input type="text" class="form-control" id="nombreForm" name="nombreForm">
        </div>
        <div class="form-group">
          <label for="descripcionForm">Descripcion</label>
          <input type="text" class="form-control" id="descripcionForm" name="descripcionForm">
        </div>
        <div class="form-group">
          <label for="rolForm">Rol:</label>
          <select id="rolForm" name="rolForm">
            {foreach from=$roles item=rol}
              <option id="rolForm" name="rolForm" value="{$rol['id']}">{$rol['nombre']}</option>
            {/foreach}
          </select>
        </div>
        
        <button type="submit" class="btn btn-primary">Añadir</button>
    </form>  
</div>

{include file="footer.tpl"}
    