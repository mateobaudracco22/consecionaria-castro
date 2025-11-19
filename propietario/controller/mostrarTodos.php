<?php

require_once "../../conexion/conexion.php";
include "../propietario.php";

$conecta=conectarBD();

$consulta="SELECT * FROM Propietario";

mostrarPropietario($conecta,$consulta);
echo '<a href="../../index.html">Volver al menu principal </a>';
  

mysqli_close($conecta);
?>