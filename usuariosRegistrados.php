<?php session_start();
include("cabecera.php");
include("conexion.php");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/estilos.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"/>   
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    <title>Usuarios registrados</title>
</head>
<body>
<?php
if($_GET){
$id = $_GET['borrar'];

$sql = "DELETE FROM `usuarios` WHERE `usuarios` . `id` =".$id ;
//$sqlPedidos = "DELETE FROM `pedidos` WHERE `id_usuarios` . `id` =".$id ;

mysqli_query($conexion,$sql);
//mysqli_query($conexion,$sqlPedidos);

header("location:usuariosRegistrados.php");
}
?>
<?php
$consulta="SELECT*FROM `usuarios`";
$usuarios=mysqli_query($conexion,$consulta);

//$usuarios=mysqli_fetch_array($resultado);


if(isset($_SESSION['usuario']) && $_SESSION['cargo'] == 3){
?>



<form action="resultados.php" method="post" style="background-color: #fafafa;
  margin: 1rem;
  padding: 1rem;
  border: 2px solid #ccc;
  text-align: center;">
    <label>Buscar Empleados
    <input class="form-control" type="search" name="buscar" placeholder="Buscar..." />
    <input class="form-control" type="submit" value="Enviar">
    </label>
</form>

<div class="col-md-6" style="background-color: #fafafa;
  margin: 1rem;
  padding: 1rem;
  border: 2px solid #ccc;
  text-align: center;">
                <table class="table table-dark">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Usuario</th>
                    <th>Id_cargo</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach($usuarios as $usuario){?>
                <tr>
                <?php if($usuario['usuario'] <> $_SESSION['usuario']){?>  
                    <td><?php echo $usuario['id'];?></td>
                    <td><?php echo $usuario['nombre'];?></td>
                    <td><?php echo $usuario['usuario'];?></td>
                    <td><?php echo $usuario['id_cargo'];?></td>
                    
                    <?php if($_SESSION["cargo"] == 1){
                            if($usuario['id_cargo'] == 2 ){?>
                    <td><a class="btn btn-danger" href="?borrar=<?php echo $usuario['id'];?>">Eliminar</a></td>
                    <?php } }elseif($_SESSION["cargo"] == 3){
                            if($usuario['id_cargo']){?>
                    <td><a class="btn btn-danger" href="?borrar=<?php echo $usuario['id'];?>">Eliminar</a></td>
                    <?php } }?> 
                    
                </tr> 
             <?php 
                   } //cierre del if
                }  //cierre foreach
             }   ?>
            </tbody>
        </table>
        </div>

   
          
</body>
</html>