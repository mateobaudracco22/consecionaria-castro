<?php

require_once "../../conexion/conexion.php";
include "../paciente.php";

$conecta=conectarBD();

$consulta="dar la consulta para mostrar todos los pacientes en sql entre esta comillas dobles";

mostrarPacientes($conecta,$consulta);
echo '<a href="../../index.html">Volver al menu principal </a>';
  

mysqli_close($conecta);
?>