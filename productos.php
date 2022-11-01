<?php
error_reporting(E_ALL ^ E_WARNING); 
include_once("conexion.php");
include_once("cabecera.php");
session_start();?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/estilos.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"/>   
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    <title>Productos</title>
</head>
<body>
<?php 

$consulta="SELECT*FROM `productos`";
$productos=mysqli_query($conexion,$consulta);

if(isset($_SESSION['usuario'])){

$usuario = $_SESSION['usuario'];
$contraseña = $_SESSION['contrasenia'];

$query="SELECT*FROM usuarios where usuario='$usuario' and contrasenia='$contraseña'";
$usuarios=mysqli_query($conexion,$query);
}
if(isset($_REQUEST['editar'])){

  $id = $_REQUEST['id'];
  $producto = $_REQUEST['producto'];
  $descripcion = $_REQUEST['descripcion'];
  $precio = $_REQUEST['precio'];
  $stock = $_REQUEST['stock'];



 $update = "UPDATE productos SET producto = '$producto', descripcion = '$descripcion', precio = '$precio', stock = '$stock' WHERE id = '$id' ;";
   
 $actualizacion = mysqli_query($conexion,$update);
  
  


 header("location:productos.php");
?>
    <br>
  
    <label style="color: black; background-color: #33FFC7 " class="good" for=""> Modificado correctamente</label>
    
<?php

}
	
if(isset($_REQUEST['borrar'])){
  echo " <script>alert('Seguro que desea eliminar el producto?');</script>";

  $id = $_REQUEST['borrar'];
  //BORRADO DEL ARCHIVO
$imagenBorrar = mysqli_query($conexion,"SELECT imagen FROM `productos` WHERE id=$id ;");
unlink("imagenes/".$imagen[0]['imagen']);
//BORRADO DEL ARCHIVO

 $sql = "DELETE FROM `productos` WHERE id = $id ;";
  
  
  mysqli_query($conexion,$sql);

  header("location:productos.php");

 
    }
  
?>




<h1>PRODUCTOS DISPONIBLES : </h1> <br>
 
    <div class="contenedor">
               <table class="table table-dark" style="width: 600px;" >
            <thead>
                    <th>ID</th>
                    <th>Producto</th>
                    <th>Descripcion</th>
                    <th>Imagen</th>
                    <th>Precio</th>
                    <?php 
                     if(isset($_SESSION['usuario']))
                         if($_SESSION['cargo'] == 2 ){?>
                    <th>Cantidad</th>
                    <?php }
                    if(isset($_SESSION['usuario']))
                    if($_SESSION['cargo'] == 3){?>
                    <th>Stock</th>
                    <?php }
                         ?>
            </thead>
            <tbody>

                  <?php
                    
                     
                  
                  ?>
                
                 <td style="width: 600px;">
                 <?php foreach($productos as $producto){?>

                  <form method="post" name="formulario" action="productos.php">
                  <tr>
                  <td><input readonly type="text" name="id" value="<?=$producto["id"];?>"
                 <?php if(isset($_SESSION['usuario'])){
                          if($_SESSION['cargo'] == 2){
                            ?> readonly <?php } }else{ ?> readonly <?php }?> 
                     style="width:150%;"></td>
                    <td><input  type="text" name="producto" value="<?=$producto["producto"];?>" <?php if(isset($_SESSION['usuario'])){
                          if($_SESSION['cargo'] == 2){
                            ?> readonly <?php } }else{ ?> readonly <?php }?>  ></td>
                    <td> <input  type="text" name="descripcion" value="<?=$producto["descripcion"];?>" <?php if(isset($_SESSION['usuario'])){
                          if($_SESSION['cargo'] == 2){
                            ?> readonly <?php } }else{ ?> readonly <?php }?>   > </td>
                    <td> <img height=50 width=50 src="imagenes/<?php echo $producto["imagen"]; ?>" <?php if(isset($_SESSION['usuario'])){
                          if($_SESSION['cargo'] == 2){
                            ?> readonly <?php } }else{ ?> readonly <?php }?>  >  </td>
                    <td> <input  type="text" name="precio" value=" <?=$producto["precio"];?>" <?php if(isset($_SESSION['usuario'])){
                          if($_SESSION['cargo'] == 2){
                            ?> readonly <?php } }else{ ?> readonly <?php }?>  ></td>

                            <?php
                           if(isset($_SESSION['usuario']))  
                            if($_SESSION['cargo'] == 3){?>
                            <td> <input  type="text" name="stock" value= "<?=$producto['stock']; ?>"   > </td>
                            <?php }  ?>
                    <?php 
                    
                    if(isset($_SESSION['usuario'])){
                      if( $_SESSION['cargo'] == 2){ ?>
                        <td>  <input  type="number" name="cant" value="0" style="width:50px;"></td>
                        <?php 
                       
                           
                          echo '<td><input  class="btn btn-success" type="submit" value="Agregar al carrito" name="btnAgregar"></td>';
                        }
                             ?>
                        <?php if($_SESSION["cargo"] == 1){?>
                          
                            <td><a class="btn btn-danger" href="?borrar=<?php echo $producto['id'];?>">Eliminar</a></td>
                            <?php }
                            
                            if($_SESSION["cargo"] == 3){?>
                            <td><a class="btn btn-danger" name="borrar" href="?borrar=<?php echo $producto['id'];?>">Eliminar</a></td>
                            <td> <input class="btn btn-primary" type="submit" id="editar" name="editar" value="Editar"/>	</td>
                            <?php  }?>   
                          <?php 
                          }
                            ?>
                  </tr>  
                  </form> 

                 <?php } ?>

                
                  
                
                 </div>
            
            </tbody>
        </table>
      
      
       
        <div id='mensaje'></div>
        
       
      
        



<?php


if(isset($_REQUEST["btnAgregar"])){

$product = $_REQUEST["producto"];
$descripcion = $_REQUEST["descripcion"];
$precio = floatval($_REQUEST["precio"]);
$cantidad = intval($_REQUEST["cant"]);
$idProducto = intval($_REQUEST["id"]);

    $_SESSION["carrito"][$product]["id"] = $idProducto;
    $_SESSION["carrito"][$product]["descripcion"] = $descripcion;
    $_SESSION["carrito"][$product]["precio"] = $precio;
    $_SESSION["carrito"][$product]["cant"] = $cantidad;
        
    if(isset($_SESSION["carrito"])){
        array_push($_SESSION["carrito"]);
    }
   
    

  echo " <script>alert('Producto : $product agregado con exito al carrito de compras !');</script>"; 
  
       
}

      


?>

<?php include("pie.php") ?>