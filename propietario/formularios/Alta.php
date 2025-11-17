<!doctype html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <title>Alta Paciente</title>
</head>
<body>
  <h1>Centro Médico</h1>
  <h2>Formulario de Alta de Propietario</h2>
  <h3>Ingrese los datos del Propietario a registrar</h3>
<!-- /* 
Propietario
o id_propietario (INT, PK)
o nombre (VARCHAR)
o apellido (VARCHAR)
o dni (VARCHAR)
o direccion (VARCHAR)
o telefono (VARCHAR)

*/-->

<!-- /* 
el nombre del atributo de la entidad lo coloca como valor del atributo name= del formulario
el tipo del atributo de la entidad lo coloca como valor del atributo type= ""; si el atributo
de la entidad es INT sera type= "number". si el atributo de la entidad es VARCHAR sera type= "TEXT"

*/-->


  <form method="post" action="../controller/registrar.php">
  <!--copie y pegue el box para cada campo segun su tipo -->

    <!-- para atributos de tipo int-->
    <label>id_propietario<br>
      <input name="id_propietario" required type="number">
    </label><br><br>

    <!-- para atributos de tipo varchar-->
    <label>Nombre<br>
      <input name="nombre"  required type="text">
    </label><br><br>

    <label>Apellido<br>
      <input name="apellido"  required type="text">
    </label><br><br>

    <label>DNI<br>
      <input name="dni"  required type="text">
    </label><br><br>

    <label>Dirección<br>
      <input name="direccion"  required type="text">
    </label><br><br>

    <label>Telefono<br>
      <input name="telefono"  required type="text">
    </label><br><br>

    <button type="submit">Registrar Propietario</button>
  </form>

  <p><a href="../../index.html">Volver al menú principal</a></p>
</body>
</html>
