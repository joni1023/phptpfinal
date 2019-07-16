<?php
if (isset($_POST['submit'])) {

    $nombre=$_POST['nombre'];
    $apellido=$_POST['apellido'];
    $cuil=$_POST['cuil'];
    $email = $_POST['email'];
    $nick = $_POST['nick'];
    $pass = $_POST['pass'];
    $repass = $_POST['repass'];
    $calle=$_POST['calle'];
    $altura=$_POST['altura'];
    $localidad=$_POST['localidad'];
    $lat=$_POST['latitud'];
    $long=$_POST['longitud'];

// primero se valida que no esten vacios
    if ($nick != null && $pass != null && $repass != null && $nombre!=null && $apellido!=null && $cuil!=null && $email!=null && $calle!= null && $altura!=null && $localidad!=null && $lat!= null && $long!=null) {
        $coeficiente = array(5, 4, 3, 2, 7, 6, 5, 4, 3, 2);

        $cuit2 = str_replace('-', '', $cuil);
        $cuit = str_split($cuit2);
        $verificador = array_pop($cuit);
        $sum = 0;

        for ($i = 0; $i < 10; $i++) {

            $sum += ($cuit[$i] * $coeficiente[$i]);
            $resultado = $sum % 11;
            $resultado = 11 - $resultado;
        }
//saco el digito verificador

            $veri_nro = intval($verificador);
            if ($resultado===11){$resultado=0;}else if($resultado===10){$resultado=9;}
            if ($veri_nro <> $resultado) {
                echo "cuit invalido";
            } else {
                if ($pass === $repass) {
                    require 'database.php';
                    $pass = sha1($pass);
                    $q="INSERT INTO usuario (nombre,apellido,cuil,email,rol,nick,pass,calle,altura,localidad,latitud,longitud,estado) VALUES ('$nombre','$apellido','$cuil','$email','normal','$nick','$pass','$calle','$altura','$localidad','$lat','$long','desbloqueado'); ";
//para ver los errores de la consulta
                    if (mysqli_query($conexion, $q)) {
                        echo "New record created successfully";
                        header("location:login.php");
                    }    else {
                        echo "Error: " . $q . "<br>" . mysqli_error($conexion);
                    }
//                   header("location:index.php");
                } else {
                    echo "introduzca contraseñas iguales";
                }

            }
    }else {
                    echo "rellene todos los campos";}
}else{
    header("location:registrar.php");
}
