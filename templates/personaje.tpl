{include file="cabecera.tpl"}

<div class="container container-lista" id="container">
    <form>
        {foreach from=$datos item=dato}
            <h1>{$dato['nombre']}</h1>
            <ul class="list-group lista">
                <div class="item">
                    {foreach from=$roles item=rol}
                        {if $rol['id'] == {$dato['id_rol']}}
                            <h4>Rol: <a href="rol/{$rol['id']}">{$rol['nombre']}</a></h4>
                        {/if}
                    {/foreach}
                    <h4>Descripcion: {$dato['descripcion']}</h4>
                </div>
            </ul>
        {/foreach}       
    </form> 
</div>

{include file="footer.tpl"}