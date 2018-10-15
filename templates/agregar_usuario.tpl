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
    <h2>Agregar Usuario</h2>
    <form method="post" action="insertarusuario">
        <div class="form-group">
          <label for="usuarioForm">Nombre de usuario</label>
          <input type="text" class="form-control" id="usuarioForm" name="usuarioForm" placeholder="Usuario">
        </div>
        <div class="form-group">
            <label for="passwordId">Password</label>
            <input type="password" class="form-control" name="passwordId" id="passwordId" placeholder="Password">
        </div>
        <button type="submit" class="btn btn-primary">Añadir</button>
    </form>  
</div>

{include file="footer.tpl"}