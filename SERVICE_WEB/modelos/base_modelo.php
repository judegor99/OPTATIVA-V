<?php
function conectar(){
    $host="db4free.net";
    $user="user_admon";
    $pass="Julian12345**";
    $bd="bd_form";

    $con=mysqli_connect($host,$user,$pass);

    mysqli_select_db($con,$bd);

    return $con;
}
?>