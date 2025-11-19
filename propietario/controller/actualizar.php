<?php
// 1. Conexión a la base de datos
// incluya aqui la ruta para realizar la conexion con la base de datos
require_once "../../conexion/conexion.php";
// incluya aqui la ruta para acceder a los subprogramas que acceden a la base de datos a la tabla que 
//esta implementando

include "../paciente.php";

$conexion = conectarBD();

if (!$conexion) {
    die("Error de conexión: " . mysqli_connect_error());
}

if (isset($_POST['actualizar'])) {

// Capturamos los valores del formulario y los saneamos

// El índice de $_POST debe coincidir con el atributo 'name' de cada campo del formulario.
// Así, el controlador puede recibir correctamente los datos enviados por el formulario.

    $id_clave  = intval($_POST['id_propietario']); // para campos de tipo number
    $atributo1 = mysqli_real_escape_string($conexion, $_POST['nombre']); //name="nombre" // campos de tipo txt
    $atributo2 = mysqli_real_escape_string($conexion, $_POST['apellido']);//name="apellido"
    $atributo3 = mysqli_real_escape_string($conexion, $_POST['dni']);
    $atributo4 = mysqli_real_escape_string($conexion, $_POST['direccion']);
    $atributo5 = mysqli_real_escape_string($conexion, $_POST['telefono']);

    // Llamada a la función de actualización (definida en paciente.php)
    echo actualizarPropietario($conexion, $id_clave,  $atributo1, $atributo2 , $atributo3, $atributo4, $atributo5);
}

mysqli_close($conexion);
echo '<a href="../../index.html">Volver al menú principal</a>';
?>
ss