<?php session_start();
include_once("conexion.php");
include_once("cabecera.php");  

/*if($_POST){
$nombre = $_POST['nombre'];
$usuario = $_POST['usuario'];
$contrasenia = md5($_POST['contrasenia']);
$cargo = 1 ;

$sql = "INSERT INTO `usuarios` (`id`,`nombre`,`usuario`,`contrasenia`,`id_cargo`) VALUES (NULL,'$nombre','$usuario','$contrasenia','$cargo');";

mysqli_query($conexion,$sql);


//para que cuando refresque la pagina no vuelva a insertar el ultimo proyecto, redirecciono a la misma pagina
//header("location:admin.php");

}*/
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"/>   
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    <title>Agregar Administrador</title>
</head>
<body>

<?php //if(isset($_SESSION["usuario"])){ ?>
<div class="container">
    <div class="row">
        <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                Agregar Administrador
            </div>
            <div class="card-body">

            <form action="agregarAdmin.php" method="post" >

            Nombre  <input required class="form-control" type="text" name="nombre" id="">
            <br>
             Usuario <input required class="form-control" type="text" name="usuario" id="">
            <br>
            Contraseña <input required class="form-control" type="password" name="contrasenia" id="">
            <br>
             <input type="hidden" name="id_cargo" value="1">
              
            <input class="btn btn-success" type="submit" name="btnAgregar" value="Agregar Administrador">

           
            </form>
                
            </div>
    
            </div>
            
        </div>

        <?php // }?>


        <?php 
         if(isset($_REQUEST["btnAgregar"])){
        $nombre = $_REQUEST["nombre"];
        $usuario = $_REQUEST["usuario"];
        $contraseña = md5($_REQUEST["contrasenia"]);
        $idCargo = $_REQUEST['id_cargo'];
        
        
        $sql = "INSERT INTO `usuarios` (`id`,`nombre`,`usuario`,`contrasenia`,`id_cargo`) VALUES (NULL,'$nombre','$usuario','$contraseña','$idCargo');";

        mysqli_query($conexion,$sql);
        }
        ?>
</body>
</html>