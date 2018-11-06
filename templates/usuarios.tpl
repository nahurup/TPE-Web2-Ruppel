{include file="cabecera.tpl"}
{include file="admin_submenu.tpl"}

<div class="container" id="container">
    <div class="row">
        <div class="col">
            <div class="form-group">
                <h1>Lista Usuarios</h1>
                <ul class="list-group">
                    {foreach from=$usuarios item=usuario}
                        <h1>{$usuario['nombre']}</h1>
                        <h5><a href="borrarusuario/{$usuario['id']}">BORRAR</a></h5>
                        {if $usuario['admin'] == 1}
                            <h5><a href="quitaradmin/{$usuario['id']}">QUITAR ADMIN</a></h5>
                        {/if}
                        {if $usuario['admin'] == 0}
                            <h5><a href="daradmin/{$usuario['id']}">DAR ADMIN</a></h5>
                        {/if}
                    {/foreach}
                </ul>
            </div>
        </div>
    </div>  
</div>

{include file="footer.tpl"}