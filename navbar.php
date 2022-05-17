<?php
@session_start();
?>
<!DOCTYPE html>
<html lang="es">
  <head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
	<!--Icono de Cabecera-->
	<link rel="icon" href="./favicon.ico">

    <title>Bienvenido a ED20!</title>
	
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
	<!--NavBar-->
	
	<nav class="navbar navbar-expand-lg navbar-gradiente static-top shadow-sm">
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
			<a class="btn bg-transparent" href="login.php">Iniciar Sesión</a>
			<a class="btn bg-transparent" href="ultimo.php">Últimas Creaciones</a>
			<?php
			if (isset($_SESSION['usuario'])){
			echo '<a class="btn bg-transparent" href = "crear.php" style="color: #e41900">Creá tu Personaje</a>';}
			?>
			<?php
			if (isset($_SESSION['usuario'])){
			echo '<a class="btn bg-transparent" href = "mis_creaciones.php" style="color: #e41900">Mis Creaciones</a>';}
			?>
		</div>
		<div class="col-lg mx-auto">
			<p>Bienvenido/a
				<?php if (isset($_SESSION['usuario'])){
				echo $_SESSION['usuario'];}
				else echo '<a href="registro.php" style="color: #e41900">Registrate</a> o <a href="login.php" style="color: #e41900">Iniciá Sesión</a>';
				?>
			</p>
			<?php
				if (isset($_SESSION['usuario'])){
				echo '<p><a href = "logout.php" style="color: #e41900">Cerrar Sesión</a></p>';}
			?>
		</div>
	</nav>
  </body>
</html>