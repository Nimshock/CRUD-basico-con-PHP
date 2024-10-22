<?php include("db.php"); ?>
<?php include("includes/header.php"); ?>


<!--Creamos una seccion donde tendremos
el formnulario y una tabla-->

<!--Contenedor de Bootstrap que permite centrar el contenido, es decir agregar espaciados a todos los lados
padding de 4 para que el contenido se vea bien.-->
<div class="container p-4">

    <div class="row"><!--Dentro creamos una fila-->

        <div class="col-md-4"><!--Dentro de la fila dos columnas para colocar un formulario-->

            <?php
            //Validacion para comprobar si existe dentro de la variable SESSION un valor llamado "message", significa que tengo un dato guardado
            if (isset($_SESSION['message'])) { ?>

                <div class="alert alert-<?= $_SESSION['message_type']; ?> 
            alert-dismissible fade show" role="alert">
                    <?= $_SESSION['message'] ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <?php session_unset();//Limpiar los datos que tenemos en sesion
            }
            ?>

            <div class="card card-body"><!--Creamos una tarjeta y dentro un formulario-->

                <!--Con "action" le decimos a donde tiene que enviar los datos de los input-->
                <form action="save_task.php" method="POST">
<!--Formulario que va a tener diferentes campos.
Cada input debera ser enviado a traves del metodo POST en save_task.php para guardar los valores que pongamos en los input-->

                    <div class="form-group">
                        <!--Apenas entres en la pagina web el curso destaque el input (autofocus)-->
                        <input type="text" name="title" class="form-control" placeholder="Titulo de tarea" autofocus>
                    </div>

                    <div class="form-group">
                        <textarea name="description" rows="2" class="form-control"
                            placeholder="Descripcion tarea"></textarea>
                    </div>

                    <!--Al hacer clic al boton ejecute el formulario. "btn-block" para que ocupe todo el ancho de la tarjeta.
                    El "name" es importante para comprobar desde PHP si existe ese nombre significa que estas tratando de guardar algo-->
                    <input type="submit" class="btn btn-success btn-block" name="guardar_tarea" value="Guardar tarea">

                </form>

            </div>

        </div>

        
        <div class="col-md-8"><!--Creamos tambien una tabla para que liste todas las tareas que vayamos a crear-->
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Titulo</th>

                        <th>Descripcion</th>

                        <th>Creacion</th>

                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php

                    $query = "SELECT * FROM `task`";
                    $result_task = mysqli_query($conn, $query);

                    while ($row = mysqli_fetch_array($result_task)) { ?>
                        <tr>

                            <td  class="text-truncate" style="max-width: 150px;" title="<?php echo htmlspecialchars($row['titulo']); ?>">
                            <?php echo mb_strimwidth($row['titulo'], 0, 50, "..."); ?>
                            </td>

                            <td class="text-truncate" style="max-width: 150px;" title="<?php echo htmlspecialchars($row['descripcion']); ?>">
                            <?php echo mb_strimwidth($row['descripcion'], 0, 50, "..."); ?>
                            </td>

                            <td><?php echo $row['created_at'] ?></td>

                            <td><!--Enlace a editar y otro a eliminar. Hay que darle un dato para que sepa que tarea editar/eliminar, como el id.
                                con "?" indicamos una consulta y un echo para imprimir el id-->
                                <a href="edit_task.php?id=<?php echo $row['id'] ?>" class="btn btn-secondary">
                                    <i class="fas fa-marker"></i>
                                </a>

                                <a href="delete_task.php?id=<?php echo $row['id'] ?>" class="btn btn-danger">
                                    <i class="fas fa-trash-alt"></i>
                                </a>

                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php include("includes/footer.php"); ?>