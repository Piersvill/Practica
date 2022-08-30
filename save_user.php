<?php 
require_once("conexion.php");
$con = conexion();

if (isset($_POST["form_user"])){
    $nombre = trim($_POST['nombre']);
    $password = trim($_POST['password']);

    if( !empty($nombre) && !empty($password)){
        $consulta = "INSERT INTO usuario(nombre, pass) VALUES (:nombre,:pass)";
        $query = $con -> prepare($consulta); 
        $result = $query->execute(
            array(":nombre"=>$nombre,":pass"=>$password)
        );
        } else{
            echo "ha ocurrido un error";
        }
    if($result){
        header('Location:Usuarios.php');
    }
    }      
?> 