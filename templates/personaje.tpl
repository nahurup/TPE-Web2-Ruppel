{include file="cabecera.tpl"}

<div class="container" id="container">
    
        <form>
            <div class="form-group">
                <ul class="list-group">
                    {foreach from=$datos item=dato}
                        <h1>{$dato['nombre']}</h1>
                        {foreach from=$roles item=rol}
                            {if $rol['id'] == {$dato['id_rol']}}
                                <h4>Rol: <a href="http://{$smarty.server.SERVER_NAME}{dirname($smarty.server.PHP_SELF)}/rol/{$rol['id']}">{$rol['nombre']}</a></h4>
                            {/if}
                        {/foreach}
                        <h4>Descripcion: {$dato['descripcion']}</h4>
                    {/foreach}
              </ul>
            </div>
        </form>
        
</div>

{include file="footer.tpl"}