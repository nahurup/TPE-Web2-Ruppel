{include file="cabecera.tpl"}

<div class="container" id="container">
    
        <form>
            <div class="form-group">
                <ul class="list-group">
                    {foreach from=$datos item=dato}
                        <h1>{$dato['nombre']}</h1>
                        <h5>Descripcion: {$dato['descripcion']}</h4>
                            {foreach from=$personajes item=personaje}
                                {if $personaje['id_rol'] == {$dato['id']}}
                                    <h1>Nombre: <a href="http://{$smarty.server.SERVER_NAME}{dirname($smarty.server.PHP_SELF)}/personaje/{$personaje['id']}">{$personaje['nombre']}</a></h1>
                                    <h5>Descripcion: {$personaje['descripcion']}</h4>
                                {/if}
                            {/foreach}
                    {/foreach}
              </ul>
            </div>
        </form>
        
</div>

{include file="footer.tpl"}