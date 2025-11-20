<?php

function conectarBD(){

    $conecta=mysqli_connect("localhost","root","","concesionaria");
    return $conecta;
}
?>