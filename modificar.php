<?php
include 'header.php';

if(isset($_SESSION['username'])){
    $id=$_POST['id'];
    echo "<div class='container'><div class='panel-info'>
 <div class='panel-heading'><h2 class='panel-title'>Modificar Usuario</h2></div>
 <div class='panel-body'>
 <form class='form-horizontal' action='modificado.php' method='post'>
    <input type='hidden' name='id' value='$id'>
    <div class='form-group'>
        <label class='control-label col-sm-2'>Id:</label>
        <div class='col-sm-10'>
            <input type='text' name='numero' required >
        </div>
    </div>
    <div class='form-group'>
        <label class='control-label col-sm-2'>Nombre:</label>
        <div class='col-sm-10'>
            <input type='text' name='nombre' required >
        </div>
    </div>
    <div class='form-group'>
        <label class='control-label col-sm-2'>Apellido:</label>
        <div class='col-sm-10'>
            <input type='text' name='apellido' required >
        </div>
    </div>
    <div class='form-group'>
        <label class='control-label col-sm-2'>Sexo:</label>
        <input type=\"radio\" name=\"sexo\" >
        <label for=\"mujer\">Mujer</label>
        <label for=\"hombre\">Hombre</label>
        <input type='text' name='sexo' required >
    </div>
    <div class='form-group'>
        <label class='control-label col-sm-2'>Cuil:</label>
        <div class='col-sm-10'>
            <input type='text' name='cuil' required >
        </div>
    </div>
    <div class='form-group'>
        <label class='control-label col-sm-2'>Nick:</label>
        <div class='col-sm-10'>
            <input type='text' name='nick' required >
        </div>
    </div>
    <div class='form-group'>
        <label class='control-label col-sm-2'>Email:</label>
        <div class='col-sm-10'>
            <input type='text' name='email' required >
        </div>
    </div>
    <div class='form-group'>
        <label class='control-label col-sm-2'>Calle:</label>
        <div class='col-sm-10'>
            <input type='text' name='calle' required >
        </div>
    </div>
    <div class='form-group'>
        <label class='control-label col-sm-2'>Altura:</label>
        <div class='col-sm-10'>
            <input type='text' name='altura' required >
        </div>
    </div>
    <div class='form-group'>
        <label class='control-label col-sm-2'>Localidad:</label>
        <div class='col-sm-10'>
            <input type='text' name='localidad' required >
        </div>
    </div>
    <div class='col-sm-offset-2 col-sm-12'>
    <input type='submit' class='btn btn-success' value='modificar'>
    </div>
</form>
</div>
</div>
</div>
";

}