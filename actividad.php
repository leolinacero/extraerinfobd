<html>
    <head>
        
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <link href="estilo.css" rel="stylesheet">
    
    </head>
<body>
<?php

    $db_host="localhost:3307";
    $db_nombre="form_db";
    $db_usuario="root";
    $db_contra="";
    $conexion = mysqli_connect($db_host, $db_usuario, $db_contra, $db_nombre);


  
    $nombre = $_POST["nombre"];
  

    // consulta SQL
    $sql = "SELECT * FROM usuarios WHERE nombre LIKE '%$nombre%'";
    $result = $conexion->query($sql);

    //  encontraron usuarios
    if ($result->num_rows > 0) {
        echo "<fieldset>";
        echo "<h3>Informacion de los usuarios:</h3>";
        echo "<table>";
        echo "<tr><th>Nombre</th>
        <th>Apellido</th>
        <th>Email</th></tr>";
        
        while ($row = $result->fetch_assoc()) {
            echo "<tr><td>" . $row["nombre"] . "</td><td>" . $row["apellido"] . "</td><td>" . $row["email"] . "</td></tr>";
        }
        echo "</table>";
        echo "</fieldset>";
    } else {
        echo "<p>No se encontraron usuarios con el nombre '$nombre'.</p>";
    }

   
    $conexion->close();

?>
</body>
</html>
