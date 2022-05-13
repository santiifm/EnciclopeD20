<!DOCTYPE html>
<html lang="es">
  <head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
	<!--Icono de Cabecera-->
	<link rel="icon" href="./favicon.ico">

    <title>Iniciar Sesión</title>
	
	<!--Bootstrap-->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
      integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
	<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
    <!-- Stylesheet -->
    <link rel="stylesheet" href="./styles.css">
  </head>
  <body>

	<nav class="navbar navbar-expand-lg navbar-light static-top shadow-sm" style="background: url('./img/bg-header.png') 250px;">
		<div class="col-lg mx-auto">
			<a href="index.php">
				<img src="./img/icon-header.png" alt="" width="368" height="88">
			</a>
		</div>
		<div class="col-lg mx-auto">
			<form class="form-inline">
			  <input class="form-control border-0 bg-dark" type="search" placeholder="Buscar" aria-label="Buscar">
			  <button class="btn btn-default bg-transparent border-0" type="submit">
				<img src="./img/icon-searchwhite.png" width="22" height="22">
			  </button>
			</form>
		</div>
		<div class="col-lg mx-auto">
		<div class="dropdown btn-group">
			  <a class="btn btn-secondary bg-transparent dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="font-size: 30px">
				Navegar
			  </a>
			  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
				<a class="dropdown-item" href="login.php">Iniciar Sesión / Registrarse</a>
				<a class="dropdown-item" href="#">¿Quienes Somos?</a>
				<a class="dropdown-item" href="#">Ayuda/FAQ</a>
			  </div>
			</div>
		</div>
	</nav>
	
	<div class="container-sm bg-dark rounded shadow-lg p-3 mb-5" style="padding-bottom: 15px">
	<div class="justify-content-center">
	<form action="validar.php" method="post">
	  <div class="form-group">
		<label style="font-size: 20px">Nombre de Usuario</label>
		<input type="text" class="form-control" placeholder="Ingrese su Nombre de Usuario" name="usuario">
	  </div>
	  <div class="form-group">
		<label style="font-size: 20px">Contraseña</label>
		<input type="password" class="form-control" placeholder="Ingrese su Contraseña" name="contraseña">
	  </div>
	  <button type="submit" class="btn boton-email" name="login">Iniciar Sesión</button>
	<p>
	No estas registrado?
		<a class="btn boton-email" href="registro.php">
		Registrate!
		</a>
	</p>
	</form>
  </body>
</html>




















