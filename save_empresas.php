<?php 
require_once("conexion.php");
$con = conexion();

if (isset($_POST["form_empresa"])){
    $nombre = trim($_POST['nombre']);

    if(!empty($nombre)){
        $consulta = "INSERT INTO empresas(nombre) VALUES (:nombre)";
        $query = $con -> prepare($consulta); 
        $result = $query->execute(
            array(":nombre"=>$nombre)
        );
        } else{
            echo "ha ocurrido un error";
        }
    if($result){
        header('Location:Empresas.php');
    }
    }      
?> 