{include file="cabecera.tpl"}
    <div class="container">
      <h2>Editar Personaje</h2>
      <form method="post" action="guardareditarpj" enctype="multipart/form-data">
        <input type="hidden" class="form-control" id="idForm" name="idForm" value="{$personaje["id"]}">
        <div class="form-group">
          <label for="nombreForm">Nombre</label>
          <input type="text" class="form-control" id="nombreForm" name="nombreForm" value="{$personaje["nombre"]}">
        </div>
        <div class="form-group">
          <label for="descripcionForm">Descripcion</label>
          <input type="text" class="form-control" id="descripcionForm" name="descripcionForm" value="{$personaje["descripcion"]}">
        </div>
        <div class="form-group">
          <label for="imagen">Imagen</label>
          <input type="file" id="imagenes" name="imagenes[]" multiple/>
        </div>
        <div class="form-group">
          <label for="idrolForm">Rol:</label>
          <select id="idrolForm" name="idrolForm">
            {foreach from=$roles item=rol}
              <option id="idrolForm" name="idrolForm" value="{$rol['id']}">{$rol['nombre']}</option>
            {/foreach}
          </select>
        </div>
        <button type="submit" class="btn btn-primary">Editar Personaje</button>
      </form>
    </div>
{include file="footer.tpl"}