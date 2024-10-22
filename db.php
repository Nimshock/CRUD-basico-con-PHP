<?php


session_start();

$conn = mysqli_connect(// para realizar una conexión con la BD tenemos que usar
                       // msqli es una biblioteca con su funcion _connect y dentro
                       //los par�metros a mysqli

    $hostname = 'localhost',//donde esta el servidor de la BD
    $username = 'root',//usuario
    $password = '',//contrasenia, por defecto esta vacia.
    $database = 'php_mysql_crud'//nombre de nuestra BD

);

//$conn = new mysqli($host, $user, $password, $database);

if (isset($conn)){//para comprobar que se ha conectado a la BD
    
}else{
    die('Fallo en la conexión'.mysqli_connect_error());
}

/*if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} */
