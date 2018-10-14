{include file="cabecera.tpl"}

<div class="container" id="container">
    <h2>Agregar Personaje</h2>
    <form method="post" action="agregar">
        <div class="form-group">
          <label for="nombreForm">Titulo</label>
          <input type="text" class="form-control" id="nombreForm" name="nombreForm">
        </div>
        <div class="form-group">
          <label for="descripcionForm">Descripcion</label>
          <input type="text" class="form-control" id="descripcionForm" name="descripcionForm">
        </div>
        <div class="form-group">
          <label for="rolForm">Rol:</label>
          <select>
            {foreach from=$roles item=rol}
              <option value="{$rol['id']}">{$rol['nombre']}</option>
                
            {/foreach}
          </select>
        </div>
        
        <button type="submit" class="btn btn-primary">Crear Tarea</button>
    </form>  
</div>

{include file="footer.tpl"}
    