<div>
    <fieldset>
        <legend>Login</legend>
    <form method="post" action="index.php?controllador=Controller\LoginController&accion=login">
        <label>email</label>
        <input type='email' name='mail'><br>
        <label>contraseña</label>
        <input type='password' name='cont'><br>
        <input type="submit">
    </form>
    </fieldset>

    <fieldset>
        <legend>Registro</legend>
    <form method="post" action="index.php?controllador=Controller\RegisterController&accion=registroPrincipal">
        <label>Nombre</label>
        <input name='nombre'><br>
        <label>Apellidos</label>
        <input name='apellidos'><br>
        <label>email</label>
        <input type='email' name='mail'><br>
        <label>contraseña</label>
        <input type='password' name='cont'><br>
        <input type="submit">
    </form>
    </fieldset>
</div>
<hr>