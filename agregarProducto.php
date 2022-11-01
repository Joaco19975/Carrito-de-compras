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
    <link rel="stylesheet" href="css/estilos.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"/>   
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    <title>Agregar producto</title>
</head>
<body>
<?php if(isset($_REQUEST["agregarProducto"])){
                $producto = $_REQUEST['producto'];
                $descrip = $_REQUEST['descripcion'];
                $precio = $_REQUEST['precio'];
                $fecha = new DateTime(); //por si alguna imagen tiene el mismo nombre, que no se sobreescriba perdiendo la imagen anterior
                $stock = $_REQUEST['stock']; 

                $imagen = $fecha->getTimestamp()."_".$_FILES['archivo']['name']; //primero tengo la hora, concateno "_" y luego el nombre de la imagen.

                $imagenTemporal = $_FILES['archivo']['tmp_name'];

                 move_uploaded_file($imagenTemporal,"imagenes/".$imagen);

                 /*if(move_uploaded_file($imagenTemporal, 'Facultad/IMG'.$imagen)){
                    echo "Archivo guardado con exito";
                }else{
                    echo "Archivo no se pudo guardar";
                }*/
        
                    $sql = "INSERT INTO `productos` VALUES (NULL,'$producto','$descrip','$imagen','$stock','$precio');";

                    mysqli_query($conexion,$sql);

                    header("location:productos.php");
                    die();
      
                    }?>


<?php if(isset($_SESSION['usuario']) && $_SESSION['cargo'] == 3){  ?>
  <div class="container" >
    <div class="row">
        <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                Agregar Producto
            </div>
            <div class="card-body">

            <form action="agregarProducto.php" method="post" enctype='multipart/form-data'>

            Nombre del producto <input required class="form-control" type="text" name="producto" id="">
            <br>
             Descripcion <input required  class="form-control" type="text" name="descripcion" id="">
            <br>
            Imagen del producto <input required class="form-control" type="file" name="archivo" id="">
            <br>
            Stock <input required class="form-control" type="text" name="stock" id="">
            <br>
            Precio unitario <input required class="form-control" type="text" name="precio" id="">
            <br>
              
            <input class="btn btn-success" type="submit" value="Agregar" name="agregarProducto">
            </form>
                
            </div>
    
            </div>
            
        </div>


     

<?php }else{
          header("location:index.html");
        }?>
</body>
</html>