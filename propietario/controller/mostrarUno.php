<?php
include "../../conexion/conexion.php";
include "../propietario.php";

$conecta=conectarBD();

$clave=$_POST['id_propietario'];

mostrarUnPropietario($conecta,$clave);

 echo '<a href="../formularios/solicitarClaveBuscqueda.php">Nueva Busqueda </a>';

?>