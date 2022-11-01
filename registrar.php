<!doctype html>
<html>
<head>
<meta charset="utf-8">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
<title>Registrate</title>
</head>

<body>
	<h2>Registrate en el sitio</h2>
    <form action="registro.php" method="post" style="text-align:center;">
    	<label>Nombre
        	<input required class="form-control" type="text" name="nombre"  />
        </label><br/>
        <label>Usuario
        	<input required class="form-control" type="text" name="usuario"  />
        </label><br/>
        <label>Contraseña
        	<input required class="form-control" type="password" name="contrasenia"  />
            <input type="hidden" name="id_cargo" value="2">
        </label><br/>
        <br>
        <input type="submit" value="Registrarse"/>	
    </form>
    <a href="index.html" class="btn btn-success">Volver</a>
</body>
</html>