<?php
    require_once ('conexion.php');

    $con = conexion();
    $sql = "SELECT * FROM actividad"; 
    $query = $con -> prepare($sql); 
    $query -> execute(); 
    $results = $query -> fetchAll(PDO::FETCH_OBJ); 
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
            <form action="task_status.php" method="post">

            <div class="mb-3">
                <p style="text-align: center;">Estatus de la tarea</p>
            </div>

                <select class="form-select mb-2" aria-label="Default select example" style="width: 70%" name="tarea">
                <option selected>Nombre de la tarea: </option>
                <?php
                foreach ($results as $option){
                    echo
                    "<option value=$option->id>". $option->nombre . "</option>";
                }
                ?>
                </select>

                <select class="form-select mb-2" aria-label="Default select example" name="estatus">
                <option selected>Cambiar estatus a: </option>
                <option value="2">En pausa</option>
                <option value="3">Terminada</option>
                </select>
                
                <button type="submit" class="btn btn-primary" name="form_status">Enviar</button>
            </form>
        </div>

        <div class="container" style="width: 50%">
        <table class="table">
            <thead>
                <tr>
                <th scope="col">ID</th>
                <th scope="col">Nombre de la actividad</th>
                <th scope="col">Estatus</th>

                </tr>
            </thead>
            <tbody>
                <?php 
                foreach ($results as $item){
                    echo     
                    "<tr>
                    <th scope=\"row\">". $item->id ."</th>
                    <td>". $item->nombre ."</td>
                    <td>". $item->estatus ."</td>
                    </tr>";
                }
                ?>
            </tbody>
        </table>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
    </body>
</html>
