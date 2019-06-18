<?php
session_start();
if(!isset($_SESSION['rol'])){
header("location:index.php");
}
if($_SESSION['rol']!= "admin"){
    header("location:index.php");
}
?>
<!DOCTYPE html>
<html lang="es">
<title>Registro de Usuarios</title>
<?php
require 'header.php';
?>

<body>
<div class="container">
    <div class="row">
        <div class="col-lg-4"></div>
        <div class="col-lg-4"></div>
    </div>
    <div class="row">

        <div class="col-lg-3"></div>
        <div class="col-lg-6 " >
            <form class="form form-inline " action="admin.php" method="post">
                <div class="form-group">
                    <label class="control-label">Buscar el Usuario:</label>
                    <input type="text" class="form-control" name="usuariobuscado" placeholder="ingrese nombre del usuario" required">
                </div>
                <input type="submit" value="Buscar" class="btn btn-success">

            </form>
        </div>
    </div>
    <div class="col-lg-3"></div>

    <?php
    require 'database.php';
    if(isset($_POST['usuariobuscado'])){
        $buscado=$_POST['usuariobuscado'];
        $q="select * from usuario where nick='$buscado'; ";
        $consulta=mysqli_query($conexion,$q);
        $array= mysqli_fetch_array($consulta);
        if(isset($array)){
            echo "<h2>Resultado</h2>";
            echo "<table class='table'>
        <thead>
                <tr>
                  <th scope='col'>Nombre</th>
                  <th scope='col'>Apellido</th>
                  <th scope='col'>Sexo</th>
                  <th scope='col'>Cuil</th>
                  <th scope='col'>Nick</th>
                  <th scope='col'>Email</th>
                  <th scope='col'>Calle</th>
                  <th scope='col'>Altura</th>
                  <th scope='col'>Localidad</th>
                  <th scope='col'></th>
                </tr>
              </thead>";
            echo " <tbody>
                <tr>
                  <td>".$array["nombre"]."</td>
                  <td>".$array["apellido"]."</td>
                  <td>".$array["sexo"]."</td>
                  <td>".$array["cuil"]."</td>
                  <td>".$array["nick"]."</td>
                  <td>".$array["email"]."</td>
                  <td>".$array["calle"]."</td>
                  <td>".$array["altura"]."</td>
                  <td>".$array["localidad"]."</td>
                  <td>";
            if(isset($_SESSION['username'])){
                echo " <form  action='opciones.php' method='post'>
                    <input type='hidden' name='id' value='".$array['id']."'>
                    <input type='hidden' name='nombre' value='" . $array['nombre'] . "'>
                    <input type='hidden' name='apellido' value='" . $array['apellido'] . "'>
                    <input type='hidden' name='sexo' value='" . $array['sexo'] . "'>
                    <input type='hidden' name='cuil' value='" . $array['cuil'] . "'>
                    <input type='hidden' name='nick' value='" . $array['nick'] . "'>
                    <input type='hidden' name='email' value='" . $array['email'] . "'>
                    <input type='hidden' name='calle' value='" . $array['calle'] . "'>
                    <input type='hidden' name='altura' value='" . $array['altura'] . "'>
                    <input type='hidden' name='localidad' value='" . $array['localidad'] . "'>
                    <input type='submit' class='btn btn-danger' name='botone' value='Bloquear'>
                    <input type='submit' class='btn btn-primary' formaction='modificar.php' value='Desbloquear'>
                  </form> ";}


            echo "</td></tr></tbody></table>";
        }else{
            echo "<p>Usuario no encontrado</p>";
            echo "<h2>Lista de Usuarios</h2>";
            $q="select * from usuario ";
            $consulta=mysqli_query($conexion,$q);
            $colum = mysqli_fetch_array($consulta);
            echo " <table class='table'>
              <thead>
                <tr>
                  <th scope='col'>Id</th>
                  <th scope='col'>Nombre</th>
                  <th scope='col'>Apellido</th>
                  <th scope='col'>Sexo</th>
                  <th scope='col'>Cuil</th>
                  <th scope='col'>Nick</th>
                  <th scope='col'>Email</th>
                  <th scope='col'>Calle</th>
                  <th scope='col'>Altura</th>
                  <th scope='col'>Localidad</th>  
                  <th scope='col'></th>
                </tr>
              </thead>";
            if(isset($colum)){
                do{
                    echo " <tbody>
                <tr>
                  <th scope='row'>".$colum["id"]."</th>
                  <td>".$colum["nombre"]."</td>
                  <td>".$colum["apellido"]."</td>
                  <td>".$colum["cuil"]."</td>
                  <td>".$colum["nick"]."</td>
                  
                  <td>";
                    if(isset($_SESSION['username'])){
                        echo " <form  action='opciones.php' method='post'>
                    <input type='hidden' name='id' value='".$colum['id']."'>
                    <input type='hidden' name='nombre' value='" . $colum['nombre'] . "'>
                    <input type='hidden' name='apellido' value='" . $colum['apellido'] . "'>
                    <input type='hidden' name='sexo' value='" . $colum['sexo'] . "'>
                    <input type='hidden' name='cuil' value='" . $colum['cuil'] . "'>
                    <input type='hidden' name='nick' value='" . $colum['nick'] . "'>
                    <input type='hidden' name='email' value='" . $colum['email'] . "'>
                    <input type='hidden' name='calle' value='" . $colum['calle'] . "'>
                    <input type='hidden' name='altura' value='" . $colum['altura'] . "'>
                    <input type='hidden' name='localidad' value='" . $colum['localidad'] . "'>
                    <input type='submit' class='btn btn-danger' name='botone' value='Bloquear'>
                    <input type='submit' class='btn btn-primary' formaction='modificar.php' value='Desbloquear'>
                  </form> ";
                    }


                }while($colum=mysqli_fetch_array($consulta));
                echo "</td>
                </tr>
              </tbody>
            </table>";

            }
        }

    }else{
        echo "<h2>Lista de Usuarios</h2>";
        $q="select * from usuario ";
        $consulta=mysqli_query($conexion,$q);
        $colum = mysqli_fetch_array($consulta);
        echo " <table class='table'>
              <thead>
                <tr>
                  <th scope='col'>Nombre</th>
                  <th scope='col'>Apellido</th>
                  <th scope='col'>Sexo</th>
                  <th scope='col'>Cuil</th>
                  <th scope='col'>Nick</th>
                  <th scope='col'>Email</th>
                  <th scope='col'>Calle</th>
                  <th scope='col'>Altura</th>
                  <th scope='col'>Localidad</th>  
                  <th scope='col'></th>
                </tr>
              </thead>";

        if(isset($colum)) {
            do {
                echo " <tbody>
                <tr>
                  <td>" . $colum["nombre"] . "</td>
                  <td>" . $colum["apellido"] . "</td>
                  <td>" . $colum["sexo"] . "</td>
                  <td>" . $colum["cuil"] . "</td>
                  <td>" . $colum["nick"] . "</td>
                  <td>" . $colum["email"] . "</td>
                  <td>" . $colum["calle"] . "</td>
                  <td>" . $colum["altura"] . "</td>
                  <td>" . $colum["localidad"] . "</td>
                  
                  <td>";
                if (isset($_SESSION['username'])) {
                    echo " <form  action='opciones.php' method='post'>
                    <input type='hidden' name='id' value='" . $colum['id'] . "'>
                    <input type='hidden' name='nombre' value='" . $colum['nombre'] . "'>
                    <input type='hidden' name='apellido' value='" . $colum['apellido'] . "'>
                    <input type='hidden' name='sexo' value='" . $colum['sexo'] . "'>
                    <input type='hidden' name='cuil' value='" . $colum['cuil'] . "'>
                    <input type='hidden' name='nick' value='" . $colum['nick'] . "'>
                    <input type='hidden' name='email' value='" . $colum['email'] . "'>
                    <input type='hidden' name='calle' value='" . $colum['calle'] . "'>
                    <input type='hidden' name='altura' value='" . $colum['altura'] . "'>
                    <input type='hidden' name='localidad' value='" . $colum['localidad'] . "'>
                    <input type='submit' class='btn btn-danger' name='botone' value='Bloquear'>
                    <input type='submit' class='btn btn-primary'  formaction='desbloqueo.php' name='envio' value='Desbloquear'>
                  </form> ";
                }


            } while ($colum = mysqli_fetch_array($consulta));

            echo "</td>
                </tr>
              </tbody>
            </table>";
        }
    }

    ?>
</div>
</body>


