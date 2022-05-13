<?php session_start();?>
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
			<p>Bienvenido
				<?php if (isset($_SESSION['usuario'])){
				echo $_SESSION['usuario'];}
				else echo 'Invitado, <a href="registro.html" style="color: #e41900">Registrate!</a>';
				?>
			</p>
			<?php
				if (isset($_SESSION['usuario'])){
				echo '<p><a href = "logout.php" style="color: #e41900">Cerrar Sesión</a></p>';}
			?>
			<div class="dropdown btn-group">
			  <a class="btn btn-secondary bg-transparent dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="font-size: 30px">
				Navegar
			  </a>
			  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
				<a class="dropdown-item" href="login.html">Iniciar Sesión / Registrarse</a>
				<a class="dropdown-item" href="#">¿Quienes Somos?</a>
				<a class="dropdown-item" href="#">Ayuda/FAQ</a>
			  </div>
			</div>
		</div>
	</nav>
	<!--Header-->
	
	<header>
	  <section class="site-header">
	  <div class="container-sm">
      <div class="row justify-content-around">

        <div class="col-md-6 col-sm-12 pe-md-5 col-content my-auto">

          <h1 style="color: #e41900">
            Bienvenido a la primera enciclopedia de personajes de rol en español.
          </h1>
          <h4>
            El lugar perfecto para guardar y mantener cuenta de tus personajes de rol creados.
			Crea tu perfil ahora y empieza a compartir tus creaciones!
          </h4>
		  <form>
			<input class="form-control border-0" type="email" placeholder="Ingrese su mail...">
			<a href="./login.html" class="btn boton-email my-2">Entrar a la Cripta</a>
		  </form>
        </div>
        <div class="col-md-6 col-sm-12 col-image">
          <img src="./img/illust-1.png" alt="" class="img-fluid" />
        </div>
      </div>

    </header>
	<!--Main-->
	<section class="section-feature">
        <div class="container-sm">

          <div class="row justify-content-between">

			<div class="col-md-6 col-sm-12 col-image">
				<img src="./img/illust-2.png" alt="" class="img-fluid">
			</div>
            <div class="col-md-6 col-sm-12 col-content my-auto">

              <h2 style="color: #e41900">
                No pierdas mas tiempo... o morirás.
              </h2>

              <p>
                Apúrate a inspirar a cientos de otros usuarios con tus proyectos de rol. 
				Comparte y navega estadísticas, retratos, historias, trasfondos y mucho más.
			  </p>
			  
			  <h2 style="color: #e41900">
			  ¿Sin inspiración?
			  </h2>
			  
			  <p>
			  No dudes en plagiar descaradamente el personaje de ese 
			  buen samaritano que decidió compartir exactamente lo que tenías en mente.
			  </p>
			</div>
		</div>
	</section>
	<!--Footer-->
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
    </footer>
  </body>
 </html>
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 