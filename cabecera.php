<?php 
error_reporting(E_ALL ^ E_NOTICE); 
include_once("conexion.php");
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema</title>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  
</head>
<body>
         
         <?php 
         if(isset($_SESSION['usuario'] )){
          $usuario = $_SESSION['usuario'];
          $contraseña = $_SESSION['contrasenia'];
                    
            $consulta="SELECT*FROM usuarios where usuario='$usuario' and contrasenia='$contraseña'";
            $resultado=mysqli_query($conexion,$consulta);

            $usuarios=mysqli_fetch_array($resultado);
         
         ?> 


<nav class="navbar navbar-expand-lg bg-light">
  <div class="container-fluid">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="true" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
      <?php  if($usuarios["id_cargo"]  == 3){ //superadmin?>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="superadmin.php">Inicio</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="salir.php">Cerrar sesion</a>
          </li>
          
          <div class="dropdown">
          <button class="btn btn-primary dropdown-toggle" type="button" id="dropdown1" data-bs-toggle="dropdown">
            Productos
          </button>
           <div class="dropdown-menu">
            <a class="dropdown-item"  href="productos.php">Productos Disponibles</a>
            <a class="dropdown-item"  href="mostrar_ventas.php">Productos vendidos</a>
            <a class="dropdown-item" href="agregarProducto.php"> Agregar Producto</a>
            </div>
          </div>  
         
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" name ="btnAgregarSuperAdmin" href="agregarSuperAdmin.php">Agregar Super Administrador</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page"  href="usuariosRegistrados.php">Usuarios registrados</a>
          </li>

         
        </div>  
        <form class="d-flex" role="search" action="resultados_productos.php" method="post" enctype='multipart/form-data'>
          <input class="form-control me-2" type="search" name="buscar" placeholder="Buscar producto..." aria-label="Search">
          <button class="btn btn-outline-success" type="submit">Buscar</button>
          </form>

              
        <?php }elseif($usuarios["id_cargo"] == 1){ //admin?>
          <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="admin.php">Inicio</a>
          </li>
          <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="salir.php">Cerrar sesion</a>
          </li>
          <li class="nav-item">
          <a class="nav-link active" aria-current="page" name ="btnAgregarAdmin" href="agregarAdmin.php">Agregar Administrador</a>
          </li>
          <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="usuariosRegistrados.php">Usuarios registrados</a>
          </li>
          <?php }elseif($usuarios["id_cargo"] == 2){ //clientes ?>
          
          <li class="nav-item">
          <a class="nav-link active" aria-current="page"  href="cliente.php">Inicio</a>
          </li>
          <li class="nav-item">
          <a class="nav-link active" aria-current="page"  href="salir.php">Cerrar sesion</a>
          </li>

            <li class="nav-item">
            <a class="nav-link active" aria-current="page"  href="productos.php">Productos</a>
            </li>
          
          <li class="nav-item">
          <a class="nav-link active" aria-current="page" href='carrito.php' class="btn btn-dark"> Mi Carrito</a>
          </li>
          <form class="d-flex" role="search" action="resultados_productos.php" method="post" enctype='multipart/form-data'>
          <input class="form-control me-2" type="search" name="buscar" placeholder="Buscar producto..." aria-label="Search">
          <button class="btn btn-outline-success" type="submit">Buscar</button>
          </form>

          <li class="nav-item">
          <a class="nav-link active" aria-current="page"  href="contacto.php">Contacto</a>
          </li>
          <?php    ?>
              <?php }
               }else{
               
                           ?>
                  <nav class="navbar navbar-expand-lg bg-light" >
                  <div class="container-fluid">
                
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                      <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                        <a class="nav-link active" aria-current="page"  href="index.html">Inicio</a>
                        </li>
                              <li class="nav-item">
                            <a class="nav-link active" aria-current="page"  href="productos.php">Productos</a>
                            </li>
                            <li class="nav-item">
                            <a class="nav-link active" aria-current="page"  href="contacto.php">Contacto</a>
                            </li>
                        </ul>

                        <form class="d-flex" role="search" action="resultados_productos.php" method="post" enctype='multipart/form-data'>
                        <input class="form-control me-2" type="search" name="buscar" placeholder="Buscar producto..." aria-label="Search">
                        <button class="btn btn-outline-success" type="submit">Buscar</button>
                        </form>

                </div>
              </div>
            </nav>
              <?php }?>
      </ul>
     
    </div>
  </div>
</nav>


    
  <?php include("pie.php"); ?>
