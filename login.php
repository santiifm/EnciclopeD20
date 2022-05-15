<?php
include("db.php");
@session_start();
?>
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
			echo '<a class="btn bg-transparent" href = "crear.php" style="color: #e41900">Mis Creaciones</a>';}
			?>
		</div>
		<div class="col-lg mx-auto">
			<p>Bienvenido
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
	
	</div>	
	<div class="container-sm"  style="padding-top: 100px">
	</div>
	<div class="container-sm bg-dark rounded shadow-lg p-3 mb-5" style="padding-bottom: 15px">
		<div class="justify-content-center">
			<form action="validar.php" method="post">
				<p style="color: #e41900">
					<?php
					if( isset($_SESSION['Error']) ){
					echo $_SESSION['Error'];
					unset($_SESSION['Error']);}
					?>
				</p>
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
		</div>	
	</div>	
	<div class="container-sm"  style="padding-bottom: 200px">
	</div>
  <footer>
		<section class="site-footer">
			<div class="container-sm">
				<div class="row">
					<div class="col-md-4 col-sm-12 col-footer mx-auto">
						  <p class="mx-auto text-center" style="font-size: 23px">Ayudame a mantener el sitio:</p>
						  <dl class="pairs-crypto mx-auto">
							<dd>BTC</dd>
							<dt>bc1qvghgzdewy7tar78uy29ypqjwaur3ueecknln69</dt>
						  </dl>
						  <dl class="pairs-crypto mx-auto">
							<dd>LTC</dd>
							<dt>ME4ivwAUSTRd2qvMdYd1VMu3oWyrdowUHb</dt>
						  </dl>
					</div>
					<div class="col-md-4 col-sm-12 col-footer mx-auto">
						<img src="./img/icon-logo.png" style="height: 100px">
					</div>
					<div class="col-md-4 col-sm-12 col-footer mx-auto">
						  <p>Redes Sociales:</p>
						  <a href="https://www.facebook.com" class="btn boton-redes boton-facebook " target="_blank"></a>
						  <a href="https://www.instagram.com/santiifm" class="btn boton-redes boton-instagram" target="_blank"></a>
						  <a href="https://www.youtube.com/channel/UCVhExcSo8YMm9LwhWCK5O9A" class="btn boton-redes boton-youtube" target="_blank"></a>
					</div>
				</div>
			</div>
		</section>
    </footer>
  </body>
</html>




















