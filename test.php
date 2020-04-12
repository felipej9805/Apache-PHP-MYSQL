<?php
//Variables para la conexion con la base de datos
$host = "localhost";
$user = "root"; // Usuario de la base de datos
$pass = "password"; // Contraseña de la base de datos
$db = "prueba"; // Nombre de la base de datos 


$enlace = mysqli_connect($host, $user, $pass);

if (!$enlace) {
    echo "Error: No se pudo conectar a MySQL." . PHP_EOL;
    echo "error de depuración: " . mysqli_connect_error() . PHP_EOL;
    exit;
}

echo "Éxito: Se realizó una conexión apropiada a MySQL!" . PHP_EOL;
echo "<br>";

$basededatos = mysqli_select_db( $enlace, $db ) or die ( "Upps! Pues va a ser que no se ha podido conectar a la base de datos" );
echo "Se conecto a la base de datos llamada: $db !!!!". PHP_EOL;
echo "<br>";


//$sql = "INSERT INTO mitabla (id, nombre) VALUES ('20', 'Juan')";  
$id = $_GET["id"];
$nombre = $_GET["nombre"];
$sql = "INSERT INTO mitabla (id, nombre) VALUES ('$id', '$nombre')";    
 if (mysqli_query($enlace, $sql)) {
    echo "New record created successfully";
 } else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
 }


 $consulta = "SELECT * FROM mitabla";
 $resultado = mysqli_query($enlace, $consulta) or die ( "Algo ha ido mal en la consulta");;


echo "<table borde='2'>";
echo "<tr>";
echo "<th>id</th>";
echo "<th>nombre</th>";
echo "</tr>";

while ($columna = mysqli_fetch_array( $resultado ))
{
 echo "<tr>";
 echo "<td>" . $columna['id'] . "</td><td>" . $columna['nombre'] . "</td>";
 echo "</tr>";
}
echo "</table>";

mysqli_close($enlace);
?>