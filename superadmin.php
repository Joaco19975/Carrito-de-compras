<?php
include("cabecera.php");
include("conexion.php");
session_start();


$query="SELECT*FROM usuarios where usuario='$usuario' and contrasenia='$contraseña'";
$resul=mysqli_query($conexion,$query);
$usuarios = mysqli_fetch_array($resul);


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/estilos.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.0.0/animate.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"/>   
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    <title>Panel</title>
   
</head>
<body >

   <h4>Super Administrador</h4> <br>


<?php 	
if(isset($_SESSION['usuario']) && $_SESSION['cargo'] == 3){ 	

    echo "<h1 class='animate__animated animate__backInLeft'>Bienvenido". " ".  $_SESSION['usuario']."</h1>";


    }else{
        header("location:index.html");
    }


?>


<?php include("pie.php");?>