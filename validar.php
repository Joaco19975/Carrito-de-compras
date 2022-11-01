<?php
error_reporting(E_ALL ^ E_WARNING); 
include("conexion.php");
session_start();
$usuario=$_POST['usuario'];
$contraseña=md5($_POST['contrasenia']);

$_SESSION['usuario']=$usuario;
$_SESSION['contrasenia']=$contraseña;


$consulta="SELECT*FROM usuarios where usuario='$usuario' and contrasenia='$contraseña'";
$resultado=mysqli_query($conexion,$consulta);

$usuario=mysqli_fetch_array($resultado);

 //guardo el ID del usuario que haya iniciado sesion por si lo necesito
 $_SESSION["idUsuario"] =  $usuario['id'];

if($usuario["id_cargo"] == 2){ //cliente
    $_SESSION['cargo'] = 2 ;
header("location:cliente.php");
}else
if($usuario["id_cargo"] == 3 ){ //super administrador
    $_SESSION['cargo'] = 3 ;
 header("location:superadmin.php");   
}
if($usuario["id_cargo"] == 1 ){ //super administrador
    $_SESSION['cargo'] = 1 ;
 header("location:admin.php");   
}
else{
    ?>
    <?php
    include_once("index.html");
    ?>
    <br>
    <h1 style="color: red;" class="bad">ERROR EN LA AUTENTIFICACION</h1>
    <?php
}



mysqli_free_result($resultado);
mysqli_close($conexion);
