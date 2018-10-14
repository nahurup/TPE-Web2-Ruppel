{include file="cabecera.tpl"}

<div class="container" id="container">
    
        <form>
            <div class="form-group">
                <ul class="list-group">
                    {if $rol['n_personajes'] > 0}
                        <h1>{$rol['nombre']}</h1>
                        <h4>Numero de personajes: {$rol['n_personajes']}</h4>
                    {else}
                        <h1>{$rol['nombre']}</h1>
                        <h4>Sin personajes dentro</h4>
                    {/if}
              </ul>
            </div>
        </form>
        
</div>

{include file="footer.tpl"}