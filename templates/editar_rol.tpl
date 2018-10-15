{include file="cabecera.tpl"}
    <div class="container">
      <h2>Editar Rol</h2>
      <form method="post" action="{$home}/guardarEditarRol">
        <input type="hidden" class="form-control" id="idForm" name="idForm" value="{$rol["id"]}">
        <div class="form-group">
          <label for="nombreForm">Nombre</label>
          <input type="text" class="form-control" id="nombreForm" name="nombreForm" value="{$rol["nombre"]}">
        </div>
        <div class="form-group">
          <label for="descripcionForm">Descripcion</label>
          <input type="text" class="form-control" id="descripcionForm" name="descripcionForm" value="{$rol["descripcion"]}">
        </div>
        <button type="submit" class="btn btn-primary">Editar Rol</button>
      </form>
    </div>
{include file="footer.tpl"}