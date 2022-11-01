<?php include("conexion.php");
session_start(); 
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
    <title>Ventas</title>
</head>
<body>
<?php 
$consulta="SELECT*FROM `productos_vendidos`";
$productos_vendidos=mysqli_query($conexion,$consulta);



?>

<?php if(isset($_SESSION['usuario']) && $_SESSION['cargo'] == 3){ ?>
<div class="contenedor" style=" display: table-cell;
        vertical-align: middle;
        text-align: center;">
               <table class="table table-dark" style="width: 600px; " >
            <thead>
                    <th>ID Usuario</th>
                    <th>Producto</th>
                    <th>Cantidad</th>
                    <th>Total gastado</th>
                
            </thead>
            <tbody>
            <td style="width: 600px;">               
                <?php foreach($productos_vendidos as $producto){?>
                    <tr>
                   
                    <td>  <input  type="text" name="id_usuario" value="<?=$producto["id_usuario"];?>" readonly style="width:100%;"> </td>
                    <td> <input  type="text" name="nombre" value="<?=$producto["nombre"];?>" readonly></td>
                    <td> <input  type="text" name="descripcion" value="<?=$producto["cantidad"];?>" readonly> </td>
                    <td> <input  type="text" name="totalGastado" value="<?=$producto["totalGastado"];?>" readonly> </td>
                    </tr>  
                <?php } ?>
    
                
            
            </tbody>
        </table>
        </div>
        <?php }else{
            header("location:index.html");
        } ?>
</body>
</html>