<!doctype html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <title>Actualizar Propietario</title>
  <link rel="stylesheet" href="../../css/style_actualizar.css">
</head>
<body>

<?php
// Conexión con la BD (modo procedimental)
require_once "../../conexion/conexion.php";

$conexion = conectarBD();

if (!$conexion) {
    die("Error de conexión: " . mysqli_connect_error());
}

$propietario = null;

// Si viene del formulario de búsqueda
if (isset($_POST['buscar'])) {
    $id_propietario = intval($_POST['id_propietario']);

    $sql = "SELECT * FROM Propietario WHERE id_propietario = $id_propietario";

    $resultado = mysqli_query($conexion, $sql);

    if ($resultado && mysqli_num_rows($resultado) > 0) {
        $propietario = mysqli_fetch_assoc($resultado);
    } else {
        echo "❌ No se encontró ningún propietario con ese ID.<br>";
    }
}

mysqli_close($conexion);
?>

<h1>Concesionario</h1>
<h2>Actualizar Propietario</h2>
<h3>Ingrese el ID del propietario</h3>

<!-- Formulario de búsqueda -->
<form method="POST">
    <label>ID Propietario:</label>
    <input type="number" name="id_propietario" required>
    <button type="submit" name="buscar">Buscar</button>
</form>

<?php if (is_array($propietario)) { ?>
<!-- Formulario de actualización -->
<form method="POST" action="propietario/controller/actualizar.php">
    <input type="hidden" name="id_propietario" value="<?php echo $propietario['id_propietario']; ?>">

    <label>Nombre:</label>
    <input type="text" name="nombre" value="<?php echo $propietario['nombre']; ?>" required><br>

    <label>Apellido:</label>
    <input type="text" name="apellido" value="<?php echo $propietario['apellido']; ?>" required><br>

    <label>DNI:</label>
    <input type="text" name="dni" value="<?php echo $propietario['dni']; ?>" required><br>

    <label>Dirección:</label>
    <input type="text" name="direccion" value="<?php echo $propietario['direccion']; ?>"><br>

    <label>Teléfono:</label>
    <input type="text" name="telefono" value="<?php echo $propietario['telefono']; ?>"><br>

    <button type="submit" name="actualizar">Actualizar</button>
</form>
<?php } ?>

<p><a href="../../index.html">Volver al menú principal</a></p>

</body>
</html>
