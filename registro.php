<?php
session_start();
include("conexion.php");

$nombre = $_POST['nombre'];
$usuario = $_POST['usuario'];
$contrasenia = md5($_POST['contrasenia']);
$cargo = $_POST['id_cargo'];







$sql = mysqli_query($conexion,"INSERT INTO `usuarios` (`id`, `nombre`, `usuario`, `contrasenia`, `id_cargo`) VALUES (NULL,'$nombre','$usuario','$contrasenia','$cargo');");


header("location:cliente.php");
?>