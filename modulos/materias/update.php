<?php
    session_start();
    include_once("../../config/DBConect.php");
    include_once("../../config/Config.php");
    
    if(isset($_POST['nombre']))     $nombre = $_POST['nombre']; 
    if(isset($_POST['intensidad_horaria']))  $intensidad_horaria = $_POST['intensidad_horaria']; 
    if(isset($_POST['tipo']))         $tipo = $_POST['tipo']; 
    if(isset($_POST['creditos']))      $creditos = $_POST['creditos']; 
    if(isset($_POST['id']))         $id = $_POST['id']; 

    $conexion = new Database;  
    $result = $conexion->updateMateria($nombre,$intensidad_horaria,$tipo,$creditos,$id);
    echo $nombre;
    header("Location: ".ROOT."modulos/materias/materias.php?mensaje=".$result);

?>