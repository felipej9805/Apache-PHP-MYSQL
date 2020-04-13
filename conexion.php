<?php
function connect()
{
 //Variables para la conexion con la base de datos
$host = "localhost"; // Host de la base de datos
$user = "root"; // Usuario de la base de datos
$pass = "password"; // Contraseña de la base de datos
$db = "prueba"; // Nombre de la base de datos 

//Crea la conexion con el SERVIDOR DE LA BASE DE DATOS
$enlace = mysqli_connect($host, $user, $pass);

//En el caso que la conexion no se logre, muestra el mensaje de error
if (!$enlace) {
    echo "Error: No se pudo conectar a MySQL." . PHP_EOL;
    echo "error de depuración: " . mysqli_connect_error() . PHP_EOL;
    exit;
}
//En el caso que sea exitoso, muestra el siguientre mensaje
echo "Éxito: Se realizó una conexión apropiada a MySQL!" . PHP_EOL;
echo "<br>";

//Crea la conexion a LA BASE DE DATOS que estamos trabajando, en caso que no sea exitoso, nos mostrara un mensaje
$basededatos = mysqli_select_db( $enlace, $db ) or die ( "Upps! Pues va a ser que no se ha podido conectar a la base de datos" );
echo "Se conecto a la base de datos llamada: $db !!!!". PHP_EOL;
echo "<br>";

return $enlace;

}
 
function CloseCon($conn)
 {
 $conn -> close();
 }
   
?>