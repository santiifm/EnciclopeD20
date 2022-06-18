<?php
@session_start();
error_reporting(E_ERROR | E_PARSE);
?>
<!DOCTYPE html>
<html lang="es">
  <body>

	<?php include("navbar.php"); 
	if ($_SESSION['usuario']!="" && isset($_SESSION['usuario'])){ ?>
	
		<div class="container-fluid shadow-lg mt-5 mb-5" style="max-width: 1600px">
			<div class="row">
				<div class="col-md-6 col-sm-12">
					<ul class="list-group">
					  <li class="list-group-item lista-pasos-item">Paso 1 - Completá el siguiente PDF editable y descargalo con tus cambios o usá tu propia Character Sheet en formato PDF.</li>
					  <li class="list-group-item lista-pasos-item">Paso 2 - Introducí el nombre, una foto y el PDF terminado de tu personaje en el formulario.</li>
					  <li class="list-group-item lista-pasos-item">Paso 3 - Apretá el botón de subir y compartí tu personaje con el resto del mundo!</li>
					</ul>
					<form action="validar.php" method="post" enctype="multipart/form-data">
						<div class="mb-3">
							<p style="color: #e41900">
							<?php
							if( isset($_SESSION['Error']) ){
								echo $_SESSION['Error'];
								unset($_SESSION['Error']);}
							?>
							</p>
						  <label class="mt-2" style="font-size: 20px">Ingresar Nombre del Personaje</label>
						  <input type="text" class="form-control mt-2" name="nombre" placeholder="Nombre del Personaje" required></textarea>
						  <label class="mt-2" style="font-size: 20px">Subir Retrato</label>
						  <input type="file"  name="img" class="form-control form-control-lg" id="formFile" style="font-size: 25px" required>
						  <label class="mt-2" style="font-size: 20px">Subir PDF</label>
						  <input type="file"  name="pdf" class="form-control form-control-lg" id="formFile" style="font-size: 25px" required>
						  <input type="submit" name="submit" class="btn boton-email my-3" value="Subir Personaje">
						</div>
					</form>
				</div>
				<div class="col-md-6 col-sm-12">
					<div class="ratio" style="--bs-aspect-ratio: 100%">
					  <iframe
						src="/src/CS5e.pdf"
						title="Hoja de Personaje"
						style="padding-bottom: 50px"
					  ></iframe>
					</div>
				</div>
			</div>
		</div>
	<?php
	}
	include("footer.php");
	?>
	
  </body>
</html>