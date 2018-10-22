{include file="cabecera.tpl"}

<div class="container container-lista" id="container">
    <form>
        {foreach from=$datos item=dato}
            <h1>{$dato['nombre']}</h1>
            <h5>Descripcion: {$dato['descripcion']}</h4>
            <ul class="list-group lista">
                {foreach from=$personajes item=personaje}
                    {if $personaje['id_rol'] == {$dato['id']}}
                        <div class="item">
                            <h1>Nombre: <a href="personaje/{$personaje['id']}">{$personaje['nombre']}</a></h1>
                            <h5>Descripcion: {$personaje['descripcion']}</h4>
                        </div>
                    {/if}
                {/foreach}
            </ul>
        {/foreach} 
    </form>
</div>

{include file="footer.tpl"}