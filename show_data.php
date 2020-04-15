<!DOCTYPE html>
<html><body>
<?php

// REPLACE with your server name
$host = "localhost";
// REPLACE with your Database name
$db = "bd";
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
$consulta = "SELECT * FROM info";
$resultado = mysqli_query($conn, $consulta) or die ( "Algo ha ido mal en la consulta");;

//Mostrar los datos en el navegador
echo "<table width='100%' border='2px solid black' border-collapse: collapse >";
echo "<tr>";
echo "<th>idpacket</th>";
echo "<th>fecha</th>";
echo "<th>tiempo</th>";
echo "<th>latitud</th>";
echo "<th>longitud</th>";
echo "<th>velocidad</th>";
echo "<th>altitud</th>";
echo "</tr>";

while ($columna = mysqli_fetch_array( $resultado ))
{
    echo "<tr>";
    echo "<td>" . $columna['idpacket'] . "</td>";
    echo "<td>" . $columna['fecha'] . "</td>";
    echo "<td>" . $columna['tiempo'] . "</td>";
    echo "<td>" . $columna['latitud'] . "</td>";
    echo "<td>" . $columna['longitud'] . "</td>";
    echo "<td>" . $columna['velocidad'] . "</td>";
    echo "<td>" . $columna['altitud'] . "</td>";
    echo "</tr>";
}
echo "</table>";

$conn->close();
?> 
</table>
</body>
</html>