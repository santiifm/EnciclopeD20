<?php
@session_start();
?>
<!DOCTYPE html>
<html lang="es">
  <head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="description" content="En EnciclopeD20 podés navegar cientos de personajes de DnD subidos por usuarios o compartir tus propios! Entrá y probá.">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
	<!--Icono de Cabecera-->
	<link rel="icon" href="./favicon.ico">

    <title>Bienvenido a ED20, Tu Compañero de Aventuras de Rol! </title>
	
	<!--Bootstrap-->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
      integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    
	<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
	
    <!-- Stylesheet -->
    <link rel="stylesheet" href="./styles.css">
	
	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=G-YP7CYRBRK3"></script>
	<script>
	  window.dataLayer = window.dataLayer || [];
	  function gtag(){dataLayer.push(arguments);}
	  gtag('js', new Date());

	  gtag('config', 'G-YP7CYRBRK3');
	</script>
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
			<form class="form-inline" action="busqueda.php" method="get">
			  <input class="form-control border-0 bg-dark" type="text" placeholder="Buscar" name="entrada" style="color: #FFFFFF">
			  <input type="submit" class="btn btn-sm bg-dark" value="Buscar"></input>
			</form>
			<?php
			if (!isset($_SESSION['usuario'])){
			echo '<a class="btn bg-transparent" href="login.php">Iniciar Sesión</a>';}
			?>
			<a class="btn bg-transparent" href="creaciones.php">Navegar Creaciones</a>
			<?php
			if (isset($_SESSION['usuario'])){
			echo '<a class="btn bg-transparent" href = "crear.php" style="color: #e41900">Creá tu Personaje</a>';}
			?>
			<?php
			if (isset($_SESSION['usuario'])){
			echo '<a class="btn bg-transparent" href = "mis_creaciones.php" style="color: #e41900">Mis Creaciones</a>';}
			?>
		</div>
		<div class="col-lg">
			<p class="mt-5" style="font-size: 25px;">Bienvenido/a
				<?php if (isset($_SESSION['usuario'])){
				echo $_SESSION['usuario'];}
				else echo '<a href="registro.php" style="color: #e41900">Registrate</a> o <a href="login.php" style="color: #e41900">Iniciá Sesión</a>';
				?>
			</p>
			<p class="mb-5">
				<?php
					if (isset($_SESSION['usuario'])){
					echo '<a href = "perfil.php" style="color: #e41900">Mi Perfil</a>';}
					echo '&nbsp;';
					if (isset($_SESSION['usuario'])){
					echo '<a href = "logout.php" style="color: #e41900">Cerrar Sesión</a>';}
				?>
			</p>
		</div>
	</nav>
  </body>
</html>