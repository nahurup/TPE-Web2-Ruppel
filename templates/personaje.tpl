{if $usuario}
    {include file="cabecera_logeado.tpl"}
{else}
    {include file="cabecera.tpl"}
{/if}

<div class="container container-lista" id="container">
    <form>
        {foreach from=$personajes item=personaje}
            <h1>{$personaje['nombre']}</h1>
            <ul class="list-group lista">
                <div class="item">
                    {foreach from=$roles item=rol}
                        {if $rol['id'] == {$personaje['id_rol']}}
                            <h4>Rol: <a href="rol/{$rol['id']}">{$rol['nombre']}</a></h4>
                        {/if}
                    {/foreach}
                    <h4>Descripcion: {$personaje['descripcion']}</h4>
                    {foreach from=$imagenes item=imagen}
                        <img src="{$imagen['src']}" alt="{$personaje['nombre']}">
                        {if $usuario['admin'] == 1}
                            <h4><a href="borrarimg/{$imagen['id']}">BORRAR IMAGEN</a></h4>
                        {/if}
                        
                    {/foreach} 
                </div>
            </ul>
        {/foreach}       
    </form> 
    <div class="comentarios-container" id="comentarios-container">
    </div>
    <form class="caja-enviar form-inline" role="form">
        <div class="form-group">
            <input id="contenido" class="form-control" type="text" placeholder="Tus comentarios"/>
        </div>
        <div class="form-puntaje">
            <label for="puntaje">Puntaje: </label>
            <select id="puntaje" name="puntaje">
                <option id="puntaje" name="puntaje" value="1">1</option>
                <option id="puntaje" name="puntaje" value="2">2</option>
                <option id="puntaje" name="puntaje" value="3">3</option>
                <option id="puntaje" name="puntaje" value="4">4</option>
                <option id="puntaje" name="puntaje" value="5">5</option>
            </select>
        </div>
        <div class="g-recaptcha" data-sitekey="6Lc-iXoUAAAAAOoyaG5C5zaq6GcWvhmFlZiLeeQ3" data-callback="verifyCaptcha"></div>
        <div id="g-recaptcha-error"></div>
        <div class="form-group">
            <button class="btn btn-default" id="publicar-comentario">Publicar</button>
        </div>    
    </form>
</div>
      <footer class="footer">
            Copyright © 2018
      </footer>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/handlebars.js/4.0.12/handlebars.js"></script>
      <script src="js/main.js"></script>
</body>
</html>