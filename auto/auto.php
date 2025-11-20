<?php
/* 
Propietario
o id_propietario (INT, PK)
o nombre (VARCHAR)
o apellido (VARCHAR)
o dni (VARCHAR)
o direccion (VARCHAR)
o telefono (VARCHAR)
*/

// === Función para registrar un nuevo propietario ===
function altaPropietario($conexion, $id_propietario, $nombre, $apellido, $dni, $direccion, $telefono) {

    if (is_null(obtenerPropietario($conexion, $id_propietario))) {
        // Insertar nuevo propietario
        $sql = "INSERT INTO Propietario (id_propietario, nombre, apellido, dni, direccion, telefono)
                VALUES ($id_propietario, '$nombre', '$apellido', '$dni', '$direccion', '$telefono')";

        $resultadoInsert = mysqli_query($conexion, $sql);

        if ($resultadoInsert == true) {
            echo "<p>Propietario registrado con éxito.</p>";
        } else {
            echo "Error al registrar propietario: " . mysqli_error($conexion);
        }

        return $resultadoInsert;
    } else {
        echo "<p>El propietario ya está registrado.</p>";
        return false;
    }
}

// === Función para mostrar todos los propietarios ===
function mostrarPropietarios($conexion, $consulta) {

    $resultado = mysqli_query($conexion, $consulta);

    if (!$resultado) {
        echo "<p>Error, vuelva a intentarlo nuevamente.</p>";
    } else {

        $filas = mysqli_num_rows($resultado);

        if ($filas == 0) {
            echo "<p>No hay datos.</p>";
        } else {
            echo '<h2>Propietarios</h2>';

            echo '<table border="1">
                <thead>
                    <tr>
                        <th>ID Propietario</th>
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>DNI</th>
                        <th>Dirección</th>
                        <th>Teléfono</th>
                    </tr>
                </thead>';

            while ($fila = mysqli_fetch_array($resultado)) {
                echo '
                    <tr>
                        <td>' . $fila['id_propietario'] . '</td>
                        <td>' . $fila['nombre'] . '</td>
                        <td>' . $fila['apellido'] . '</td>
                        <td>' . $fila['dni'] . '</td>
                        <td>' . $fila['direccion'] . '</td>
                        <td>' . $fila['telefono'] . '</td>
                    </tr>
                ';
            }

            echo '</table>';
        }
    }
}

// === Función para eliminar un propietario ===
function eliminarPropietario($conexion, $id_propietario) {

    $consulta = "SELECT nombre, apellido FROM Propietario WHERE id_propietario = $id_propietario";
    $resultado = mysqli_query($conexion, $consulta);

    if ($resultado && mysqli_num_rows($resultado) > 0) {
        $propietario = mysqli_fetch_assoc($resultado);

        $delete = "DELETE FROM Propietario WHERE id_propietario = $id_propietario";
        if (mysqli_query($conexion, $delete)) {
            return "<p>Propietario <strong>{$propietario['nombre']} {$propietario['apellido']}</strong> (ID $id_propietario) eliminado correctamente.</p>";
        } else {
            return "<p>Error al eliminar: " . mysqli_error($conexion) . "</p>";
        }
    } else {
        return "<p>No existe ningún propietario con ID $id_propietario.</p>";
    }
}

// === Función para actualizar los datos de un propietario ===
function actualizarPropietario($conexion, $id_propietario, $nombre, $apellido, $dni, $direccion, $telefono) {

    $sql = "UPDATE Propietario 
            SET nombre='$nombre', apellido='$apellido', dni='$dni', direccion='$direccion', telefono='$telefono'
            WHERE id_propietario=$id_propietario";

    if (mysqli_query($conexion, $sql)) {
        return "Propietario actualizado correctamente.<br>";
    } else {
        return "Error al actualizar: " . mysqli_error($conexion);
    }
}

function mostrarUnPropietario($conexion, $id_propietario) {

    $consulta = "SELECT * FROM Propietario WHERE id_propietario=$id_propietario";
    mostrarPropietarios($conexion, $consulta);
}

// === Función para obtener un propietario (usada para verificar existencia) ===
function obtenerPropietario($conexion, $id_propietario) {

    $sql = "SELECT * FROM Propietario WHERE id_propietario = $id_propietario";
    $resultado = mysqli_query($conexion, $sql);

    if ($resultado && mysqli_num_rows($resultado) > 0) {
        $propietario = mysqli_fetch_assoc($resultado);
    } else {
        $propietario = null;
    }

    return $propietario;
}

?>