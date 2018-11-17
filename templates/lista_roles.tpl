{if $usuario}
    {include file="cabecera_logeado.tpl"}
{else}
    {include file="cabecera.tpl"}
{/if}

<div class="container container-lista" id="container">
    <form>
        <h1>Lista roles</h1>
        <ul class="list-group lista">
            {foreach from=$roles item=rol}
                <div class="item">
                    <h2><a href="rol/{$rol['id']}">{$rol['nombre']}</a></h1>
                    <h5>Desripcion: {$rol['descripcion']}</h5>
                </div>
            {/foreach}
        </ul>
    </form> 
</div>

{include file="footer.tpl"}