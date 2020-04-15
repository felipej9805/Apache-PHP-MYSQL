<?php
    //Variables para la conexion con la base de datos
    $host = "localhost"; // Host de la base de datos
    $user = "root"; // Usuario de la base de datos
    $pass = "password"; // Contraseña de la base de datos
    $db = "prueba"; // Nombre de la base de datos 

    //Crea la conexion con el SERVIDOR DE LA BASE DE DATOS
    $conexion = mysqli_connect($host, $user, $pass);

    //En el caso que la conexion no se logre, muestra el mensaje de error
    if (!$conexion) {
        echo "Error: No se pudo conectar a MySQL." . PHP_EOL;
        echo "error de depuración: " . mysqli_connect_error() . PHP_EOL;
        exit;
    }

    //En el caso que sea exitoso, muestra el siguientre mensaje
    echo "Éxito: Se realizó una conexión apropiada a MySQL!" . PHP_EOL;
    echo "<br>";

    //Crea la conexion a LA BASE DE DATOS que estamos trabajando, en caso que no sea exitoso, nos mostrara un mensaje
    $basededatos = mysqli_select_db( $conexion, $db ) or die ( "Upps! Pues va a ser que no se ha podido conectar a la base de datos" );

    //Si se logra con exito, nos muestra el siguiente mensaje
    echo "Se conecto a la base de datos llamada: $db !!!!". PHP_EOL;
    echo "<br>";
 
    //Obtener los datos desde la url del navegador
    //http://localhost/test.php?id=30&nombre=maria 
    $id = $_GET["id"];
    $nombre = $_GET["nombre"];

    //Sentencia SQL para insertar los datos a la base de datos 
    $sql = "INSERT INTO mitabla (id, nombre) VALUES ('$id', '$nombre')";    
 
        //Si la ejecuciòn de la sentencia es exitosa
    if (mysqli_query($conexion, $sql)) {
        echo "New record with id : $id was created successfully";
    } else {
    //    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

    mysqli_close($conexion);
?>