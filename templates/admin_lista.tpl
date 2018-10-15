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
    <div class="row">
        <div class="col">
            <div class="form-group">
                <h1>Lista personajes</h1>
                <ul class="list-group">
                    {foreach from=$personajes item=personaje}
                        
                                <h1>Nombre: <a href="http://{$smarty.server.SERVER_NAME}{dirname($smarty.server.PHP_SELF)}/personaje/{$personaje['id']}">{$personaje['nombre']}</a></h1>
                                {foreach from=$roles item=rol}
                                    {if $rol['id'] == $personaje['id_rol']}
                                        <h6>Rol: <a href="http://{$smarty.server.SERVER_NAME}{dirname($smarty.server.PHP_SELF)}/rol/{$rol['id']}">{$rol['nombre']}</a></h1>
                                    {/if}
                                {/foreach}
                                <h5><a href="borrarpj/{$personaje['id']}">BORRAR</a></h5>
                                <h5><a href="editarpj/{$personaje['id']}">EDITAR</a></h5>
                                <h6>Descripción: {$personaje['descripcion']}</h1>
                            
                    {/foreach}
                </ul>
            </div>
        </div>
        <div class="col">
            <div class="form-group">
                <h1>Lista roles</h1>
                <ul class="list-group">
                    {foreach from=$roles item=rol}
                        <h1><a href="http://{$smarty.server.SERVER_NAME}{dirname($smarty.server.PHP_SELF)}/rol/{$rol['id']}">{$rol['nombre']}</a></h1>
                        <h5><a href="borrarrol/{$rol['id']}">BORRAR</a></h5>
                        <h5><a href="editarrol/{$rol['id']}">EDITAR</a></h5>
                        <h5>Desripcion: {$rol['descripcion']}</h5>
                    {/foreach}
                </ul>
            </div>
        </div>
    </div>
    
    <form>


    </form>
        
</div>

{include file="footer.tpl"}