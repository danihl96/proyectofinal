<?php
    session_start();
    include_once("../../config/DBConect.php");
    include_once("../../config/Config.php");    

    if(isset($_POST['identificacion'])) $identificacion = $_POST['identificacion']; 
    if(isset($_POST['nombres']))        $nombres = $_POST['nombres']; 
    if(isset($_POST['apellidos']))      $apellidos = $_POST['apellidos']; 
    if(isset($_POST['email']))          $email = $_POST['email']; 
    if(isset($_POST['telefono']))       $telefono = $_POST['telefono']; 
    if(isset($_POST['sexo']))           $sexo = $_POST['sexo']; 
    if(isset($_POST['edad']))           $edad = $_POST['edad']; 
    if(isset($_POST['raza']))           $raza = $_POST['raza']; 

    $conexion = new Database;  
    $result = $conexion->CrearEstudiante($identificacion,$nombres,$apellidos,$email,$telefono,$sexo,$edad,$raza);

    header("Location: ".ROOT."modulos/estudiantes/estudiantes.php?mensaje=".$result);

?>