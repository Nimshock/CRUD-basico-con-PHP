<?php

//Traemos la base de batos.
include("db.php");

//Si el id existe a través del metodo GET
if(isset($_GET['id'])){

    $id = $_GET['id'];//Guardamos el id de la tarea en una variable.
    $query = "DELETE FROM task WHERE id = $id";//Consulta guardada en una variable.
    $result = mysqli_query($conn , $query);//Guardamos el resultado de la consulta en una variable.

    if(!$result){
        die("Consulta fallida.");
    }

    //Guardamos un mensaje con la variable SESSION.
    $_SESSION['message'] = 'Tarea eliminada correctamente.';//mensaje.
    $_SESSION['message_type'] = 'danger';//color.

    header("Location: index.php");
}