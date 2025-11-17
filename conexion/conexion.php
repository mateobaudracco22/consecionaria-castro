<?php

function conectarBD(){

    $conecta=mysqli_connect("localhost","root","","consecionaria");
    return $conecta;
}
?>