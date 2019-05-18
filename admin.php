<?php
session_start();
$usuario=$_SESSION['username'];
$rol=$_SESSION['rol'];

echo $usuario;
echo $rol;