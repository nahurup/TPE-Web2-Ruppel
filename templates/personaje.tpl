{include file="cabecera.tpl"}

<div class="container" id="container">
    
        <form>
            <div class="form-group">
                <ul class="list-group">
                    {foreach from=$datos item=dato}
                        <h1>{$dato['nombre']}</h1>
                        <h4>Descripcion: {$dato['descripcion']}</h4>
                    {/foreach}
              </ul>
            </div>
        </form>
        
</div>

{include file="footer.tpl"}