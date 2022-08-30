<?php
    require_once ('conexion.php');

    $con = conexion();
    $sql = "SELECT * FROM actividad"; 
    $query = $con -> prepare($sql); 
    $query -> execute(); 
    $results = $query -> fetchAll(PDO::FETCH_OBJ); 

    $sql = "SELECT * FROM empresas"; 
    $query = $con -> prepare($sql); 
    $query -> execute(); 
    $empresas_r = $query -> fetchAll(PDO::FETCH_OBJ); 

    foreach($results as $actividad){
        foreach($empresas_r as $empresa){
            if($actividad->empresa==$empresa->id){
                $actividad->empresa = $empresa->nombre;
            }
        }
    }
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
            <form action="save_task.php" method="post">

            <div class="mb-3">
                <p style="text-align: center;">Dar de alta tareas</p>
            </div>

                <div class="mb-2">
                <label for="nombre" class="form-label">Nombre de la tarea</label>
                <input type="text" class="form-control" name="nombre">
                </div>

                <div class="mb-2">
                <label for="descripcion" type="text">Descripcion</label>
                <input type="text" class="form-control" name="descripcion" style="height: 100px;">
                </div>

                <select class="form-select mb-2" aria-label="Default select example" style="width: 40%" name="empresa">
                <option selected>Empresa: </option>
                <?php
                foreach ($empresas_r as $option){
                    echo
                    "<option value=$option->id>". $option->nombre . "</option>";
                }
                ?>
                </select>
                
                <button type="submit" class="btn btn-primary" name="form_task">Enviar</button>
            </form>
        </div>
        <div class="container" style="width: 90%">
        <table class="table">
            <thead>
                <tr>
                <th scope="col">ID</th>
                <th scope="col">Nombre de la actividad</th>
                <th scope="col">Descripcion</th>
                <th scope="col">Empresa</th>

                </tr>
            </thead>
            <tbody>
                <?php 
                foreach ($results as $item){
                    echo     
                    "<tr>
                    <th scope=\"row\">". $item->id ."</th>
                    <td>". $item->nombre ."</td>
                    <td>". $item->descripcion ."</td>
                    <td>". $item->empresa ."</td>
                    </tr>";
                }
                ?>
            </tbody>
        </table>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
    </body>
</html>
