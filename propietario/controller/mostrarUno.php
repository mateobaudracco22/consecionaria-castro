<?php
include "../../conexion/conexion.php";
include "../paciente.php";

$conecta=conectarBD();

$clave=$_POST['id_paciente'];

mostrarUnPaciente($conecta,$clave);

 echo '<a href="../formularios/solicitarClaveBuscqueda.php">Nueva Busqueda </a>';

?>