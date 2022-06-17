<?php
@session_start();
?>
<!DOCTYPE html>
<html lang="es">
  <body>
	<!--NavBar-->
	
	<?php include("navbar.php"); ?>
	
	<!--Header-->
	
	<header>
	  <section class="site-header">
		  <div class="container-sm">
			<div class="row justify-content-around">
				<div class="col-md-6 col-sm-12 my-auto">
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
				<div class="col-md-6 col-sm-12">
				  <img src="./img/illust-1.png" alt="" class="img-fluid mx-5" />
				</div>
			</div>
		</section>
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
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 