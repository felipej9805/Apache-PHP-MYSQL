<?php
include 'conexion.php';
$conn = connect();

//Sentencia SQL para obtener todos los datos de la base de datos
$consulta = "SELECT * FROM mitabla";
$resultado = mysqli_query($conn, $consulta) or die ( "Algo ha ido mal en la consulta");;


//Mostrar los datos en el navegador
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

//Se encarga de cerrar la conexion
CloseCon($conn);
?>