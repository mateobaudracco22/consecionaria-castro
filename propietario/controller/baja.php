<?php


require_once "../../conexion/conexion.php";
require_once "../paciente.php";

// Conectarse a la base de datos
$conecta = conectarBD();

if (!$conecta) {
    die("❌ Error al conectar con la base de datos.");
}

// 2. Recuperar los datos del formulario (con seguridad básica)

// El índice de $_POST debe coincidir con el atributo 'name' de cada campo del formulario.
// Así, el controlador puede recibir correctamente los datos enviados por el formulario.

$clave = intval($_POST['id_paciente']);



// Ejecutar la eliminación usando la función existente
$resultado = eliminarPaciente($conecta, $clave);

// Mostrar el resultado
echo $resultado;

// Enlaces de regreso
echo '<p><a href="../formEmpleado/solicitarLegajoEmpleado.php">Eliminar otro empleado</a></p>';
echo '<p><a href="../../index.html">Volver al menú principal</a></p>';

// Cerrar conexión
mysqli_close($conecta);
?>
