<?php
@session_start();
include("db.php");
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
	
	<?php include("navbar.php"); ?>
	
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
			<?php 	if (isset($_SESSION['usuario'])){
						echo '<a href = "/crear.php" class="btn boton-email my-2">Crear un Personaje</a>';
					}else echo'<a href="./registro.php" class="btn boton-email my-2">Entrar a la Cripta</a>';
			?>
        </div>
        <div class="col-md-6 col-sm-12 col-image">
          <img src="./img/illust-1.png" alt="" class="img-fluid mx-5" />
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
                No pierdas más tiempo... o morirás.
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
		</div>
	</section>
	<!--Footer-->
	<?php include("footer.php"); ?>
  </body>
 </html>
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 