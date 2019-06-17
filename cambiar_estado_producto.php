<?php

$id = $_POST['id'];
$estado = $_POST['estado'];
$db = mysqli_connect("localhost", "root", "", "tp_pw");
$sql = "UPDATE item SET estado='$estado' WHERE id='$id'";
mysqli_query($db, $sql);