<?php 
require_once("conexion.php");
$con = conexion();

if (isset($_POST["form_status"])){
    $tarea = trim($_POST['tarea']);
    $cambio_s = trim($_POST['estatus']);

    if(!empty($tarea) && !empty($cambio_s)){
        $actualizar = "UPDATE actividad SET estatus=$cambio_s WHERE id=$tarea";
        $query = $con -> prepare($actualizar); 
        $asignacion = $query->execute();
        } else{
            echo "ha ocurrido un error";
        }
    if($asignacion){
        header('Location:baja_tareas.php');
    }
    }      
?> 