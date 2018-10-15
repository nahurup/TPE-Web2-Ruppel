{include file="cabecera.tpl"}

<div class="container" id="container">
    <h2>Login</h2>
    <form method="post" action="verificarlogin">
        <div class="form-group">
            <label for="usuarioId">Usuario</label>
            <input type="input" class="form-control" name="usuarioId" id="usuarioId" aria-describedby="usuarioId" placeholder="Usuario">
        </div>
        <div class="form-group">
            <label for="passwordId">Password</label>
            <input type="password" class="form-control" name="passwordId" id="passwordId" placeholder="Password">
        </div>
        <div class="">{$Message}</div>
      <button type="submit" class="btn btn-primary">Login</button>
    </form>
</div>

{include file="footer.tpl"}