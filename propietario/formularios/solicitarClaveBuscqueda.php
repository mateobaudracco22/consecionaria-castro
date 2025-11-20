<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Concesionaria</title>
</head>
<body>
    <h1>Concesionaria</h1>
    <h2>Ingrese el legajo del propietario a buscar</h2>
    <form action="../controller/mostrarUno.php" method="post">
       <label for="id_propietario">Nro de Legajo : </label> 
        <input type="text" name="id_propietario" /> 
        <button type="submit" name="accion" value="buscar">Buscar</button>
        
    </form>

    <a href="../../index.html">Volver al menu principal</a>
</body>
</html>