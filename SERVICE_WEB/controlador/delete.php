<?php

include("../modelos/base_modelo.php");
$con=conectar();

$id=$_GET['id'];

$sql="DELETE FROM usuarios WHERE id='$id'";
$query=mysqli_query($con,$sql);

    if($query){
        Header("Location: ../vista/index.php");
    }
?>