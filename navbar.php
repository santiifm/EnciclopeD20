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
	
	<!-- CSS only -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css">
    
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
	
	<nav class="navbar navbar-expand-lg navbar-gradiente static-top shadow-sm pt-3 pb-3">
		<div class="col-lg mx-auto">
			<a href="index">
				<img src="./img/icon-header.png" alt="" width="368" height="88">
			</a>
		</div>
		<div class="col-lg mx-auto">
			<form action="busqueda" method="get">
				<div class="row">
					<div class="col-sm-10">
						  <input class="form-control border-0 bg-dark" type="text" placeholder="Buscar" name="entrada" style="color: #FFFFFF">
					</div>
					<div class="col-sm-2">
						  <input type="submit" class="btn btn-sm bg-dark" value="Buscar"></input>
					</div>
				</div>
			</form>
			<a class="btn bg-transparent" href="creaciones">Navegar Creaciones</a>
			<?php
			if (isset($_SESSION['usuario'])){
			echo '<a class="btn bg-transparent" href = "crear" style="color: #e41900">Creá tu Personaje</a>';}
			?>
			<?php
			if (isset($_SESSION['usuario'])){
			echo '<a class="btn bg-transparent" href = "mis_creaciones" style="color: #e41900">Mis Creaciones</a>';}
			?>
		</div>
		<div class="col-lg mx-auto">
			<p class="my-auto" style="font-size: 25px;">Bienvenido/a
				<?php if (isset($_SESSION['usuario'])){
				echo $_SESSION['usuario'];
				}
				else echo '<a class="btn bg-transparent btn-sm" href="registro" style="color: #e41900">Registrate</a> o <a class="btn bg-transparent btn-sm" href="login" style="color: #e41900">Iniciá Sesión</a>';
				?>
			</p>
			<p class="mb-3">
				<?php
					if (isset($_SESSION['usuario'])){
					echo '<a class="btn bg-transparent" href = "perfil" style="color: #e41900">Mi Perfil</a>';}
					echo '&nbsp;';
					if (isset($_SESSION['usuario'])){
					echo '<a class="btn bg-transparent" href = "logout" style="color: #e41900">Cerrar Sesión</a>';}
				?>
			</p>
		</div>
	</nav>
  </body>
</html>