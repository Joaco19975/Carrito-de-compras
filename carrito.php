<?php session_start();
include_once("conexion.php");
include_once("cabecera.php");
// <a class='btn btn-primary' aria-current='page' href='carrito.php?realizarCompra=true'>Realizar compra carrito</a>
//<button type='button' class='btn btn-primary' href='carrito.php?realizarCompra=true'>Realizar compra carrito</button>
?>


<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"/>   
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    <title>Carrito de compras</title>
</head>
<?php
$total = 0;

 ?>
<table class='table-primary'> 
<tr>
        <th scope="col">   Carrito de compras </th>
  </tr>
  </table>

<?php if(isset($_SESSION['carrito'])){ ?>
<table class="table-dark">
  <thead>
    <tr>
      <th scope="col">Producto</th>
      <th scope="col">Descripcion</th>
      <th scope="col">Precio</th>
      <th scope="col">Cantidad</th>
    </tr>
  </thead>
  <tbody>
  <?php  
    foreach($_SESSION["carrito"] as $indice =>$array){ 
                                               
       
         $total += $array["cant"] * $array["precio"];
         
         ?>
    <tr>
      <td><input type="text" name="producto" value="<?=$indice;?>"> </td>
      <td><input type="text" name="descripcion" value="<?=$array["descripcion"];?>"></td>
      <td><input type="text" name="precio" value="<?=$array["precio"];?>"></td>
      <td><input type="text" name="cantidad" value="<?=$array["cant"];?>"></td>
      <td><a class='btn btn-danger'href='carrito.php?item=<?=$indice;?>'>Eliminar item</a></td>
    </tr>
    <?php  
          
         } 

         echo "<h3> Total de la compra es $ $total</h3>";
       echo "  <ul class='nav justify-content-center'>
            <li class='nav-item'>
                <a class='nav-link active' aria-current='page' href='carrito.php?vaciar=true'>Vaciar carrito</a>
             </li>
            <li class='nav-item'>
            <a class='btn btn-primary' aria-current='page' href='carrito.php?realizarCompra=true'>Realizar compra carrito</a>
             </li>
         </ul>
        ";
      }else{
        echo "<script> alert('El carrito esta vacio'); </script> ";
         //header("location:productos.php");
         //die();
        } ?>
  </tbody>
</table>


<?php 

if(isset($_REQUEST["vaciar"])){
    unset($_SESSION['carrito']);
    header("location:productos.php");
    die();
}

if(isset($_REQUEST["item"])){
    $producto = $_REQUEST["item"];
    unset($_SESSION["carrito"][$producto]); //eliminando del array carrito


    header("location:carrito.php");
    die();

}

if(isset($_REQUEST["realizarCompra"])){
 $idUsuario = $_SESSION["idUsuario"];
 
 if(isset($_SESSION['carrito'])){

 foreach($_SESSION["carrito"] as $indice =>$array){ //array seria cantidad , precio e id
         
         $idProducto = $array["id"];
         $cantidad = $array["cant"];
         $nombreProducto = $indice;

         $query = "INSERT INTO productos_vendidos VALUES (NULL,'$idUsuario','$idProducto','$nombreProducto', '$cantidad','$total');";
         mysqli_query($conexion,$query); 

         $consulta = "SELECT stock FROM productos WHERE id = '$idProducto';";
         $resultadoStock = mysqli_query($conexion,$consulta);
         
         foreach($resultadoStock as $sto)
         $nuevoStock = $sto['stock'] - $cantidad ;


          $modificacion = "UPDATE productos SET stock = '$nuevoStock' WHERE id = '$idProducto';";
           mysqli_query($conexion,$modificacion);
      
  
         
        

    }
  }
    unset($_SESSION['carrito']);
   
    header("location:productos.php");
    echo "<script> alert('Compra realizada !'); </script>";

    

}



?>