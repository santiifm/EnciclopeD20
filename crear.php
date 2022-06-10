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
					  <li class="list-group-item lista-pasos-item">Paso 1 - Completá el siguiente pdf editable haciendo click en cada uno de los campos vacíos.</li>
					  <li class="list-group-item lista-pasos-item">Paso 2 - Apretá la flechita para descargar, ubicada arriba a la derecha, y guardá el pdf con tus cambios.</li>
					  <li class="list-group-item lista-pasos-item">Paso 3 - Introducí el nombre, una foto y el pdf terminado de tu personaje en el formulario.</li>
					</ul>
					<form action="subir.php" method="post" enctype="multipart/form-data">
						<div class="mb-3">
							<p style="color: #e41900">
							<?php
							if( isset($_SESSION['Error']) ){
								echo $_SESSION['Error'];
								unset($_SESSION['Error']);}
							?>
							</p>
						  <input type="text" class="form-control" name="nombre" placeholder="Nombre del Personaje"required></textarea>
						  <label style="padding-top: 10px">Subir PDF</label>
						  <input type="file"  name="pdf" class="form-control form-control-lg" id="formFile" style="font-size: 25px" required>
						  <label style="padding-top: 10px">Subir Foto</label>
						  <input type="file"  name="img" class="form-control form-control-lg" id="formFile" style="font-size: 25px" required>
						  <input type="submit" name="submit" class="btn boton-email my-3" value="Subir Archivos">
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