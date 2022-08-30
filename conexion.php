<?php

 function conexion()
{
$host = 'localhost';
$dbname = 'practica';
$username = 'root';
$password = '';

    try {
        $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
        return $conn;
    } 
    catch (PDOException $pe) {
        return null;
    }
}
?>