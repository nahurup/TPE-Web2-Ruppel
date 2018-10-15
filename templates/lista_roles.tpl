{include file="cabecera.tpl"}

<div class="container" id="container">
    
        <form>
            <div class="form-group">
                <h1>Lista roles</h1>
                <ul class="list-group">
                    {foreach from=$roles item=rol}
                      <h1><a href="http://{$smarty.server.SERVER_NAME}{dirname($smarty.server.PHP_SELF)}/rol/{$rol['id']}">{$rol['nombre']}</a></h1>
                      <h5>Desripcion: {$rol['descripcion']}</h5>
                   {/foreach}
              </ul>
            </div>
        </form>
        
</div>

{include file="footer.tpl"}