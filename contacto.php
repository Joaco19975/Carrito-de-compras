<?php
error_reporting(E_ALL ^ E_WARNING); 
session_start();
include_once("conexion.php");
include_once("cabecera.php");


?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"/>   
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
<title>Formulario de contacto</title>


</head>


<form id="formcontacto" action="enviar.php" method="post">
        <label>Nombre
            <input class="form-control" type="text" name="nombre" required/>	
        </label>
        <label>Email
            <input class="form-control" type="email" name="email"required />
        </label>
        <label>Localidad
            <input class="form-control" type="text" name="localidad" />
        </label>
        <label>Comentario
            <textarea class="form-control" name="comentario"></textarea>
        </label>
        <input class="btn btn-success"type="submit" value="Enviar" />
    </form>	

    

    <?php 
    
    
    
    include("pie.php"); ?>