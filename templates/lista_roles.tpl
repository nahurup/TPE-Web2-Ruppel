{include file="cabecera.tpl"}

<div class="container" id="container">
    
        <form>
            <div class="form-group">
                <h1>Lista roles</h1>
                <ul class="list-group">
                    {foreach from=$roles item=rol}
                      {if $rol['n_personajes'] > 0}
                        <h1>{$rol['nombre']}</h1>
                        <h4>Numero de personajes: {$rol['n_personajes']}</h4>
                      {else}
                        <h1>{$rol['nombre']}</h1>
                        <h4>Sin personajes dentro</h4>
                      {/if}
                    {/foreach}
              </ul>
            </div>
        </form>
        
</div>

{include file="footer.tpl"}