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

    <title>Creá tu Personaje!</title>
	
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

	<?php include("navbar.php"); ?>
	
	<div class="container-fluid shadow-lg" style="max-width: 1600px">
		<div class="row">
			<div class="col-md-6 col-sm-12">
				<p style="color: #e41900"><?php
					if( isset($_SESSION['Error']) ){
						echo $_SESSION['Error'];
						unset($_SESSION['Error']);}
					?>
				</p>
				<ul class="list-group">
				  <li class="list-group-item lista-pasos-item">Paso 1 - Completá el siguiente pdf editable haciendo click en cada uno de los campos vacíos.</li>
				  <li class="list-group-item lista-pasos-item">Paso 2 - Apretá la flechita para descargar, ubicada arriba a la derecha, y guardá el pdf con tus cambios.</li>
				  <li class="list-group-item lista-pasos-item">Paso 3 - Introducí el nombre, una foto y el pdf terminado de tu personaje en el formulario.</li>
				</ul>
				<form action="subir.php" method="post" enctype="multipart/form-data">
					<div class="mb-3">
					  <textarea class="form-control" id="nombre_personaje" name="nombre" rows="1" required></textarea>
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
	<?php include("footer.php"); ?>
  </body>
</html>