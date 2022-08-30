<?php 
require_once("conexion.php");
$con = conexion();

    $num_usuario = $_POST['nombre'];
    $validacion = "SELECT * FROM actividad where usuario_asign=$num_usuario";
    $query = $con -> prepare($validacion); 
    $query->execute();
    $otro = $query -> fetchAll(PDO::FETCH_ASSOC);
    $otro2= count($otro);
    if($otro2>2){
        echo ("El usuario ya tiene 3 tareas asignadas");

        return header('Location:actividad_usuario.php');
        
    }
    else{
    if (isset($_POST["form_asign"])){
        $id_nombre = trim($_POST['nombre']);
        $tarea = trim($_POST['tarea']);
        $inicio = trim($_POST['fecha_i']);
        $vencimiento = trim($_POST['fecha_v']);
    
        if(!empty($id_nombre) && !empty($tarea) && !empty($inicio) && !empty($vencimiento)){
            var_dump("llegamos A validar");
            $consulta = "INSERT INTO actividad_usuario(id_usuario, id_actividad, fecha_inicio, fecha_vencimiento) VALUES 
            (:nombre, :tarea, :inicio, :vencimiento)";
            $query = $con -> prepare($consulta); 
            $asignacion = $query->execute(
                array(":nombre"=>$id_nombre,":tarea"=>$tarea, ":inicio"=>$inicio, ":vencimiento"=>$vencimiento)
            );
            } else{
                echo "ha ocurrido un error";
            }
    
            if($asignacion){
            $sql = "SELECT * FROM usuario where id=$id_nombre";
            $query = $con -> prepare($sql); 
            $query -> execute(); 
            $usuario_u = $query -> fetch(PDO::FETCH_OBJ);
    
            $actualizar = "UPDATE actividad SET usuario_asign=\"".$usuario_u->id."\", estatus=1 where id=$tarea";
            $query = $con -> prepare($actualizar); 
            $estatus_result = $query->execute();
            }
        
        
        if($asignacion){
            header('Location:actividad_usuario.php');
        }
        }
} 
?> 