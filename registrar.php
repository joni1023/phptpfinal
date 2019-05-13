<!doctype html>

    <html>
        <head>
            <title>Formulario de Registro</title>
        </head>
    <body>
//modificar no usar tabla puede romper
<h1> Formulario de Registro</h1>
<h3>Los campos con * son obligatorios</h3>
<form method="post" action="registro.php">
    Nombre y Apellido
    <input type="text" name="nombre" required>
    </br>
    Nick Usuario
    <input type="text" name="nick" required>
    </br>
    Contraseña
    <input type="password" name="pass" required>
    </br>
    Confirmacion de contraseña
    <input type="password" name="repass" required>
    </br>
    <input type="submit" name="submit" value="Registrar">
    <input type="reset">

</form>
<form method="POST" action="">
    <table>
        <tr>
            <td>
                <b>Nombre y Apellido</b>
            </td>
            <td>
                <input type="text" name="nombre" required>
            </td>
        </tr>
        <tr>
            <td>
                <b> *Nick Usuario</b>
            </td>
            <td>
                <input type="text" name="nick" required>
            </td>
        </tr>
        <tr>
            <td>
                <b>*Contraseña</b>
            </td>
            <td>
                <input type="password" name="pass" required>
            </td>
        </tr>
        <tr>
            <td>
                <b> *Repetir Contraseña</b>
            </td>
            <td>
                <input type ="password" name="repass" required>
            </td>
        </tr>
    </table>
    <input type="submit" name="submit" value="Registrame" >
    <input type="reset" >
</form>
<?php
if(isset($_POST['submit'])){
    require ("registro.php");
}
?>

    </body>



</html>
