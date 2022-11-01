<?php 
include_once('conexion.php');
include_once('cabecera.php');
session_start();?>
<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="css/estilos.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"/>   
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
<title>Resultados</title>
</head>

<body>
<section>
<?php

    if($_GET){
        $id = $_GET['borrar'];
        
        $sql = "DELETE FROM `usuarios` WHERE `usuarios` . `id` =".$id ;
        //$sqlPedidos = "DELETE FROM `pedidos` WHERE `id_usuarios` . `id` =".$id ;
        
        mysqli_query($conexion,$sql);
        //mysqli_query($conexion,$sqlPedidos);
        ?>
         
       
       <?php   }
        
	$buscar = $_REQUEST['buscar'];
	echo "Su consulta: <em>".$buscar."</em><br>";

	$consulta = mysqli_query($conexion, "SELECT * FROM usuarios WHERE usuario LIKE '%$buscar%' OR nombre LIKE '%$buscar%' OR id LIKE '%$buscar%' ");
?>
<article>
	<p>Cantidad de Resultados: 
	<?php
		$nros=mysqli_num_rows($consulta);
		echo $nros;
	?>
	</p>

    <div class="contenedor">
               <table class="table table-dark" style="width: 600px;" >
            <thead>
                    <th>ID Usuario</th>
                    <th>Usuario</th>
                    <th>Nombre</th>
                    <th>ID Cargo</th>
            </thead>
    
	<?php
		while($resultados=mysqli_fetch_array($consulta)) {
	?>
    
        <tr>
          <td><input  type="text"  value="<?=$resultados["id"];?>" readonly></td>
          <td><input  type="text"  value="<?=$resultados["usuario"];?>" readonly></td>
          <td><input  type="text"  value="<?=$resultados["nombre"];?>" readonly></td>
          <td><input  type="text"  value="<?=$resultados["id_cargo"];?>" readonly></td>
        </tr>
		
            <?php	  if($_SESSION["cargo"] == 1){
                if($resultados['id_cargo'] == 2 ){?>
        <td><a class="btn btn-danger" href="?borrar=<?php echo $resultados['id'];?>">Eliminar</a></td>
        <?php } }elseif($_SESSION["cargo"] == 3){
                if($resultados['id_cargo']){?>
        <td><a class="btn btn-danger" href="?borrar=<?php echo $resultados['id'];?>">Eliminar</a></td>
        <?php } }?>   

        
	
    </div>
    <hr/>
    <?php
		}?>
     
        
</article>
</section>


<?php	mysqli_free_result($consulta);
		mysqli_close($conexion);

	?>
</body>
</html>