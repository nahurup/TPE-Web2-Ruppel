{if $usuario}
    {include file="cabecera_logeado.tpl"}
{else}
    {include file="cabecera.tpl"}
{/if}

<div class="container container-lista" id="container"> 
    <form>
        <h1>Lista personajes</h1>
        <ul class="list-group lista">
            {foreach from=$personajes item=personaje}
                {foreach from=$roles item=rol}
                    {if $rol['id'] == $personaje['id_rol']}
                        <div class="item">
                            <h2>Nombre: <a href="personaje/{$personaje['id']}">{$personaje['nombre']}</a></h2>
                            <h5>Rol: <a href="rol/{$rol['id']}">{$rol['nombre']}</a></h5>
                            <h5>Descripción: {$personaje['descripcion']}</h5>
                        </div>      
                    {/if}
                {/foreach}
            {/foreach}
        </ul>
    </form>   
</div>

{include file="footer.tpl"}