<?php
error_reporting(E_ALL ^ E_WARNING); 
session_start();
include_once("conexion.php");
include_once("cabecera.php");


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <link rel="stylesheet" href="css/estilos.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"/>   
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    <title>SuperAdministrador</title>
</head>
    <body>

   <?php if(isset($_SESSION['usuario']) && $_SESSION['cargo'] == 3){ ?> 
        <div class="container" >
    <div class="row">
        <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                Agregar Super Administrador
            </div>
            <div class="card-body">

            <form action="superadmin.php" method="post" name="formuSuperadmin">

            Nombre  <input required class="form-control" type="text" name="nombre">
            <br>
             Usuario <input required class="form-control" type="text" name="usuario">
            <br>
            Contraseña <input required class="form-control" type="password" name="contrasenia">
            <br>

            <input type="hidden" name="idCargo" value="3">

              
            <input class="btn btn-success" type="submit" value="Agregar Super Administrador" name="btnSuperAdmin">
              
         
            </form>
                
            </div>
    
            </div>
            
        </div>

       <?php
       if(isset($_REQUEST["btnSuperAdmin"])){
        $nombre = $_REQUEST["nombre"];
        $usuario = $_REQUEST["usuario"];
        $contraseña = md5($_REQUEST["contrasenia"]);
        $idCargo = $_REQUEST["idCargo"];
     

        
        $sql = "INSERT INTO `usuarios` VALUES (NULL,'$nombre','$usuario','$contraseña','$idCargo');";

        mysqli_query($conexion,$sql);

        header("location:usuariosRegistrados.php");
       }
       
    }
       ?>
 


    
</body>
</html>