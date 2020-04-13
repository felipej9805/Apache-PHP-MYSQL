<?php
include 'conexion.php';
$conn = connect();

//Obtener los datos desde la url del navegador
//http://localhost/test.php?id=30&nombre=maria 
$id = $_GET["id"];
$nombre = $_GET["nombre"];

//Sentencia SQL para insertar los datos a la base de datos 
$sql = "INSERT INTO mitabla (id, nombre) VALUES ('$id', '$nombre')";    
 
//Si la ejecuciòn de la sentencia es exitosa
if (mysqli_query($conn, $sql)) {
echo "New record with id : $id was created successfully";
} else {
echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

//Se encarga de cerrar la conexion
CloseCon($conn);
?>