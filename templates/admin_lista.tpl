{include file="cabecera.tpl"}

<div class="container" id="container">
    
    <form>
        <div class="form-group">
            <h1>Lista personajes</h1>
            <ul class="list-group">
                {foreach from=$personajes item=personaje}
                    {foreach from=$roles item=rol}
                        {if $rol['id'] == $personaje['id_rol']}
                            <h1>Nombre: <a href="http://{$smarty.server.SERVER_NAME}{dirname($smarty.server.PHP_SELF)}/personaje/{$personaje['id']}">{$personaje['nombre']}</a></h1>
                            <h6>Rol: <a href="http://{$smarty.server.SERVER_NAME}{dirname($smarty.server.PHP_SELF)}/rol/{$rol['id']}">{$rol['nombre']}</a></h1>
                            <h6>Descripción: {$personaje['descripcion']}</h1>
                        {/if}
                    {/foreach}
                {/foreach}
            </ul>
        </div>
        <div class="form-group">
                <h1>Lista roles</h1>
                <ul class="list-group">
                    {foreach from=$roles item=rol}
                      {if $rol['n_personajes'] > 0}
                        <h1><a href="http://{$smarty.server.SERVER_NAME}{dirname($smarty.server.PHP_SELF)}/rol/{$rol['id']}">{$rol['nombre']}</a></h1>
                        <h5>Desripcion: {$rol['descripcion']}</h5>
                        <h5>Numero de personajes: {$rol['n_personajes']}</h5>
                      {else}
                        <h1><a href="http://{$smarty.server.SERVER_NAME}{dirname($smarty.server.PHP_SELF)}/rol/{$rol['id']}">{$rol['nombre']}</a></h1>
                        <h5>Desripcion: {$rol['descripcion']}</h5>
                        <h5>Sin personajes dentro</h5>
                      {/if}
                    {/foreach}
              </ul>
            </div>
    </form>
        
</div>

{include file="footer.tpl"}