{include file="cabecera.tpl"}
{include file="admin_submenu.tpl"}

<div class="container" id="container">
    <h2>Agregar Personaje</h2>
    <form method="post" action="insertarpj" enctype="multipart/form-data">
        <div class="form-group">
          <label for="nombreForm">Nombre</label>
          <input type="text" class="form-control" id="nombreForm" name="nombreForm">
        </div>
        <div class="form-group">
          <label for="descripcionForm">Descripcion</label>
          <input type="text" class="form-control" id="descripcionForm" name="descripcionForm">
        </div>
        <div class="form-group">
          <label for="imagen">Imagen</label>
          <input type="file" id="imagenes" name="imagenes[]">
        </div>
        <div class="form-group">
          <label for="rolForm">Rol:</label>
          <select id="rolForm" name="rolForm">
            {foreach from=$roles item=rol}
              <option id="rolForm" name="rolForm" value="{$rol['id']}">{$rol['nombre']}</option>
            {/foreach}
          </select>
        </div>
        
        <button type="submit" class="btn btn-primary">Añadir</button>
    </form>  
</div>

{include file="footer.tpl"}
    