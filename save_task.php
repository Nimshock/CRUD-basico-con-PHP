<?php include("db.php")?><!--Para guardar en la base de datos-->
<?php

/*A traves del metodo POST un valor llamado "guardar_tarea"
quiere decir que esta tratando de guardar un dato*/

if(isset($_POST['guardar_tarea'])){//El valor que le pasamos al metodo POST es el name del submit
    //echo 'Guardado'; . Un echo para comprobar que entra en el if y recibe los datos del formulario
    
    $title = $_POST['title'];//Lo que recibas a traves POST lo guardamos en una variable.
    $description = $_POST['description'];
    

    //No se pone el id porque se genera solo al autoincrementarse al igual el created_at.
    $query = "INSERT INTO `task` (`titulo`, `descripcion`) VALUES ('$title', '$description')";
    
    //Guardar un dato en mysql. 
    $result = mysqli_query($conn, $query);

    if(!$result){
        die("Query failed");
    }

    //Almacenamos un mensaje y un color con bootstrap
    $_SESSION['message'] = 'Task saved succesfully';//mensaje
    $_SESSION['message_type'] = 'success';//color verde

   //Redirecciona al archivo...
    header("Location: index.php");
}