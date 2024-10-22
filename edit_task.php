<?php 

/* ------ ARRAY ASOCIATIVO ------ 

Son arrays cuyos keys son strings personalizados.
Para acceder a los valores de un array asociativo
se hace de la misma forma que con arrays numericos,
mediante corchetes.*/

include("db.php");

/*Si existe esta variable (id) que obtenemos 
a traves del metodo GET.*/
if(isset($_GET['id'])){

    //Entonces lo guardamos en una variable.
    $id = $_GET['id'];

    //Guardamos la consulta en una variable.
    $query = "SELECT * FROM task WHERE id = $id";

    //Guardamos el resultado de la consulta.
    $result = mysqli_query($conn, $query);

    /*mysqli_num_rows para comprobar cuantas filas
    tiene mi resultado, le pasamos el resultado.
    Cuantos resultados me has devuelto, si al menos
    tenemos una tarea que coincide con este id.*/
    if(mysqli_num_rows($result)== 1){

        /*mysqli_fetch_array obtiene una fila de 
        resultados como un array asociativo, numerico, 
        o ambos*/
        $row = mysqli_fetch_array($result);
        $titulo = $row['titulo'];
        $description= $row['descripcion'];
        
    }
}

if (isset($_POST['update'])){

    $id = $_GET['id'];
    $titulo = $_POST['titulo'];
    $descripcion = $_POST['descripcion'];

    $query = "UPDATE `task` SET `titulo` = '$titulo', `descripcion` = '$descripcion' WHERE `id` = $id ";

    mysqli_query($conn, $query);

     //Guardamos un mensaje con la variable SESSION.
     $_SESSION['message'] = 'Tarea actualizada correctamente.';//mensaje.
     $_SESSION['message_type'] = 'warning';//color.

    header("Location: index.php");
}

?>

<?php include("includes/header.php") ?>

<div class="container p-4">
    <div class="row">
        <div class="col-md-4 mx-auto">
            <div class="card card-body">
                <form action="edit_task.php?id=<?php echo $_GET['id'];?>" method="POST">
                    <div class="form-group">
                        <input type="text" name="titulo" 
                        value="<?php echo $titulo;?>" class="form-control" placeholder="Actualiza el titulo">
                    </div>
                    <div class="form-group">
                        <textarea name="descripcion" id="" rows="2" class="form-control" placeholder="Actualiza la descripcion">
                        <?php echo $description;?></textarea>
                    </div>

                    <button class="btn btn-success" name="update">Actualizar</button>
                </form>
            </div>
        </div>
    </div>
</div>