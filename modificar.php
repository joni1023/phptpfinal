<?php
include 'header.php';

if(isset($_SESSION['username'])){
    $id=$_POST['id'];
    $nombre=$_POST['nombre'];
    $apellido=$_POST['apellido'];
    $sexo=$_POST['sexo'];
    $cuil=$_POST['cuil'];
    $nick=$_POST['nick'];
    $email=$_POST['email'];
    $calle=$_POST['calle'];
    $altura=$_POST['altura'];
    $localidad=$_POST['localidad'];

    echo "<div class='container'><div class='panel-info'>
 <div class='panel-heading'><h2 class='panel-title'>Modificar Usuario</h2></div>
 <div class='panel-body'>
 <form class='form-horizontal' action='modificado.php' method='post'>
    <input type='hidden' name='id' value='$id'>
    <div class='form-group'>
        <label class='control-label col-sm-2'>Nombre:</label>
        <div class='col-sm-10'>
            <input type='text' name='nombre' value='$nombre' required >
        </div>
    </div>
    <div class='form-group'>
        <label class='control-label col-sm-2'>Apellido:</label>
        <div class='col-sm-10'>
            <input type='text' name='apellido' value='$apellido' required >
        </div>
    </div>
    <label class='control-label col-sm-2'>Sexo:</label>";
    if($sexo=='hombre'){
        echo "    <div class='form-group'>
        
        <input type='radio' name='sexo' value='mujer'>
        <label for='mujer' >Mujer</label>
        <input type='radio' name='sexo' value='hombre' checked>
        <label for='hombre'>Hombre</label>
    </div>";
    }
    else{
        echo "    <div class='form-group'>
        
        <input type='radio' name='sexo' checked>
        <label for='mujer'>Mujer</label>
        <input type='radio' name='sexo' value='hombre'>
        <label for='hombre' >Hombre</label>
    </div>";
    }
    echo "
    <div class='form-group'>
        <label class='control-label col-sm-2'>Cuil:</label>
        <div class='col-sm-10'>
            <input type='text' name='cuil' value='$cuil' required >
        </div>
    </div>
    <div class='form-group'>
        <label class='control-label col-sm-2'>Nick:</label>
        <div class='col-sm-10'>
            <input type='text' name='nick' value='$nick' required >
        </div>
    </div>
    <div class='form-group'>
        <label class='control-label col-sm-2'>Email:</label>
        <div class='col-sm-10'>
            <input type='text' name='email' value='$email' required >
        </div>
    </div>
    <div class='form-group'>
        <label class='control-label col-sm-2'>Calle:</label>
        <div class='col-sm-10'>
            <input type='text' name='calle' value='$calle' required >
        </div>
    </div>
    <div class='form-group'>
        <label class='control-label col-sm-2'>Altura:</label>
        <div class='col-sm-10'>
            <input type='text' name='altura' value='$altura' required >
        </div>
    </div>
    <div class='form-group'>
        <label class='control-label col-sm-2'>Localidad:</label>
        <div class='col-sm-10'>
            <input type='text' name='localidad' value='$localidad' required >
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