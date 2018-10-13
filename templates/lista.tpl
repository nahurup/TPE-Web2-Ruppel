{include file="cabecera.tpl"}

<div class="container" id="container">
    
        <form>
            <div class="form-group">
                <h1>Lista</h1>
                <ul class="list-group">
                    {foreach from=$Tareas item=tarea}
                      {if $tarea['completada'] == 1}
                        <li class="list-group-item"><s>{$tarea['titulo']} ----- {$tarea['descripcion']}</s><a href="borrar/{$tarea['id']}">BORRAR</a></li>
                      {else}
                        <li class="list-group-item">{$tarea['titulo']} ----- {$tarea['descripcion']}<a href="borrar/{$tarea['id']}">BORRAR</a> | <a href="completada/{$tarea['id']}">COMPLETADA</a></li>
                      {/if}
                    {/foreach}
              </ul>
            </div>
        </form>
        
        <form>
            <div class="form-group">
                    <h2>Formulario</h2>
                    <form method="post" action="agregar">
                      <div class="form-group">
                        <label for="tituloForm">Titulo</label>
                        <input type="text" class="form-control" id="tituloForm" name="tituloForm">
                      </div>
                      <div class="form-group">
                        <label for="descripcionForm">Descripcion</label>
                        <input type="text" class="form-control" id="descripcionForm" name="descripcionForm">
                      </div>
                      <div class="form-group form-check">
                        <input type="checkbox" class="form-check-input" id="completadaForm" name="completadaForm">
                        <label class="form-check-label" for="completadaForm">Completada?</label>
                      </div>
                      <button type="submit" class="btn btn-primary">Crear Tarea</button>
                    </form>
            </div>
        </form>
</div>

{include file="footer.tpl"}