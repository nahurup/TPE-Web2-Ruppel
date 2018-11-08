{include file="cabecera.tpl"}

<div class="container container-lista" id="container">
    <form>
        {foreach from=$personajes item=personaje}
            <h1>{$personaje['nombre']}</h1>
            <ul class="list-group lista">
                <div class="item">
                    {foreach from=$roles item=rol}
                        {if $rol['id'] == {$personaje['id_rol']}}
                            <h4>Rol: <a href="rol/{$rol['id']}">{$rol['nombre']}</a></h4>
                        {/if}
                    {/foreach}
                    <h4>Descripcion: {$personaje['descripcion']}</h4>
                    {foreach from=$imagenes item=imagen}
                        <img src="{$imagen['src']}" alt="{$personaje['nombre']}">
                    {/foreach} 
                </div>
            </ul>
        {/foreach}       
    </form> 
    {include file="comentarios.tpl"}
</div>
{include file="footer.tpl"}