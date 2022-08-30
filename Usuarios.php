<?php
    require_once ('conexion.php');

    $con = conexion();
    $sql = "SELECT * FROM usuario"; 
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

        <form action="save_user.php" method="post">

          <div class="mb-3">
            <p style="text-align: center;">Registro de Usuarios</p>
          </div>

            <div class="mb-3">
            <label for="nombre" class="form-label">Nombre completo</label>
            <input type="Text" class="form-control" name="nombre">
            </div>

            <div class="mb-3">
            <label for="password" class="form-label">Contraseña</label>
            <input type="password" class="form-control" name="password">
            </div>

            <button type="submit" class="btn btn-primary" name="form_user">Enviar</button>
        </form>
    </div>

    <div class="container" style="width: 30%">
    <table class="table">
        <thead>
            <tr>
            <th scope="col">ID</th>
            <th scope="col">Nombre</th>
            <th scope="col">Contraseña</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            foreach ($results as $item){
                echo     
                "<tr>
                <th scope=\"row\">". $item->id ."</th>
                <td>". $item->nombre ."</td>
                <td>". $item->pass ."</td>
                </tr>";
            }
            ?>
        </tbody>
    </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
  </body>
</html>
