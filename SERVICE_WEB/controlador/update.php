<?php

include("../modelos/base_modelo.php");
$con=conectar();

$id=$_POST['id'];
$nombre=$_POST['nombre'];
$correo=$_POST['correo'];
$telefono=$_POST['telefono'];

$sql="UPDATE usuarios SET  id='$id',nombre='$nombre',correo='$correo' WHERE id='$id'";
$query=mysqli_query($con,$sql);

    if($query){
        Header("Location: ../vista/index.php");
    }
?>