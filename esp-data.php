<!DOCTYPE html>
<html><body>
<?php
/*
  Rui Santos
  Complete project details at https://RandomNerdTutorials.com/esp32-esp8266-mysql-database-php/
  
  Permission is hereby granted, free of charge, to any person obtaining a copy
  of this software and associated documentation files.
  
  The above copyright notice and this permission notice shall be included in all
  copies or substantial portions of the Software.
*/

$host = "localhost";

// REPLACE with your Database name
$db = "prueba";
// REPLACE with Database user
$user = "root";
// REPLACE with Database user password
$pass = "password";

//Crea la conexion con el SERVIDOR DE LA BASE DE DATOS
$conn = mysqli_connect($host, $user, $pass);

//En el caso que la conexion no se logre, muestra el mensaje de error
if (!$conn) {
    echo "Error: No se pudo conectar a MySQL." . PHP_EOL;
    echo "error de depuración: " . mysqli_connect_error() . PHP_EOL;
    exit;
}

//En el caso que sea exitoso, muestra el siguientre mensaje
echo "Éxito: Se realizó una conexión apropiada a MySQL!" . PHP_EOL;
echo "<br>";

//Crea la conexion a LA BASE DE DATOS que estamos trabajando, en caso que no sea exitoso, nos mostrara un mensaje
$basededatos = mysqli_select_db( $conn, $db ) or die ( "Upps! Pues va a ser que no se ha podido conectar a la base de datos" );

//Si se logra con exito, nos muestra el siguiente mensaje
echo "Se conecto a la base de datos llamada: $db !!!!". PHP_EOL;
echo "<br>"; 

//Sentencia SQL para obtener todos los datos de la base de datos
$consulta = "SELECT * FROM mitabla";
$resultado = mysqli_query($conn, $consulta) or die ( "Algo ha ido mal en la consulta");;


//Mostrar los datos en el navegador
echo "<table borde='2' >";
echo "<tr>";
echo "<th>id</th>";
echo "<th>nombre</th>";
echo "</tr>";

while ($columna = mysqli_fetch_array( $resultado ))
{
echo "<tr>";
echo "<td>" . $columna['id'] . "</td>";
echo "<td>" . $columna['nombre'] . "</td>";
echo "</tr>";
}
echo "</table>";

$conn->close();
?> 
</table>
</body>
</html>