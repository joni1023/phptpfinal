<?php
session_start();
if (!isset($_SESSION['rol'])){
    header("location:index.php");
}
if($_SESSION['rol']!="normal"){
    header("location:index.php");
}
include 'header.php';


if(isset($_SESSION['username'])){
   /* $id=$_POST['id'];
    $nombre=$_POST['nombre'];
    $apellido=$_POST['apellido'];
    $sexo=$_POST['sexo'];
    $cuil=$_POST['cuil'];
    $nick=$_POST['nick'];
    $email=$_POST['email'];
    $calle=$_POST['calle'];
    $altura=$_POST['altura'];
    $localidad=$_POST['localidad'];
*/
    include_once 'database.php';
    $id=$_SESSION['user_id'];
    $s="select * from usuario where id=$id";
    $consulta=mysqli_query($conexion,$s);
    $row=mysqli_fetch_array($consulta);

    echo "<div class='container'><div class='panel-info'>
 <div class='panel-heading'><h2 class='panel-title'>Modificar Usuario</h2></div>
 <div class='panel-body'>
 <form class='form-horizontal' action='modificado.php' method='post'>
    <input type='hidden' name='id' value='$id'>
    <div class='form-group'>
        <label class='control-label col-sm-2'>Nombre:</label>
        <div class='col-sm-10'>
            <input type='text' name='nombre' value='$row[nombre]' required >
        </div>
    </div>
    <div class='form-group'>
        <label class='control-label col-sm-2'>Apellido:</label>
        <div class='col-sm-10'>
            <input type='text' name='apellido' value='$row[apellido]' required >
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
            <input type='text' name='cuil' value='$row[cuil]' required >
        </div>
    </div>
    <div class='form-group'>
        <label class='control-label col-sm-2'>Nick:</label>
        <div class='col-sm-10'>
            <input type='text' name='nick' value='$row[nick]' required >
        </div>
    </div>
    <div class='form-group'>
        <label class='control-label col-sm-2'>Email:</label>
        <div class='col-sm-10'>
            <input type='text' name='email' value='$row[email]' required >
        </div>
    </div>
    <div class='form-group'>
        <label class='control-label col-sm-2'>Calle:</label>
        <div class='col-sm-10'>
            <input type='text' name='calle' value='$row[calle]' required >
        </div>
    </div>
    <div class='form-group'>
        <label class='control-label col-sm-2'>Altura:</label>
        <div class='col-sm-10'>
            <input type='text' name='altura' value='$row[altura]' required >
        </div>
    </div>
    <div class='form-group'>
        <label class='control-label col-sm-2'>Localidad:</label>
        <div class='col-sm-10'>
            <input type='text' name='localidad' value='$row[localidad]' required >
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