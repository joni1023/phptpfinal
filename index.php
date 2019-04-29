<!Doctype html>

<HTML>
<title>login</title>
<link rel="stylesheet" href="css/bootstrap.min.css">
<script src="js/bootstrap.min.js"></script>
<body class="container">
        <form class="form-group" action="logear.php" method="post">
            <div class="form-group">
                <label>Ingrese Usuario</label>
                <input type="text" class="form-control" name="usuario" placeholder="ejemplo: miUsurios">
            </div>
            <div class="form-group">
                <label >Ingrese Contraseña</label>
                <input type="password" class="form-control" name="pass" placeholder="Password">
            </div>
            <button type="submit" class="btn btn-primary">confirmar</button>
            <a class="btn btn-success" href="registrar.php">Registrar</a>

        </form>
<!--        --><?php
//        require 'logear.php';
//        if(!isset($error)){
//
//        }else{
//            echo $error;
//        }

        ?>
</body>

</HTML>
