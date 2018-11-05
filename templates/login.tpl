{include file="cabecera.tpl"}

<div class="container" id="container">
    <h2>Login</h2>
    <form method="post" action="verificarlogin">
        <div class="form-group">
            <label for="usuarioForm">Usuario</label>
            <input type="input" class="form-control" name="usuarioForm" id="usuarioForm" aria-describedby="usuarioForm" placeholder="Usuario">
        </div>
        <div class="form-group">
            <label for="passwordForm">Password</label>
            <input type="password" class="form-control" name="passwordForm" id="passwordForm" placeholder="Password">
        </div>
        <div class="">{$Message}</div>
      <button type="submit" class="btn btn-primary">Login</button>
    </form>
</div>

{include file="footer.tpl"}