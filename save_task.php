<?php 
require_once("conexion.php");
$con = conexion();

if (isset($_POST["form_task"])){
    $nombre = trim($_POST['nombre']);
    $descripcion = trim($_POST['descripcion']);
    $empresa = trim($_POST['empresa']);

    if( !empty($nombre) && !empty($descripcion) && !empty($empresa)){
        $consulta = "INSERT INTO actividad(nombre, descripcion, empresa) VALUES (:nombre,:descripcion, :empresa)";
        $query = $con -> prepare($consulta); 
        $result = $query->execute(
            array(":nombre"=>$nombre,":descripcion"=>$descripcion, "empresa"=>$empresa)
        );
        } else{
            echo "ha ocurrido un error";
        }
    if($result){
        header('Location:Actividad.php');
    }
    }      
?> 