<?php
// 1. Conexión a la base de datos
// incluya aqui la ruta para realizar la conexion con la base de datos
require_once "../../conexion/conexion.php";
// incluya aqui la ruta para acceder a los subprogramas que acceden a la base de datos a la tabla que 
//esta implementando

include "../propietario.php";

$conexion = conectarBD();

if (!$conexion) {
    echo "No pudo conectarse.<br>";
    die("Error de conexión: " . mysqli_connect_error());
}

// 2. Recuperar los datos del formulario (con seguridad básica)
    $id_clave   = intval($_POST['id_propietario']);
    $atributo1  = mysqli_real_escape_string($conexion, $_POST['nombre']);// complete con el nombre del atributo
    $atributo2  = mysqli_real_escape_string($conexion, $_POST['apellido']);
    $atributo3  = mysqli_real_escape_string($conexion, $_POST['dni']);
    $atributo4  = mysqli_real_escape_string($conexion, $_POST['direccion']);
    $atributo5  = mysqli_real_escape_string($conexion, $_POST['telefono']);

// 3. Ejecutar el alta del paciente sobre la base de datos
// invoque al procedimiento que registra una persona en la base de datos
$verificarConsulta = altaPropietario($conexion, $id_clave,  $atributo1, $atributo2 , $atributo3, $atributo4, $atributo5, $atributo6);

if (!$verificarConsulta) { 
    echo "Error al registrar el propietario: " . mysqli_error($conexion);
} 

echo '<p><a href="../formularios/Alta.php">Registrar otro paciente</a></p>';
echo '<p><a href="../../index.html">Volver al menú principal</a></p>';

// 4. Cerrar conexión
mysqli_close($conexion);
?>
