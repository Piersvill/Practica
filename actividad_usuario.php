<?php
    require_once ('conexion.php');

    $con = conexion();

    $sql = "SELECT * FROM actividad_usuario"; 
    $query = $con -> prepare($sql); 
    $query -> execute(); 
    $resultado_actividad = $query -> fetchAll(PDO::FETCH_OBJ);
    $id_array = array();
    foreach($resultado_actividad as $item){
        array_push($id_array, $item->id_actividad);
    }

    $id_array = implode(",", $id_array);

    $sql = (!empty($id_array)) ? "SELECT * FROM actividad where id NOT IN ($id_array)" : "SELECT * FROM actividad " ;

    // $sql = "SELECT * FROM actividad where id NOT IN ($id_array)"; 
    $query = $con->prepare($sql); 
    // var_dump($query);
    $query->execute();
    $results = $query -> fetchAll(PDO::FETCH_OBJ);

    $sql = "SELECT * FROM usuario"; 
    $query = $con -> prepare($sql); 
    $query -> execute(); 
    $usuario_r = $query -> fetchAll(PDO::FETCH_OBJ);
?>

<!doctype html>
    <html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Bootstrap demo</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    </head>
    <body>

        <div class="container" style="width: 30%; margin-top: 15px; padding-bottom: 10px; background-color: rgb(195, 246, 229);">
            <form action="task_registry.php" method="post">

            <div class="mb-3">
                <p style="text-align: center;">Asignar tareas</p>
            </div>

                <label for="nombre">Usuario a asignar:</label>
                <select class="form-select mb-2" aria-label="Default select example" name="nombre">
                <option selected>Usuario: </option>
                <?php
                foreach ($usuario_r as $option){
                    echo
                    "<option value=$option->id>". $option->nombre . "</option>";
                }
                ?>
                </select>

                <label for="tarea">Tarea a asignar:</label>
                <select class="form-select mb-2" aria-label="Default select example" name="tarea">
                <option selected>Tarea: </option>
                <?php
                foreach ($results as $option){
                    echo
                    "<option value=$option->id>". $option->nombre . "</option>";
                }

                ?>
                </select>

                <label for="fecha_i" type="date">Seleccione una fecha de inicio: </label>
                <input type="date" class="form-control mb-2" name="fecha_i">

                <label for="fecha_v" type="date">Seleccione una fecha de vencimiento: </label>
                <input type="date" class="form-control mb-2" name="fecha_v">

                <button type="submit" class="btn btn-primary" name="form_asign">Enviar</button>
            </form>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
    </body>
</html>
